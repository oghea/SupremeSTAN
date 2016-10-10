<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateResultTkdTable extends Migration {

	public function up()
	{
		Schema::create('resultTKD', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->integer('tryoutTKD_id')->unsigned();
			$table->string('result', 200)->nullable();
			$table->integer('nilai')->nullable();
			$table->string('keterangan', 50)->nullable();
		});
	}

	public function down()
	{
		Schema::drop('resultTKD');
	}
}