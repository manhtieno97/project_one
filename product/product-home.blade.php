 <div class="featured-products-section carousel-section">
                <div class="container">
                    <h2 class="h3 title mb-4 text-center">Sản phẩm nổi bật</h2>
                    
                    <div class="featured-products owl-carousel owl-theme">
                        @foreach($product as $model)
                        <div class="product">
                            <figure class="product-image-container">
                                <a href="{{route('product.list',['slug' => $model->slug ,'id' => $model->id])}}" class="product-image">
                                    <img src="{{$model->image}}" alt="product" style="height: 300px" >
                                </a>
                            </figure>
                            <div class="product-details">
                               <!--  <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:80%"></span>
                                    </div>
                                </div> --><!-- End .product-container -->
                                <h2 class="product-title" style="height: 50px">
                                    <a href="{{route('product.list',['slug' => $model->slug ,'id' => $model->id])}}">{{$model->name}}</a>
                                </h2>
                                <div class="price-box">
                                    <p class="product-price" style="text-decoration: line-through">{{number_format($model->price)}} VNĐ</p> 
                                    <p class=" text-danger product-price">{{number_format($model->price_new)}} VNĐ</p> 
                                    
                                </div><!-- End .price-box -->

                                <div class="product-action">
                               
                                    <a href="{{route('cart.add',['id'=>$model->id,'slug'=>$model->slug])}}" class="paction add-cart" title="Add to Cart">
                                        <span>Add to Cart</span>
                                    </a>

                                </div><!-- End .product-action -->
                            </div><!-- End .product-details -->
                        </div><!-- End .product -->
                       @endforeach
                    </div><!-- End .featured-proucts -->
                    
                </div><!-- End .container -->
           

            <div class="mb-5"></div><!-- margin -->

            <div class="carousel-section">
                <div class="container">
                    <h2 class="h3 title mb-4 text-center">Sản phẩm mới</h2>

                    <div class="new-products owl-carousel owl-theme">
                        @foreach($produc as $mode)
                        <div class="product">
                            <figure class="product-image-container">
                                <a href="{{route('product.list',['slug' => $mode->slug ,'id' => $mode->id])}}" class="product-image">
                                    <img src="{{$mode->image }}" alt="product" style="height: 320px">
                                </a>
                            </figure>
                            <div class="product-details">
                                <!-- <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:80%"></span>
                                    </div>
                                </div> --><!-- End .product-container -->
                                <h2 class="product-title" style="height: 50px">
                                    <a href="{{route('product.list',['slug' => $mode->slug ,'id' => $mode->id])}}">{{$mode->name}}</a>
                                </h2>
                                <div class="price-box">
                                  <p class="product-price" style="text-decoration: line-through">{{number_format($mode->price)}} VNĐ</p> 
                                    <p class=" text-danger product-price">{{number_format($mode->price_new)}} VNĐ</p> 
                                </div><!-- End .price-box -->

                                <div class="product-action">
                                    
                                    <a href="{{route('cart.add',['id'=>$mode->id,'slug'=>$mode->slug])}}" class="paction add-cart" title="Add to Cart">
                                        <span>Add to Cart</span>
                                    </a>

                                </div><!-- End .product-action -->
                            </div><!-- End .product-details -->
                        </div><!-- End .product -->
                        @endforeach
                    </div><!-- End .news-proucts -->
                </div><!-- End .container -->
            </div><!-- End .carousel-section -->

            <div class="mb-5"></div><!-- margin -->
             </div><!-- End .featured-proucts-section -->