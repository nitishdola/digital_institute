<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = array('name', 'description');
	protected $table    = 'subjects';
    protected $guarded  = ['_token'];

    public static $rules = [
    	'name' 				=>  'required|unique:departments|max:255', 
    ];
}
