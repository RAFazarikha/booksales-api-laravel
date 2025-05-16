<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Book::create([
            'title' => 'Bumi Manusia',
            'description' => 'Bagian pertama dari Tetralogi Buru.',
            'price' => 85000.00,
            'stock' => 12,
            'cover_photo' => 'bumi_manusia.jpg',
            'genre_id' => 1, // Fiksi Sejarah
            'author_id' => 1 // Pramoedya Ananta Toer
        ]);

        Book::create([
            'title' => 'Laskar Pelangi',
            'description' => 'Kisah inspiratif anak-anak Belitung.',
            'price' => 75000.00,
            'stock' => 20,
            'cover_photo' => 'laskar_pelangi.jpg',
            'genre_id' => 2, // Fiksi Remaja
            'author_id' => 2 // Andrea Hirata
        ]);
                

        Book::create([
            'title' => 'Supernova: Ksatria, Puteri, dan Bintang Jatuh',
            'description' => 'Novel fiksi ilmiah dan filosofis.',
            'price' => 95000.00,
            'stock' => 10,
            'cover_photo' => 'supernova.jpg',
            'genre_id' => 4, // Fiksi Ilmiah
            'author_id' => 3 // Dewi Lestari
        ]);
                

        Book::create([
            'title' => 'Rindu',
            'description' => 'Kisah para jamaah haji dan pencarian makna hidup.',
            'price' => 69000.00,
            'stock' => 8,
            'cover_photo' => 'rindu.jpg',
            'genre_id' => 3, // Spiritual
            'author_id' => 4 // Tere Liye
        ]);
                

        Book::create([
            'title' => 'Ayat-Ayat Cinta',
            'description' => 'Romansa Islami yang menyentuh.',
            'price' => 72000.00,
            'stock' => 15,
            'cover_photo' => 'ayat_ayat_cinta.jpg',
            'genre_id' => 3, // Spiritual
            'author_id' => 5 // Habiburrahman El Shirazy
        ]);
                

        Book::create([
            'title' => 'Pulang',
            'description' => 'Kisah diaspora Indonesia pasca peristiwa 1965.',
            'price' => 80000.00,
            'stock' => 9,
            'cover_photo' => 'pulang.jpg',
            'genre_id' => 1, // Fiksi Sejarah
            'author_id' => 6 // Leila S. Chudori
        ]);

    }
}
