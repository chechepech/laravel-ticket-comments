<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $guarded = [];
    //
    public function user(){
    	
		return $this->belongsTo('App\User');
	}

	public function comments()
	{	
		//tickets may have many comments  One to Many
		return $this->hasMany('App\Comment', 'ticket_id');
	}
}
