<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Genre::create([
            'name' => 'Fiksi Sejarah', 
            'description' => 'Genre yang menggabungkan sejarah dan fiksi.'
        ]);
        Genre::create([
            'name' => 'Fiksi Remaja', 
            'description' => 'Cerita yang berkaitan dengan kehidupan remaja.'
        ]);
        Genre::create([
            'name' => 'Spiritual', 
            'description' => 'Novel dengan tema religius dan spiritual.'
        ]);
        Genre::create([
            'name' => 'Fiksi Ilmiah', 
            'description' => 'Genre yang mengangkat tema ilmu pengetahuan dan teknologi.'
        ]);
    }
}
