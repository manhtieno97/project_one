<?php 
namespace App\Http\Controllers;
	use App\Models\Product;
	use App\Providers\Cart;
	use App\Models\Category;
	use Illuminate\Http\Request;
	/**
	 * 
	 */
	class CartController extends Controller
	{
		
		public function add($id,Cart $cart)
		{

			$pro = Product::find($id);
			
			if($pro){
				$cart->add($pro);
			}
			return redirect()->back();
		}
		public function postAdd(Request $request,$id,Cart $cart)
		{
			$quan=$request->pro_quantity;
			$color=$request->color;
			$size=$request->size;
			$pro = Product::find($id);
			if(!isset($cart->items[$id])){
				$cart->add($pro);
				if($quan>1){
					$cart->update($id,$quan);
					$cart->updateColor($id,$color);
					$cart->updateSize($id,$size);
				}
			}
			else {
				
            	$quantity=$cart->get_quantity($id)+$quan;
				$cart->update($id,$quantity);
				$cart->updateColor($id,$color);
				$cart->updateSize($id,$size);
			}
			return redirect()->back();
		}
		

		public function remove($id,Cart $cart)
		{		
			$cart->remove($id);
			return redirect()->back();
		}

		public function update($id,Cart $cart)
		{
			$qtt = request()->quantity ? request()->quantity : 1;
			$cart->update($id,$qtt);
			return redirect()->back();
		}

		public function clear(Cart $cart)
		{
			$cart->clear();
			return redirect()->back();
		}
		public function store(){
			return view('frontend.cartview');
		}
	}
 ?>