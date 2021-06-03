<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\DepartmentRequest;
use App\Models\Department;

class DepartmentController extends Controller
{
    public function create(DepartmentRequest $request){
//        $validated = $request->validated();

        $depart = new Department();
        $depart->name_department = $request->input('name_department');

        $depart->save();

        return redirect()->route('/department');
    }
}
