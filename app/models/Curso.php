<?php
class Curso extends Eloquent
{
	public function users()
	{
		return $this->belongsToMany("User");
	}	
}