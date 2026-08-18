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
        // Password is taken from ADMIN_PASSWORD in .env; when unset we do NOT
        // overwrite an existing account's password (avoids leaking a literal in
        // source and preserves credentials already created on a deployed host).
        $attributes = [
            'name' => 'Admin Alkes Balikpapan',
            'is_admin' => true,
            'email_verified_at' => now(),
        ];
        if ($password = env('ADMIN_PASSWORD')) {
            $attributes['password'] = Hash::make($password);
        }
        User::updateOrCreate(
            ['email' => 'admin@alkesbalikpapan.com'],
            $attributes
        );
    }
}
