<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWebsiteTable extends Migration {

    public function up()
    {
        Schema::create('website', function(Blueprint $table)
        {
            $table->increments('id');
            $table->boolean('status');
        });
    }

    public function down()
    {
        Schema::drop('website');
    }
}
