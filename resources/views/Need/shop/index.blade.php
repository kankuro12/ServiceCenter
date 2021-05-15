@extends('Need.layout')
@section('content')
    <div class="big_section">
        <div class="title">
           <span class="normal">
               Browse
            </span> 
            <span class="other"> Products</span>
        </div>
        <div class="desc py-3">
        </div>

       <div class="mt-2 mt-md-4 product-wrapper">
            <div class="row">
                @foreach ($products as $product)
                    <div class="product-container" >

                        <div class="product shadow">
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
                                <div class="price">
                                    @if ($product->onsale )
                                        <span class="new">Rs. {{floatval($product->price)}}</span>
                                    @else
                                        <span class="old">Rs. {{floatval($product->price)}}</span><span class="new">Rs. {{floatval($product->sales_price)}}</span>
                                    @endif
                                </div>
                                <div class=" add_to_cart">
                                    <div >
                                        <button class="btn btn-primary cart {{$sp!=null?(in_array($product->id,$sp)?'d-none':''):''}}" id="add_{{$product->id}}" onclick="addToCart({{$product->id}})">Add To Cart</button>
                                        <button class="btn btn-danger cart {{$sp!=null?(in_array($product->id,$sp)?'':'d-none'):'d-none'}}" id="remove_{{$product->id}}" onclick="removeFromCart({{$product->id}})">Remove From Cart</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
       </div>

    </div>
    <div  class="bottom-bar">
        <a href="{{route('n.front.book.checkout')}}" class="btn btn-primary">Got To CheckOut</a>
    </div>
@endsection
@section('css')
    <link rel="stylesheet" href="{{asset('assets/css/normal.css')}}">
@endsection
@section('js')
<script>
    function removeFromCart(id){
        $.ajax({
            type: "POST",
            url: "{{route('n.front.book.removeFromCart')}}",
            data: {
                "id":id,
                "_token":"{{csrf_token()}}"
            },
          
            success: function (response) {
                $('#remove_'+id).addClass('d-none');
                $('#add_'+id).removeClass('d-none');
            }
        });
    }

    function addToCart(id){
        $.ajax({
            type: "POST",
            url: "{{route('n.front.book.addToCart')}}",
            data: {
                "id":id,
                "_token":"{{csrf_token()}}"

            },
          
            success: function (response) {
                $('#add_'+id).addClass('d-none');
                $('#remove_'+id).removeClass('d-none');
            }
        });
    }
    
</script>

@endsection
 
 