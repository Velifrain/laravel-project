<?php

namespace App\Http\Controllers;

use App\Http\Requests\DepartmentRequest;
use App\Models\Department;
use App\Models\Employee;
use Illuminate\Support\Facades\DB;

class DepartmentController extends Controller
{
    public function index(){
//
//        SELECT departments.id,departments.name_department, COUNT(e.id), MAX(e.salary) FROM departments
//        LEFT JOIN department_employee de on departments.id = de.department_id
//        LEFT JOIN employees e on de.employee_id = e.id
//        GROUP BY departments.id;

        $departments = DB::table('departments')
             ->select('departments.id', 'departments.name_department', DB::raw('count(employees.id) as count_em'), DB::raw('max(employees.salary) as max_s'))
             ->leftJoin('department_employee', 'departments.id', '=', 'department_employee.department_id')
             ->leftJoin('employees', 'employees.id', '=', 'department_employee.employee_id')
             ->groupBy('departments.id')
             ->get();
        return view('department.index', compact('departments'));
    }

    /** Показать форму создания */
    public function create(){
        return view('department.create');
    }

    /**
     * @param DepartmentRequest $request
     * @return \Illuminate\Http\RedirectResponse
     * Store a newly created resource in storage.
     */
    public function store(DepartmentRequest $request): \Illuminate\Http\RedirectResponse
    {
        Department::create($request->only(['name_department']));
        return redirect()->route('department.index')->with('message', 'Отдел добавлен')
            ->with('success', true);
    }

    /**
     * @param Department $department
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * Show the form for editing the specified resource.
     */
    public function edit(Department $department){
        return view('department.edit', compact('department'));
    }

    /** Display the specified resource. */
    public function show(){}

    /**
     * Update the specified resource in storage.
     */
    public function update(DepartmentRequest $request, Department $department): \Illuminate\Http\RedirectResponse
    {
        $department->update($request->only(['name_department']));
        return redirect()->route('department.index')
            ->with('success','Отдел редактирован успешно');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Department $department): \Illuminate\Http\RedirectResponse
    {
        $message = 'Отдел удален успешно';
        $success = true;
        try{
            $department->delete();
        } catch (\Exception $e){
            $message = 'Невозможно удалить запись';
            $success = false;
        }

        return redirect()->route('department.index')
            ->with('message',$message)
            ->with('success',$success);
    }
}
