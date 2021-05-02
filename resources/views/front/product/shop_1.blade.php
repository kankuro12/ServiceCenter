@extends('front.layouts.app')
@section('title','All Product Items')
@section('content')
<div class="main">
    <div class="page-header text-center" style="background-image: url({{ asset('front/images/page-header-bg.jpg') }})">
        <div class="container">
            <h1 class="page-title">Shop<span>Items</span></h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav" style="margin-bottom: 0rem;" >
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
                                @if($allProduct < 16)
                                    Showing <span>{{ $allProduct }} of {{ $allProduct }}</span> Products
                                @else
                                   Showing <span>16 of {{ $allProduct }}</span> Products
                                @endif
                            </div><!-- End .toolbox-info -->
                        </div><!-- End .toolbox-left -->

                        <div class="toolbox-right">
                            <div class="toolbox-sort">
                                <label for="sortby">Sort by:</label>
                                <div class="select-custom">
                                    <form action="{{ url('price-short') }}" method="POST">
                                        @csrf
                                        <select name="sortby" id="sortby" class="form-control" onchange="javascript:this.form.submit();">
                                            <option value="popularity" selected="selected">Select Option</option>
                                            <option value="desc"> Price In Descending </option>
                                        </select>
                                    </form>
                                </div>
                            </div><!-- End .toolbox-sort -->
                            <div class="toolbox-layout">
                                <a href="{{ url('shops') }}" class="btn-layout">
                                    <svg width="16" height="10">
                                        <rect x="0" y="0" width="4" height="4" />
                                        <rect x="6" y="0" width="10" height="4" />
                                        <rect x="0" y="6" width="4" height="4" />
                                        <rect x="6" y="6" width="10" height="4" />
                                    </svg>
                                </a>

                                <a href="{{ url('shops-1') }}" class="btn-layout active">
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

                    <div class="products mb-3">
                        <div class="row justify-content-center">
                            @foreach ($products as $p)
                                <div class="col-6 col-md-4 col-lg-4 col-xl-3">
                                        <div class="product product-7 text-center">
                                            <figure class="product-media">
                                               @if($p->sales_price < $p->price)
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
                                                    <img src="{{ asset('back/images/product/'.$p->feature_image) }}" alt="Product image" class="product-image">
                                                </a>

                                                <div class="product-action-vertical">
                                                    @if(empty(Auth::check()))
                                                        <span class="btn-product-icon btn-wishlist"><sup>{{ $p->withlistCount() }}</sup></span>
                                                    @else
                                                       {!! $p->withlistProductId() !!} 
                                                    @endif
                                                </div><!-- End .product-action-vertical -->

                                                <div class="product-action" style="margin-bottom: 6px;">
                                                        <a href="{{ url('product/detail/'.$p->id) }}" title="View Detail" class="btn-product btn-cart"><span>View Detail</span></a>
                                                </div><!-- End .product-action -->
                                            </figure><!-- End .product-media -->

                                            <div class="product-body">
                                                <div class="product-cat">
                                                    <a href="{{ url('shops-by-category',$p->category->id) }}">{{ $p->category->name }}</a>
                                                </div><!-- End .product-cat -->
                                                <h3 class="product-title"><a href="{{ url('product/detail/'.$p->id) }}">{{ $p->name }}</a></h3><!-- End .product-title -->
                                                <div class="product-price">
                                                    <span class="new-price">NPR.{{ $p->sales_price }}</span>
                                                    @if ($p->sales_price < $p->price)
                                                        <span class="font-weight-light line-through"> NPR.{{ $p->price }}</span>
                                                    @endif
                                                </div><!-- End .product-price -->
                                                <div class="ratings-container">
                                                    <div class="ratings">
                                                        <div class="ratings-val" style="width: 20%;"></div><!-- End .ratings-val -->
                                                    </div><!-- End .ratings -->
                                                    <span class="ratings-text">( 2 Reviews )</span>
                                                </div><!-- End .rating-container -->
                                                   @php
                                                     $g_image = \App\Productimage::where('product_id',$p->id)->get();
                                                   @endphp
                                                <div class="product-nav product-nav-thumbs">
                                                    @foreach ($g_image as $i)
                                                        <a href="#" class="active">
                                                            <img src="{{ asset('back/images/gallery/'.$i->image) }}" alt="product gallery">
                                                        </a>
                                                    @endforeach
                                                </div><!-- End .product-nav -->
                                            </div><!-- End .product-body -->
                                        </div><!-- End .product -->
                                </div><!-- End .col-sm-6 col-lg-4 col-xl-3 -->
                            @endforeach 
                        </div><!-- End .row -->
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
