<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\AgendaItem;
use Faker\Generator as Faker;

$factory->define(AgendaItem::class, function (Faker $faker) {
    return [
        'title' => $faker->words(3, true),
        'contents' => $faker->realText(),
        'date' => $faker->dateTimeBetween('now', '+4 months')
    ];
});
