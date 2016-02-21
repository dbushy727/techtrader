<?php

namespace TechTrader\Repos;

use TechTrader\Models\OrderItem;

class OrderItemRepo extends RepoMan
{
    public function __construct(OrderItem $order)
    {
        $this->model = $order_item;
    }
}
