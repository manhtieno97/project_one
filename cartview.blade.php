@extends('frontend.layout.master')
@section('title','Check Cart')
@section('main')
  <main class="main">
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">Giỏ hàng</li>
                    </ol>
                </div><!-- End .container -->
            </nav>

            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="cart-table-container">
                            <table class="table table-cart">
                                <thead>
                                    <tr>
                                        <th class="product-col">Sản phẩm</th>
                                        <th class="price-col">Giá</th>
                                        <th class="price-col">Size</th>
                                        <th class="price-col">Màu sắc</th>
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
                                                    <img src="{{$model['image']}}" alt="product">
                                                </a>
                                            </figure>
                                            <h2 class="product-title">
                                                <a href="#">{{$model['name']}}</a>
                                            </h2>
                                        </td>
                                        <td>{{number_format($model['price'])}} VNĐ</td>
                                        <td>
                                            {{$model['size']}}
                                        </td>
                                        <td>
                                            {{$model['color']}}
                                        </td>
                                        <td>
                                           <form action="{{route('cart.update',['id'=>$model['id']])}}" >
                                                <input name="quantity" class="vertical-quantity form-control" type="text" value="{{$model['quantity']}}">


                                                <button type="submit">Update</button>
                                           </form>
                                        </td>
                                        <td>{{number_format($model['quantity']*$model['price'])}} VNĐ</td>
                                    </tr>
                                    <tr class="product-action-row">
                                        <td colspan="6" class="clearfix">
                                            <div class="float-right">
                                                <a href="{{route('cart.remove',['id'=>$model['id']])}}" title="Remove product" class="btn-remove" style="padding: 10px; background: #0088CC; color: #fff"><span class="sr-only">Xóa</span></a>
                                            </div><!-- End .float-right -->
                                        </td>
                                    </tr>
                                </tbody>
                                @endforeach
                                <tfoot>
                                    <tr>
                                        <td colspan="6" class="clearfix">
                                            <div class="float-left">
                                                <a href="{{route('frontend.layout')}}" class="btn btn-outline-secondary">Tiếp tục mua hàng</a>
                                            </div><!-- End .float-left -->
                                            <div class="float-right">
                                                <a href="{{route('cart.clear')}}" class="btn btn-outline-secondary btn-clear-cart">Xóa giỏ hàng</a>
                                                
                                            </div><!-- End .float-right -->
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div><!-- End .cart-table-container -->

                        
                    </div><!-- End .col-lg-8 -->

                    <div class="col-lg-4">
                        <div class="cart-summary">
                            <h3>Phiếu thanh toán</h3>

                            <h4>
                                <a data-toggle="collapse" href="#total-estimate-section" class="collapsed" role="button" aria-expanded="false" aria-controls="total-estimate-section">Ước tính Vận chuyển và Thuế</a>
                            </h4>

                            <div class="collapse" id="total-estimate-section">
                                <form action="#">
                                    <div class="form-group form-group-sm">
                                        <label>Country</label>
                                        <div class="select-custom">
                                            <select class="form-control form-control-sm">
                                                <option value="USA">United States</option>
                                                <option value="Turkey">Turkey</option>
                                                <option value="China">China</option>
                                                <option value="Germany">Germany</option>
                                            </select>
                                        </div><!-- End .select-custom -->
                                    </div><!-- End .form-group -->

                                    <div class="form-group form-group-sm">
                                        <label>State/Province</label>
                                        <div class="select-custom">
                                            <select class="form-control form-control-sm">
                                                <option value="CA">California</option>
                                                <option value="TX">Texas</option>
                                            </select>
                                        </div><!-- End .select-custom -->
                                    </div><!-- End .form-group -->

                                    <div class="form-group form-group-sm">
                                        <label>Zip/Postal Code</label>
                                        <input type="text" class="form-control form-control-sm">
                                    </div><!-- End .form-group -->

                                    <div class="form-group form-group-custom-control">
                                        <label>Flat Way</label>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="flat-rate">
                                            <label class="custom-control-label" for="flat-rate">Fixed $5.00</label>
                                        </div><!-- End .custom-checkbox -->
                                    </div><!-- End .form-group -->

                                    <div class="form-group form-group-custom-control">
                                        <label>Best Rate</label>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="best-rate">
                                            <label class="custom-control-label" for="best-rate">Table Rate $15.00</label>
                                        </div><!-- End .custom-checkbox -->
                                    </div><!-- End .form-group -->
                                </form>
                            </div><!-- End #total-estimate-section -->

                            <table class="table table-totals">
                                <tbody>
                                    <tr>
                                        <td>Tổng tiền</td>
                                        <td>{{number_format($carts->total_price)}} VNĐ</td>
                                    </tr>

                                    <tr>
                                        <td>Tax</td>
                                        <td>$0.00</td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td>Thanh toán</td>
                                        <td>{{number_format($carts->total_price)}} VNĐ</td>
                                    </tr>
                                </tfoot>
                            </table>

                            <div class="checkout-methods">
                                <a href="{{route('checkout')}}" class="btn btn-block btn-sm btn-primary">Chuyển đến Thanh toán</a>
                                <!-- <a href="#" class="btn btn-link btn-block">Check Out with Multiple Addresses</a> -->
                            </div><!-- End .checkout-methods -->
                        </div><!-- End .cart-summary -->
                    </div><!-- End .col-lg-4 -->
                </div><!-- End .row -->
            </div><!-- End .container -->

            <div class="mb-6"></div><!-- margin -->
        </main><!-- End .main -->
@stop