<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

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

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});

$factory->define(\App\Author::class, function (Faker $faker) {
    return [
        "author_name" => $faker->unique()->name,
    ];
});

$factory->define(\App\Nxb::class, function (Faker $faker) {
    return [
        "nxb_name" => $faker->unique()->company,
    ];
});

$factory->define(\App\Book::class, function (Faker $faker) {
    return [
        "book_name" => $faker->jobTitle,
        "author_id" => $faker->randomFloat(0,1,100),
        "nxb_id" => $faker->randomFloat(0,1,100),
        "qty" => $faker->randomFloat(0,0,1000)
    ];
});

