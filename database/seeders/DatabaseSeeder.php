<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'role' => 'student',
            'course' => 'MCA',
            'semester' => '3',
            'branch' => 'Computer Science & Informatics',
            'password' => Hash::make('password'),
        ]);

        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'role' => 'admin',
            'password' => Hash::make('abc123'),
        ]);

        User::factory()->create([
            'name' => 'President User',
            'email' => 'president@example.com',
            'role' => 'president',
            'password' => Hash::make('abc123'),
        ]);

        User::factory()->create([
            'name' => 'Secretary User',
            'email' => 'secretary@example.com',
            'role' => 'secretary',
            'password' => Hash::make('abc123'),
        ]);

        User::factory()->create([
            'name' => 'Treasurer User',
            'email' => 'treasurer@example.com',
            'role' => 'treasurer',
            'password' => Hash::make('abc123'),
        ]);

        User::factory()->create([
            'name' => 'Media Manager User',
            'email' => 'media@example.com',
            'role' => 'media_manager',
            'password' => Hash::make('abc123'),
        ]);
    }
}
