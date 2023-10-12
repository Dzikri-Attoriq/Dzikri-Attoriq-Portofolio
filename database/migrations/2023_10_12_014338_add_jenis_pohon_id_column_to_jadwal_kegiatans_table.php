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
            $table->unsignedBigInteger('jenis_pohon_id')->after('id')->required();
            $table->foreign('jenis_pohon_id')->references('id')->on('jenis_pohons')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('jadwal_kegiatans', function (Blueprint $table) {
            $table->dropForeign(['jenis_pohon_id']);
            $table->dropColumn(['jenis_pohon_id']);
        });
    }
};
