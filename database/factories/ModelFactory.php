<?php

use Faker\Generator;
//use Webpatser\Uuid\Uuid;
//use App\Models\Auth\User;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(BetReceipt::class, function (Generator $faker) {
    //static $password;

    return [
       // 'uuid' 			    => Uuid::generate(4)->string,
        'customer_name'       => $faker->name,
       'phone_number'         => str_random(10),
       'bet_type'             => str_random(10),
       'bet_amount'          => str_random(10),
         // secret
        'barcode'   => $faker->isbn13,
     
    ];
});

