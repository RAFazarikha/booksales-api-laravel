<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    private $books = [
        [
            'title' => 'Bumi Manusia',
            'description' => 'Novel pertama dari tetralogi Buru karya Pramoedya Ananta Toer, menggambarkan kehidupan kolonial Belanda di Hindia Timur.',
            'price' => 85000,
            'stock' => 50,
            'cover_photo' => 'https://example.com/bumi_manusia.jpg',
            'genre_id' => 1,
            'author_id' => 1,
        ],
        [
            'title' => 'Laskar Pelangi',
            'description' => 'Kisah inspiratif anak-anak dari Belitung yang penuh semangat mengejar pendidikan. Ditulis oleh Andrea Hirata.',
            'price' => 75000,
            'stock' => 60,
            'cover_photo' => 'https://example.com/laskar_pelangi.jpg',
            'genre_id' => 2,
            'author_id' => 2,
        ],
        [
            'title' => 'Rindu',
            'description' => 'Novel karya Tere Liye yang mengangkat tema spiritual dan sosial dengan latar perjalanan haji zaman dahulu.',
            'price' => 65000,
            'stock' => 40,
            'cover_photo' => 'https://example.com/rindu.jpg',
            'genre_id' => 3,
            'author_id' => 3,
        ],
        [
            'title' => 'Negeri 5 Menara',
            'description' => 'Novel inspiratif tentang kehidupan santri di pondok pesantren, karya Ahmad Fuadi.',
            'price' => 70000,
            'stock' => 30,
            'cover_photo' => 'https://example.com/negeri_5_menara.jpg',
            'genre_id' => 4,
            'author_id' => 4,
        ],
        [
            'title' => 'Cantik Itu Luka',
            'description' => 'Sebuah novel satire dan magis karya Eka Kurniawan, menggambarkan sejarah Indonesia dengan gaya unik.',
            'price' => 80000,
            'stock' => 25,
            'cover_photo' => 'https://example.com/cantik_itu_luka.jpg',
            'genre_id' => 5,
            'author_id' => 5,
        ],
    ];

    public function getBooks()
    {
        return $this->books;
    }
}
