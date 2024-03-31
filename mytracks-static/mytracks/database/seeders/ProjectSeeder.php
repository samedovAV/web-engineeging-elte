<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        $users->each(function ($user) {
            \App\Models\Project::factory(10)
                ->for($user)
                ->hasTracks(5)
                ->create();
        });
    }
}
