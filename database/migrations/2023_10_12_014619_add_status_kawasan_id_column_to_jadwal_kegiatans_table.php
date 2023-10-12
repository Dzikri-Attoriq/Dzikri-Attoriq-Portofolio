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
            $table->unsignedBigInteger('status_kawasan_id')->after('tanggal')->required();
            $table->foreign('status_kawasan_id')->references('id')->on('status_kawasans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('jadwal_kegiatans', function (Blueprint $table) {
            $table->dropForeign(['status_kawasan_id']);
            $table->dropColumn(['status_kawasan_id']);
        });
    }
};
