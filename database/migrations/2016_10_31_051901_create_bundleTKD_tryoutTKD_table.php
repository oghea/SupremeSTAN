<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBundleTKDTryoutTKDTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bundleTKD_tryoutTKD', function (Blueprint $table) {
            $table->integer('bundleTKD_id')->unsigned();
            $table->integer('tryoutTKD_id')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('bundleTKD_tryoutTKD');
    }
}
