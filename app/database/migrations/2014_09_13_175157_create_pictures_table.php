<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePicturesTable extends Migration {

	public function up()
	{
		Schema::create('pictures', function(Blueprint $table)
		{
			$table->increments('id');
			$table->text('title');
			$table->text('content');
			$table->text('html');
			$table->string('image', 255);
			$table->boolean('status');
			$table->timestamp('date')->default(DB::raw('CURRENT_TIMESTAMP'));
		});
	}

	public function down()
	{
		Schema::drop('pictures');
	}

}
