<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded=[];

    public function images()
    {
        return $this->hasMany(ProductImages::class,'product_id');
    }

}//end class
