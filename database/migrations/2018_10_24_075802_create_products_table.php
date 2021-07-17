<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('products');

        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('categories_id');
            $table->string('p_name');
            $table->string('p_code');
            $table->string('p_color');
            $table->text('description');
            $table->float('price');
            $table->string('image');
            $table->boolean('is_new')->default(true);
            $table->date('age')->nullable();
            $table->string('made_in', 50)->nullable();
            $table->float('tax_included')->nullable();
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
        Schema::dropIfExists('products');
    }
}
