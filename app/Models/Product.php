<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Color;

class Product extends Model
{
    use HasFactory;
    protected $table = "product";
    
    public function category()
    {
        return $this->belongsTo(Category::class,'categoryID','id');
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class,'brandID','id');
    }
    public function images()
    {
        return $this->hasMany(Images::class, 'productID', 'id');
    }
    public function productdetail()
    {
        return $this->hasMany(ProductDetail::class, 'productID', 'id');
    }
    public function color()
    {
        
    }
    public function size()
    {
        
    }

    
}
