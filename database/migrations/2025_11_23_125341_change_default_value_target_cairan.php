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
        Schema::table('jadwal_pasien', function (Blueprint $table) {
            $table->integer('target_cairan_ml')->default(0) ->change(); 

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('jadwal_pasien', function (Blueprint $table) {
            //
            $table->integer('target_cairan_ml')->nullable()->change();
        });
    }
};
