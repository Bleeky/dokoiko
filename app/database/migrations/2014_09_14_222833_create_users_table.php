<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('username');
			$table->string('password', 255);
//            $table->enum('status', array('admin', 'author'));
//            $table->string('name');
//            $table->mediumText('description');
//            $table->mediumText('picture');
			$table->rememberToken();
		});
	}
	public function down()
	{
		Schema::drop('users');
	}

}
