<?php

use Faker\Generator as Faker;

$factory->define(GetShitDone\User::class, function (Faker $faker) {
    return [
        'username' => $faker->unique()->userName,
        'password' => 'secret',
        'remember_token' => str_random(10),
    ];
});
