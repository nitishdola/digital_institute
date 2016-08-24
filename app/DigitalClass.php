<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DigitalClass extends Model
{
    protected $fillable = array('class_name', 'description');
	protected $table    = 'classes';
    protected $guarded  = ['_token'];

    public static $rules = [
    	'branch_name'  =>  'required|max:255', 
    ];
}
