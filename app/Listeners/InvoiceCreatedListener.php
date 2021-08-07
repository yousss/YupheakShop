<?php

namespace App\Listeners;

use App\Events\InvoiceCreatedEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Invoice;

class InvoiceCreatedListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    protected $invoice;
    public function __construct(Invoice $invoice)
    {
        $this->invoice = $invoice;
    }

    /**
     * Handle the event.
     *
     * @param  InvoiceCreatedEvent  $event
     * @return void
     */
    public function handle(InvoiceCreatedEvent $event)
    {
        $this->invoice->create($event->invoices);
    }
}
