<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    private $genres = [
        [
            'name' => 'Sejarah',
            'description' => 'Genre yang mengangkat tema sejarah dan kehidupan masa lalu, baik nyata maupun fiksi.',
        ],
        [
            'name' => 'Inspiratif',
            'description' => 'Genre yang berisi kisah-kisah yang membangkitkan semangat, harapan, dan motivasi.',
        ],
        [
            'name' => 'Religi',
            'description' => 'Genre yang membahas tema-tema spiritualitas, agama, dan moral.',
        ],
        [
            'name' => 'Pendidikan',
            'description' => 'Genre yang menggambarkan pengalaman belajar, kehidupan pesantren, dan perjuangan pendidikan.',
        ],
        [
            'name' => 'Fiksi Magis',
            'description' => 'Genre yang menggabungkan realisme dengan unsur-unsur magis dan mistis.',
        ],
    ];

    public function getGenres()
    {
        return $this->genres;
    }
}
