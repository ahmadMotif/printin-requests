<?php

use Faker\Generator as Faker;

$factory->define(App\Order::class, function (Faker $faker) {
    $name = $faker->name;
    return [
        'book_title' => $name,
        'slug' => str_slug($name),
        'description' => $faker->text,
    ];
});
