<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     *
     */
    public function run(): void
    {
        $this->command->info('🚀 Starting database seeding...');
        $this->command->newLine();

        // Jalankan seeder sesuai urutan dependency
        $this->call([
            UserSeeder::class,
            DepartmentSeeder::class,
            EmployeeSeeder::class,
            // AttendanceSeeder::class,
            // LeaveRequestSeeder::class,
            // PerformanceReviewSeeder::class,
            // SalarySlipSeeder::class,
            // NotificationSeeder::class,
        ]);
    }
}

