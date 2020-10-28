@extends('frontend.layout.master')
@section('title','Checkout Success')
@section('main')
	<p class="alert alert-success text-center" style="text-transform: uppercase; font-size: 32px">Đặt mua thành công</p>
	<p class="alert alert-success text-center" style="text-transform: uppercase; font-size: 32px">Bạn hãy check gmai của mình để xem thông tin hóa đơn.Cảm ơn bạn đã mua sản phẩm ở cửa hàng!</p>
	<a href="{{route('product.all')}}" class="btn btn-dark" style="margin-left: 630px">Mua ngay</a> <br>
	<br>
@stop