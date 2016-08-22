<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $fillable = array('unit_name', 'subject_id');
	protected $table    = 'subjects';
    protected $guarded  = ['_token'];

    public static $rules = [
    	'unit_name' 	=>  'required|max:255', 
    	'subject_id' 	=>  'required|exists:subjects,id|unique_with:unit_name',
    ];

    public function subject() 
	{
		return $this->belongsTo('App\Subject', 'subject_id');
	}
}
