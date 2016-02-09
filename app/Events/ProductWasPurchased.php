<?php

namespace TechTrader\Events;

use TechTrader\Events\Event;
use TechTrader\Models\Product;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ProductWasPurchased extends Event implements ShouldBroadcast
{
    use SerializesModels;

    /**
     * The product that was purchased
     *
     * @var TechTrader\Models\Product;
     */
    public $product;

    /**
     * Event Message
     *
     * @var string
     */
    public $message;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Product $product)
    {
        $this->product = $product;
        $this->message = "Product was purchased: (#{$product->id}) {$product->title}";
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return ['product.purchased'];
    }
}
