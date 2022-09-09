<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'name',
        'price',
        'price_sale',
        'content',
        'image',
        'status',
        'sold',
        'cate_id',
        'brand_id',
        'quantity',

    ];

    public function category(){
        return $this->belongsTo(Category::class ,'cate_id','id');
    }
    public function brand(){
        return $this->belongsTo(Brand::class,'brand_id','id');
    }
}
