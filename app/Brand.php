<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
  public function modelCars(){
    return $this->hasMany('App\ModelCar', 'id');
  }
}
