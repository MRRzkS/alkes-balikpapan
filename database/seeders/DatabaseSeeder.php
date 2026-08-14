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
        // Client admin user for the dashboard.
        User::updateOrCreate(
            ['email' => 'admin@alkesbalikpapan.com'],
            [
                'name' => 'Admin Alkes Balikpapan',
                'password' => Hash::make('alkesbalikpapan2026'),
                'is_admin' => true,
                'email_verified_at' => now(),
            ]
        );
    }
}
