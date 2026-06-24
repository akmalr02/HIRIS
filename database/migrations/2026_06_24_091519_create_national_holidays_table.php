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
        Schema::create('national_holidays', function (Blueprint $table) {
            $table->id();

            $table->date('holiday_date')->unique();              // Tanggal libur (unik per tanggal)
            $table->string('name');                              // Nama hari libur

            $table->enum('type', [
                'national',    // Libur nasional pemerintah (HUT RI, dll)
                'religious',   // Libur keagamaan (Lebaran, Natal, dll)
                'company',     // Cuti bersama internal perusahaan
            ]);

            $table->timestamps();

            $table->index(['holiday_date']);
            $table->index(['type']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('national_holidays');
    }
};
