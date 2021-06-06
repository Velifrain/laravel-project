<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        $departments = Department::get();
        $employees = Employee::with('departments')->get();

        return view('index.index', compact('departments', 'employees'));
    }
}
