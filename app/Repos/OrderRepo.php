<?php

namespace TechTrader\Repos;

use TechTrader\Models\Order;

class OrderRepo extends RepoMan
{
    public function __construct(Order $order)
    {
        $this->model = $order;
    }

    /**
     * Set order to paid
     *
     * @param int $order_id
     * @return boolean
     */
    public function setToPaid($order_id)
    {
        return $this->update($order_id, ['is_paid' => 1]);
    }
}
