<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    //

     //Un Nivel tiene muchos usuarios
    public function users()
    {
        return $this->hasMany(User::class);
    }

    // Un nivel tiene un muchos post a traves de un usuario ...
    public function posts()
    {
        return $this->hasManyThrough(Post::class,User::class);
    }
    // Un nivel tiene un muchos videos a traves de un usuario ...
    public function videos()
    {
        return $this->hasManyThrough(Video::class,User::class);
    }
}
