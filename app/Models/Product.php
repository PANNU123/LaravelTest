<?php

namespace App\Models;


use App\Models\PoductImage;
use App\Models\ProductVariant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    protected $fillable=[
        'title','sku','description','price','qty'
    ];

    public function images()
    {
        return $this->hasOne(PoductImage::class,'product_id');
    }
    public function product_variants()
    {
        return $this->hasMany(ProductVariant::class,'product_id');
    }
}
