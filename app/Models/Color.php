<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    protected $table="color";
    protected $fillable=['name'];
     public function product()
    {
        return $this->belongsToMany('App\Models\Product','product_attribute','color_id','product_id')->withTimestamps();
    }
}
