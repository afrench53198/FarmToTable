<?php

use Illuminate\Database\Seeder;
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
     
      factory(App\User::class, 50)->create()
      ->each(function($user){
        if ($user->hasOrganization) {
          $user->business()->save(factory(App\Business::class)->make());
        }
      })
      ;

    }
       

   
}
