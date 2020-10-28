<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Color;
use App\Models\Size;
use App\Models\ProductAttribute;
class ProductController extends Controller
{
     /** 
    GET account.index =>url account/index
    */
    public function index()
    {
       $data['categorys']=category::all();
       $data['brands']=brand::all();
       $data['products']=product::orderBy('id','desc')->paginate(15);
       return view('backend.product.index',$data);

    }

    /** 
    GET account.create =>url account/create
    */
    public function create()
    {
        $data['categorys']=category::all();
        $data['colors']=color::all();
        $data['sizes']=size::all();
        $data['brands']=brand::all();
       return view('backend.product.create',$data);
    }

    /** 
    post account.store =>url acount/store
    */
    public function store(Request $request)
    {
        $this->validate($request,[
        'name'=>'required',
        'price'=>'min:0',
        'price_new'=>'lt:price',

        ],[]);
        $colors=color::all();
        $pro_color="";
        foreach ($colors as $key => $color) {
            $name_color="color".$color->id;
            if($request->$name_color)
            {
                $pro_color .="\"" . $color->name."\"".",";
            }
        }
        $pro_color=rtrim($pro_color, ",");
        $request['colors']="[" . $pro_color ."]";

        $sizes=size::all();
        $pro_size="";
        foreach ($sizes as $key => $size) {
            $name_size="size".$size->id;
            if($request->$name_size)
            {
                $pro_size .="\"" . $size->name."\"".",";
            }
        }
        $pro_size=rtrim($pro_size, ",");
        $request['sizes']="[" . $pro_size ."]";


        $slug=str_slug($request->name);
        $request['slug']=$slug;
        product::create($request->all());
        // $pro_att_id=product::orderBy('id','desc')->value('id');
        // $pro_att=new ProductAttribute;
        // $pro_att->product_id=$pro_att_id;
        // $pro_att->color_id=$request['color_id'];
        // $pro_att->size_id=$request['size_id'];
        // $pro_att->save();
        return redirect()->route('product.index');
    }

    /** 
    get account.edit =>url acount/1/edit
    */
    public function edit($id)
    {
        $data['categorys']=category::all();
        $data['colors']=color::all();
        $data['sizes']=size::all();
        $data['brands']=brand::all();
        $data['ProductAttribute']=ProductAttribute::all();
        $data['product']=product::find($id);
       return view('backend.product.edit',$data);
    }

    /** 
    put account.update =>url acount/1/update
    */
    public function update(Request $request,$id)
    {
        $this->validate($request,[
        'name'=>'required',
        'price'=>'required',
        'price_new'=>'lt:price',
        ],[]);

        $colors=color::all();
        $pro_color="";
        foreach ($colors as $key => $color) {
            $name_color="color".$color->id;
            if($request->$name_color)
            {
                $pro_color .="\"" . $color->name."\"".",";
                $request->offsetUnset($name_color);
            }
        }
        $pro_color=rtrim($pro_color, ",");
        $request['colors']="[" . $pro_color ."]";

        $sizes=size::all();
        $pro_size="";
        foreach ($sizes as $key => $size) {
            $name_size="size".$size->id;
            if($request->$name_size)
            {
                $pro_size .="\"" . $size->name."\"".",";
                $request->offsetUnset($name_size);
            }
        }
        $pro_size=rtrim($pro_size, ",");
        $request['sizes']="[" . $pro_size ."]";

        $slug=str_slug($request->name);
        $request['slug']=$slug;
        $request->offsetUnset('_token');
        $request->offsetUnset('_method');
        if(!$request->image)
        {
            $request->merge(['image'=>product::where('id',$id)->value('image')]);
        }
        if(!$request->images)
        {
            $request->merge(['images'=>product::where('id',$id)->value('images')]);
        }
        ProductAttribute::where('product_id',$id)->update($request->only('color_id','size_id'));
        $request->offsetUnset('color_id');
        $request->offsetUnset('size_id');
        product::where('id',$id)->update($request->all());
        return redirect()->route('product.index');
    }

    /** 
    get account.show =>url acount/1
    */
    public function show($id)
    {

    }

    /** 
    delete account.show =>url acount/1
    */
    public function destroy($id)
    {
        product::find($id)->delete();
        return redirect()->route('product.index')->with('success','Xóa sản phẩm thành công!');
    }
    public function productSearch()
    {

        $data['categorys']=category::all();
        $data['brands']=brand::all();
        $data['products']=Product::where('name','LIKE','%'.request()->search.'%')->paginate(15);
        return view('backend.product.index',$data);
    }

    // public function getKho($id)
    // {

    //    $data['product']=product::find($id);
    //    $data['attributes']=attribute::all();
    //    return view('backend.product.kho',$data);
    // }
    // public function postKho(Request $request,$id)
    // {
    //     $this->validate($request,[
    //     'quantity'=>'bail|required|numeric|min:1',
    //     ],[
    //         'quantity.required'=>'Bạn chưa nhập số lượng sản phẩm !',
    //         'quantity.numeric'=>'Số lượng phải dạng số !',
    //         'quantity.min'=>'Số lượng phải lơn hơn 0 !',
    //     ]);
    //     $request['product_id']=$id;
    //     $check=1;
    //     $att=ProductAttribute::where('product_id',$id)->get();
    //     foreach ($att  as $value) {
    //         if($value->attribute_id==$request->attribute_id){
    //             $check=0;
    //         }
    //     }

    //     if($check==1)
    //     {
    //         ProductAttribute::create($request->all());
    //         return redirect()->route('product.index');
    //     }else{
    //         $request->offsetUnset('_token');//or
    //         $quantity=ProductAttribute::where('product_id',$id)->where('attribute_id',$request->attribute_id)->value('quantity');
    //         $quantity+= $request->quantity;
    //         $request->merge(['quantity' => $quantity]);
    //         ProductAttribute::where('product_id',$id)->where('attribute_id',$request->attribute_id)->update($request->all());
    //         return redirect()->route('product.index')->with('success','Sản phẩm đã được thêm số lượng!');
           
        
    //     }
    // }
}
