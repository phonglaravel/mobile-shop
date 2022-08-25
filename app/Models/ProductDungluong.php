<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDungluong extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'product_dungluong';
    public function product_color_price(){
        return $this->hasMany(ProductColorPrice::class, 'dungluong_id');
    }
}
