<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('invoices');
        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('order_id')->index();
            $table->string('code', 200)->unique();
            $table->unsignedInteger('customer_id');
            $table->unsignedInteger('created_by')->index();
            $table->unsignedInteger('verified_by')->nullable();
            $table->unsignedInteger('approved_by')->nullable();
            $table->unsignedInteger('adjusted_by')->nullable();
            $table->dateTime('created_on')->default(now());
            $table->dateTime('issuing_on')->nullable();
            $table->double('discount_amount', 8, 2)->nullable();
            $table->double('amount', 8, 2);
            $table->float('tax_rate')->nullable();
            $table->boolean('is_paid')->default(false);
            $table->dateTime('paid_at')->nullable();
            $table->string('paid_by', 20)->nullable();
            $table->float('discount_rate')->nullable();
            $table->unsignedSmallInteger('total_qty');
            $table->string('note', 255)->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('invoices');
    }
}
