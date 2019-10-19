<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

      //Un usuario tiene un perfil
    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    //Un usuario pertenece a  un nivel 1:1
    public function level()
    {
        return $this->belongsTo(Level::class);
    }
    //Un usuario pertenece y tiene muchos grupos N:M
    public function groups()
    {
        return $this->belongsToMany(Group::class)->withTimestamps();
        
    }

    //Relacion uno a traves de....
    //Un usuario tiene un localizacion a traves de un perfil
    public function location()
    {
        // return $this->hasOneTrough(Location::class,Profile::class);
        return $this->hasOneThrough(Location::class,Profile::class);
    }

    //Un usuario tiene una imagen ( Relacion polimorfica ) 1:1  
    public function image()
    {
        return $this->morphOne(Image::class,'imageable');
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    public function videos()
    {
        return $this->hasMany(Video::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
