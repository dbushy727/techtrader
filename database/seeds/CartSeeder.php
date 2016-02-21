<?php

use Illuminate\Database\Seeder;
use TechTrader\Models\Cart;
use TechTrader\Models\CartItem;
use TechTrader\Models\Product;
use TechTrader\Models\User;

class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users      = User::take(10)->get();
        $products   = Product::take(10)->get();

        foreach ($users as $user) {
            $cart = Cart::create([
                'user_id' => $user->id,
            ]);

            $cart_item = CartItem::create([
                'cart_id' => $cart->id,
                'product_id' => $products->pop()->id,
            ]);
        };
    }
}
