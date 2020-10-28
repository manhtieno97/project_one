@extends('frontend.layout.master')
@section('title','Customer Login')
@section('main')
<div class="container">
 	<div class="row">
 		<div class="col-md-3">
 			<h2 class="text-center">Hóa Đơn</h2>
 			<table class="table">
 				<thead>
 					<tr>
 						<th>ID:</th>
 						<th>{{ $orders->id }}</th>
 					</tr>
 				</thead>
 				<tbody>
 					<tr>
 						<th>Created:</th>
 						<th>{{ $orders->created_at}}</th>
 					</tr>
 				</tbody>
 			</table>

 		</div>
 		<div class="col-md-5">
 			<h2 class="text-center">Khách hàng</h2>
 			<table class="table">
 				<thead>
 					<tr>
 						<th>Name:</th>
 						<th>{{ $customer->name }}</th>
 					</tr>
 				</thead>
 				<tbody>
 					<tr>
 						<th>Email:</th>
 						<th>{{ $customer->email }}</th>
 					</tr>
 					<tr>
 						<th>SDT:</th>
 						<th>{{ $customer->phone }}</th>
 					</tr>
 					<tr>
 						<th>Địa chỉ:</th>
 						<th>{{ $customer	->address }}</th>
 					</tr>
 				</tbody>
 			</table>
 		</div>
 		<div class="col-md-4">
 			<h2 class="text-center">Người nhận</h2>
 			<table class="table">
 				<thead>
 					<tr>
 						<th>Name:</th>
 						<th>{{ $orders->name }}</th>
 					</tr>
 				</thead>
 				<tbody>
 					<tr>
 						<th>Email:</th>
 						<th>{{ $orders->email }}</th>
 					</tr>
 					<tr>
 						<th>SDT:</th>
 						<th>{{ $orders->phone }}</th>
 					</tr>
 					<tr>
 						<th>Địa chỉ:</th>
 						<th>{{ $orders	->address }}</th>
 					</tr>
 				</tbody>
 			</table>
 		</div>
 	</div>
 	<div class="row">
 		<h2 class="text-center"> Chi Tiết Đơn Hàng</h2>
 		<div class="table-responsive">
 			<table class="table table-hover">
 				<thead>
 					<tr>
 						<th>STT</th>
 						<th>Tên Sản phẩm</th>
 						<th>Số lượng</th>
 						<th>Giá</th>
 						<th>Thành tiền</th>
 					</tr>
 				</thead>
 				<tbody>
 					<?php $stt=1;$tong=0; foreach ( $orders->product  as $key => $value) {?>
 						<tr>
 							<td>{{ $stt }}</td>
 							<td>{{ $value->name }}</td>
 							<td>{{ $value->pivot->quantity }}</td>
 							<td>{{ number_format($value->pivot->price) }}</td>
 							<td>{{number_format( $t=$value->pivot->price* $value->pivot->quantity) }} đ</td>
 						</tr>
 					<?php $stt++;$tong+=$t; } ?>
 				</tbody>
 				<tfoot>
 					<tr>
 						<th colspan="4">Tổng tiền</th>
 						<th class="text-danger">{{ number_format($tong) }}đ</th>
 					</tr>
 				</tfoot>
 			</table>
 		</div>
 	</div>
    


 </div>
 @stop()