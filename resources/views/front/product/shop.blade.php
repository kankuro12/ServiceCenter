@extends('front.layouts.app')
@section('title','All Product Items')
@section('style')
<link rel="stylesheet" href="{{url('front/css/plugins/nouislider/nouislider.css')}}">
@endsection
@section('content')
<div class="main">
    <div class="page-header text-center" style="background-image: url({{ asset('front/images/page-header-bg.jpg') }})">
        <div class="container">
            <h1 class="page-title">Shop<span>Items</span></h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav" style="margin-bottom: 0rem;">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Shop</li>
                <li class="breadcrumb-item" aria-current="page">Items</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="toolbox">
                        <div class="toolbox-left">
                            @php
                            $allProduct = \App\Product::select('id')->count();
                            @endphp
                            <div class="toolbox-info">
                                @if($allProduct < 16) Showing <span>{{ $allProduct }} of {{ $allProduct }}</span>
                                    Products
                                    @else
                                    Showing <span>16 of {{ $allProduct }}</span> Products
                                    @endif
                            </div><!-- End .toolbox-info -->
                        </div><!-- End .toolbox-left -->

                        <div class="toolbox-right">
                            <div class="toolbox-sort">
                                <label for="sortby">Sort by:</label>
                                <div class="select-custom">
                                    <form action="{{Request::fullUrl()}}" method="get">

                                        <select name="sortby" id="sortby" class="form-control"
                                            onchange="javascript:this.form.submit();">
                                            <option value="popularity" selected="selected">Item Added</option>
                                            <option value="p_desc"> Price In Descending </option>
                                        </select>
                                    </form>
                                </div>
                            </div><!-- End .toolbox-sort -->
                            <div class="toolbox-layout">
                                <a href="{{ url('shops') }}" class="btn-layout active">
                                    <svg width="16" height="10">
                                        <rect x="0" y="0" width="4" height="4" />
                                        <rect x="6" y="0" width="10" height="4" />
                                        <rect x="0" y="6" width="4" height="4" />
                                        <rect x="6" y="6" width="10" height="4" />
                                    </svg>
                                </a>

                                <a href="{{ url('shops-1') }}" class="btn-layout">
                                    <svg width="10" height="10">
                                        <rect x="0" y="0" width="4" height="4" />
                                        <rect x="6" y="0" width="4" height="4" />
                                        <rect x="0" y="6" width="4" height="4" />
                                        <rect x="6" y="6" width="4" height="4" />
                                    </svg>
                                </a>
                            </div><!-- End .toolbox-layout -->
                        </div><!-- End .toolbox-right -->
                    </div><!-- End .toolbox -->
                    <div style="margin-bottom:3rem;">
                        @include('front.layouts.message')
                    </div>

                    <div class="products mb-3">
                        @foreach ($products as $p)
                        <form action="{{ url('add-to-cart') }}" method="POST">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $p->id }}">
                            <input type="hidden" name="product_name" value="{{ $p->name }}">
                            <input type="hidden" name="product_code" value="{{ $p->code }}">
                            <input type="hidden" name="product_image" value="{{ $p->feature_image }}">
                            <input type="hidden" name="qty" value="1">
                            <div class="product product-list">
                                <div class="row">
                                    <div class="col-6 col-lg-3">
                                        <figure class="product-media">
                                            @if($p->onsale==1)
                                            <span class="product-label label-sale">-{{ $p->discount() }}%</span>
                                            @endif
                                            @php
                                            $current_date = date('yy-m-d');
                                            @endphp
                                            @if ($current_date < $p->newProduct())
                                                <span class="product-label label-new">New</span>
                                                @else
                                                <span class="product-label label-sale">Sale</span>
                                                @endif
                                                <a href="{{ url('product/detail/'.$p->id) }}">
                                                    <img src="{{ asset('back/images/product/'.$p->feature_image) }}"
                                                        alt="Product image" class="product-image">
                                                </a>
                                        </figure><!-- End .product-media -->
                                    </div><!-- End .col-sm-6 col-lg-3 -->

                                    <div class="col-6 col-lg-3 order-lg-last">
                                        <div class="product-list-action">
                                            <div class="product-price">
                                                <span class="new-price">NPR.{{ $p->sales_price}}</span>
                                                @if ($p->sales_price < $p->price)
                                                    <span
                                                        class="font-weight-light line-through">NPR.{{ $p->price }}</span>
                                                    @endif
                                            </div><!-- End .product-price -->
                                            <div class="ratings-container">
                                                <div class="ratings">
                                                    <div class="ratings-val" style="width: 20%;"></div>
                                                    <!-- End .ratings-val -->
                                                </div><!-- End .ratings -->
                                                <span class="ratings-text">( 2 Reviews )</span>
                                            </div><!-- End .rating-container -->

                                            <div class="product-action">
                                                <a href="{{ url('add-to-withlist',$p->id) }}"
                                                    class="btn-product btn-wishlist text-white" title="Add to wishlist"
                                                    style="background: #E88C36; padding:3px;"><span>add to
                                                        wishlist</span></a>
                                            </div><!-- End .product-action -->
                                            @if ($p->type == 0)
                                            @php
                                            $stockCount = \App\Simplestock::where('product_id',$p->id)->count();
                                            $stockCheck = \App\Simplestock::where('product_id',$p->id)->first();
                                            @endphp
                                            @if ($stockCount>0)
                                            @if($stockCheck->total>0)
                                            <button class="btn-product btn-cart" style="width:500px;"><span>add to
                                                    cart</span></button>
                                            @else
                                            <button disabled="disabled" class="btn btn-danger">Sorry! Out Of
                                                Stock</button>
                                            @endif
                                            @else
                                            <button disabled="disabled" class="btn btn-danger">Sorry! Out Of
                                                Stock</button>
                                            @endif
                                            @else
                                            <a href="{{ url('product/detail/'.$p->id) }}"
                                                class="btn-product btn-cart"><span>View Detail</span></a>
                                            @endif
                                        </div><!-- End .product-list-action -->
                                    </div><!-- End .col-sm-6 col-lg-3 -->

                                    <div class="col-lg-6">
                                        <div class="product-body product-action-inner">
                                            <div class="product-cat">
                                                <a
                                                    href="{{ url('shops-by-category',$p->category->id) }}">{{ $p->category->name }}</a>
                                            </div><!-- End .product-cat -->
                                            <h3 class="product-title"><a
                                                    href="{{ url('product/detail/'.$p->id) }}">{{ $p->name }}</a></h3>
                                            <!-- End .product-title -->

                                            <div class="product-content">
                                                <p>{{ $p->short_detail }}</p>
                                            </div><!-- End .product-content -->
                                            @php
                                            $g_image = \App\Productimage::where('product_id',$p->id)->get();
                                            @endphp
                                            <div class="product-nav product-nav-thumbs">
                                                @foreach ($g_image as $i)
                                                <a href="#" class="active">
                                                    <img src="{{ asset('back/images/gallery/'.$i->image) }}"
                                                        alt="product gallery">
                                                </a>
                                                @endforeach
                                            </div><!-- End .product-nav -->
                                        </div><!-- End .product-body -->
                                    </div><!-- End .col-lg-6 -->
                                </div><!-- End .row -->
                            </div><!-- End .product -->
                        </form>
                        @endforeach
                    </div><!-- End .products -->

                    <nav aria-label="Page navigation">
                        <div class="pagination">
                            {{ $products->links() }}
                        </div>
                    </nav>
                </div><!-- End .col-lg-9 -->
                @include('front.product.filter')
            </div><!-- End .row -->
        </div><!-- End .container -->
    </div><!-- End .page-content -->





