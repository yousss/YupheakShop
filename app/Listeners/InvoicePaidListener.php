<?php

namespace App\Listeners;

use App\Events\InvoicePaidEvent;
use App\Invoice;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class InvoicePaidListener
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
     * @param  InvoicePaidEvent  $event
     * @return void
     */
    public function handle(InvoicePaidEvent $event)
    {
        $this->invoice->where('code', $event->invoiceCode)->update([
            'is_paid' => $event->status,
            'paid_at' => now(),
            'note' => 'PAID'
        ]);
    }
}
