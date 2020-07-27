<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Slider extends Model
{
    // Tuong ung bang sliders mapping den bang do
    use SoftDeletes;
    protected $guarded = [];
}
