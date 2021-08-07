<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderedItemDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('ordered_item_details');
        Schema::create('ordered_item_details', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('orders_id')->nullable();
            $table->integer('products_id');
            $table->string('product_name');
            $table->string('product_code');
            $table->string('product_color');
            $table->string('size');
            $table->float('price');
            $table->integer('quantity');
            $table->enum('condition', ['new', 'second hand']);
            $table->string('status', 25)->nullable();
            $table->smallInteger('add_by')->nullable();
            $table->unsignedBigInteger('product_attribute_id')->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ordered_item_details');
    }
}
