<?php

namespace App\Models;

use App\Models\Variant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductVariant extends Model
{
    use HasFactory;
    protected $fillable=[
        'variant','variant_id','product_id',
    ];

    public function variant()
    {
        return $this->hasOne(Variant::class,'id','variant_id');
    }

}
