<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\UserPhone;
use Faker\Generator as Faker;

$factory->define(UserPhone::class, function (Faker $faker) {
    return [
        'phone'=>$faker->phoneNumber
    ];
});
