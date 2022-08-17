<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Brand;
use Faker\Generator as Faker;

$factory->define(Brand::class, function (Faker $faker) {
    return [
      'name'=>$faker->company(),
      'headquarters'=>$faker->address(),
      'founder'=>$faker->name(),
      'phonenumber'=>$faker->e164PhoneNumber(),
      'email'=>$faker->companyEmail()
    ];
});
