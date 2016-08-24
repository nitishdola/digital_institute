<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BranchClassSubjectUnit extends Model
{
    
	protected $fillable = array('branch_id', 'class_id', 'subject_id', 'unit_id');
	protected $table    = 'branch_class_subject_units';
    protected $guarded  = ['_token'];

  
    public static $rules = [
        'branch_id'     =>  'required|exists:branches,id',
        'class_id'      =>  'required|exists:classes,id',
        'subject_id'    =>  'required|exists:subjects,id',
        'unit_id'       =>  'required|exists:units,id',
    ];

    
    public static function check_if_assigned($branch_id, $class_id, $subject_id, $unit_id) {
        $where = [];
        $where['branch_id']  	= trim($branch_id);
        $where['subject_id'] 	= trim($subject_id);
        $where['class_id']  	= trim($class_id);
        $where['unit_id'] 		= trim($unit_id);
        return BranchClassSubjectUnit::where($where)->count();
    }

    public function branch() 
	{
		return $this->belongsTo('App\Branch', 'branch_id');
	}

	public function subject() 
	{
		return $this->belongsTo('App\Subject', 'subject_id');
	}

	public function class() 
	{
		return $this->belongsTo('App\DigitalClass', 'class_id');
	}

	public function unit() 
	{
		return $this->belongsTo('App\Unit', 'unit_id');
	}
}
