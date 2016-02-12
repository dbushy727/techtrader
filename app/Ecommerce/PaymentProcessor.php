<?php

namespace TechTrader\Ecommerce;

abstract class PaymentProcessor
{
    protected $order_repo;

    public function __construct(OrderRepo $order_repo)
    {
        $this->order_repo = $order_repo;
    }

    abstract public function charge(User $user, $total);

    public function pay(Order $order)
    {
        $this->charge($order->user, $order->total);

        $this->order_repo->find($order->id)->setToPaid();
    }
}