<?php

namespace TechTrader\Repos;

use TechTrader\Models\CartItem;
use TechTrader\Models\Product;

class CartItemRepo
{
    /**
     * Cart Item
     *
     * @var TechTrader\Models\CartItem
     */
    protected $cart_item;

    /**
     * Establish repo
     *
     * @param CartItem $cart_item
     */
    public function __construct(CartItem $cart_item)
    {
        $this->cart_item = $cart_item;
    }

    /**
     * Save cart item and attach to user
     *
     * @param  int $product_id
     * @return bool
     */
    public function save($product_id)
    {
        $user       = \Auth::user();
        $product    = Product::find($product_id);

        return $this->cart_item
            ->user()->associate($user)
            ->product()->associate($product)
            ->save();
    }

    /**
     * Delete cart items attached to user
     *
     * @return int
     */
    public function reset()
    {
        $user = \Auth::user();

        return $user->cart_items()->delete();
    }

    /**
     * Delete a cart item
     *
     * @param  int $cart_item_id
     * @return int
     */
    public function delete($cart_item_id)
    {
        return CartItem::find($cart_item_id)->delete();
    }
}
