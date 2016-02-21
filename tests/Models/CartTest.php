<?php

namespace Tests\Models;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use TechTrader\Models\Cart;
use Tests\TestBase;

class CartTest extends TestBase
{
    /** @test */
    public function it_can_check_if_cart_is_empty()
    {
        $empty_cart = new Cart;
        $this->assertTrue($empty_cart->isEmpty());

        $non_empty_cart = Cart::find(\DB::table('cart_items')->first()->cart_id);
        $this->assertFalse($non_empty_cart->isEmpty());
    }
}
