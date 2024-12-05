<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('book_categories')->insert([
            [
                'name' => 'Novel',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Komik',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Sejarah',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Sains',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Fiksi Ilmiah',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
