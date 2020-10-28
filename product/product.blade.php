@extends('frontend.layout.master')
@section('title','List Item')
@section('main')
 


            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="product-single-container product-single-default">
                             <h3 class="title">Chi tiết sản phẩm</h3>
                            <div class="row">

                                <div class="col-lg-7 col-md-6 product-single-gallery">
                                    <div class="product-slider-container product-item">
                                        <div class="product-single-carousel owl-carousel owl-theme">
                                            
                                            <?php $pro_img=json_decode($produ->images) ; ?>
                                            @if($produ->images!='')
                                        
                                            @foreach($pro_img as $img)

                                           <div class="product-item">
                                                <img class="product-single-image" src="{{$img}}" data-zoom-image="{{$img}}"/>
                                            </div>
                                            @endforeach
                                            @else
                                            <div class="product-item">
                                                <a href="#" class="product-image">
                                                    <img src="{{$produ->image}}" alt="product" >
                                                </a>
                                            </div>
                                            @endif
                                            
                                            
                                        </div>
                                        <!-- End .product-single-carousel -->
    
                                        <span class="prod-full-screen">
                                            <i class="icon-plus"></i>
                                        </span>
                                    </div>
                                    <div class="prod-thumbnail row owl-dots" id='carousel-custom-dots'>
                                        @if($produ->images!='')
                                        
                                        @foreach($pro_img as $img)

                                        <div class="col-3 owl-dot">
                                            <img src="{{$img}}"/>
                                        </div>
                                        @endforeach
                                        @endif
                                        
                                    </div>
   
                                   
                                </div><!-- End .col-lg-7 -->
                                
                                        
                              

                                <div class="col-lg-5 col-md-6">
                                    <div class="product-single-details">
                                        <h1 class="product-title">{{$produ->name}}</h1>

                                    

                                        <div class="price-box">
                                            <span class="old-price">{{ number_format($produ->price)}} đ</span>
                                            <span class="product-price">{{ number_format($produ->price_new)}} đ</span>
                                        </div><!-- End .price-box -->

                                        <div class="product-desc">
                                            <h3>Tóm tắt:</h3><p><?= $produ->brief ?></p>
                                        </div><!-- End .product-desc -->
                                         <div class="product-action product-all-icons">
                                        <form action="{{route('cart.postadd',['id'=>$produ->id,'slug' => $produ->slug,'name'=>$produ->name])}}" method="POST"  class="form-action">
                                        <div class="product-filters-container">
                                            <div class="product-single-filter">
                                                <div class="form-group">
                                                <label for="">Màu sắc</label>
                                                    <select name="color"  class="form-control" required="required">
                                                      <option value="">--Chọn màu sắc--</option>
                                                      <?php $pro_color=json_decode($produ->colors) ; ?>
                                                      @foreach ( $pro_color as $color_name)
                                                        {{-- expr --}}
                                                      
                                                      <option value="{{ $color_name}}">{{$color_name }}</option>
                                                      @endforeach
                                                    </select>
                                              </div>
                                            
                                            
                                                <div class="form-group">
                                                <label for="">Size</label>
                                                    <select name="size"  class="form-control" required="required">
                                                      <option value="">--Chọn size--</option>
                                                      <?php $pro_size=json_decode($produ->sizes) ; ?>
                                                      @foreach ( $pro_size as $size_name)
                                                        {{-- expr --}}
                                                      
                                                      <option value="{{ $size_name}}">{{$size_name }}</option>
                                                      @endforeach
                                                    </select>
                                              </div>
                                              </div><!-- End .product-single-filter -->
                                            <div class="">
                                                <label>Chất liệu:</label>    
                                                        <h4 >{{$produ->pro_materials}}</h4>

                                            </div><!-- End .product-single-filter -->
                                        </div><!-- End .product-filters-container -->
                                        
                                       
                                            
                                                @csrf
                                                <div class="product-single-qty">
                                                    <input class="horizontal-quantity form-control" type="text" name="pro_quantity">
                                                </div><!-- End .product-single-qty -->
                                            <button class="btn btn-sucess btn-cart" type="submit">Thêm vào giỏ hàng</button>
                                            </form>
                                        </div><!-- End .product-action -->

                                        <div class="product-single-share">
                                            <label>Share:</label>
                                            <!-- www.addthis.com share plugin-->
                                            <div class="addthis_inline_share_toolbox"></div>
                                        </div><!-- End .product single-share -->
                                    </div><!-- End .product-single-details -->
                                </div><!-- End .col-lg-5 -->
                            </div><!-- End .row -->
                        </div><!-- End .product-single-container -->

                        <div class="product-single-tabs">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="product-tab-desc" data-toggle="tab" href="#product-desc-content" role="tab" aria-controls="product-desc-content" aria-selected="true">Mô tả</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="product-tab-tags" data-toggle="tab" href="#product-tags-content" role="tab" aria-controls="product-tags-content" aria-selected="false">Kích thước & phù hợp</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="product-tab-reviews" data-toggle="tab" href="#product-reviews-content" role="tab" aria-controls="product-reviews-content" aria-selected="false">Chính sách hoàn trả</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="product-desc-content" role="tabpanel" aria-labelledby="product-tab-desc">
                                    <div class="product-desc-content">
                                        <p><?=$produ->content?></p>
                                        
                                    </div><!-- End .product-desc-content -->
                                </div><!-- End .tab-pane -->

                                <div class="tab-pane fade" id="product-tags-content" role="tabpanel" aria-labelledby="product-tab-tags">
                                    <div class="product-tags-content">
                                        
                                        <img src="{{url('/frontend')}}/assets/images/size.jpg">
                                    </div><!-- End .product-tags-content -->
                                </div><!-- End .tab-pane -->

                                <div class="tab-pane fade" id="product-reviews-content" role="tabpanel" aria-labelledby="product-tab-reviews">
                                    <div class="product-reviews-content">
                                        <div class="collateral-box">
                                           <p> Đảm bảo của chúng tôi
                                                Trả lại hoặc trao đổi trong vòng 30 ngày kể từ ngày giao hàng.

                                                Yêu cầu:
                                                1. Các mặt hàng nhận được trong vòng 30 ngày kể từ ngày giao hàng.
                                                2. Các mặt hàng nhận được không sử dụng, không bị hư hỏng và trong gói ban đầu.
                                                3. Phí vận chuyển trở lại được trả bởi người mua.
                                            </p>
                                        </div><!-- End .collateral-box -->

                                        
                                    </div><!-- End .product-reviews-content -->
                                </div><!-- End .tab-pane -->
                            </div><!-- End .tab-content -->
                        </div><!-- End .product-single-tabs -->
                    </div><!-- End .col-lg-9 -->

                    <div class="sidebar-overlay"></div>
                    <div class="sidebar-toggle"><i class="icon-sliders"></i></div>
                    <aside class="sidebar-product col-lg-3 padding-left-lg mobile-sidebar">
                        <div class="sidebar-wrapper">
                           

                            <div class="widget widget-info">
                                <ul>
                                    <li>
                                        <i class="icon-shipping"></i>
                                        <h4>Miễn phí <br>Gửi hàng</h4>
                                    </li>
                                    <li>
                                        <i class="icon-us-dollar"></i>
                                        <h4>100% Tiền<br>Hoàn trả lại</h4>
                                    </li>
                                    <li>
                                        <i class="icon-online-support"></i>
                                        <h4>Trực tuyến<br>Hỗ trợ 24/7</h4>
                                    </li>
                                </ul>
                            </div><!-- End .widget -->

                            
                        </div>
                    </aside><!-- End .col-md-3 -->
                </div><!-- End .row -->
            </div><!-- End .container -->

        </main><!-- End .main -->
@stop