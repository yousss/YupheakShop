<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('orders');
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('users_id')->nullable();
            $table->string('users_email', 100)->nullable();
            $table->unsignedInteger('shipping_address_id')->nullable();
            $table->float('shipping_charges')->nullable();
            $table->string('coupon_code', 100)->nullable();
            $table->string('coupon_amount', 100)->nullable();
            $table->string('order_status', 100)->nullable();
            $table->string('payment_method', 100)->nullable();
            $table->unsignedSmallInteger('total_qty')->nullable();
            $table->string('grand_total', 100)->nullable();
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
        Schema::dropIfExists('orders');
    }
}
