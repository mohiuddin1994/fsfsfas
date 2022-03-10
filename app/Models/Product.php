<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded =[];
    protected $appendes = ['product_image'];



    public function category(){
        return $this->belongsTo(Category::class);
    }
     public function subcategory(){
        return $this->belongsTo(Subcategory::class);
    }
     public function brand(){
        return $this->belongsTo(Brand::class);
    }

    public function attribute(){
        return $this->hasMany(Attribute::class);
    }

}
