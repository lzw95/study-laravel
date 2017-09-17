<?php

use Faker\Generator as Faker;
use App\Models\Article;
/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Models\Article::class, function (Faker $faker) {
   	$date_time = $faker->date . ' ' . $faker->time;
    static $password;

    return [
        'name' => $faker->name,
        'sex' => '1',
        'age' => '10',
        'created_at' => $date_time,
        'updated_at' => $date_time
    ];
});
