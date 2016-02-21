<?php

namespace Tests\Ecommerce;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use TechTrader\Models\Cart;
use TechTrader\Models\CartItem;
use Tests\TestBase;

class CalculatorTest extends TestBase
{
    /**
     * @test
     * @expectedException Exception
     * @expectedExceptionMessage Cart is empty
     */
    public function it_will_throw_an_exception_if_cart_is_empty()
    {
        $user = \DB::table('users')->first();

        // Create the basic empty cart
        $cart = Cart::create([
            'user_id' => $user->id,
        ]);

        // Make sure cart is empty
        $this->assertTrue($cart->isEmpty());

        $calculator = app('TechTrader\Ecommerce\Calculator', [$cart]);

        // Should throw empty cart exception
        $calculator->calculate();
    }

    /** @test */
    public function it_will_calculate_correct_amounts_for_cart_with_no_tax()
    {
        // Get a user
        $user = \DB::table('users')->first();

        // Delete users current cart
        \DB::table('carts')->where('user_id', $user->id)->delete();

        // Create a new cart
        $cart = Cart::create([
            'user_id' => $user->id,
        ]);

        // Get some products
        $products = \DB::table('products')->take(4)->get();

        // Add some products to the cart
        foreach ($products as $product) {
            CartItem::create([
                'cart_id' => $cart->id,
                'product_id' => $product->id,
            ]);
        }

        // Make sure cart isnt empty so calculator can properly calculate
        $this->assertFalse($cart->isEmpty());

        // Expected
        $subtotal = $cart->items->sum('product.price');
        $tax      = 0.00;
        $total    = $subtotal;

        $calculator = app('TechTrader\Ecommerce\Calculator', [$cart]);
        $calculator->calculate();

        $this->assertEquals($subtotal, $calculator->getSubtotal());
        $this->assertEquals($tax, $calculator->getTax());
        $this->assertEquals($total, $calculator->getTotal());
    }

    /** @test */
    public function it_will_calculate_correct_amounts_for_cart_with_tax()
    {
        // Get a user
        $user = \DB::table('users')->first();

        // Delete users current cart
        \DB::table('carts')->where('user_id', $user->id)->delete();

        // Create a new cart
        $cart = Cart::create([
            'user_id' => $user->id,
        ]);

        // Get some products
        $products = \DB::table('products')->take(4)->get();

        // Add some products to the cart
        foreach ($products as $product) {
            CartItem::create([
                'cart_id' => $cart->id,
                'product_id' => $product->id,
            ]);
        }

        // Make sure cart isnt empty so calculator can properly calculate
        $this->assertFalse($cart->isEmpty());

        // Set the tax rate
        $tax_rate = 0.09;

        // Expected Data
        $subtotal = $cart->items->sum('product.price');
        $tax      = (int) round($subtotal * $tax_rate);
        $total    = $subtotal + $tax;

        $calculator = app('TechTrader\Ecommerce\Calculator', [$cart, $tax_rate]);
        $calculator->calculate();

        $this->assertEquals($subtotal, $calculator->getSubtotal());
        $this->assertEquals($tax, $calculator->getTax());
        $this->assertEquals($total, $calculator->getTotal());
    }
}
