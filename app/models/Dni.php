<?php
class Dni extends Eloquent
{
	//un dni pertenece a un usuario
	public function user() 
	{ 
		return $this->belongsTo('User'); 
	}
}