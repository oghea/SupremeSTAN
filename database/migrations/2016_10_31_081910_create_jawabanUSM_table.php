<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJawabanUSMTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jawabanUSM', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('tryoutUSM_id')->unsigned()->index();
            $table->integer('user_id')->unsigned();
            $table->string('jawaban_tpa')->nullable();
            $table->string('jawaban_tbi')->nullable();
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
        Schema::drop('jawabanUSM');
    }
}
