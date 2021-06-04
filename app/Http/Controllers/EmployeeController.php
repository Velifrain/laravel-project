<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Models\Employee;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    public function index(){
        $employees = Employee::get();
        return view('employee.index', compact('employees'));
    }

    public function create(){
        $departments = DB::select('SELECT * FROM departments');
        return view('employee.create', compact('departments'));
    }

    /**
     * @param EmployeeRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(EmployeeRequest $request){
        dd($request);
        Employee::create($request->only(['name', 'first_name', 'last_name', 'sex', 'salary']));
        return redirect()->route('employee.index')->with('success', 'Сотрудник успешно добавлен');
    }

    public function edit(){
        dd(12345);
    }

    /**
     * @param Employee $employee
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Employee $employee){
        $employee->delete();
        return redirect()->route('employee.index');
    }
}
