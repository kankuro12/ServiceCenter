<aside class="col-lg-3 order-lg-first" style="margin-top: 18px;">
    <form action="" method="GET" id="filter">
        <div class="sidebar sidebar-shop">
            <div class="widget widget-clean">
                <label>Filters:</label>
                <a href="/shops">Clean All</a>
            </div><!-- End .widget widget-clean -->


            <div class="widget widget-collapsible">
                <h3 class="widget-title">
                    <a data-toggle="collapse" href="#widget-1" role="button" aria-expanded="true"
                        aria-controls="widget-1">
                        Category
                    </a>
                </h3><!-- End .widget-title -->

                <div class="collapse show" id="widget-1">
                    <div class="widget-body">
                        <div class="filter-items filter-items-count">
                            @foreach (\App\Category::all() as $cat)

                            <div class="filter-item">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" onchange="javascript:this.form.submit();" name="cat[]"
                                        value="{{ $cat->id }}" class="custom-control-input" id="cat-{{ $cat->id }}"
                                        @if(in_array($cat->id,$selcats)) checked @endif>
                                    <label class="custom-control-label"
                                        for="cat-{{ $cat->id }}">{{ $cat->name }}</label>
                                </div><!-- End .custom-checkbox -->
                                <span class="item-count">{{ $cat->productCount() }}</span>
                            </div><!-- End .filter-item -->

                            @endforeach
                        </div><!-- End .filter-items -->
                    </div><!-- End .widget-body -->
                </div><!-- End .collapse -->
            </div><!-- End .widget -->


            <div class="widget widget-collapsible">
                <h3 class="widget-title">
                    <a data-toggle="collapse" href="#widget-2" role="button" aria-expanded="true"
                        aria-controls="widget-2">
                        Product Color
                    </a>
                </h3><!-- End .widget-title -->
                <div class="collapse show" id="widget-2">
                    <div class="widget-body">
                        <div class="filter-items">
                            @foreach (\App\Color::all() as $item)

                            <div class="filter-item">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="color[]" value="{{ $item->id }}"
                                        onchange="javascript:this.form.submit();" class="custom-control-input"
                                        id="color-{{ $item->id }}" @if(in_array($item->id,$selcolors)) checked @endif>
                                    <label class="custom-control-label"
                                        for="color-{{ $item->id }}">{{ $item->name }}</label>
                                </div><!-- End .custom-checkbox -->
                            </div><!-- End .filter-item -->

                            @endforeach
                        </div><!-- End .filter-items -->
                    </div><!-- End .widget-body -->
                </div><!-- End .collapse -->
            </div><!-- End .widget -->


            <div class="widget widget-collapsible">
                <h3 class="widget-title">
                    <a data-toggle="collapse" href="#widget-2" role="button" aria-expanded="true"
                        aria-controls="widget-2">
                        Product Sizes
                    </a>
                </h3><!-- End .widget-title -->
                <div class="collapse show" id="widget-2">
                    <div class="widget-body">
                        <div class="filter-items">
                            @foreach (\App\Size::all() as $item)

                            <div class="filter-item">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="size[]" value="{{ $item->id }}"
                                        onchange="javascript:this.form.submit();" class="custom-control-input"
                                        id="size-{{ $item->id }}" @if(in_array($item->id,$selsizes)) checked @endif>
                                    <label class="custom-control-label"
                                        for="size-{{ $item->id }}">{{ $item->name }}</label>
                                </div><!-- End .custom-checkbox -->
                            </div><!-- End .filter-item -->

                            @endforeach
                        </div><!-- End .filter-items -->
                    </div><!-- End .widget-body -->
                </div><!-- End .collapse -->
            </div><!-- End .widget -->

            <div class="widget widget-collapsible">
                <h3 class="widget-title">
                    <a data-toggle="collapse" href="#widget-4" role="button" aria-expanded="true"
                        aria-controls="widget-4">
                        Brand
                    </a>
                </h3><!-- End .widget-title -->

                <div class="collapse show" id="widget-4">
                    <div class="widget-body">
                        <div class="filter-items">
                            @foreach (\App\Brand::all() as $item)

                            <div class="filter-item">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="brand[]" value="{{ $item->id }}"
                                        onchange="javascript:this.form.submit();" class="custom-control-input"
                                        id="brand-{{ $item->id }}" @if(in_array($item->id,$selbrands)) checked @endif>
                                    <label class="custom-control-label"
                                        for="brand-{{ $item->id }}">{{ $item->name }}</label>
                                </div><!-- End .custom-checkbox -->
                            </div><!-- End .filter-item -->

                            @endforeach
                        </div><!-- End .filter-items -->
                    </div><!-- End .widget-body -->
                </div><!-- End .collapse -->
            </div><!-- End .widget -->

            <div class="widget widget-collapsible">
                <h3 class="widget-title">
                    <a data-toggle="collapse" href="#widget-5" role="button" aria-expanded="true"
                        aria-controls="widget-5">
                        Price
                    </a>
                </h3><!-- End .widget-title -->

                <div class="collapse show" id="widget-5">
                    <div class="widget-body">
                        <div class="filter-price">
                            <div class="filter-price-text">
                                Price Range:
                                <span id="filter-price-range"></span>
                            </div><!-- End .filter-price-text -->

                            <div id="price-slider"></div><!-- End #price-slider -->
                        </div><!-- End .filter-price -->
                    </div><!-- End .widget-body -->
                </div><!-- End .collapse -->
            </div><!-- End .widget -->
        </div><!-- End .sidebar sidebar-shop -->
    </form>
</aside><!-- End .col-lg-3 -->
