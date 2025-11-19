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
        Schema::table('users', function (Blueprint $table) {
            $table->string('nik')->unique()->required()->after('id');
            $table->string('nama')->required()->after('nik');
            $table->string('jenis_kelamin')->required()->after('nama');
            $table->string('alamat')->required()->after('jenis_kelamin');
            $table->integer('umur')->required()->after('alamat');
            $table->string('pendidikan')->required()->after('umur');
            $table->float('bb_awal',8,2)->required()->after('pendidikan');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['nik', 'nama', 'jenis_kelamin', 'alamat', 'umur', 'pendidikan', 'bb_awal']);
        });
    }
};
