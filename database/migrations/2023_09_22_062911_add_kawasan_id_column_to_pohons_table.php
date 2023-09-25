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
        Schema::table('pohons', function (Blueprint $table) {
            $table->unsignedBigInteger('kawasan_id')->after('jenis_pohon_id')->required();
            $table->foreign('kawasan_id')->references('id')->on('kawasans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pohons', function (Blueprint $table) {
            $table->dropForeign(['kawasan_id']);
            $table->dropColumn(['kawasan_id']);
        });
    }
};
