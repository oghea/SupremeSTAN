<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBundleSoalTable extends Migration {

	public function up()
	{
		Schema::create('bundleUSM', function(Blueprint $table) {
			$table->increments('id');
			$table->string('judul', 50);
			$table->integer('subjectUSM_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('bundleUSM');
	}
}