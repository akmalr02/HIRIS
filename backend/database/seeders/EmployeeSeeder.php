<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeSeeder extends Seeder
{
    public function run(): void
    {
        $employees = [];

        for ($i = 1; $i <= 50; $i++) {

            $position = match (true) {
                $i === 1 => 'HR Manager',
                $i >= 2 && $i <= 5 => 'Manager',
                default => 'Staff',
            };

            $departmentId = match (true) {
                $i === 1 => 1, // HR
                $i >= 2 && $i <= 5 => 2, // Management
                default => rand(1, 3),
            };

            $employees[] = [
                'user_id' => $i,
                'employee_code' => 'EMP-' . str_pad($i, 3, '0', STR_PAD_LEFT),
                'position' => $position,
                'birth_date' => fake()->dateTimeBetween('-45 years', '-20 years')->format('Y-m-d'),
                'address' => fake()->address(),
                'department_id' => $departmentId,
                'join_date' => fake()->dateTimeBetween('-5 years', 'now')->format('Y-m-d'),
                'employment_status' => collect([
                    'permanent',
                    'contract',
                    'intern'
                ])->random(),
                'contact' => fake()->phoneNumber(),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('employees')->insert($employees);
    }
}
