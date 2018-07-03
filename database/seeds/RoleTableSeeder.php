<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {



        $farmer_role = new App\Role();
        $farmer_role->fill([
            'name' => 'Producer',
            'description' => 'You are a user who wants to sell food you grow to restaurants, farmers markets, and other customers'
        ]);
        $farmer_role->save();

        $business_role = new App\Role();
        $business_role->fill([
            'name' => 'Business',
            'description' => 'You are a user who wants to buy high-quality food from local farms to sell at your restaurant, grocery store, or other food operation'
        ]);
        $business_role->save();

        $consumer_role = new App\Role();
        $consumer_role->fill([
            'name' => 'Consumer',
            'description' => 'You are a user who wants to browse opportunities to enjoy local food near you, wether that be straight from the farm, restaurant, or grocery store'
        ]);
        $consumer_role->save();
    }
    
}
