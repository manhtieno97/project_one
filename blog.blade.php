@extends('frontend.layout.master')
@section('title','Porto Blog')
@section('main')

            <div class="blog-section">
                <div class="container">
                    <h2 class="h3 title text-center">Blog</h2>

                    <div class="blog-carousel owl-carousel owl-theme">
                        <article class="entry">
                            <div class="entry-media">
                                <a href="single.html">
                                    <img src="{{ url('/frontend') }}/assets/images/blog/home/post-1.png" alt="Post">
                                </a>
                                <div class="entry-date">29<span>Now</span></div><!-- End .entry-date -->
                            </div><!-- End .entry-media -->

                            <div class="entry-body">
                                <h3 class="entry-title">
                                    <a href="single.html">Bộ sưu tập mới</a>
                                </h3>
                                <div class="entry-content">
                                    <p>Hàng mới nhập xu hướng mới nhất 2019....</p>

                                    <a href="{{route('single')}}" class="btn btn-dark">Đọc thêm</a>
                                </div><!-- End .entry-content -->
                            </div><!-- End .entry-body -->
                        </article><!-- End .entry -->

                        <article class="entry">
                            <div class="entry-media">
                                <a href="single.html">
                                    <img src="{{ url('/frontend') }}/assets/images/blog/home/post-2.png" alt="Post">
                                </a>
                                <div class="entry-date">30 <span>Now</span></div><!-- End .entry-date -->
                            </div><!-- End .entry-media -->

                            <div class="entry-body">
                                <h3 class="entry-title">
                                    <a href="single.html">Xu hướng thời trang</a>
                                </h3>
                                <div class="entry-content">
                                    <p>Hàng mới nhập xu hướng mới nhất 2019....</p>

                                    <a href="single.html" class="btn btn-dark">Đọc thêm</a>
                                </div><!-- End .entry-content -->
                            </div><!-- End .entry-body -->
                        </article><!-- End .entry -->

                        <article class="entry">
                            <div class="entry-media">
                                <a href="single.html">
                                    <img src="{{ url('/frontend') }}/assets/images/blog/home/post-3.png" alt="Post">
                                </a>
                                <div class="entry-date">28 <span>Now</span></div><!-- End .entry-date -->
                            </div><!-- End .entry-media -->

                            <div class="entry-body">
                                <h3 class="entry-title">
                                    <a href="single.html">Thời trang nữ</a>
                                </h3>
                                <div class="entry-content">
                                    <p>Hàng mới nhập xu hướng mới nhất 2019....</p>

                                    <a href="{{route('single')}}" class="btn btn-dark">Đọc thêm</a>
                                </div><!-- End .entry-content -->
                            </div><!-- End .entry-body -->
                        </article><!-- End .entry -->
                    </div><!-- End .blog-carousel -->
                </div><!-- End .container -->
            </div><!-- End .blog-section -->
@stop