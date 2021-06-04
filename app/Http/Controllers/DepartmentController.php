<?php

namespace App\Http\Controllers;

use App\Http\Requests\DepartmentRequest;
use App\Models\Department;

class DepartmentController extends Controller
{
    public function index(){
        $departments = Department::get();
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
        return redirect()->route('department.index')->with('success', 'Отдел добавлен');
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
    public function show(){
        dd(1234);
        return view('department.show',compact('department'));
    }

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
        $department->delete();

        return redirect()->route('department.index')
            ->with('success','Отдел удален успешно');
    }
}
