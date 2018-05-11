<?php


//$factory->define(App\User::class, function (Faker\Generator $faker) {
//    return [
//        'name' => $faker->name,
//        'email' => $faker->safeEmail,
//        'password' => bcrypt(str_random(10)),
//
//
//        'surname' => $faker->name,
////        'photo' => $faker->name,
//        'telephone' => $faker->numberBetween(1,10),
//        'address' => $faker->sentence(7,11),
//        'remember_token' => str_random(10),
//
//    ];
//});
//
//$factory->define(App\Weight::class, function (Faker\Generator
//                                              $faker) {
//    return [
//        'user_id' => 4,
//        'count' => $faker->numberBetween(50,100),
////        'slug'=> $faker->slug()
//
//    ];
//});
//
//$factory->define(App\Exerciselist::class, function (Faker\Generator
//                                              $faker) {
//    return [
//        'name' => $faker->name,
//
//
//
//    ];
//});
//
$factory->define(App\Post::class, function (Faker\Generator
                                                    $faker) {
    return [
        'user_id' => 4,
        'title' => $faker->sentence(7,11),
        'body' => $faker->sentence(7,11),
        'photo' => "gym.jpg",




    ];
});

//$factory->define(App\Day::class, function (Faker\Generator $faker) {
//    $days[0] = "Sunday";$days[1]="Monday";$days[1]="Thuesday";$days[1]="Wednesday";$days[1]="Thursday";$days[1]="Friday";$days[1]="Saturday";
//
//    return [
//        'name' => array_random($days),
//
//
//    ];
//});
//
//
//
//$factory->define(App\Exercise::class, function (Faker\Generator
//                                              $faker) {
//    return [
//        'user_id' => $faker->numberBetween(1,3),
//        'day_id' => $faker->numberBetween(1,7),
//        'exerciselist_id' => $faker->numberBetween(1,3),
//        'reps' => $faker->numberBetween(1,3),
//        'set' => $faker->numberBetween(1,3),
//
//    ];
//});
//
//
