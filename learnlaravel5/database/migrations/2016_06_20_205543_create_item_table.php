<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function(Blueprint $table)
    	{
        	$table->increments('id');
        	$table->string('firstname');
        	$table->string('email');
		$table->string('inputfile');
        	$table->boolean('check_box');
		$table->int('dropdown');
        	$table->timestamps();
    	});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
