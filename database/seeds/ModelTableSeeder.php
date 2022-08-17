<?php

use Illuminate\Database\Seeder;
use App\ModelCar;
class ModelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(App\ModelCar::class,50)->create();
    }
}
