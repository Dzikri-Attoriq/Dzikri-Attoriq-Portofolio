<?php

namespace Database\Seeders;
use App\Models\Admin;
use App\Models\Jenis_pohon;
use App\Models\Pengelola;
use App\Models\Status_kawasan;
use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Kawasan;
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

        // seeder Jenis Pohon
        Jenis_pohon::create([
            'nama' => 'Anggrek',
            'kode_pohon' => 'A1-B-RTHP-C1-00001',
            'deskripsi' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Omnis sunt exercitationem quo, harum nulla sapiente itaque cupiditate minus fugiat nihil quidem asperiores iste nesciunt perspiciatis sequi optio eveniet. Reiciendis, necessitatibus nam nisi labore sed dolorem, non consectetur, ullam laborum ipsa sint laudantium iste beatae molestias porro. Aspernatur harum ea ducimus nobis atque incidunt dolores tenetur, asperiores voluptates accusantium voluptatibus hic illo omnis quos totam quam. Unde, ea pariatur. Debitis saepe doloribus laboriosam a dolore iste, quod impedit tenetur, consectetur ipsam voluptatem quae nulla labore esse cumque sapiente magnam autem, hic eius laborum dolor mollitia? Quidem est voluptatum vitae magni tenetur!',
            'manfaat' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptatem possimus sunt quis aliquam provident velit officiis repudiandae accusamus fuga eligendi?',
            'status' => 'Indoor',
            'kelompok_tanaman_id' => '2',
            'image' => 'default/anggrek.jpeg',
        ]);
        Jenis_pohon::create([
            'nama' => 'Beringin',
            'kode_pohon' => 'A1-B-RTHP-C1-00002',
            'deskripsi' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Omnis sunt exercitationem quo, harum nulla sapiente itaque cupiditate minus fugiat nihil quidem asperiores iste nesciunt perspiciatis sequi optio eveniet. Reiciendis, necessitatibus nam nisi labore sed dolorem, non consectetur, ullam laborum ipsa sint laudantium iste beatae molestias porro. Aspernatur harum ea ducimus nobis atque incidunt dolores tenetur, asperiores voluptates accusantium voluptatibus hic illo omnis quos totam quam. Unde, ea pariatur. Debitis saepe doloribus laboriosam a dolore iste, quod impedit tenetur, consectetur ipsam voluptatem quae nulla labore esse cumque sapiente magnam autem, hic eius laborum dolor mollitia? Quidem est voluptatum vitae magni tenetur!',
            'manfaat' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptatem possimus sunt quis aliquam provident velit officiis repudiandae accusamus fuga eligendi?',
            'status' => 'Outdoor',
            'kelompok_tanaman_id' => '1',
            'image' => 'default/beringin.jpg',
        ]);
        Jenis_pohon::create([
            'nama' => 'Cemara',
            'kode_pohon' => 'A1-B-RTHP-C1-00003',
            'deskripsi' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Omnis sunt exercitationem quo, harum nulla sapiente itaque cupiditate minus fugiat nihil quidem asperiores iste nesciunt perspiciatis sequi optio eveniet. Reiciendis, necessitatibus nam nisi labore sed dolorem, non consectetur, ullam laborum ipsa sint laudantium iste beatae molestias porro. Aspernatur harum ea ducimus nobis atque incidunt dolores tenetur, asperiores voluptates accusantium voluptatibus hic illo omnis quos totam quam. Unde, ea pariatur. Debitis saepe doloribus laboriosam a dolore iste, quod impedit tenetur, consectetur ipsam voluptatem quae nulla labore esse cumque sapiente magnam autem, hic eius laborum dolor mollitia? Quidem est voluptatum vitae magni tenetur!',
            'manfaat' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptatem possimus sunt quis aliquam provident velit officiis repudiandae accusamus fuga eligendi?',
            'status' => 'Outdoor',
            'kelompok_tanaman_id' => '1',
            'image' => 'default/cemara.jpeg',
        ]);
        Jenis_pohon::create([
            'nama' => 'Ketapang',
            'kode_pohon' => 'A1-B-RTHP-C1-00004',
            'deskripsi' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Omnis sunt exercitationem quo, harum nulla sapiente itaque cupiditate minus fugiat nihil quidem asperiores iste nesciunt perspiciatis sequi optio eveniet. Reiciendis, necessitatibus nam nisi labore sed dolorem, non consectetur, ullam laborum ipsa sint laudantium iste beatae molestias porro. Aspernatur harum ea ducimus nobis atque incidunt dolores tenetur, asperiores voluptates accusantium voluptatibus hic illo omnis quos totam quam. Unde, ea pariatur. Debitis saepe doloribus laboriosam a dolore iste, quod impedit tenetur, consectetur ipsam voluptatem quae nulla labore esse cumque sapiente magnam autem, hic eius laborum dolor mollitia? Quidem est voluptatum vitae magni tenetur!',
            'manfaat' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptatem possimus sunt quis aliquam provident velit officiis repudiandae accusamus fuga eligendi?',
            'status' => 'Outdoor',
            'kelompok_tanaman_id' => '1',
            'image' => 'default/ketapang.jpeg',
        ]);

        // Seeder Kawasan
        Kawasan::create([
            'nama' => 'Antasari',
        ]);
        Kawasan::create([
            'nama' => 'Banggeris',
        ]);
        Kawasan::create([
            'nama' => 'KS Tubun',
        ]);
        Kawasan::create([
            'nama' => 'Siradj Salman',
        ]);

        // Seeder Status Kawasan
        Status_kawasan::create([
            'nama' => 'Ruang Terbuka Hijau Publik',
        ]);
        Status_kawasan::create([
            'nama' => 'Non-RTH',
        ]);

        // Seeder Pengelola
        Pengelola::create([
            'nama' => 'Dinas Kehutanan',
        ]);
        Pengelola::create([
            'nama' => 'Dinas Sosial',
        ]);

        // Seeder User
        User::create([
            'nama' => 'Sasuke',
            'email' => 'user@gmail.com',
            'password' => Hash::make('user'),
            'alamat' => 'Siradj Salman',
            'no' => '089605029040',
            'instagram' => 'john_doe',
            'image' => 'default/foto.jpg',
        ]);

        // Admin Seeder
        Admin::create([
            'nama' => 'Naruto',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'alamat' => 'Siradj Salman',
            'no' => '089605029040',
            'instagram' => 'john_doe',
            'image' => 'default/foto.jpg',
        ]);
    }
}
