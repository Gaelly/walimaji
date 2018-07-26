<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateToTransformProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('to_transform_products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id')->references('id')->on('productions')
                ->onDelete('restrict');
            $table->integer('transformer_id')->references('id')->on('users')
                ->onDelete('restrict');
            $table->string('product_state');
            $table->integer('initial_quantity');
            $table->integer('current_quantity');
            $table->dateTime('entry_date');
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
        Schema::dropIfExists('to_transform_products');
    }
}
