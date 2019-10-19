<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    ///Obtenga todas los videos / post que tienen asignada esta etiqueta.
     public function videos()
     {
         return $this->morphedByMany(Video::class,'taggable');
     }
     public function posts()
     {
         return $this->morphedByMany(Post::class,'taggable');
     }
}
