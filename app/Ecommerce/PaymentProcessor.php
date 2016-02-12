<?php

namespace TechTrader\Ecommerce;

use TechTrader\Models\Order;
use TechTrader\Models\User;
use TechTrader\Repos\OrderRepo;

abstract class PaymentProcessor
{
    protected $order_repo;

    abstract public function charge(User $user, $total);

    public function __construct(OrderRepo $order_repo)
    {
        $this->order_repo = $order_repo;
    }

    /**
     * Charge the credit card and update the order to paid
     *
     * @param  Order  $order [description]
     * @return boolean
     */
    public function pay(Order $order)
    {
        $this->charge($order->user, $order->total);

        return $this->order_repo->find($order->id)->setToPaid();
    }
}
