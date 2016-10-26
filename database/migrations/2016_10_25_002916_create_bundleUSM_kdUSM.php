<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBundleUSMKdUSM extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bundleUSM_kdUSM', function (Blueprint $table) {
            $table->integer('bundleUSM_id')->unsigned();
            $table->integer('kdUSM_id')->unsigned();
            $table->foreign('bundleUSM_id')->references('id')->on('bundleUSM')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('kdUSM_id')->references('id')->on('kdUSM')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->primary(['bundleUSM_id', 'kdUSM_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('bundleUSM_kdUSM');
    }
}
