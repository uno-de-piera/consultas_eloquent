<?php

use Illuminate\Database\Migrations\Migration;

class CreateDnisTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('dnis', function($tabla) 
        {
            $tabla->increments('id');
            $tabla->integer('user_id');
            $tabla->string('numero', 12); 
            $tabla->timestamps();
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('dnis');
	}

}