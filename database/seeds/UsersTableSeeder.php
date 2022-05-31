<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Generator as Faker;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
            $newUser = new User();
            $newUser->name = 'simone';
            $newUser->email = 'simo95@yahoo.it';
            $newUser->password = bcrypt('123456789');
            $newUser->save();

        for ($i=0; $i < 20; $i++) {
            $newUser = new User();
            $newUser->name = $faker->userName();
            $newUser->email = $faker->email();
            $newUser->password = Hash::make("passwordNonValida" . $i) ;
            $newUser->save();
        }
    }
}
