<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentMajorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Menambahkan data contoh major
        DB::table('student_majors')->insert([
            ['name' => 'REKAYASA PERANGKAT LUNAK'],
        ]);
    }
}
