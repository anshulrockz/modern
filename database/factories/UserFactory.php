<?php

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

$factory->define(App\User::class, function (Faker $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

//Product
$factory->define(App\Product::class, function (Faker $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'description' => $faker->description,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

//Account
$factory->define(App\Account::class, function (Faker $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

//Bank
$factory->define(App\Bank::class, function (Faker $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

//Brand
$factory->define(App\Manufacturer::class, function (Faker $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'description' => $faker->text,
        'is_active' => 1,
        'created_by' => 1,
        'updated_by' => 1,
    ];
});

//Category
$factory->define(App\Category::class, function (Faker $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'description' => $faker->text,
        'is_active' => 1,
        'created_by' => 1,
        'updated_by' => 1,
    ];
});

//Customer
$factory->define(App\Customer::class, function (Faker $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

//Expense
$factory->define(App\Expense::class, function (Faker $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

//Firm
$factory->define(App\Firm::class, function (Faker $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

//Income
$factory->define(App\Tax::class, function (Faker $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'rate' => $faker->biasedNumberBetween($min = 10, $max = 20, $function = 'sqrt')
,
        'effective_from' => $faker->date,
        'description' => $faker->text,
        'is_active' => 1,
        'created_by' => 1,
        'updated_by' => 1,
    ];
});