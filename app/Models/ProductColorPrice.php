<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductColorPrice extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'product_color_price';
    public function product_dungluong(){
        return $this->belongsTo(ProductDungluong::class, 'dungluong_id', 'id');
    }
}
