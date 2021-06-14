<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index(){

        $employees = DB::table('employees')
        ->select('employees.id', DB::raw("CONCAT(employees.name,' ',employees.surname) AS name"),
            DB::raw("string_agg(departments.name_department, ', ' ORDER by departments.name_department) as combine_dep"))
            ->leftJoin('department_employee', 'employees.id', '=', 'department_employee.employee_id')
            ->leftjoin('departments', 'department_employee.department_id', '=', 'departments.id')
            ->groupBy('employees.id')
            ->get();

        $departments = DB::table('departments')->get();
        return view('index.index', compact('departments','employees'));
    }
}
