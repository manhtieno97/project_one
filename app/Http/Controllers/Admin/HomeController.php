<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\Banner;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Providers\Cart;
use Session;
use App\Models\Orders;
use App\Models\OrdersDetail;
use DB;
use App\User;
use App\Models\Customer;
use Mail;
use App\Mail\ShoppingMail;
use App\Mail\ShoppingMail2;
class HomeController extends Controller
{
    public function getHome()
    {   
        $pr=Product::count();
        $cat=Category::count();
        $user=User::count();
        $cu=Customer::count();
        $or=Orders::where('status',1)->get();
        if(request()->date_from&&request()->date_to){
            $or=Orders::where('status',1)->whereBetween('created_at',[request()->date_from,request()->date_to])->get();
        }
        return view('backend.home',compact('or','pr','cat','user','cu'));
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
    public function index(){
    	$product=Product::orderby('id','DESC')->limit(10)->get();
        $produc=Product::orderby('id','ASC')->limit(10)->get();
    	return view('frontend.layout.index',compact('product','produc'));
        
        // return view('frontend.layout.master');
    }
    public function list($id,$slug){
        $produ=Product::where(['id' => $id,'slug'=>$slug])->first();
        $categorys=Category::where(['id' => $id,'slug'=> $slug])->first();
        $brands=Brand::where(['id' => $id,'slug'=> $slug])->first();
        if($categorys){
            $data['products']=Product::where(['category_id' => $categorys->id])->get();
            return view('frontend.product.productall',$data);
        }
        elseif($brands){
            $data['products']=Product::where(['brand_id' => $brands->id])->get();
            return view('frontend.product.productall',$data);
        }
        else{
            return view('frontend.product.product',compact('produ'));
        }
    }



    public function all(){
        $data['products']=product::orderBy('id','desc')->get();     
        $data['categorys']=category::orderBy('id','desc')->get();       
        $data['brands']=brand::orderBy('id','desc')->get();       
        return view('frontend.product.productall',$data);
    }
    public function getCheckout(){
        $carts=new Cart();
        foreach ($carts->items as $key => $cart) {
            if($cart['color']==''){
                return redirect()->route('cart.process')->with('error','Bạn chưa chọn màu sắc,size cho sản phẩm');
            }
        }
        
            if(empty(Auth::guard('customer')->user()->id)){
            return view('frontend.Check-buy-now');
            }
            $customer_id=Auth::guard('customer')->user()->id;
            $data['customer']=Customer::where(['id' => $customer_id])->first();
            return view('frontend.checkout',$data);
    }
    public function postCheckoutNow(Request $request){
        if(empty(Session::get('cart'))){
            return redirect()->back()->with('error','Bạn chưa chọn đồ');
        }
        $cart=Session::get('cart');
        $order=new Orders();
        $order->customer_id=0;
        $order->name=$request->name;
        $order->email=$request->email;
        $order->phone=$request->phone;
        $order->address=$request->address;
        $order->save();
        foreach ($cart as $key => $value) {
            $order_detail=new OrdersDetail();
            $order_detail->product_id=$key;
            $order_detail->orders_id=$order->id;
            $order_detail->customer_id=0;
            $order_detail->quantity=$value['quantity'];
            $order_detail->price=$value['price'];
            $order_detail->color=$value['color'];
            $order_detail->size=$value['size'];
            $order_detail->save();
        }
  
         if($order->email){
            Mail::to($order->email)->send(new ShoppingMail($order,$cart));
            Session::forget('cart');
            return view('frontend.checkout-success')->with('success','Đặt hàng thành công');
         }
         else{
            return view('frontend.checkout-success')->with('error','không gửi được gmail');
         }
         Session::forget('cart');

    }
    public function postCheckout(Request $request){
        if(empty(Auth::guard('customer')->user()->id)){
            return view('frontend.login-customer')->with('erorr','Bạn phải đăng nhập để mua hàng');
        }
        if(empty(Session::get('cart'))){
            return redirect()->route('frontend.layout')->with('error','Bạn chưa chọn đồ');
        }
        $cart=Session::get('cart');
        $order=new Orders();
        $order->customer_id=Auth::guard('customer')->user()->id;
        $order->name=$request->name_receiver;
        $order->email=$request->email_receiver;
        $order->phone=$request->phone_receiver;
        $order->address=$request->address_receiver;
        $order->save();
        foreach ($cart as $key => $value) {
            $order_detail=new OrdersDetail();
            $order_detail->product_id=$key;
            $order_detail->orders_id=$order->id;
            $order_detail->customer_id=Auth::guard('customer')->user()->id;
            $order_detail->quantity=$value['quantity'];
            $order_detail->price=$value['price'];
            $order_detail->color=$value['color'];
            $order_detail->size=$value['size'];
            $order_detail->save();
        }
        if(Auth::guard('customer')->user()->id){
            $data=Auth::guard('customer')->user();
            Mail::to(Auth::guard('customer')->user()->email)->send(new ShoppingMail2($order,$cart,$data));
            Session::forget('cart');
            return view('frontend.checkout-success')->with('success','Đặt hàng thành công');
            
         }
         else{
            return view('frontend.checkout-success')->with('error','không gửi được gmail');
         }
        Session::forget('cart');
    }
    public function getSerch(){
        $data['products'] =  Product::paginate(9); 
        if (request()->q) {
            $data['products'] =  Product::where('name','LIKE','%'.request()->pro_search.'%')->paginate(9); 
        }
        return view('frontend.product.productall',$data);
    }
    public function getAccount(){
        return view('frontend.create-account');
    }
    public function postAccount(Request $request){
        $this->validate($request,[
            'email' => 'unique:customer,email',
            'user_name' =>'min:6|unique:customer,user_name',
            'confirm_password' => 'same:password',
            'password' =>'min:6',
        ],[
            'email.unique' => 'Email này đã được sử dụng!',
            'user_name.unique' => 'Tài khoản này đã được sử dụng!',
            'user_name.min' => 'Tên tài khoản tối thiểu 6 kí tự!',
            'password.min' => 'Mật khẩu phải tối thiểu 6 ký tự!',
            'confirm_password.same' => 'Bạn phải nhập trùng mật khẩu!',
        ]);
        $password=bcrypt($request->password);
        $request->merge(['password'=>$password]);
        Customer::create($request->all());
        return view('frontend.success');
    }
    public function getLogin1(){
        return view('frontend.login-customer');
    }
    public function postLogin1(Request $request){
        $this->validate($request,[
            'user_name' => 'alpha_num',
            'password' => 'min:6',
        ],[
            'user_name.alpha_num' => 'Tên tài khoản không được chứa ký tự đặc biệt',
            'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự',
        ]);
        $credentials = array('user_name'=>$request->use_name,'password' =>$request->password);
        if(Auth::guard('customer')->attempt($credentials)){
            return redirect()->route('frontend.layout')->with(['flag'=>'success','message'=>'Đăng nhập thành công']);
        }
        else{
            return redirect()->back()->with(['flag'=>'danger','message'=>'Đăng nhập không thành công']);
        }
    }
    public function postLogout(){
        Auth::guard('customer')->logout();
        session(['cart' => []]);
        return redirect()->route('frontend.layout');
    }
    public function getHistory(){
        if(empty(Auth::guard('customer')->user()->id)){
            return view('frontend.login-customer')->with('error','Bạn phải đăng nhập để mua hàng');
        }
        $id=Auth::guard('customer')->user()->id;
        $data['customers']=Customer::where('id',$id)->paginate(5);
        $data['orders']=orders::where('customer_id',$id)->paginate(5);
        return view('frontend.history',$data);
    }
    public function historyDestroy($id){
        $status=orders::where('id',$id)->value('status');
        if($status==1){
            orders::destroy($id);
            return redirect()->back()->with('success','Đã hủy thành công');
        }
        else{
            return redirect()->back()->with('error','Hàng đã được giao hoặc đã thanh toán không thể hủy');
        }
       
    }
    public function historyShow($id){
        $data['orders']=orders::find($id);
        $customer_id=orders::where('id',$id)->value('customer_id');
        $data['customer']=Customer::where(['id' => $customer_id])->first();
       return view('frontend.history-show',$data);
    }
}
