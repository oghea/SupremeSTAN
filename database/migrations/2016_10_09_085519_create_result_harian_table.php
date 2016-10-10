<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateResultHarianTable extends Migration {

	public function up()
	{
		Schema::create('resultquiz', function(Blueprint $table) {
			$table->increments('id');
			$table->string('result', 100)->nullable();
			$table->integer('nilai_quiz')->nullable();
            $table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('resultquiz');
	}
}