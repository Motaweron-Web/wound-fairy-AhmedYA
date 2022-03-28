<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $guarded=[];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    //end fun

}//end class
