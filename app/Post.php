<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	/*You can change the names here if you want*/
    // Table Name
    protected $table = 'posts';
    // Primary Key
    public $primaryKey = 'id';
    // Timestamps
    public $timestamps = true; //true by default, so it's okay not to put this
    
    public function user(){
        return $this->belongsTo('App\User');
        //that means post table has a relationship with user table
        //the user_id on posts table will belong to an
        //account of the users table
    }
}