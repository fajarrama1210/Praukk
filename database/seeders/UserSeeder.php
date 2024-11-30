<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Membuat role jika belum ada
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $officerRole = Role::firstOrCreate(['name' => 'officer']);
        $userRole = Role::firstOrCreate(['name' => 'user']);

        // Membuat user admin
        $adminUser = User::create([
            'name' => 'Admin User',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('asdasd'),
        ]);
        $adminUser->assignRole($adminRole);

        // Membuat user officer
        $officerUser = User::create([
            'name' => 'Officer User',
            'email' => 'officer@gmail.com',
            'password' => Hash::make('asdasd'),
        ]);
        $officerUser->assignRole($officerRole);

        // Membuat user regular
        $regularUser = User::create([
            'name' => 'Regular User',
            'nisn' => '112233445',
            'email' => 'user@gmail.com',
            'password' => Hash::make('asdasd'),
        ]);
        $regularUser->assignRole($userRole);
    }
}
