<div class="header-bottom sticky-header">
    <div class="container">
        <nav class="main-nav">
            <ul class="menu sf-arrows">
                <li class="active"><a href="{{route('frontend.layout')}}">Trang chủ</a></li>
                <li>
                    <a href="#" class="sf-with-ul">Danh mục sản phẩm</a>
                    <div class="megamenu megamenu-fixed-width">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="menu-title">
                                            @foreach($categories as $cat)
                                            <a href="{{route('product.list',['id'=> $cat->id , 'slug' => $cat->slug])}}">{{$cat->name}}</a>
                                            @endforeach
                                        </div>
                                    </div><!-- End .col-lg-6 -->
                                    
                                </div><!-- End .row -->
                            </div><!-- End .col-lg-8 -->

                        </div>
                    </div><!-- End .megamenu -->
                </li>
                <li>
                    <a href="#" class="sf-with-ul">Thương hiệu</a>
                    <div class="megamenu megamenu-fixed-width ">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="menu-title">
                                            @foreach($brands as $bra)
                                            <a href="{{route('product.list',['id'=> $bra->id , 'slug' => $bra->slug])}}">{{$bra->name}}</a>
                                            @endforeach
                                        </div>
                                    </div><!-- End .col-lg-6 -->
                                    
                                </div><!-- End .row -->
                            </div><!-- End .col-lg-8 -->

                        </div>
                    </div><!-- End .megamenu -->
                </li>
                <li class=""><a href="{{route('about.index')}}">Về chúng tôi</a></li>
                <li class=""><a href="{{route('contact.index')}}">Liên hệ</a></li>
            </ul>
        </nav>
    </div><!-- End .header-bottom -->
</div><!-- End .header-bottom -->
            <div class="text-center">
                @if (Session::has('success'))
              <p class="alert alert-success">{{Session::get('success')}}</p>
            @endif
            @if (Session::has('error'))
              <p class="alert alert-danger">{{Session::get('error')}}</p>
            @endif
            </div>