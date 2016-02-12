<?php

namespace TechTrader\Repos;

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
        return $this->find($order_id)->update(['paid' => 1]);
    }
}