<?php 
class Post extends Eloquent
{
	//un post pertenece a un usuario
	public function user() 
	{ 
		return $this->belongsTo('User'); 
	}

	//un posts tiene mucho comentarios
	public function comments() 
	{ 
		return $this->hasMany('Comment'); 
	}

	//eliminamos el post y todos sus comentarios
	public function delete()
	{
		//eliminamos los comentarios del post 
        foreach($this->comments as $comment)
        {
            $comment->delete();
        }
        //eliminamos el post
        return parent::delete();
	}
}