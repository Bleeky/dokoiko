<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration {

	public function up()
	{
		Schema::create('articles', function($table)
		{
			$table->integer('id');
			$table->text('title');
			$table->text('introduction');
			$table->mediumText('content');
			$table->string('image', 255);
			$table->boolean('status');
			$table->timestamp('date')->default(DB::raw('CURRENT_TIMESTAMP'));
//            $table->integer('author');
//            $table->integer('author_description');
//            $table->integer('author_image');
		});
	}

	public function down()
	{
		Schema::drop('articles');
	}

}
