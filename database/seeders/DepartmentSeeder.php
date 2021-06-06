<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Employee;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(Department::class, 3)->create();

        foreach (Department::all() as $department){
            $employees = Employee::inRandomOrder()->take(rand(1,5))->pluck('id');
            $department->employees()->attach($employees);
        }
    }
}
