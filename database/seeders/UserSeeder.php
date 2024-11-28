<?php

    namespace Database\Seeders;

    use App\Models\User;
    use Illuminate\Database\Seeder;
    use Illuminate\Support\Facades\Hash;

    class UserSeeder extends Seeder
    {
        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run()
        {
            // Menambahkan role admin
            User::create([
                'name' => 'Admin User',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('asdasd'),
                'role' => 'admin', // Menetapkan role sebagai admin
                'class_id' => null,  // Tidak perlu class_id
                'major_id' => null,  // Tidak perlu major_id
            ]);

            // Menambahkan role officer
            User::create([
                'name' => 'Officer User',
                'email' => 'officer@gmail.com',
                'password' => Hash::make('asdasd'),
                'role' => 'officer', // Menetapkan role sebagai officer
                'class_id' => null,  // Tidak perlu class_id
                'major_id' => null,  // Tidak perlu major_id
            ]);

            // Menambahkan role user
            User::create([
                'name' => 'Regular User',
                'nisn' => '112233445', // Nisn diperlukan hanya untuk user
                'email' => 'user@gmail.com',
                'password' => Hash::make('asdasd'),
                'role' => 'user', // Menetapkan role sebagai user
                'class_id' => 1, // Pastikan ini ada di database atau sesuaikan
                'major_id' => 1, // Pastikan ini ada di database atau sesuaikan
            ]);
        }
    }
