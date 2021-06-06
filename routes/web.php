<?php

use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\DepartmentController;

Route::get('/', [IndexController::class, 'index'])->name('home');

Route::resource('/employee', EmployeeController::class);

Route::resource('/department', DepartmentController::class);
