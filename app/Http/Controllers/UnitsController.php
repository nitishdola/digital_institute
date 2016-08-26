<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB, Validator, Redirect, Auth, Crypt;

use App\Unit, App\Subject, App\Branch, App\DigitalClass, App\BranchClassSubjectUnit;

class UnitsController extends Controller
{
    public function create() {
    	$subjects = ['0'=> 'Select Subject'] + Subject::whereStatus(1)->orderBy('subject_name', 'DESC')->lists('subject_name', 'id')->toArray();
    	return view('units.create', compact('subjects'));
    }

    public function store(Request $request) {
    	$validator = Validator::make($data = $request->all(), Unit::$rules);
        if ($validator->fails()) return Redirect::back()->withErrors($validator)->withInput();

        $message = '';

        if(Unit::check_if_exists($request->unit_name, $request->subject_id)) {
        	$message = 'Combination already exists !';
        	return Redirect::route('unit.create')->with('message', $message);
        }
    	
    	if(Unit::create($data)) {
            $message .= 'Unit added successfully !';
        }else{
            $message .= 'Unable to add Unit !';
        }

        return Redirect::route('unit.index')->with('message', $message);
    }

    public function index(Request $request) {
        $where['status'] = 1;
        
        if($request->subject_id != '') {
            $where['subject_id'] = $request->subject_id;
        }
        if(trim($request->unit_name) != '') {
            $results = Unit::where($where)->where('unit_name', 'LIKE', '%'.trim($request->unit_name).'%')->with('subject')->paginate(30);
        }else{
            $results = Unit::where($where)->with('subject')->paginate(30);
        }
        $subjects = Subject::whereStatus(1)->orderBy('subject_name', 'DESC')->lists('subject_name', 'id')->toArray();
        
        return view('units.index', compact('results', 'subjects'));
    }

    public function edit( $id ) {
        $id = Crypt::decrypt($id);
        $unit = Unit::findOrFail($id);
        $subjects = ['0'=> 'Select Subject'] + Subject::whereStatus(1)->orderBy('subject_name', 'DESC')->lists('subject_name', 'id')->toArray();
        return view('units.edit', compact('unit', 'subjects'));
    }

    public function update( $id, Request $request) { 
        $id = Crypt::decrypt($id); 
        $rules = Unit::$rules;

        $validator = Validator::make($data = $request->all(), $rules);
        if ($validator->fails()) return Redirect::back()->withErrors($validator)->withInput();

        $unit = Unit::findOrFail($id);

        $message = '';

        $unit->fill($data);
        if($unit->save()) {
            $message .= 'unit edited successfully !';
        }else{
            $message .= 'Unable to edit  unit !';
        }

        return Redirect::route('unit.index')->with('message', $message);
    }

    public function disable($id ) {
        $id = Crypt::decrypt($id); 
        $unit = Unit::findOrFail($id);
        $message = '';
        //change the status of unit to 0
        $unit->status = 0;
        if($unit->save()) {
            $message .= 'unit removed successfully !';
        }else{
            $message .= 'Unable to remove  unit !';
        }

        return Redirect::route('unit.index')->with('message', $message);
    }

    public function assign_units() {
        $branches = ['0'=> 'Select Branch'] + Branch::whereStatus(1)->orderBy('branch_name', 'DESC')->lists('branch_name', 'id')->toArray();
        $classes = ['0'=> 'Select Class'] + DigitalClass::whereStatus(1)->orderBy('class_name', 'DESC')->lists('class_name', 'id')->toArray();
        $subjects = ['0'=> 'Select Subject'] + Subject::whereStatus(1)->orderBy('subject_name', 'DESC')->lists('subject_name', 'id')->toArray();
        $units = ['0'=> 'Select Unit'] + Unit::whereStatus(1)->orderBy('unit_name', 'DESC')->lists('unit_name', 'id')->toArray();

        return view('units.assign_units', compact('branches', 'classes', 'subjects', 'units'));
    }

