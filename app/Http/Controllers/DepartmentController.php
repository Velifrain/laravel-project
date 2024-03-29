<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\DepartmentRequest;
use App\Models\Department;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

class DepartmentController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $departments = DB::table('departments')
            ->select('departments.id', 'departments.name_department', DB::raw('count(employees.id) as count_em'), DB::raw('max(employees.salary) as max_s'))
            ->leftJoin('department_employee', 'departments.id', '=', 'department_employee.department_id')
            ->leftJoin('employees', 'employees.id', '=', 'department_employee.employee_id')
            ->groupBy('departments.id')
            ->paginate(10);

        return view('department.index', compact('departments'));
    }

    /**
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('department.create');
    }

    /**
     * @param DepartmentRequest $request
     * @return RedirectResponse
     */
    public function store(DepartmentRequest $request): RedirectResponse
    {
        Department::create($request->only(['name_department']));
        return redirect()->route('department.index')
            ->with('message', 'Отдел добавлен')
            ->with('success', true);
    }

    /**
     * @param Department $department
     * @return Application|Factory|View
     */
    public function edit(Department $department)
    {
        return view('department.edit', compact('department'));
    }

    /** Display the specified resource. */
    public function show()
    {
    }

    /**
     * @param DepartmentRequest $request
     * @param Department $department
     * @return RedirectResponse
     */
    public function update(DepartmentRequest $request, Department $department): RedirectResponse
    {
        $department->update($request->only(['name_department']));
        return redirect()->route('department.index')
            ->with('message', 'Отдел редактирован успешно')
            ->with('success', true);
    }

    /**
     * @param Department $department
     * @return RedirectResponse
     */
    public function destroy(Department $department): RedirectResponse
    {
        $message = 'Отдел удален успешно';
        $success = true;
        try {
            $department->delete();
        } catch (\Exception $e) {
            $message = 'Невозможно удалить запись';
            $success = false;
        }

        return redirect()->route('department.index')
            ->with('message', $message)
            ->with('success', $success);
    }
}
