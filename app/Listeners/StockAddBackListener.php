<?php

namespace App\Listeners;

use App\Events\StockAddBackEvent;
use App\ProductAtrr_model;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class StockAddBackListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */

    protected $productAttribute;

    public function __construct(ProductAtrr_model $model)
    {
        $this->productAttribute = $model;
    }

    /**
     * Handle the event.
     *
     * @param  StockAddBackEvent  $event
     * @return void
     */
    public function handle(StockAddBackEvent $event)
    {
        try {
            $newModel = $this->productAttribute->find($event->id);
            $newModel->stock = $newModel->stock + $event->stockAmount;
            $newModel->save();
        } catch (\Exception $e) {
            throw $e;
        }
    }
}
