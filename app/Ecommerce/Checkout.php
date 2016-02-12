<?php

namespace TechTrader\Ecommerce;

use TechTrader\Ecommerce\PaymentProcessor;
use TechTrader\Models\User;

class Checkout
{
    /**
     * User that is checking out
     *
     * @var TechTrader\Models\User
     */
    protected $user;

    /**
     * The cart that will be checked out
     *
     * @var TechTrader\Models\Cart
     */
    protected $cart;

    /**
     * The current order
     *
     * @var TechTrader\Models\Order
     */
    protected $order;

    /**
     * Calculator responsible for calculating amounts
     *
     * @var TechTrader\Ecommerce\Calculator
     */
    protected $calculator;
    /**
     * Set the user, cart and payment_processor for checkout
     *
     * @param TechTrader\Models\User $user
     * @param TechTrader\Models\Cart $cart
     * @param TechTrader\Models\PaymentProcessor $payment_processor
     */
    public function __construct(User $user, Cart $cart, PaymentProcessor $payment_processor)
    {
        $this->user              = $user;
        $this->cart              = $cart;
        $this->payment_processor = $payment_processor;
    }

    /**
     * Go through checkout process
     * @return [type] [description]
     */
    public function checkout()
    {
        try {
            $this->begin()
                ->scanAllItems()
                ->calculate()
                ->processPayment()
                ->end();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Begin the checkout process by starting an order
     *
     * @return TechTrader\Ecommerce\Checkout
     */
    protected function beginOrder()
    {
        if ($this->cart->isEmpty()) {
            throw new \Exception('Cannot Checkout: Cart is empty');
        }

        $this->order = $this->user->orders()->create([]);

        return $this;
    }

    /**
     * Scan cart item and attach it to order
     *
     * @param  CartItem $cart_item [description]
     * @return TechTrader\Ecommerce\Checkout
     */
    protected function scan(CartItem $cart_item)
    {
        $this->order->items()->create([
            'product_id' => $cart_item->product->id,
        ]);

        return $this;
    }

    /**
     * Scan all the items currently in the cart
     *
     * @return TechTrader\Ecommerce\Checkout
     */
    protected function scanAllItems()
    {
        foreach ($this->cart->items as $cart_item) {
            $this->scan($cart_item);
        }

        return $this;
    }

    /**
     * Calculate the amounts for the checkout process
     *
     * @return TechTrader\Ecommerce\Checkout
     */
    protected function calculate()
    {
        $this->calculator = new Calculator($this->cart);

        $this->calculator->calculate();

        return $this;
    }

    /**
     * Update the order with the correct totals
     *
     * @return TechTrader\Ecommerce\Checkout
     */
    protected function updateOrder()
    {
        $subtotal   = $this->calculator->getSubtotal();
        $tax        = $this->calculator->getTax();
        $total      = $this->calculator->getTotal();

        $this->order->update(compact('subtotal', 'tax', 'total'));

        return $this;
    }

    protected function processPayment()
    {
        $this->payment_processor->charge($this->user, $this->calculator->getTotal());
    }
}
