<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
     protected $fillable = ['title' , 'description' , 'quantity' , 'price' , 'image'];


    public function images()
    {
      return $this->hasMany(ProductImage::class);
    }
}
