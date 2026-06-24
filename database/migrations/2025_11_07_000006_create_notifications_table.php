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
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();

            // Penerima notifikasi
            // null = broadcast ke semua user (untuk notif hari libur, pengumuman global)
            $table->foreignId('user_id')
                  ->nullable()
                  ->constrained('users')
                  ->cascadeOnDelete();

            $table->string('title');
            $table->text('message');

            $table->enum('type', [
                'leave_request',    // Ada pengajuan cuti baru (ke manager/HR)
                'leave_approved',   // Cuti disetujui (ke karyawan)
                'leave_rejected',   // Cuti ditolak (ke karyawan)
                'birthday',         // Notif ulang tahun karyawan
                'work_anniversary', // Notif anniversari kerja
                'marriage',         // Notif pernikahan karyawan
                'child_birth',      // Notif kelahiran anak
                'holiday',          // Notif hari libur / tanggal merah
                'announcement',     // Pengumuman dari HRD
                'system',           // Notif sistem (maintenance, update, dll)
            ]);

            $table->boolean('is_read')->default(false);

            $table->timestamps();

            // Index untuk query notif per user dan filter yang belum dibaca
            $table->index(['user_id', 'is_read']);
            $table->index(['user_id', 'created_at']);
            $table->index(['type']);
        });
    }

    /**
     * Rollback migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
