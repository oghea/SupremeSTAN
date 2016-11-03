<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBundleUSMTryoutUSMTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bundleUSM_tryoutUSM', function (Blueprint $table) {
            $table->integer('bundleUSM_id')->unsigned();
            $table->integer('tryoutUSM_id')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('bundleUSM_tryoutUSM');
    }
}
