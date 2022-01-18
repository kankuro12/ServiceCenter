<h4 class="text-center mt-5">
    Our Products
</h4>

<div class="row justify-content-center mt-5 mb-2">

    @foreach ($products as $product)
    <div class="product-container cat_{{$product->category_id}}" >

        <div class="product shadow " >
            <div class="top">
                <div class="img-container"></div>
                <div class="img">
                    <img class="w-100" src="{{asset('/back/images/product/'.$product->feature_image)}}" alt="">
                </div>
            </div>
            <div class="bottom">
                <div class="title">
                    {{$product->name}}
                </div>
                <div class="add_to_cart">
                    <div class="pb-4">
                        <div class="price">
                            @if ($product->onsale == 0 )
                                <span class="new">Rs. {{floatval($product->price)}}</span>
                            @else
                                <span class="old">Rs. {{floatval($product->price)}}</span><span class="new">Rs. {{floatval($product->sales_price)}}</span>
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
<div class="pb-5 text-center">
    <a href="{{route('n.front.book.shop')}}" class="btn btn-primary">
        Shop Now
    </a>
</div>

