<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateResultUsmTable extends Migration {

	public function up()
	{
		Schema::create('resultUSM', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->integer('tryoutUSM_id')->unsigned();
			$table->integer('nilai')->nullable();
			$table->string('result_TPA', 200)->nullable();
			$table->string('result_TBI', 200)->nullable();
			$table->integer('skor_tpa')->nullable();
			$table->integer('skor_tbi')->nullable();
			$table->string('keterangan', 50)->nullable();
		});
	}

	public function down()
	{
		Schema::drop('resultUSM');
	}
}