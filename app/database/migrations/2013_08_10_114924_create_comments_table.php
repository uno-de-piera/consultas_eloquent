<?php

use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('comments', function($tabla) 
        {
            $tabla->increments('id');
            $tabla->integer('user_id');
            $tabla->integer('post_id');
            $tabla->string('subject', 100);
            $tabla->text('comment');   
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
		Schema::drop('comments');
	}

}