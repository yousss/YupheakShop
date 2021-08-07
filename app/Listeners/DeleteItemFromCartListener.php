<?php

namespace App\Listeners;

use App\Cart_model;
use App\Events\DeleteItemFromCartEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class DeleteItemFromCartListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */

    protected $cart;

    public function __construct(Cart_model $cart)
    {
        $this->cart = $cart;
    }

    /**
     * Handle the event.
     *
     * @param  DeleteItemFromCartEvent  $event
     * @return void
     */
    public function handle(DeleteItemFromCartEvent $event)
    {
        $this->cart->whereIn('id', $event->cartId)->delete();
        // $this->cartId
    }
}
