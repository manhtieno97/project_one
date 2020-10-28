@extends('frontend.layout.master')
@section('title','List Item')
@section('main')
 <div class="featured-products-section carousel-section">
                <div class="container">
                    <h2 class="h3 title mb-4 text-center">Sản phẩm</h2>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="category_list">
                              <div class="title-cat">Danh mục sản phẩm</div>
                              <div class="list">
                                  <ul>
                                      <li>
                                           @foreach($categories as $cat)
                                            <a href="{{route('product.list',['id'=> $cat->id , 'slug' => $cat->slug])}}">{{$cat->name}}</a>
                                            @endforeach
                                      </li>
                                  </ul>
                              </div>
                            </div>
                            <div class="category_list">
                              <div class="title-cat">Danh sách thương hiệu</div>
                              <div class="list">
                                  <ul>
                                      <li>
                                           @foreach($brands as $brand)
                                            <a href="{{route('product.list',['id'=> $brand->id , 'slug' => $brand->slug])}}">{{$brand->name}}</a>
                                            @endforeach
                                      </li>
                                  </ul>
                              </div>
                            </div>
                        </div>
                        <div class=" owl-theme col-md-9">
                            <div class="row">
                                @foreach($products as $product)
                                <div class="product col-md-3 pro-all">
                                    <figure class="product-image-container">
                                        <a href="{{route('product.list',['slug' => $product->slug ,'id' => $product->id])}}" class="product-image">
                                            <img src="{{$product->image}}" alt="product" style="height:250px" >
                                        </a>
                                        
                                    </figure>
                                    <div class="product-details">
                                        <div class="ratings-container">
                                            <!-- <div class="product-ratings">
                                                <span class="ratings" style="width:80%"></span>
                                            </div> --> <!-- End .product-ratings  -->
                                        </div><!-- End .product-container -->
                                        <h2 class="product-title" style="height: 50px">
                                            <a href="{{route('product.list',['slug' => $product->slug ,'id' => $product->id])}}">{{$product->name}}</a>
                                        </h2>
                                        <div class="price-box">
                                        <p class="product-price" style="text-decoration: line-through">{{number_format($product->price)}} VNĐ</p> 
                                        <p class=" text-danger product-price">{{number_format($product->price_new)}} VNĐ</p> 
                                        
                                    </div><!-- End .price-box -->

                                        <div class="product-action">
                                            

                                            <a href="{{route('cart.add',['id'=>$product->id])}}" class="paction add-cart" title="Add to Cart">
                                                <span>Add to Cart</span>
                                            </a>

                                        </div><!-- End .product-action -->
                                    </div><!--  End .product-details -->
                                </div><!-- End .product -->
                                @endforeach
                                <div class=" paging">
                              
                              </div>
                            </div>
                            
                        </div><!-- End .featured-proucts --> 
                    </div>
                </div><!-- End .container -->
                 -->
    </div>
@stop