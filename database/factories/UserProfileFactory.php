<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\UserProfile;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(UserProfile::class, function (Faker $faker) {
    return [
        'user_id' => random_int(1, 5),
        'address' => Str::random(10),
        'photo' => 'profile' . random_int(1, 9),
        'phone' => Str::random(10),
    ];
});
