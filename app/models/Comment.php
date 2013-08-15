<?php 
class Comment extends Eloquent
{
	//un comentario pertenece a un usuario
	public function user() 
	{ 
		return $this->belongsTo('User');	 
	}

	//un comentario pertenece a un post --> belongsTo
	public function post() 
	{ 
		return $this->belongsTo('Post'); 
	}
}