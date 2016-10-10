<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateJawabanUSMUserTable extends Migration {

	public function up()
	{
		Schema::create('jawabanUSM', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('tryoutUSM_id')->unsigned()->index();
			$table->integer('user_id')->unsigned();
            $table->string('jawaban_tpa', 200)->nullable();
			$table->string('jawaban_tbi', 200)->nullable();
            $table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('jawabanUSM');
	}
}