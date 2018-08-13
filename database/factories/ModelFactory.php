<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/



$factory->define(App\User::class, function (Faker $faker) {
    $formatter = new \Geocoder\Formatter\StringFormatter();
    $address = $faker->usaAddress('Phoenix');
    $streetAddress = $formatter->format($address,'%n %S');
    // If test customer is producer or business owner assign them a business
    $randomBool = (bool)random_int(0,1);
    return [
        'name' => $faker->name,
        'hasOrganization'=> $randomBool,
        'email' => $faker->unique()->safeEmail,
        'street'=> $streetAddress,
        'city'=>$address->getLocality(),
        'zip'=>$address->getPostalCode(),
        'latitude'=>$address->getCoordinates()->getLatitude(),
        'longitude'=>$address->getCoordinates()->getLongitude(),
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});


$factory->define(App\Business::class, function (Faker $faker) {

    $formatter = new \Geocoder\Formatter\StringFormatter();
    $address = $faker->usaAddress('Phoenix, AZ');
    $types = ['Farmers Market', 'Restaurant', 'Delivery Service','Farmer'];
    $streetAddress = $formatter->format($address,'%n %S');
    return [
        'name' => $faker->name,
        'description' => $faker->realText(),
        'type'=>$types[rand(0,3)],
        'contact_name' =>$faker->name,
        'phone'=>$faker->phoneNumber(),
        'email' => $faker->unique()->safeEmail,
        'street'=> $streetAddress,
        'city'=>$address->getLocality(),
        'zip'=>$address->getPostalCode(),
        'latitude'=>$address->getCoordinates()->getLatitude(),
        'longitude'=>$address->getCoordinates()->getLongitude(),
    ];
});





/**
 * @param randomBool 
 * @return business_id either the Id of a newly created business or null
 */
function assignHasBusiness($randomBool) {
    return ($randomBool == true ?  factory(App\Business::class)->create()->id : null);
}