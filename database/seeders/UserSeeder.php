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

        // Membuat user admin dengan hanya role admin
        $adminUser = User::firstOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name' => 'Admin User',
                'password' => Hash::make('asdasd'),
            ]
        );
        // Pastikan user ini hanya memiliki role admin
        $adminUser->syncRoles([$adminRole]);

        // Membuat user officer dengan role officer
        $officerUser = User::firstOrCreate(
            ['email' => 'officer@gmail.com'],
            [
                'name' => 'Officer User',
                'password' => Hash::make('asdasd'),
            ]
        );
        $officerUser->syncRoles([$officerRole]);

        // Membuat user regular dengan role user
        $regularUser = User::firstOrCreate(
            ['email' => 'user@gmail.com'],
            [
                'name' => 'Regular User',
                'nisn' => '112233445',
                'password' => Hash::make('asdasd'),
            ]
        );
        $regularUser->syncRoles([$userRole]);
    }
}
