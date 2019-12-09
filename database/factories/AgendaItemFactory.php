<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\AgendaItem;
use Faker\Generator as Faker;

$factory->define(AgendaItem::class, function (Faker $faker) {
    return [
        'title' => $faker->words(3, true),
        'contents' => $faker->sentences(4, true),
        'date' => $faker->dateTimeBetween('now', '+4 months')
    ];
});
