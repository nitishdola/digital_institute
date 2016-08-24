<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $fillable = array('branch_name', 'description');
	protected $table    = 'branches';
    protected $guarded  = ['_token'];

    public static $rules = [
    	'branch_name'  =>  'required|max:255', 
    ];
}
