<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'products';
    public function cate(){
        return $this->belongsToMany(Cate::class, 'product_cate', 'product_id', 'cate_id');
    }
    public function category(){
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
    public function product_dungluong(){
        return $this->hasMany(ProductDungluong::class, 'product_id', 'id');
    }
    public function product_color_price(){
        return $this->hasMany(ProductColorPrice::class, 'product_id', 'id');
    }
    public function product_cate(){
        return $this->hasMany(ProductCate::class, 'product_id', 'id');
    }
    public function product_image(){
        return $this->hasMany(ProductImage::class, 'product_id', 'id');
    }
    public function product_ram(){
        return $this->hasMany(ProductRam::class, 'product_id', 'id');
    }
    public function order_product(){

        return $this->hasMany(OrderDetail::class, 'product_id', 'id')->sum('qty');
    }
    
}
