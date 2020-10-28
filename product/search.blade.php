@extends('frontend.layout.master')
@section('title','List Item')
@section('main')
 <div class="featured-products-section carousel-section">
                <div class="container">
                    <h2 class="h3 title mb-4 text-center">Product</h2>
                    <div class="featured-products owl-carousel owl-theme">
                        @foreach($products as $prod)
                        <div class="product">
                            <figure class="product-image-container">
                                <a href="{{route('product.list',['slug' => $prod->slug ,'id' => $prod->id])}}" class="product-image">
                                    <img src="{{$prod->image}}" alt="product" style="height: 300px">
                                </a>
                             
                            </figure>
                            <div class="product-details">
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:80%"></span><!-- End .ratings -->
                                    </div><!-- End .product-ratings -->
                                </div><!-- !-- End .product-container -->
                                <h2 class="product-title" style="height: 50px">
                                    <a href="product.html">{{$prod->name}}</a>
                                </h2>
                                <div class="price-box">
                                   <p class="product-price" style="text-decoration: line-through">{{number_format($prod->price)}} VNĐ</p> 
                                    <p class=" text-danger product-price">{{number_format($prod->price_new)}} VNĐ</p> 
                                    
                                </div><!-- End .price-box -->

                                <div class="product-action">
                                   

                                    <a href="{{route('cart.add',['id'=>$prod->id,'slug' => $prod->slug])}}" class="paction add-cart" title="Add to Cart">
                                        <span>Add to Cart</span>
                                    </a>

                                
                                </div><!-- End .product-action -->
                            </div><!-- End .product-details -->
                        </div><!-- End .product -->
                        @endforeach
                    </div><!-- End .featured-proucts --> 
                    
                </div><!-- End .container -->
            </div>
@stop