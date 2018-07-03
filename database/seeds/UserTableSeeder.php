<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;
use Faker\Factory;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // generator for the fake user's attributes
        $faker = Faker\Factory::create();

        $business = App\Role::where('name','Business')->first();
        $consumer = App\Role::where('name','Consumer')->first();
        $producer = App\Role::where('name','Producer')->first();

        // Creating one user for each role
        $business_user = new App\User();
        $business_user->fill([
            'name' => $faker->userName,
            'email'=> $faker->email,
            'password' => $faker->password(),
        ]);
        $business_user->save();
        $business_user->roles()->attach($business);

        $consumer_user = new App\User();
        $consumer_user->fill([
            'name' => $faker->userName,
            'email'=> $faker->email,
            'password' => $faker->password(),
        ]);
        $consumer_user->save();
        $consumer_user->roles()->attach($consumer);

        
        $producer_user = new App\User();
        $producer_user->fill([
            'name' => $faker->userName,
            'email'=> $faker->email,
            'password' => $faker->password(),
        ]);
        $producer_user->save();
        $producer_user->roles()->attach($producer);

    }
       
}