</div>
@php
if($max==-1){
$max=$products->max('price');
}
if($min==-1){
$min=$products->min('price');
}
@endphp
@endsection

@section('scripts')
<script src="{{url('front/js/nouislider.min.js')}}"></script>
<script src="{{url('front/js/wNumb.js')}}"></script>
<script>
    if ( typeof noUiSlider === 'object' ) {
    var priceSlider = document.getElementById('price-slider');

    // Check if #price-slider elem is exists if not return
    // to prevent error logs
    noUiSlider.create(priceSlider, {
    start: [{{$min}} , {{$max}} ],
    connect: true,
    step: 50,
    margin: 200,
    range: {
    'min': {{\App\Product::min('price')}},
    'max': {{\App\Product::max('price')}}
    },
    tooltips: true,
    format: wNumb({
    decimals: 0,
    prefix: ''
    })
    });

    // Update Price Range
    priceSlider.noUiSlider.on('update', function( values, handle ){
        console.log(values);
        html='<input type="hidden" name="min" value="'+values[0]+'" />';
        html+='<input type="hidden" name="max" value="'+values[1]+'" />';
        html+='Rs. '+values[0]+' - '+'Rs. '+values[1];
    $('#filter-price-range').html(html);
    });

    priceSlider.noUiSlider.on('end', function( values, handle ){
        console.log("end",values);
        $('#filter').submit();
    });
    }
</script>
@endsection
