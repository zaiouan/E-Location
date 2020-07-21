<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Locataire;
use Faker\Generator as Faker;

$factory->define(Locataire::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'prenom' => $faker->name,
        'identite' => $faker->unique()->text('11'),
        'date' => $faker->dateTime,
        'tele' => $faker->numberBetween(0,10000000000),
        'adresse' => $faker->text('11'),
        'email' => $faker->unique()->safeEmail,
        'user_id' => factory(App\User::class),
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});
