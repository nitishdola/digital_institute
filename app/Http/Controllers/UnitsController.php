<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB, Validator, Redirect, Auth, Crypt;

use App\Unit, App\Subject;

class UnitsController extends Controller
{
    public function create() {
    	$subjects = Subject::whereStatus(1)->orderBy('subject_name', 'DESC')->lists('subject_name', 'id')->toArray();
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
        $where = [];
        
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
}
