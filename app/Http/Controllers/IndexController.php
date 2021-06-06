<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function index(){

        $employees = DB::table('employees')
        ->select('employees.id', 'employees.name', 'departments.name_department', 'departments.id')
            ->join('department_employee', 'employees.id', '=', 'department_employee.employee_id')
            ->join('departments', 'department_employee.department_id', '=', 'departments.id')
            ->groupBy('employees.id', 'departments.id')
            ->distinct('employees.id')
            ->get();
        $departments = Department::with('employees')->get();
       // $employees = Employee::all();

        return view('index.index', compact( 'employees', 'departments'));
    }
}
