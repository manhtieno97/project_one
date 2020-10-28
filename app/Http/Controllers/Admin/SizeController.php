<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Size;
use Validator;
class SizeController extends Controller
{
     /** 
    GET account.index =>url account/index
    */
    public function index()
    {
       $data['sizess']=size::orderBy('id','desc')->paginate(10);
       return view('backend.size.index',$data);
    }

    /** 
    GET account.create =>url account/create
    */
    public function create()
    {
       return view('backend.size.create');
    }

    /** 
    post account.store =>url acount/store
    */
    public function store(Request $request)
    {
        $this->validate($request,[
           'name'=>'bail|required|unique:size,name',
        ],[
            'name.required'=>'Bạn chưa nhập tên size !',
            'name.unique'=>'Tên thuộc tính đã tồn tại !',
        ]);
        size::create($request->all());
        return redirect()->route('size.index');
    }

    /** 
    get account.edit =>url acount/1/edit
    */
    public function edit($id)
    {
        $data['sizes']=size::orderBy('id','desc');
        $data['size']=size::find($id);
       return view('backend.size.edit',$data);
    }

     /** 
    put account.update =>url acount/1/update
    */
    public function update(Request $request,$id)
    {
        $this->validate($request,[
           'name'=>'bail|required|unique:size,name,'.$id,
        ],[
            'name.required'=>'Bạn chưa nhập tên size !',
            'name.unique'=>'Size sắc đã tồn tại !',
        ]);
        $request->offsetUnset('_token');
        $request->offsetUnset('_method');
        size::where('id',$id)->update($request->all());
        return redirect()->route('size.index');
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
        size::find($id)->delete();
        return redirect()->route('size.index')->with('success','Xóa thuộc tính thành công!');
    }
}
