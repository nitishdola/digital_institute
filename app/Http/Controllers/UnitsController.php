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
}
