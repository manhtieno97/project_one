 @foreach($products as $product)
                                <div class="product col-md-4">
                                    <figure class="product-image-container">
                                        <a href="{{route('product.list',['slug' => $product->slug ,'id' => $product->id])}}" class="product-image">
                                            <img src="{{$product->image}}" alt="product" style="height:300px" >
                                        </a>
                                        
                                    </figure>
                                    <div class="product-details">
                                        <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:80%"></span><!-- End .ratings -->
                                            </div> <!-- End .product-ratings  -->
                                        </div><!-- End .product-container -->
                                        <h2 class="product-title" style="height: 50px">
                                            <a href="{{route('product.list',['slug' => $product->slug ,'id' => $product->id])}}">{{$product->name}}</a>
                                        </h2>
                                        <div class="price-box">
                                            <span class="product-price">{{number_format($product->price)}} VNĐ</span> 
                                            
                                        </div><!-- End .price-box -->

                                        <div class="product-action">
                                            

                                            <a href="{{route('cart.add',['id'=>$product->id])}}" class="paction add-cart" title="Add to Cart">
                                                <span>Add to Cart</span>
                                            </a>

                                        </div><!-- End .product-action -->
                                    </div><!--  End .product-details -->
                                </div><!-- End .product -->
                                @endforeach