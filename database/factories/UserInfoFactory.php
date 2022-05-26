<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\UserInfo;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;

$factory->define(UserInfo::class, function (Faker $faker) {
    $faker->addProvider(new \Faker\Provider\it_IT\Address($faker));
    $faker->addProvider(new \Faker\Provider\it_IT\Person($faker));
    $faker->addProvider(new \Faker\Provider\it_IT\PhoneNumber($faker));
    $faker->addProvider(new \Faker\Provider\it_IT\Text($faker));

    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'phone' => $faker->phoneNumber,
        'address' => $faker->address,
        'birthday' => $faker->dateTimeBetween('-60 years', '-18 years')->format('Y-m-d'),
    ];
});
