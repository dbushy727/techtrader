<?php

namespace TechTrader\Listeners;

use TechTrader\Events\ProductWasPurchased;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendPurchaseEmail
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ProductWasPurchased  $event
     * @return void
     */
    public function handle(ProductWasPurchased $event)
    {
        $data = ['product' => $event->product];

        Mail::send('emails.product_purchased', $data, function ($message) {
            $message->from(config('emails.notifications'))
                ->to('dbushy727@gmail.com')
                ->subject('TechTrader: Product Purchased!');
        });
    }
}