    public function post_assign_units(Request $request) {
        $validator = Validator::make($data = $request->all(), BranchClassSubjectUnit::$rules);
        if ($validator->fails()) return Redirect::back()->withErrors($validator)->withInput();

        $message = '';

        if(BranchClassSubjectUnit::check_if_assigned($request->branch_id, $request->class_id, $request->subject_id, $request->unit_id)) {
        	$message .= 'Combination already exists !';
        	return Redirect::route('unit.assign')->with('message', $message);
        }
    	
    	if(BranchClassSubjectUnit::create($data)) {
            $message .= 'Unit assigned successfully !';
        }else{
            $message .= 'Unable to assign Unit !';
        }

        return Redirect::route('unit.assigned')->with('message', $message);
    }

    public function assigned_subjects(Request $request) {
    	$where['status'] = 1;
        
        if($request->branch_id) {
            $where['branch_id'] = $request->branch_id;
        }
        if($request->class_id) {
            $where['class_id'] = $request->class_id;
        }
        if($request->subject_id) {
            $where['subject_id'] = $request->subject_id;
        }
        if($request->unit_id) {
            $where['unit_id'] = $request->unit_id;
        }

        $branches 	= ['0'=> 'Select Branch'] + Branch::whereStatus(1)->orderBy('branch_name', 'DESC')->lists('branch_name', 'id')->toArray();
        $classes 	= ['0'=> 'Select Class'] + DigitalClass::whereStatus(1)->orderBy('class_name', 'DESC')->lists('class_name', 'id')->toArray();
        $subjects 	= ['0'=> 'Select Subject'] + Subject::whereStatus(1)->orderBy('subject_name', 'DESC')->lists('subject_name', 'id')->toArray();
        $units 		= ['0'=> 'Select Unit'] + Unit::whereStatus(1)->orderBy('unit_name', 'DESC')->lists('unit_name', 'id')->toArray();

    	$results = BranchClassSubjectUnit::where($where)->with(['branch', 'subject', 'class', 'unit'])->paginate(30);
    	return view('units.assigned_subjects', compact('results', 'branches', 'classes', 'subjects', 'units'));
    }


    public function edit_assigned_unit( $id = null) {
        $id = Crypt::decrypt($id);
        $assigned_unit = BranchClassSubjectUnit::findOrFail($id);

        $branches = ['0'=> 'Select Branch'] + Branch::whereStatus(1)->orderBy('branch_name', 'DESC')->lists('branch_name', 'id')->toArray();
        $classes = ['0'=> 'Select Class'] + DigitalClass::whereStatus(1)->orderBy('class_name', 'DESC')->lists('class_name', 'id')->toArray();
        $subjects = ['0'=> 'Select Subject'] + Subject::whereStatus(1)->orderBy('subject_name', 'DESC')->lists('subject_name', 'id')->toArray();
        $units = ['0'=> 'Select Unit'] + Unit::whereStatus(1)->orderBy('unit_name', 'DESC')->lists('unit_name', 'id')->toArray();

        return view('units.edit_assign_units', compact('branches', 'classes', 'subjects', 'units','assigned_unit'));
    }

    public function update_assigned_unit( $id = null, Request $request) { 
        $id = Crypt::decrypt($id); 

        $validator = Validator::make($data = $request->all(), BranchClassSubjectUnit::$rules);
        if ($validator->fails()) return Redirect::back()->withErrors($validator)->withInput();

        $message = '';

        if(BranchClassSubjectUnit::check_if_assigned($request->branch_id, $request->class_id, $request->subject_id, $request->unit_id)) {
            $message .= 'Combination already exists !';
            return Redirect::route('unit.assign')->with('message', $message);
        }
        $branch_class_unit = BranchClassSubjectUnit::findOrFail($id);

        $message = '';

        $branch_class_unit->fill($data);

        if($branch_class_unit->save()) {
            $message .= 'Updated successfully !';
        }else{
            $message .= 'Unable to update !';
        }

        return Redirect::route('unit.assigned')->with('message', $message);
    }

    public function remove_assigned_unit( $id = null) { 
        $id = Crypt::decrypt($id); 
        $message = '';
        $branch_class_unit = BranchClassSubjectUnit::findOrFail($id);

        $message = '';

        $branch_class_unit->status = 0;

        if($branch_class_unit->save()) {
            $message .= 'Removed successfully !';
        }else{
            $message .= 'Unable to remove !';
        }

        return Redirect::route('unit.assigned')->with('message', $message);
    }

    
}
