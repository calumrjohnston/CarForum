<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ModelCar;
use Faker\Generator as Faker;

$factory->define(ModelCar::class, function (Faker $faker) {
    return [
      'name'=>$faker->word(),
      'doors'=>$faker->numberBetween(3,5),
      'engine_size'=>$faker->numberBetween(900,6000),
      'brand_id'=>App\Brand::inRandomOrder()->first()->id,
    ];
});
