<?php

use Faker\Generator as Faker;

$factory->define(GetShitDone\Objective::class, function (Faker $faker) {
    return [
        'body' => $faker->sentence,
        'is_complete' => false,
        'due_at' => $faker->dateTimeBetween('+1 week', '+5 weeks'),
    ];
});

$factory->state(GetShitDone\Objective::class, 'priority-1', [
    'priority' => 1,
]);

$factory->state(GetShitDone\Objective::class, 'priority-2', [
    'priority' => 2,
]);

$factory->state(GetShitDone\Objective::class, 'priority-3', [
    'priority' => 3,
]);

$factory->state(GetShitDone\Objective::class, 'complete', [
    'is_complete' => true,
]);

$factory->state(GetShitDone\Objective::class, 'incomplete', [
    'is_complete' => false,
]);

$factory->state(GetShitDone\Objective::class, 'pastdue', function (Faker\Generator $faker) {
    return [
        'due_at' => $faker->dateTimeBetween('-1 week', '-5 weeks'),
    ];
});