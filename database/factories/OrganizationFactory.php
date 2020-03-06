<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Organization;
use Faker\Generator as Faker;

$factory->define(Organization::class, function (Faker $faker) {
    return [
        'name'        => $faker->company,
        'email'       => $faker->companyEmail,
        'phone'       => $faker->tollFreePhoneNumber,
        'address'     => $faker->streetAddress,
        'city'        => $faker->city,
        'region'      => $faker->state,
        'country'     => 'US',
        'postal_code' => $faker->postcode,
    ];
});
