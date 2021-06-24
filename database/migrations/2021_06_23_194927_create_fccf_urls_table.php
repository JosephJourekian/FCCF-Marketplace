<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFccfUrlsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fccf_urls', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('fccf_updates_id');
            $table->string('url');

            $table->foreign('fccf_updates_id')
                ->references('id')
                ->on('fccf_updates')
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
        Schema::dropIfExists('fccf_urls');
    }
}
