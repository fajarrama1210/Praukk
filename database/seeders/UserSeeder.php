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
                'nisn' => '121200',
                'password' => Hash::make('asdasd'),
            ]
        );
        $regularUser->syncRoles([$userRole]);

        $regularUser = User::firstOrCreate(
            ['email' => 'ferren@gmail.com'],
            [
                'name' => 'Ferren Diovalda',
                'nisn' => '121201',
                'password' => Hash::make('asdasd'),
            ]
        );
        $regularUser->syncRoles([$userRole]);

        $regularUser = User::firstOrCreate(
            ['email' => 'guido@gmail.com'],
            [
                'name' => 'Guido Winata Putra',
                'nisn' => '121202',
                'password' => Hash::make('asdasd'),
            ]
        );
        $regularUser->syncRoles([$userRole]);

        $regularUser = User::firstOrCreate(
            ['email' => 'anggun@gmail.com'],
            [
                'name' => 'Anggun Mutiara Silvia Itaf Vandana',
                'nisn' => '121203',
                'password' => Hash::make('asdasd'),
            ]
        );
        $regularUser->syncRoles([$userRole]);

        $regularUser = User::firstOrCreate(
            ['email' => 'jean@gmail.com'],
            [
                'name' => 'Jean Samuel Putra',
                'nisn' => '121204',
                'password' => Hash::make('asdasd'),
            ]
        );
        $regularUser->syncRoles([$userRole]);
    }
}
