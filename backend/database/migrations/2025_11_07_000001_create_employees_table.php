<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migrations.
     */
    public function up(): void
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();

            // Relasi ke users — 1 user hanya bisa jadi 1 employee
            $table->foreignId('user_id')
                  ->unique()
                  ->constrained('users')
                  ->cascadeOnDelete();

            $table->string('employee_code')->unique();           // Nomor induk karyawan, cth: EMP-2024-001
            $table->string('nik', 20)->unique()->nullable();     // NIK KTP

            $table->string('position');                          // Jabatan / posisi
            $table->enum('gender', ['male', 'female'])->nullable();

            $table->date('birth_date');                          // Dipakai untuk fitur ulang tahun
            $table->string('birth_place')->nullable();

            $table->text('address')->nullable();
            $table->string('photo')->nullable();                 // Path foto: storage/photos/emp-1.jpg
            $table->string('contact', 20)->nullable();          // Nomor HP / telepon

            // Relasi ke departments
            $table->foreignId('department_id')
                  ->constrained('departments')
                  ->restrictOnDelete();                          // Tidak bisa hapus dept jika masih ada karyawan

            $table->date('join_date');                           // Tanggal masuk kerja
            $table->enum('employment_status', [
                'permanent',   // Karyawan tetap
                'contract',    // Karyawan kontrak
                'intern',      // Magang
                'resigned',    // Sudah resign
            ])->default('permanent');

            $table->timestamps();

            // Index untuk query ulang tahun (cari berdasar bulan & hari)
            $table->index(['birth_date']);
            $table->index(['department_id']);
            $table->index(['employment_status']);
        });
    }

    /**
     * Rollback migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
