<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Author::create([
            'name' => 'Pramoedya Ananta Toer',
            'photo' => 'pramoedya.jpg',
            'bio' => 'Sastrawan legendaris Indonesia, dikenal lewat Tetralogi Buru.'
        ]);
        
        Author::create([
            'name' => 'Andrea Hirata',
            'photo' => 'andrea.jpg',
            'bio' => 'Penulis novel "Laskar Pelangi" yang sangat populer.'
        ]);
                
        Author::create([
            'name' => 'Dewi Lestari',
            'photo' => 'dee.jpg',
            'bio' => 'Penulis novel fiksi spiritual dan populer seperti "Supernova".'
        ]);
                
        Author::create([
            'name' => 'Tere Liye',
            'photo' => 'tere.jpg',
            'bio' => 'Penulis produktif dengan banyak novel populer di Indonesia.'
        ]);
                
        Author::create([
            'name' => 'Habiburrahman El Shirazy',
            'photo' => 'habib.jpg',
            'bio' => 'Dikenal lewat novel "Ayat-Ayat Cinta".'
        ]);
                
        Author::create([
            'name' => 'Leila S. Chudori',
            'photo' => 'leila.jpg',
            'bio' => 'Penulis dan jurnalis senior, dikenal dengan "Pulang".'
        ]);
    }
}
