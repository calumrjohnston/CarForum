<?php

namespace App;

use App\Comment;
use Illuminate\Database\Eloquent\Model;

class ModelCar extends Model
{


//protected $fillable = [ 'user_id','comment_content'];

  public function brand(){
    return $this->belongsTo('App\Brand');
  }

  public function comments(){
    return $this->hasMany('App\Comment','id');
  }

//  public function addComment($body)
//  {
//    $this->comment()->create(compact('comment_content'));
//  }
}
