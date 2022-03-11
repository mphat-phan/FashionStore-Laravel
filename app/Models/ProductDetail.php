<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    use HasFactory;
    protected $table = "product_details";
    public function size()
    {
        return $this->belongsTo(Size::class,'sizeID','id');
    }
    public function color()
    {
        return $this->belongsTo(Color::class,'colorID','id');
    }
    public function product()
    {
        return $this->belongsTo(Product::class,'productID','id');
    }
}
