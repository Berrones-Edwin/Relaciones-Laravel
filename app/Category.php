<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //

    // Una Categoria tiene muchos videos 1:N
    public function videos()
    {
        return $this->hasMany(Video::class);
    }
    // Una Categoria tiene muchos post 1:N
    public function post()
    {
        return $this->hasMany(Post::class);
    }
}
