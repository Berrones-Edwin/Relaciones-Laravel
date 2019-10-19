<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //

    // Un post pertenece a un usuario
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    // Un post pertenece a una categoria
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Un post tiene muchos comentarios (relacion polimorfica) 1:N
    //Obtiene todos los comentarios del post
    public function comments()
    {
        return $this->morphMany(Comment::class,'commentable');
    }
    
    // Un post tiene una imagen (relacion polimorfica) 1:1
    public function image()
    {
        return $this->morphOne(Image::class,'imageable');
    }
    // Un post tiene muchas tags (relacion polimorfica) N:M
    public function tags()
    {
        return $this->morphToMany(Tag::class,'taggable');
    }
}
