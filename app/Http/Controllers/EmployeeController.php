<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Models\Department;
use App\Models\Employee;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index(){
        $employees = Employee::with('departments')->get();
        $departments = Department::all();
        return view('employee.index', compact('employees', 'departments'));
    }

    public function create(Employee $employee){
        $departments = DB::table('departments')->get();
        return view('employee.create', compact('departments', 'employee'));
    }

    /**
     * @param EmployeeRequest $request
     * @return RedirectResponse
     */
    public function store(EmployeeRequest $request): RedirectResponse
    {
        $emp = Employee::create($request->only(['name','first_name', 'last_name', 'sex', 'salary']));
        // Присоединяем id отделов к таблице сотрудников
        $emp->departments()->attach($request->department_id);
        return redirect()->route('employee.index')->with('success', 'Сотрудник успешно добавлен');
    }

    /**
     * @param Employee $employee
     * @return Application|Factory|View
     */
    public function edit(Employee $employee){
        $departments = Department::all();
        return view('employee.edit', compact('employee', 'departments'));
    }

    /**
     * @param EmployeeRequest $request
     * @param Employee $employee
     * @return RedirectResponse
     */
    public function update(EmployeeRequest $request, Employee $employee){
        //dd($request);
        // department_id (ид) - отдел
        //
        $employee->update($request->only(['name', 'first_name', 'last_name', 'sex', 'salary']));
        $employee->departments()->sync($request->input(['name_department']));

        return redirect()->route( 'employee.index')->with('success', 'Редактирование добавлено');
    }

    public function show(){}

    /**
     * @param Employee $employee
     * @return RedirectResponse
     */
    public function destroy(Employee $employee): RedirectResponse
    {
        $employee->delete();
        return redirect()->route('employee.index');
    }
}
