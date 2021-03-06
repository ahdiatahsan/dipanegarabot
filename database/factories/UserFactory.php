<?php

use Faker\Generator as Faker;
use Illuminate\Support\Str;

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

$factory->define(App\User::class, function (Faker $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => 'admin'.rand(1,100).'@mail.com',
        'password' => $password ?: $password = bcrypt('admin'),
        'remember_token' => Str::random(10),
        'role_id' => rand(1,3),
    ];
});
