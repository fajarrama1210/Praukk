<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('student_classes')->insert([
            [
                'name' => '12',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
