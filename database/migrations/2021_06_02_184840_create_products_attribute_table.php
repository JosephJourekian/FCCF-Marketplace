<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsAttributeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_attribute', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('products_id');
            $table->string('attribute_name');
            $table->string('attribute_value');

            $table->foreign('products_id')
                ->references('id')
                ->on('products')
                ->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products_attribute');
    }
}
