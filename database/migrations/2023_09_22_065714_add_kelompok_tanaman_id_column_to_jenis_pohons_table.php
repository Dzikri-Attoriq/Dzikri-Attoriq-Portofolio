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
        Schema::table('jenis_pohons', function (Blueprint $table) {
            $table->unsignedBigInteger('kelompok_tanaman_id')->after('deskripsi')->required();
            $table->foreign('kelompok_tanaman_id')->references('id')->on('kelompok_tanamans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('jenis_pohons', function (Blueprint $table) {
            $table->dropForeign(['kelompok_tanaman_id']);
            $table->dropColumn(['kelompok_tanaman_id']);
        });
    }
};
