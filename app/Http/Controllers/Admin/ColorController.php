<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Color;
use Validator;
class ColorController extends Controller
{
     /** 
    GET account.index =>url account/index
    */
    public function index()
    {
        $data['colorss']=Color::orderBy('id','desc')->paginate(10);
       return view('backend.color.index',$data);
    }

    /** 
    GET account.create =>url account/create
    */
    public function create()
    {
       return view('backend.color.create');
    }

    /** 
    post account.store =>url acount/store
    */
    public function store(Request $request)
    {
        $this->validate($request,[
           'name'=>'bail|required|unique:color,name',
        ],[
            'name.required'=>'Bạn chưa nhập tên thuộc tính !',
            'name.unique'=>'Tên thuộc tính đã tồn tại !',
        ]);
        color::create($request->all());
        return redirect()->back();
    }

    /** 
    get account.edit =>url acount/1/edit
    */
    public function edit($id)
    {
        $data['colors']=color::orderBy('id','desc')->paginate(5);
        $data['color']=color::find($id);
       return view('backend.color.edit',$data);
    }

     /** 
    put account.update =>url acount/1/update
    */
    public function update(Request $request,$id)
    {
        $this->validate($request,[
           'name'=>'bail|required|unique:color,name,'.$id,
        ],[
            'name.required'=>'Bạn chưa nhập tên màu sắc !',
            'name.unique'=>'Tên màu sắc đã tồn tại !',
        ]);
        $request->offsetUnset('_token');
        $request->offsetUnset('_method');
        color::where('id',$id)->update($request->all());
        return redirect()->route('color.index');
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
        color::find($id)->delete();
        return redirect()->route('color.index')->with('success','Xóa thuộc tính thành công!');
    }
}
