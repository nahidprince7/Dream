<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\UserRole;
use Faker\Generator as Faker;

$factory->define(UserRole::class, function (Faker $faker) {
    $users = \App\User::select('id');
    foreach ($users as $user) {
        return [
            'user_id' => $user->id,
            'role_id' => $faker->numberBetween(1, 2),
        ];
    }
});



