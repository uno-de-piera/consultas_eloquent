<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

//podemos obtener a un usuario por su id
Route::get('user/{id}', function($id)
{

    $user = User::find($id);
	echo $user->username;
	echo $user->email;
	echo "<br />";
	//así obtenemos el dni del usuario
	echo $user->dni->numero;
	echo "<br />";
	//todos los posts de un usuario
	foreach($user->posts as $post){
		echo $post->title;
		echo $post->content;
	}
	echo "<br />";
	//todos los comentarios de un usuario
	foreach($user->comments as $comment){
		echo $comment->subject;
		echo $comment->comment;
	}
	echo "<br />";
	//todos los cursos de un usuario
	foreach($user->cursos as $curso){
		echo $curso->curso;
	}
});


//creamos un nuevo usuario
Route::get("new", function(){
	$user = new User;
	$dni = new Dni;
	$post = new Post;
	$comment = new Comment;
	$user->username = "Juan";
	$user->email = "juan@mail.com";
	$user->password = 123456;
	$user->save();
	$post->user_id = 1;
	$post->title = "Post de juan";
	$post->content = "Contenido de juan";
	$post->save();
	$comment->user_id = 1;
	$comment->post_id = 1;
	$comment->subject = "Hola soy juan";
	$comment->comment = "hola soy juan";
	$comment->save();
	$dni->user_id = 2;
	$dni->numero = "99999999-W";
	$dni->save();
});

//eliminamos un post y sus comentarios
Route::get("deletePost", function(){

	$post = Post::find(1);
	$post->delete();

});

Route::get('delete/{id}', function($id)
{
	
	$nuevo = User::find($id);
	$nuevo->delete();

});

Route::get("curso", function(){

	$user = User::find(1);
	if(count($user->cursos) == 0){
		echo "El usuario no ha contratado ningún curso";
	}else{
		foreach($user->cursos as $curso){
			echo $curso->curso;
		}
	}
});

Route::get("nuevo_curso", function(){

	$curso = new Curso;
	$curso->curso = "Programación con php";
	$curso->save();

});

Route::get("nuevo_post", function(){

	$post = new Post;
	$post->user_id = 2;
	$post->title = "hola";
	$post->content = "hoal";
	$post->save();
	$comment = new Comment;
	$comment->user_id = 2;
	$comment->post_id = 3;
	$comment->subject = "test";
	$comment->comment = "test";
	$comment->save();

});

Route::get("add_user_curso", function(){

	$curso = Curso::find(1);
	$user = User::find(1);
	$user->cursos()->save($curso);
});


Route::get("truncate", function(){
	User::truncate();
	Comment::truncate();
	Dni::truncate();
	Post::truncate();
});
