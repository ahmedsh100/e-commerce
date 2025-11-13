<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function category_product(){
        return $this->belongsTo(Category::class,'category_id','id');
    }
}
