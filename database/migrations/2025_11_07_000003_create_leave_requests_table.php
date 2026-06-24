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
        Schema::create('leave_requests', function (Blueprint $table) {
            $table->id();

            // Karyawan yang mengajukan cuti
            $table->foreignId('employee_id')
                  ->constrained('employees')
                  ->cascadeOnDelete();

            $table->enum('leave_type', [
                'annual',      // Cuti tahunan
                'sick',        // Cuti sakit
                'maternity',   // Cuti melahirkan
                'paternity',   // Cuti ayah (kelahiran anak)
                'emergency',   // Cuti darurat / mendadak
                'unpaid',      // Cuti tanpa bayaran
                'other',       // Lainnya
            ]);

            $table->date('start_date');
            $table->date('end_date');
            $table->unsignedInteger('total_days');               // Dihitung otomatis di Model/Observer
            $table->text('reason');                              // Alasan pengajuan cuti
            $table->string('attachment')->nullable();            // Upload surat dokter / surat lainnya

            $table->enum('status', [
                'pending',
                'approved',
                'rejected',
            ])->default('pending');

            // Manager / HR yang mereview — nullable karena awalnya belum direview
            $table->foreignId('reviewed_by')
                  ->nullable()
                  ->constrained('users')
                  ->nullOnDelete();

            $table->timestamp('reviewed_at')->nullable();        // Waktu direview
            $table->text('reviewer_note')->nullable();           // Catatan dari reviewer

            $table->timestamps();

            // Index untuk filter by status dan karyawan
            $table->index(['employee_id', 'status']);
            $table->index(['start_date', 'end_date']);
            $table->index(['status']);
        });
    }

    /**
     * Rollback migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leave_requests');
    }
};
