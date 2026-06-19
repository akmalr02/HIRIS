<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * Urutan seeder sesuai dependency:
     * 1. UserSeeder           - Buat users (admin, manager, employees)
     * 2. EmployeeSeeder       - Buat profil employee (depends on users)
     * 3. AttendanceSeeder     - Buat data absensi (depends on employees)
     * 4. LeaveRequestSeeder   - Buat pengajuan cuti (depends on employees & users)
     * 5. PerformanceReviewSeeder - Buat penilaian kinerja (depends on employees & users)
     * 6. SalarySlipSeeder     - Buat slip gaji (depends on employees & users)
     * 7. NotificationSeeder   - Buat notifikasi (depends on users)
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
            AttendanceSeeder::class,
            LeaveRequestSeeder::class,
            PerformanceReviewSeeder::class,
            SalarySlipSeeder::class,
            NotificationSeeder::class,
        ]);

        $this->command->newLine();
        $this->command->info('🎉 Database seeding completed successfully!');
        $this->command->newLine();
        $this->command->line('📊 Summary:');
        $this->command->line('   - 50 Users (1 Admin HR, 4 Managers, 45 Employees)');
        $this->command->line('   - 50 Employee Profiles (Varied hiring dates across 12 months)');
        $this->command->line('   - 4200+ Attendance Records (Sep 2025 - 9 Jan 2026 with realistic patterns)');
        $this->command->line('   - 550+ Leave Requests (10-15 per employee, Sep 2025 - 9 Jan 2026)');
        $this->command->line('   - 300 Performance Reviews (6 months: Jul-Dec 2025)');
        $this->command->line('   - 400 Salary Slips (8 months: Jun 2025 - Jan 2026)');
        $this->command->line('   - 750-1125 Notifications (15-25 per employee, Sep 2025 - 9 Jan 2026)');
        $this->command->newLine();
        $this->command->info('🔐 Demo Accounts:');
        $this->command->table(
            ['Role', 'Email', 'Password'],
            [
                ['Admin HR', 'admin@hris.com', 'password123'],
                ['Manager (IT)', 'manager@hris.com', 'password123'],
                ['Manager (Marketing)', 'yossy.manager@hris.com', 'password123'],
                ['Manager (Finance)', 'dina.manager@hris.com', 'password123'],
                ['Manager (Operations)', 'ahmad.manager@hris.com', 'password123'],
                ['Employee (Developer)', 'employee1@hris.com', 'password123'],
                ['Employee (Designer)', 'employee2@hris.com', 'password123'],
                ['Employee (QA)', 'employee3@hris.com', 'password123'],
                ['Employee (Marketing Exec)', 'employee4@hris.com', 'password123'],
                ['Employee (Finance)', 'employee5@hris.com', 'password123'],
                ['...and 40 more employees', 'employee6-45@hris.com', 'password123'],
            ]
        );
    }
}

