<?php

namespace TechTrader\Ecommerce;

use TechTrader\Models\Cart;
use TechTrader\Models\CartItem;
use TechTrader\Models\User;
use TechTrader\Repos\OrderRepo;

class Checkout
{
    /**
     * Payment processor used to send payment
     *
     * @var TechTrader\Ecommerce\PaymentProcessor
     */
    protected $payment_processor;

    /**
     * Order repo
     *
     * @var TechTrader\Repos\OrderRepo
     */
    protected $order_repo;

    /**
     * Order Item Repo
     *
     * @var TechTrader\Repos\OrderItemRepo
     */
    protected $order_item_repo;

    /**
     * Set the payment_processor and repos for checkout
     *
     * @param TechTrader\Models\PaymentProcessor $payment_processor
     * @param TechTrader\Repo\OrderRepo          $order_repo
     * @param TechTrader\Repo\OrderItemRepo      $order_item_repo
     */
    public function __construct(
        PaymentProcessor $payment_processor,
        OrderRepo        $order_repo,
        OrderItemRepo    $order_item_repo
    ) {
        $this->payment_processor = $payment_processor;
        $this->order_repo        = $order_repo;
        $this->order_item_repo   = $order_item_repo;
        $this->exceptions        = config('exceptions.ecommerce');
    }

    /**
     * Go through checkout process
     *
     * @param  TechTrader\Models\User $user
     * @throws Exception
     * @return TechTrader\Ecommerce\Checkout
     */
    public function checkout(User $user)
    {
        try {
            $calculator = $this->calculate($user->cart);

            $order = $this->createOrder(
                $user->cart,
                $calculator->getSubtotal(),
                $calculator->getTax(),
                $calculator->getTotal()
            );

            $this->processPayment($user, $order);

            $this->broadcastEvent($user);

        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Calculate the amounts for the checkout process
     *
     * @param  TechTrader\Models\Cart $cart
     * @return TechTrader\Ecommerce\Checkout
     */
    protected function calculate(Cart $cart)
    {
        $calculator = app('TechTrader\Ecommerce\Calculator', [$cart]);

        $calculator->calculate();

        return $calculator;
    }

    /**
     * Update the order with the correct totals
     *
     * @param  TechTrader\Models\Cart   $cart
     * @param  int                      $subtotal
     * @param  int                      $tax
     * @param  int                      $total
     * @return TechTrader\Models\Order
     */
    protected function createOrder(Cart $cart, $subtotal, $tax, $total)
    {
        if ($cart->isEmpty()) {
            throw new \Exception(array_get($this->exceptions, 'empty_cart'));
        }

        $order =  $this->order_repo->create([
            'user_id' => $cart->user->id,
            'subtotal' => $subtotal,
            'tax' => $tax,
            'total' => $total,
        ]);

        foreach ($cart->items as $cart_item) {
            $this->order_item_repo->create([
                'order_id' => $order->id,
                'product_id' => $cart_item->product->id
            ]);
        }

        return $order;
    }

    /**
     * Process the payment of the order
     *
     * @param  User  $user
     * @param  Order  $order
     * @return bool
     */
    protected function processPayment(User $user, Order $order)
    {
        if (!$order->total) {
            throw new \Exception(array_get($this->exceptions, 'missing_total'));
        }

        $payment = $this->payment_processor->charge($user, [
            'amount' => $order->total,
        ]);

        if (!$payment) {
            throw new \Exception(array_get($this->exceptions, 'payment_failed'));
        }

        return $this->order_repo->setToPaid($order->id);
    }

    protected function broadcastEvent(User $user)
    {
        return event('user.checkout.completed', [
            'user_id' => $user->id,
        ]);
    }
}
