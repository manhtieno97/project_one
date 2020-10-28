<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $table="brand";
    protected $fillable=['name','status','slug'];
    public function products(){
    	return $this->hasMany(Product::class,'brand_id','id');
    }
}
