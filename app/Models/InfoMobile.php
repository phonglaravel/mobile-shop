<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfoMobile extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'infomobile';
    public function product()
    {
        return $this->belongsTo(Product::class,'product_id','id');
    }
}
