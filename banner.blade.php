            <div class="info-boxes-container">
                <div class="container">
                    <div class="info-box">
                        <i class="icon-shipping"></i>

                        <div class="info-box-content">
                            <h4>GIAO HÀNG MIỄN PHÍ & TRẢ LẠI</h4>
                            <p>Giao hàng miễn phí cho tất cả các đơn hàng trên 200.000 đồng.</p>
                        </div><!-- End .info-box-content -->
                    </div><!-- End .info-box -->

                    <div class="info-box">
                        <i class="icon-us-dollar"></i>

                        <div class="info-box-content">
                            <h4>ĐẢM BẢO TRẢ LẠI TIỀN</h4>
                            <p>Đảm bảo hoàn tiền 100%</p>
                        </div><!-- End .info-box-content -->
                    </div><!-- End .info-box -->

                    <div class="info-box">
                        <i class="icon-support"></i>

                        <div class="info-box-content">
                            <h4>HỖ TRỢ TRỰC TUYẾN 24/7</h4>
                            <p>Tận tình chăm sóc.</p>
                        </div><!-- End .info-box-content -->
                    </div><!-- End .info-box -->
                </div><!-- End .container -->
            </div><!-- End .info-boxes-container -->
           
            <div class="category">
                <div class="container">
                    <div class="row">
                        @foreach($categories as $cat)
                        <div class="col-md-4 category-item">
                            <div class="banner banner-image">
                                <a href="{{route('product.list',['id'=> $cat->id , 'slug' => $cat->slug])}}">
                                <img src="{{$cat->image}}" alt="banner">
                                <div >
                                    <p class="category-title">{{$cat->name}}</p>
                                </div>
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>





<!-- 
                <div class="banners-group">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="banner banner-image">
                                <a href="{{route('product.all')}}">
                                    <img src="{{ url('/frontend') }}/assets/images/banners/banner-1.jpg" alt="banner">
                                </a>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="banner banner-image">
                                <a href="{{route('product.all')}}">
                                    <img src="{{ url('/frontend') }}/assets/images/banners/banner-2.jpg" alt="banner">
                                </a>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="banner banner-image">
                                <a href="{{route('product.all')}}">
                                    <img src="{{ url('/frontend') }}/assets/images/banners/banner-3.jpg" alt="banner">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
             -->