<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Series;
use Faker\Generator as Faker;

$factory->define(Series::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->name,
        'user_id' => 1,
        'category_id' => 1,
        'released_date' => $faker->date(),
        'status_id' => $faker->randomElement([1,2])
    ];
});
