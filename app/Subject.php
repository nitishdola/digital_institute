<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = array('subject_name', 'description');
	protected $table    = 'subjects';
    protected $guarded  = ['_token'];

    public static $rules = [
    	'subject_name'  =>  'required|max:255', 
    ];
}
