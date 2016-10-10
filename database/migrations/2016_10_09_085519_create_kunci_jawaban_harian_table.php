<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateKunciJawabanHarianTable extends Migration {

	public function up()
	{
		Schema::create('kunciquiz', function(Blueprint $table) {
			$table->increments('id');
			$table->tinyInteger('jawaban_benar');
		});
	}

	public function down()
	{
		Schema::drop('kunciquiz');
	}
}