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
}
