@extends('frontend.layout.master')
@section('title','Checkout')
@section('main')
<div id="new-checkout-address" class="show container" >
	<div class="row">
		<form action="{{route('checkoutNow')}}" method="POST" role="form" class="col-md-5">
		<input type="hidden" name="_token" value="{{csrf_token()}}">
		<div class="col-md-12">
			<h4 class="text-center">Thông tin khách hàng</h4>
			<div class="form-group required-field">
				<label > Tên khách hàng </label>
				<input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required style="margin: 0 auto">
			</div>
			<div class="form-group required-field">
				<label > Email </label>
				<input type="email" class="form-control" id="email" name="email" value="{{old('email') }}" required style="margin: 0 auto">
			</div>
			<div class="form-group required-field">
				<label > Số điện thoại khách hàng </label>
				<input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}" required style="margin: 0 auto">
			</div>
			<div class="form-group required-field">
				<label > Địa chỉ nhận hàng </label>
				<input type="text" class="form-control" id="address" name="address" value="{{old('address') }}" required style="margin: 0 auto">
			</div>
			<div class="clearfix">
				<button type="submit" class="btn btn-primary" >Đặt hàng</button>
			</div>
		</div>
		
	</form>
	
	 <div class="col-md-7">
        <div class="cart-table-container">
              <table class="table table-cart">
                               <thead>
                                    <tr>
                                        <th class="product-col">Sản phẩm</th>
                                        <th class="price-col">Giá</th>
                                        <th class="price-col">Màu sắc</th>
                                        <th class="price-col">Size</th>
                                        <th class="qty-col">Số lượng</th>
                                        <th>Tổng tiền</th>
                                    </tr>
                                </thead>
                                @foreach($carts->items as $model)
                                <tbody>
                                    
                                    <tr class="product-row">
                                        <td class="product-col">
                                            <figure class="product-image-container">
                                                <a href="{{route('product.list',['id'=> $model['id'] , 'slug' => $model['slug'] ])}}" class="product-image">
                                                    <img src="{{$model['image']}}" alt="product" width="30px"  >
                                                </a>
                                            </figure>
                                            <h2 class="product-title">
                                                <a href="#">{{$model['name']}}</a>
                                            </h2>
                                        </td>
                                        <td>{{number_format($model['price'])}} VNĐ</td>
                                        <td>
                                     		{{$model['color']}}
                                        </td>
                                        <td>
                                            {{$model['size']}}
                                        </td>

                                        <td>
                                            {{$model['quantity']}}
                                        </td>

                                        <td>{{number_format($model['quantity']*$model['price'])}} VNĐ</td>
                                    </tr>
                                    
                                </tbody>
                                @endforeach
                                <tfoot>
                                    <tr>
                                        <td colspan="3" class="clearfix">
                                            Tổng tiền:
                                        </td>
                                        <td colspan="1" class="clearfix">
                                            {{number_format($carts->total_price)}} VNĐ
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>          
        </div><!-- End .cart-table-container -->               
     </div><!-- End .col-lg-8 -->
     </div>
</div><!-- End .clearfix -->
<br>
</div><!-- End .checkout-payment -->                                
@stop