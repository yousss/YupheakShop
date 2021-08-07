<?php

namespace App\Listeners;

use App\Events\StockCuttOffEvent;
use App\ProductAtrr_model;
use Exception;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\DB;

class StockCuttOffListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public  $productArr;

    public function __construct(ProductAtrr_model $productArr)
    {
        $this->productArr = $productArr;
        //  
    }

    /**
     * Handle the event.
     *
     * @param  StockCuttOffEvent  $event
     * @return void
     */
    public function handle(StockCuttOffEvent $event)
    {
        $productAttributeIds = $event->productAttributeIds;
        $itemAddedToCartCounts = $event->itemAddedToCartCounts;
        $models = $this->productArr->whereIn('id', $productAttributeIds)->get();
        DB::beginTransaction();
        try {
            if (count($models)) {
                foreach ($models as $key =>  $model) {
                    $model->stock = $model->stock - $itemAddedToCartCounts[$key];
                    $model->save();
                    DB::commit();
                }
            }
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
