<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('books')->insert([
            [
                'category_id' => 1, // Sesuaikan dengan id kategori yang ada
                'shelf_id' => 1, // Sesuaikan dengan id rak yang ada
                'title' => 'Harry Potter and the Sorcerer\'s Stone',
                'writer' => 'J.K. Rowling',
                'publisher' => 'Bloomsbury',
                'publish_year' => 1997,
                'code' => 'HP001',
                'stock' => 10,
            ],
            [
                'category_id' => 2, // Sesuaikan dengan id kategori yang ada
                'shelf_id' => 2, // Sesuaikan dengan id rak yang ada
                'title' => 'The Catcher in the Rye',
                'writer' => 'J.D. Salinger',
                'publisher' => 'Little, Brown and Company',
                'publish_year' => 1951,
                'code' => 'TCR002',
                'stock' => 5,
            ],
            [
                'category_id' => 3, // Sesuaikan dengan id kategori yang ada
                'shelf_id' => 3, // Sesuaikan dengan id rak yang ada
                'title' => 'To Kill a Mockingbird',
                'writer' => 'Harper Lee',
                'publisher' => 'J.B. Lippincott & Co.',
                'publish_year' => 1960,
                'code' => 'TKM003',
                'stock' => 8,
            ],
            [
                'category_id' => 4, // Sesuaikan dengan id kategori yang ada
                'shelf_id' => 4, // Sesuaikan dengan id rak yang ada
                'title' => 'A Brief History of Time',
                'writer' => 'Stephen Hawking',
                'publisher' => 'Bantam Books',
                'publish_year' => 1988,
                'code' => 'ABHT004',
                'stock' => 12,
            ],
            [
                'category_id' => 5, // Sesuaikan dengan id kategori yang ada
                'shelf_id' => 5, // Sesuaikan dengan id rak yang ada
                'title' => 'The Great Gatsby',
                'writer' => 'F. Scott Fitzgerald',
                'publisher' => 'Scribner',
                'publish_year' => 1925,
                'code' => 'TGG005',
                'stock' => 7,
            ],
        ]);
    }
}
