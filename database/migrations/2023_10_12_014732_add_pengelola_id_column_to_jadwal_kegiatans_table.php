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
        Schema::table('jadwal_kegiatans', function (Blueprint $table) {
            $table->unsignedBigInteger('pengelola_id')->after('status_kawasan_id')->required();
            $table->foreign('pengelola_id')->references('id')->on('pengelolas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('jadwal_kegiatans', function (Blueprint $table) {
            $table->dropForeign(['pengelola_id']);
            $table->dropColumn(['pengelola_id']);
        });
    }
};
