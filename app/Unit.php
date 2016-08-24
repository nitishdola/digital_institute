<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $fillable = array('unit_name', 'subject_id');
	protected $table    = 'units';
    protected $guarded  = ['_token'];

    public static $rules = [
    	'unit_name' 	=>  'required|max:255', 
    	'subject_id' 	=>  'required|exists:subjects,id',
    ];
    public function subject() 
	{
		return $this->belongsTo('App\Subject', 'subject_id');
	}

    public static function check_if_exists( $unit_name = null, $subject_id = null) {
        $where = [];
        $where['unit_name']  = trim($unit_name);
        $where['subject_id'] = trim($subject_id);
        return Unit::where($where)->count();
    }
}
