<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Product extends Model
{
    protected $table="product";
    protected $fillable=['name','slug','price','price_new','image','images','content','category_id','brand_id','status','pro_materials','brief','colors','sizes'];

    public function orders()
    {
        return $this->belongsToMany('App\Models\Orders','order_detail','product_id','orders_id')->withPivot('quantity','price','status')->withTimestamps();
    }
    public function size()
    {
        return $this->belongsToMany('App\Models\Size','product_attribute','product_id','size_id')->withTimestamps();
    }
    public function color()
    {
        return $this->belongsToMany('App\Models\Color','product_attribute','product_id','color_id')->withTimestamps();
    }

}
