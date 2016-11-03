<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBanksoalQuizBundleQuizTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banksoalQuiz_bundleQuiz', function(Blueprint $table) {
            $table->integer('banksoalQuiz_id')->unsigned();
            $table->integer('bundleQuiz_id')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('banksoalQuiz_bundleQuiz');
    }
}
