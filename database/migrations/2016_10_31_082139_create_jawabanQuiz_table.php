<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJawabanQuizTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jawabanQuiz', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('bundleQuiz_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('resultQuiz_id')->unsigned();
            $table->string('isi_jawaban')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('jawabanQuiz');
    }
}
