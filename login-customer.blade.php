@extends('frontend.layout.master')
@section('title','Customer Login')
@section('main')
	<div class="container">
		<h2>Đăng nhập</h2>
		<div class="row">
			<div class="col-lg-9 order-lg-last dashboard-content">
				<form action="{{route('home.login')}}" method="POST" role="form">
					<input type="hidden" name="_token" value="{{csrf_token()}}">
					@if(Session::has('flag'))
					<div class="arlert arlert-{{Session::get('flag')}}">{{Session::get('message')}}</div>
					@endif
					<div class="form-group required-field">
						<label for="">Tài khoản</label>
						<input type="text" class="form-control" id="use_name" name="use_name" placeholder="Tên tài khoản" required>
						 @if ($errors->has('use_name'))
                        <p class="text-danger">{{ $errors->first('use_name') }}</p>
                        @endif
					</div>
					<div class="form-group required-field">
						<label for="">Mật khẩu</label>
						<input type="password" class="form-control" id="password" name="password" placeholder="Mật khẩu" required>
						 @if ($errors->has('password'))
                        <p class="text-danger">{{ $errors->first('password') }}</p>
                        @endif
					</div>
					<button type="submit" class="btn btn-primary">Đăng nhập</button>
					<a href="{{route('home.account')}}" class="btn btn-success">Đăng ký</a>
				</form>
			</div>
		</div>
	</div>
@stop