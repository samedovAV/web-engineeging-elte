<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Book;
use App\Models\Genre;
use App\Models\Borrow;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Truncate tables to reset data
        User::truncate();
        Book::truncate();
        Genre::truncate();
        Borrow::truncate();

        // Seed the database
        $this->call([
            UserSeeder::class,
            GenreSeeder::class,
            BookSeeder::class,
            BorrowSeeder::class,
        ]);
    }
}
