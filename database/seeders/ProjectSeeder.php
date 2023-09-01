<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Type;
use App\Models\User;
use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker)
{
    $type_ids = Type::all()->pluck('id');
    $userIds = User::all()->pluck('id');

    for ($i = 0; $i < 50; $i++) { 
        $newProject = new Project ();
        $newProject->type_id = $faker->randomElement($type_ids);
        $newProject->user_id = $faker->randomElement($userIds);
        $newProject->title = $faker->word(5,true);
        $newProject->description = $faker->unique()->realText($faker->numberBetween(200, 400));
        $newProject->image = $faker->imageUrl(360, 360, 'projects', true, 'project', true, 'jpg');
        $newProject->slug = Str::of($newProject->title)->slug('-');
        $newProject->save();
        $newProject->slug = Str::of("$newProject->id " . $newProject->title)->slug('-');
        $newProject->save();

        
    }
}

}
