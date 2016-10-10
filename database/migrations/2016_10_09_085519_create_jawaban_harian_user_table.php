<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateJawabanHarianUserTable extends Migration {

	public function up()
	{
		Schema::create('jawabanquiz', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('bundlequiz_id')->unsigned();
			$table->integer('user_id')->unsigned();
            $table->integer('resultquiz_id')->unsigned();
			$table->string('isi_jawaban', 100)->nullable();
		});
	}

	public function down()
	{
		Schema::drop('jawabanquiz');
	}
}