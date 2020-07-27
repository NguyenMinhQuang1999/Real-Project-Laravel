<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    // tat ca field duoc phep insert
    use SoftDeletes;
    protected $guarded = [];

    public function images()
    {
        return $this->hasMany(ProductImage::class, 'product_id');//ten lop - khoa ngoai
    }
    public function tags(){
        return $this
        ->belongsToMany(Tag::class, 'product_tags', 'product_id', 'tag_id')
        ->withTimestamps();
    }

    public function category() {
        return $this->belongsTo(Category::class, 'category_id');// thuoc ve bang danh muc sp, truyen vao khoa ngoai
    }

}