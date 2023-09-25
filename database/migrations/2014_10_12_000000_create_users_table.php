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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 80)->required();
            $table->string('email', 50)->required()->unique();
            $table->string('password', 100)->required();
            $table->string('alamat', 100)->required();
            $table->string('no', 15)->required();
            $table->string('instagram', 50)->required();
            $table->string('role', 1)->required();
            $table->string('image', 150)->required();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
