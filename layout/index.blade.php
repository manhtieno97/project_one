@extends('frontend.layout.master')
@section('title','Home')
@section('main')
@include('frontend.slide')
@include('frontend.banner')
@include('frontend.product.product-home')
	 <main class="main">
            <div class="info-section">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="feature-box feature-box-simple text-center">
                                <i class="icon-earphones-alt"></i>

                                <div class="feature-box-content">
                                    <h3>Hỗ trợ khách hàng<span>Cần sự trợ giúp?</span></h3>
                                    <p>Nếu bạn gặp rắc rối hay thắng mắc gì hãy liên hệ với chúng tôi.</p>
                                </div><!-- End .feature-box-content -->
                            </div><!-- End .feature-box -->
                        </div><!-- End .col-md-4 -->
                        
                        <div class="col-md-4">
                            <div class="feature-box feature-box-simple text-center">
                                <i class="icon-credit-card"></i>

                                <div class="feature-box-content">
                                    <h3>Thanh toán bảo đảm <span>An toàn & nhanh chóng</span></h3>
                                    <p>Bạn có thể thanh toán theo phương thuwcs trả tiền mặt </p>
                                </div><!-- End .feature-box-content -->
                            </div><!-- End .feature-box -->
                        </div><!-- End .col-md-4 -->

                        <div class="col-md-4">
                            <div class="feature-box feature-box-simple text-center">
                                <i class="icon-action-undo"></i>

                                <div class="feature-box-content">
                                    <h3>Trả về<span>Dễ dàng và miễn phí</span></h3>
                                    <p>Nếu hàng bị hỏng hay không đúng yêu cầu bạn có thể trả hàng.</p>
                                </div><!-- End .feature-box-content -->
                            </div><!-- End .feature-box -->
                        </div><!-- End .col-md-4 -->
                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .info-section -->

            <div class="promo-section" style="background-image: url(assets/images/promo-bg.jpg)">
                <div class="container">
                    <h3>Bộ sưu tập trình diễn thời trang</h3>
                    <a href="{{route('product.all')}}" class="btn btn-dark">Mua ngay</a>
                </div><!-- End .container -->
            </div><!-- End .promo-section -->

            <div class="partners-container">
                <div class="container">
                    <div class="partners-carousel owl-carousel owl-theme">
                        <a href="#" class="partner">
                            <img src="{{ url('/frontend') }}/assets/images/logos/1.png" alt="logo">
                        </a>
                        <a href="#" class="partner">
                            <img src="{{ url('/frontend') }}/assets/images/logos/2.png" alt="logo">
                        </a>
                        <a href="#" class="partner">
                            <img src="{{ url('/frontend') }}/assets/images/logos/3.png" alt="logo">
                        </a>
                        <a href="#" class="partner">
                            <img src="{{ url('/frontend') }}/assets/images/logos/4.png" alt="logo">
                        </a>
                        <a href="#" class="partner">
                            <img src="{{ url('/frontend') }}/assets/images/logos/5.png" alt="logo">
                        </a>
                        <a href="#" class="partner">
                            <img src="{{ url('/frontend') }}/assets/images/logos/2.png" alt="logo">
                        </a>
                        <a href="#" class="partner">
                            <img src="{{ url('/frontend') }}/assets/images/logos/1.png" alt="logo">
                        </a>
                    </div><!-- End .partners-carousel -->
                </div><!-- End .container -->
            </div><!-- End .partners-container -->

            
        </main><!-- End .main -->
@stop