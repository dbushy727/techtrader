<?php

namespace TechTrader\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use TechTrader\Events\ProductWasPurchased;
use TechTrader\Models\Notification;

class NotifyUser
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
        return Notification::create([
            'user_id' => $event->product->user->id,
            'message' => $event->message,
        ]);
    }
}
