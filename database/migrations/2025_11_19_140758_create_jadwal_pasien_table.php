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
        Schema::create('jadwal_pasien', function (Blueprint $table) {
            $table->id();
            $table->string('nik');
            $table->foreign('nik')->references('nik')->on('users')->onDelete('cascade');

            // Jadwal Makan (default: 07:00, 12:00, 16:00)
            $table->time('waktu_makan_1')->default('07:00:00');
            $table->time('waktu_makan_2')->default('12:00:00');
            $table->time('waktu_makan_3')->default('16:00:00');

            // Target Cairan/Minum
            $table->integer('target_cairan_ml')->default(1000); // Default 1000 ml (500-1500 ml)

            // Frekuensi Alarm Berat Badan (misal: setiap 3 hari sekali, jam 08:00)
            $table->integer('frekuensi_alarm_bb_hari')->default(3);
            $table->time('waktu_alarm_bb')->default('08:00:00');

            $table->timestamps();
            $table->unique('nik');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal_pasien');
    }
};
