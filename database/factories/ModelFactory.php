<?php

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
use App\Model\Customer;

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Customer::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->name,
        'cpf' => $faker->postcode,
        'date_of_birth' => $faker->date()
    ];
});
