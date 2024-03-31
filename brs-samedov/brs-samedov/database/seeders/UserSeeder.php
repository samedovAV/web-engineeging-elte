<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Create a reader
        User::factory()->create([
            'name' => 'Reader',
            'email' => 'reader@brs.com',
            'password' => Hash::make('password'),
        ]);

        // Create a librarian
        User::factory()->create([
            'name' => 'Librarian',
            'email' => 'librarian@brs.com',
            'password' => Hash::make('password'),
            'is_librarian' => true,
        ]);

        // Create 10 more readers
        for ($i = 1; $i <= 10; $i++) {
            User::factory()->create([
                'name' => 'Reader ' . $i,
                'email' => 'reader' . $i . '@example.com',
                'password' => Hash::make('password'),
            ]);
        }
    }
}
