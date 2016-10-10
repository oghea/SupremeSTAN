<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateJawabanTKDUserTable extends Migration {

	public function up()
	{
		Schema::create('jawabanTKD', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('tryoutTKD_id')->unsigned();
			$table->integer('user_id')->unsigned();
            $table->string('jawaban', 200)->nullable();
            $table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('jawabanTKD');
	}
}