            <div class="header-top">
                <div class="container">
                    <div class="header-left header-dropdowns">

                        <div class="header-dropdown">
                            <a href="#"><img src="{{ url('/frontend') }}/assets/images/flags/vn.png" alt="England flag">Việt Nam</a>
                            <div class="header-menu">
                                
                            </div><!-- End .header-menu -->
                        </div><!-- End .header-dropown -->
                    </div><!-- End .header-left -->

                    <div class="header-right">

                        <div class="header-dropdown dropdown-expanded">
                            <a href="#">Links</a>
                            <div class="header-menu">
                                <ul>
                                    
                                    @if(Auth::guard('customer')->check())
                                    <li>Chào bạn {{Auth::guard('customer')->user()->name}}</li>
                                    <li><a href="{{route('history')}}">Lịch sử</a></li>
                                    <li><a href="{{route('home.logout1')}}">Đăng xuất</a></li>

                                    @else
                                    <li><a href="{{route('home.login')}}">Đăng nhập</a></li>
                                    
                                    @endif
                                    <li><a href="{{route('contact.index')}}">Liên hệ</a></li>
                                    
                                </ul>
                            </div><!-- End .header-menu -->
                        </div><!-- End .header-dropown -->
                    </div><!-- End .header-right -->
                </div><!-- End .container -->
            </div><!-- End .header-top -->