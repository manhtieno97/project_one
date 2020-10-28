<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Brand;
class BrandController extends Controller
{
     /** 
    GET account.index =>url account/index
    */
    public function index()
    {
       $data['brandss']=Brand::orderBy('id','desc')->paginate(15);
       return view('backend.brand.index',$data);

    }

    /** 
    GET account.create =>url account/create
    */
    public function create()
    {
       return view('backend.brand.create');
    }

    /** 
    post account.store =>url acount/store
    */
    public function store(Request $request)
    {
       $this->validate($request,[
           'name'=>'bail|required|unique:brand,name',

        ],[
            'name.required'=>'Bạn chưa nhập tên thương hiệu !',
            'name.unique'=>'Tên brand đã tồn tại !',
        ]);
        $slug=str_slug($request->name);
        $request['slug']=$slug;
        brand::create($request->all());
        return redirect()->route('brand.index');
    }

    /** 
    get account.edit =>url acount/1/edit
    */
    public function edit($id)
    {
        $data['brand']=brand::find($id);
       return view('backend.brand.edit',$data);
    }

     /** 
    put account.update =>url acount/1/update
    */
    public function update(Request $request,$id)
    {
        $this->validate($request,[
           'name'=>'bail|required|unique:brand,name,'.$id,
        ],[
            'name.required'=>'Bạn chưa nhập tên thương hiệu !',
            'name.unique'=>'Tên thương hiệu đã tồn tại !',
        ]);
        $request->offsetUnset('_token');
        $request->offsetUnset('_method');
        $slug=str_slug($request->name);
        $request['slug']=$slug;
        brand::where('id',$id)->update($request->all());
        return redirect()->route('brand.index');
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
        brand::find($id)->delete();
        return redirect()->route('brand.index')->with('success','Xóa tài khoản thành công!');
    }
}
