<?php

use Illuminate\Database\Migrations\Migration;

class CreateCursoUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('curso_user', function($tabla) 
        {
            $tabla->increments('id');
            $tabla->integer('user_id');
            $tabla->integer('curso_id');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('curso_user');
	}

}