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
     * Tax rate
     *
     * @var float
     */
    protected $tax_rate;

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

    /**
     * Start up a calculator
     *
     * @param  Cart      $cart
     * @param  float     $tax_rate
     */
    public function __construct(Cart $cart, $tax_rate = 0.00)
    {
        $this->cart         = $cart;
        $this->tax_rate     = $tax_rate;
        $this->exceptions   = config('exceptions.ecommerce');
    }

    /**
     * Calculate the combined subtotal of all the
     * cart items before any other calculations
     *
     * @return TechTrader\Ecommerce\Checkout
     */
    protected function calculateSubtotal()
    {
        $this->subtotal = $this->cart->items->sum('product.price');

        return $this;
    }

    /**
     * Calculate total tax due
     *
     * @return TechTrader\Ecommerce\Calculator
     */
    protected function calculateTax()
    {
        $this->tax = (int) round($this->subtotal * $this->tax_rate);

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
     * @throws Exception
     * @return TechTrader\Ecommerce\Calculator
     */
    public function calculate()
    {
        if ($this->cart->isEmpty()) {
            throw new \Exception(array_get($this->exceptions, 'empty_cart'));
        }

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
