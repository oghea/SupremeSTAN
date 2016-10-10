<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateKunciJawabanTkdTable extends Migration {

	public function up()
	{
		Schema::create('kunciTKD', function(Blueprint $table) {
			$table->increments('id');
			$table->tinyInteger('jawaban_benar');
		});
	}

	public function down()
	{
		Schema::drop('kunciTKD');
	}
}