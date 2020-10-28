@extends('frontend.layout.master')
@section('title','Checkout')
@section('main')
<div id="new-checkout-address" class="show container" >
	<div class="col-md-12">
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
                                        <td colspan="5" class="clearfix">
                                            <b>Tổng tiền:</b>
                                        </td>
                                        <td colspan="1" class="clearfix">
                                           <b> {{number_format($carts->total_price)}} VNĐ</b>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>          
        </div><!-- End .cart-table-container -->               
     </div><!-- End .col-lg-8 -->
	<form action="{{route('checkout')}}" method="POST" role="form" class="row">
		<input type="hidden" name="_token" value="{{csrf_token()}}">
		<div class="col-md-6">
			<h4 class="text-center">Thông tin khách hàng</h4>
			<div class="form-group required-field">
				<label > Tên khách hàng </label>
				<input type="text" class="form-control" id="name" name="name" value="{{ $customer->name }}" required >
			</div>
			<div class="form-group required-field">
				<label > Email </label>
				<input type="email" class="form-control" id="email" name="email" value="{{ $customer->email }}">
			</div>
			<div class="form-group required-field">
				<label > Số điện thoại khách hàng </label>
				<input type="text" class="form-control" id="phone" name="phone" value="{{ $customer->phone }}" >
			</div>
			<div class="form-group required-field">
				<label > Địa chỉ khách hàng </label>
				<input type="text" class="form-control" id="address" name="address" value="{{ $customer->address }}" required >
			</div>
			<div class="clearfix" >
				<button type="submit" class="btn btn-primary" href="#">Đặt hàng</button>
			</div>
		</div>
		<div class="col-md-6">
			<h4 class="text-center">Thông tin người nhận(trường hợp bạn tặng quà)</h4>
			<div class="form-group ">
				<label > Tên người nhận </label>
				<input type="text" class="form-control" id="name_receiver" name="name_receiver"  >
			</div>
			<div class="form-group">
				<label > Email </label>
				<input type="email" class="form-control" id="email_receiver" name="email_receiver"  >
			</div>
			<div class="form-group ">
				<label > Số điện thoại người nhận </label>
				<input type="text" class="form-control" id="phone_receiver" name="phone_receiver"   >
			</div>
			<div class="form-group ">
				<label > Địa chỉ người nhận </label>
				<input type="text" class="form-control" id="address_receiver" name="address_receiver"   >
			</div>
		</div>
		
	</form>
	
</div><!-- End .clearfix -->
<br>
</div><!-- End .checkout-payment -->                                
@stop