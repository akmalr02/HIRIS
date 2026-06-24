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
        Schema::create('employee_events', function (Blueprint $table) {
            $table->id();

            // Karyawan yang memiliki event
            $table->foreignId('employee_id')
                  ->constrained('employees')
                  ->cascadeOnDelete();

            $table->enum('event_type', [
                'child_birth',  // Kelahiran anak
                'marriage',     // Pernikahan
                'other',        // Event lain (promosi, pensiun, dll)
            ]);

            $table->string('title');                             // Judul event, cth: "Kelahiran Putra Pertama"
            $table->text('description')->nullable();             // Pesan / ucapan selamat

            $table->date('event_date');                          // Tanggal kejadian event

            // Kontrol tampilan di TV Dashboard
            $table->boolean('display_on_tv')->default(true);
            $table->date('display_until')->nullable();           // null = tampil terus, isi = tampil sampai tanggal ini

            $table->timestamps();

            $table->index(['event_date']);
            $table->index(['display_on_tv', 'display_until']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_events');
    }
};
