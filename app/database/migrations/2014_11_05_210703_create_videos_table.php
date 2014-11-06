<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideosTable extends Migration {

	public function up()
	{
		Schema::create('videos', function(Blueprint $table)
		{
            $table->increments('id');
            $table->text('title');
            $table->integer('youtubeid');
            $table->boolean('status');
            $table->timestamp('date')->default(DB::raw('CURRENT_TIMESTAMP'));
		});
	}

	public function down()
	{
		Schema::drop('videos');
	}

}
