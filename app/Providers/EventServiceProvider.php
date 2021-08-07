<?php

namespace App\Providers;

use App\Events\CutStockEvent;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        'App\Events\StockCuttOffEvent' => [
            'App\Listeners\StockCuttOffListener',
        ],
        'App\Events\DeleteItemFromCartEvent' => [
            'App\Listeners\DeleteItemFromCartListener',
        ],
        'App\Events\InvoiceCreatedEvent' => [
            'App\Listeners\InvoiceCreatedListener',
        ],
        'App\Events\InvoicePaidEvent' => [
            'App\Listeners\InvoicePaidListener',
        ],
        'App\Events\StockAddBackEvent' => [
            'App\Listeners\StockAddBackListener',
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
