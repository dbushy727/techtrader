<?php

namespace TechTrader\Ecommerce;

use TechTrader\Models\Cart;

class Calculator
{
    /**
     * Cart to be calculated
     *
     * @var TechTrader\Models\Cart
     */
    protected $cart;

    /**
     * Subtotal of the checkout process
     *
     * @var int
     */
    protected $subtotal = 0;

    /**
     * Tax amount
     *
     * @var int
     */
    protected $tax = 0;

    /**
     * Total price being paid by the customer
     *
     * @var int
     */
    protected $total = 0;


    public function __construct(Cart $cart)
    {
        $this->cart = $cart;
    }

    /**
     * Calculate the combined total of all the order items
     * before any other calculations
     *
     * @return TechTrader\Ecommerce\Checkout
     */
    protected function calculateSubtotal()
    {
        // Reset subtotal
        $this->subtotal = 0;

        foreach ($this->cart->items as $cart_item) {
            $this->subtotal += $cart_item->product->price;
        }

        return $this;
    }

    /**
     * Calculate total tax due
     *
     * @param  float $tax_rate
     * @return TechTrader\Ecommerce\Calculator
     */
    protected function calculateTax($tax_rate)
    {
        $this->tax = (int) round($this->subtotal * $tax_rate);

        return $this;
    }

    /**
     * Calculate total due
     *
     * @return TechTrader\Ecommerce\Calculator
     */
    protected function calculateTotal()
    {
        $this->total = $this->subtotal + $this->tax;

        return $this;
    }

    /**
     * Calculate all amounts
     *
     * @return TechTrader\Ecommerce\Calculator
     */
    public function calculate()
    {
        return $this->calculateSubtotal()
            ->calculateTax()
            ->calculateTotal();
    }

    /**
     * Get the subtotal
     *
     * @return float
     */
    public function getSubtotal()
    {
        return $this->subtotal;
    }

    /**
     * Get the tax amount
     *
     * @return float
     */
    public function getTax()
    {
        return $this->tax;
    }

    /**
     * Get the total amount
     *
     * @return float
     */
    public function getTotal()
    {
        return $this->total;
    }
}
