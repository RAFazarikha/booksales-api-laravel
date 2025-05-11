<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    private $authors = [
        [
            'name' => 'Pramoedya Ananta Toer',
            'photo' => 'https://example.com/pramoedya.jpg',
            'bio' => 'Pramoedya adalah salah satu sastrawan terbesar Indonesia, terkenal dengan Tetralogi Buru seperti "Bumi Manusia".',
        ],
        [
            'name' => 'Andrea Hirata',
            'photo' => 'https://example.com/andrea.jpg',
            'bio' => 'Andrea Hirata dikenal lewat novel inspiratif "Laskar Pelangi" yang diadaptasi menjadi film.',
        ],
        [
            'name' => 'Tere Liye',
            'photo' => 'https://example.com/tereliye.jpg',
            'bio' => 'Tere Liye adalah penulis produktif Indonesia dengan karya bertema religi, motivasi, dan fiksi remaja.',
        ],
        [
            'name' => 'Ahmad Fuadi',
            'photo' => 'https://example.com/fuadi.jpg',
            'bio' => 'Ahmad Fuadi menulis trilogi Negeri 5 Menara yang banyak menginspirasi generasi muda.',
        ],
        [
            'name' => 'Eka Kurniawan',
            'photo' => 'https://example.com/eka.jpg',
            'bio' => 'Eka Kurniawan dikenal dengan gaya realisme magisnya, salah satu karya terkenalnya adalah "Cantik Itu Luka".',
        ],
    ];

    public function getAuthors()
    {
        return $this->authors;
    }
}
