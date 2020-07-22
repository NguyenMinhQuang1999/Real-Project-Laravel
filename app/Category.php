<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    //
   use SoftDeletes; // update date now in deleted_at in table categories
   protected  $fillable = ['name', 'parent_id', 'slug'];

}
