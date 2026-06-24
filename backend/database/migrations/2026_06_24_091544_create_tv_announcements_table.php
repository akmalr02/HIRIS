<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tv_announcements', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->text('content')->nullable();                 // Isi teks pengumuman
            $table->string('image')->nullable();                 // Gambar pendukung (opsional)

            $table->enum('type', [
                'announcement',  // Pengumuman umum dari HRD
                'event',         // Event / acara perusahaan
                'holiday',       // Info hari libur (auto-generate dari national_holidays)
            ])->default('announcement');

            $table->date('start_date');                          // Mulai ditayangkan
            $table->date('end_date');                            // Selesai ditayangkan
            $table->unsignedInteger('priority')->default(0);     // Semakin besar = tampil lebih dulu
            $table->boolean('is_active')->default(true);

            // User HRD yang membuat — null jika di-generate otomatis oleh sistem (Scheduler)
            $table->foreignId('created_by')
                  ->nullable()
                  ->constrained('users')
                  ->nullOnDelete();

            $table->timestamps();

            // Index untuk query TV dashboard (ambil yang aktif dan dalam rentang tanggal)
            $table->index(['is_active', 'start_date', 'end_date']);
            $table->index(['priority']);
            $table->index(['type']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tv_announcements');
    }
};
