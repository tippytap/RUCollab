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

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt('pass1234'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Membership::class, function(Faker\Generator $faker){
    $userId = factory(App\User::class)->create()->id;
    $groupId = factory(App\Group::class)->create()->id;
    return [
        'user_id' => $userId,
        'group_id' => $groupId
    ];
});

$factory->define(App\Group::class, function(){
    $user = App\User::findOrFail(1);
    return [
        'group_leader_id' => $user->id,
    ];
});
