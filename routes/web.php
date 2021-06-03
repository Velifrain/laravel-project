<?php

use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\DepartmentController;

Route::get('/', [IndexController::class, 'index'])->name('home');

Route::get('/employee', function () {
    return view('employee');
})->name('employee');

Route::get('/employee/create', function () {
    return view('include/create_employee');
})->name('create_em');

Route::post('/employee/create/submit', [EmployeeController::class, 'create'])->name('create_em-form');


Route::resource('/department', DepartmentController::class);

//Route::get('/department/create', function () {
//    return view('include/create_department');
//})->name('create_dep');

//Route::post('/department/create/submit', [DepartmentController::class, 'create'])->name('create_dep-form');
