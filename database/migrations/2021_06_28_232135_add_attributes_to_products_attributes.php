<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAttributesToProductsAttributes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products_attribute', function (Blueprint $table) {
            $table->string('attribute_second_name')->default('N/A');
            $table->string('attribute_second_value')->default('N/A');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products_attribute', function (Blueprint $table) {
            $table->dropColumn('attribute_second_name');
            $table->dropColumn('attribute_second_value');
        });
    }
}
