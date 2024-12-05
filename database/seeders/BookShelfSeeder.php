<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookShelfSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('book_shelf')->insert([
            [
                'name' => 'Rak A',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Rak B',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Rak C',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Rak D',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Rak E',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
