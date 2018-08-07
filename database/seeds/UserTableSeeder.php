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
     
      factory(App\User::class, 10)->create();

    }
       

   
}
