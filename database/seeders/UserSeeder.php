<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $myAccount = new User();
        $myAccount->name = 'Mohamed';
        $myAccount->password = Hash::make('1234');
        $myAccount->email = 'mohamedjebali992010@gmail.com';
        $myAccount->save();

        for ($i=0; $i < 50 ; $i++) { 
           $newAccount = new User();
           $newAccount->name = $faker->name();
           $newAccount->password = Hash::make($faker->password());
           $newAccount->email = $faker->email();
           $myAccount->save();
        }
    }
}
