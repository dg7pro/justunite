<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'uuid'=> Uuid::generate()->string,
        'invisible'=> 1,
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),

        /*'group_id' => rand(1,10),
        'state_id' => function () {
            // Get random state id
            return $sid = App\State::inRandomOrder()->first()->id;
        },
        'constituency_id' => function () {
            // Get random constituency id
            return App\Constituency::inRandomOrder()->first()->id;
        },
        'credits' => rand(1,7),
        'verified' => rand(0,1),
        'email_token' => base64_encode('email'),

        'remember_token' => str_random(10),*/
    ];
});

$factory->define(App\Indian::class, function (Faker\Generator $faker){

    return [
        'name' => $faker->name,
        'suggested_by' => $faker->name,
        'category_id' => function () {
            // Get random category id
            return App\Category::inRandomOrder()->first()->id;
        },

    ];

});
