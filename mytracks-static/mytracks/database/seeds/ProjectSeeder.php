<?php

use App\Filter;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('projects')->delete();
        
        $filters = Filter::all();
        $user = User::firstWhere('email', 'gyozke@gmail.com');

        factory(App\Project::class, 3)->create(['user_id' => $user])->each(function ($project) use ($filters) {
            $project->tracks()->createMany(
                factory(App\Track::class, 5)->make()->toArray()
            )->each(function ($track) use ($filters) {
                for ($i = 0; $i < random_int(1, 4); $i++) {
                    $track->filters()->toggle($filters[random_int(0, 9)]);
                }
            });
        });
    }
}
