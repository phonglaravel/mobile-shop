<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'categories';
    public function cate()
    {
        return $this->hasMany(Cate::class,'category_id');
    }
    public function products()
    {
        return $this->hasMany(Product::class,'category_id');
    }
}
