<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBankBundleTable extends Migration {

	public function up()
	{
		Schema::create('bankquiz_bundlequiz', function(Blueprint $table) {
            $table->integer('bankquiz_id')->unsigned();
		    $table->integer('bundlequiz_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('bankquiz_bundlequiz');
	}
}