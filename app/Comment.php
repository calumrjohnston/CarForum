<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{


      protected $fillable = [ 'user_id,','model_id', 'comment_content'];


      public function modelCar()
      {
          return $this->belongsTo('Apps\ModelCar');
      }

      public function user()
      {
          return $this->belongsTo('App\User');
      }


}
