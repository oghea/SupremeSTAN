<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBundleHarianTable extends Migration {

	public function up()
	{
		Schema::create('bundlequiz', function(Blueprint $table) {
			$table->increments('id');
			$table->date('publish_date');
			$table->boolean('published')->default(0);
			$table->integer('jumlah_soal');
			$table->integer('durasi');
            $table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('bundlequiz');
	}
}