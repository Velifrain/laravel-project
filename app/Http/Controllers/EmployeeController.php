<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EmployeeRequest;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function create(EmployeeRequest $request){
//        $validated = $request->validated();
        $employee = new Employee();
        $employee->name = $request->input('name');
        $employee->first_name = $request->input('first_name');
        $employee->last_name = $request->input('last_name');
        $employee->sex = $request->input('sex');
        $employee->salary = $request->input('salary');

        $employee->save();

        return redirect()->route('/employee');
    }
}
