            <div class="home-slider-container">
                <div class="home-slider owl-carousel owl-theme owl-theme-light">
                    <div class="home-slide">
                        <div class="slide-bg owl-lazy"  data-src="{{ url('/frontend') }}/assets/images/slider/slide-1.jpg"></div><!-- End .slide-bg -->
                        <div class="container">
                            <div class="home-slide-content">
                                <div class="slide-border-top">
                                    <img src="{{ url('/frontend') }}/assets/images/slider/border-top.png" alt="Border" width="290" height="38">
                                </div><!-- End .slide-border-top -->
                                <h3>Mới nhất </h3>
                                <h1>Thời trang hiện đại</h1>
                                <a href="{{route('product.all')}}" class="btn btn-primary">Mua ngay</a>
                                <div class="slide-border-bottom">
                                    <img src="{{ url('/frontend') }}/assets/images/slider/border-bottom.png" alt="Border" width="290" height="111">
                                </div><!-- End .slide-border-bottom -->
                            </div><!-- End .home-slide-content -->
                        </div><!-- End .container -->
                    </div><!-- End .home-slide -->

                    <div class="home-slide">
                        <div class="slide-bg owl-lazy"  data-src="{{ url('/frontend') }}/assets/images/slider/slide-2.jpg"></div><!-- End .slide-bg -->
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6 offset-md-6">
                                    <div class="home-slide-content slide-content-big">
                                        <h3>Phong cách</h3>
                                        <h1>Tùy chọn thỏa thích</h1>
                                        <a href="{{route('product.all')}}" class="btn btn-primary">Mua ngay</a>
                                    </div><!-- End .home-slide-content -->
                                </div><!-- End .col-lg-5 -->
                            </div><!-- End .row -->
                        </div><!-- End .container -->
                    </div><!-- End .home-slide -->
                </div><!-- End .home-slider -->
            </div><!-- End .home-slider-container -->
