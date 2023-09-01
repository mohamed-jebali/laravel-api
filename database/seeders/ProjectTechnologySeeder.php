<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Technology;
use App\Models\Project;
use Faker\Generator as Faker;

class ProjectTechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $technologyIds = Technology::all()->pluck('id');
        $projects = Project::all();

        foreach ($projects as $project) {
            $project->technologies()->sync([$faker->randomElement($technologyIds), $faker->randomElement($technologyIds)]);
        }
    }
}
