<?php

namespace App\Models;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements JWTSubject
{
    use  Notifiable;

    public function recivedChat(){
        return $this->hasMany(Chat::class,'to_user_id');
    }

    public function sentChat(){
        return $this->hasMany(Chat::class,'from_user_id');
    }


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded=[];
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */


    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}//end class
