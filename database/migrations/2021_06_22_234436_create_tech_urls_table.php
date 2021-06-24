<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTechUrlsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tech_urls', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('tech_id');
            $table->string('url');

            $table->foreign('tech_updates_id')
                ->references('id')
                ->on('tech_updates')
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
        Schema::dropIfExists('tech_urls');
    }
}
