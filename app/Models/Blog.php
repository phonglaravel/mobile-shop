<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'blogs';
    public function cate()
    {
        return $this->belongsTo(Cate::class,'cate_id','id');
    }
    public function category_blog()
    {
        return $this->belongsTo(CategoryBlog::class,'loai','id');
    }
    public function comment()
    {
        return $this->hasMany(CommentBlog::class,'blog_id');
    }
}
