<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\formLogin;
use Auth;
use Validator;
class LogInController extends Controller
{
    public function getLogIn()
    {
        return view('backend.login.login');
    }
    public function postLogIn(Request $request)
    {
        $this->validate($request,[
            'usename'=>'bail|required|min:6|alpha_num',
            'password'=>'bail|required|min:6'
        ],[
            'usename.required'=>'Bạn chưa nhập tên tài khoản !', 
            'usename.alpha_num'=>'Tên tài khoản không được chứa ký tự đặc biệt !', 
            'usename.min'=>'Tên tài khoản phải có it nhất 6 kí tự !', 
            'password.required'=>'Bạn chưa nhập mật khẩu !', 
            'password.min'=>'Mật khẩu phải có ít nhất 6 kí tự !', 
        ]);
        $arr=['usename'=>$request->usename,'password'=>$request->password];
        if(Auth::attempt($arr,$request->has('remember')))
        {
            return redirect()->route('admin.index');
        }
        else{
            return back()->with('error','Tài khoản hoặc mật khẩu không chính sác !');
        }
        
    }
}
