<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    protected $table="size";
    protected $fillable=['name'];
    public function product()
    {
        return $this->belongsToMany('App\Models\Product','product_attribute','size_id','product_id')->withTimestamps();
    }
}
