<?php

namespace Database\Seeders;
use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kelompok_tanaman;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Seeder kelompok tanaman
        Kelompok_tanaman::create([
            'nama' => 'satu',
        ]);
        Kelompok_tanaman::create([
            'nama' => 'dua',
        ]);
        Kelompok_tanaman::create([
            'nama' => 'tiga',
        ]);
        Kelompok_tanaman::create([
            'nama' => 'empat',
        ]);
        Kelompok_tanaman::create([
            'nama' => 'lima',
        ]);
        Kelompok_tanaman::create([
            'nama' => 'enam',
        ]);
        Kelompok_tanaman::create([
            'nama' => 'tujuh',
        ]);
        Kelompok_tanaman::create([
            'nama' => 'delapan',
        ]);
        Kelompok_tanaman::create([
            'nama' => 'sembilan',
        ]);
        Kelompok_tanaman::create([
            'nama' => 'sepuluh',
        ]);

        User::create([
            'nama' => 'John Doe',
            'email' => 'johndoe@gmail.com',
            'password' => Hash::make('12345'),
            'alamat' => 'Siradj Salman',
            'no' => '089605029040',
            'instagram' => 'john_doe',
            'image' => 'default/foto.jpg',
        ]);
    }
}
