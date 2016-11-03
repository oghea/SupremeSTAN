<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTryoutTKDTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tryoutTKD', function(Blueprint $table) {
            $table->increments('id');
            $table->string('judul');
            $table->integer('durasi');
            $table->date('publish_date')->nullable();
            $table->boolean('published')->default(0);
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
        Schema::drop('tryoutTKD');
    }
}
