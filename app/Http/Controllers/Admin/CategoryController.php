<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Validator;
class CategoryController extends Controller
{
    /** 
    GET account.index =>url account/index
    */
    public function index()
    {
       $data['categorys']=category::orderBy('id','desc')->paginate(10);
       return view('backend.category.index',$data);
    }

    /** 
    GET account.create =>url account/create
    */
    public function create()
    {
       $data['categorys']=category::all();
        return view('backend.category.create',$data);
    }

    /** 
    post account.store =>url acount/store
    */
    public function store(Request $request)
    {
        $this->validate($request,[
           'name'=>'bail|required|unique:category,name',

        ],[
            'name.required'=>'Bạn chưa nhập tên danh mục !',
            'name.unique'=>'Tên danh mục đã tồn tại !',
        ]);
        $slug=str_slug($request->name);
        $request['slug']=$slug;
        category::create($request->all());
        return redirect()->route('category.index');
    }

    /** 
    get account.edit =>url acount/1/edit
    */
    public function edit($id)
    {
        $data['cat_edit']=category::find($id);
        return view('backend.category.edit',$data);
    }

     /** 
    put account.update =>url acount/1/update
    */
    public function update(Request $request,$id)
    {
        $this->validate($request,[
           'name'=>'bail|required|unique:category,name,'.$id,
        ],[
            'name.required'=>'Bạn chưa nhập tên danh mục !',
            'name.unique'=>'Tên danh mục đã tồn tại !',
        ]);
        $request->offsetUnset('_token');//or $request->only('name','status');
        $request->offsetUnset('_method');
        $slug=str_slug($request->name);
        $request['slug']=$slug;
        if(!$request->image)
        {
            $request->merge(['image'=>category::where('id',$id)->value('image')]);
        }
        category::where('id',$id)->update($request->all());
        return redirect()->route('category.index');
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
        category::find($id)->delete();
        return redirect()->route('category.index')->with('success','Xóa danh mục thành công!');
    }


    public function getListCategory($id,$cap)
    {
        $data['categorys']=category::orderBy('id','asc')->paginate(5);
        return view('backend.category.subcategory',$data);
    }
    public function getAddDMCOn($id)
    {
        $data['parent_id']=$id;
        return view('backend.category.subcat_add',$data);
    }
    public function postAddDMCOn(Request $request,$id)
    {
        $slug=str_slug($request->name);
        $request['slug']=$slug;
        $request['parent_id']=$id;
        category::create($request->all());
        return redirect()->route('category.index')->with('success','Thêm mới danh mục thành công !');
    }

}
