<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    //

    //Un Grupo pertenece y tiene muchos usuarios
    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }
}
