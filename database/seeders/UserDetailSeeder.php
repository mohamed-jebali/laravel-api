<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\UserDetail;
use App\Models\User;

class UserDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {

        $users = User::all();

        foreach ($users as $user) {
            $userDetail = new UserDetail(); 
            $userDetail->user_id = $user->id;
            $userDetail->address = $faker->address();
            $userDetail->sign_in_data = $faker->dateTime();
            $userDetail->phone_number = $faker->phoneNumber();
            $userDetail->save();
        }
    }
}
