<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    //
     // Un VIDEO pertenece a un usuario
     public function user()
     {
         return $this->belongsTo(User::class);
     }
     // Un VIDEO pertenece a una categoria
     public function category()
     {
         return $this->belongsTo(Category::class);
     }
     
     // Un VIDEO tiene muchos comentarios (relacion polimorfica) 1:N
     //Obtiene todos los comentarios del video
     public function comments()
     {
         return $this->morphMany(Comment::class,'commentable');
     }
     
     // Un VIDEO tiene una imagen (relacion polimorfica) 1:1
     public function image()
     {
         return $this->morphOne(Image::class,'imageable');
     }
     // Un VIDEO tiene muchas tags (relacion polimorfica) N:M
     public function tags()
     {
         return $this->morphToMany(Tag::class,'taggable');
     }
}
