<?php

namespace App\Http\Controllers;

use App\Brand;
use Illuminate\Http\Request;
use App\Category;
use App\Color;
use App\Product;
use App\Size;
use App\Stock;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{

    public function productShop(Request $request)
    {
        $cats = Category::with('subcat')->where('parent_id', 0)->get();
        $products = Product::where('id', '>', 0);
        $selcats = [];
        $selcolors = [];
        $selbrands = [];
        $selsizes = [];
        $max = -1;
        $min = -1;

        if ($request->has('color') && !($request->has('size'))) {
            $selcolors = $request->color;
            $stocks = Stock::whereIn('color_id', $selcolors)->select('product_id')->distinct()->get();
            $products = $products->whereIn('id', $stocks);
        } else if ($request->has('color') && $request->has('size')) {
            $selcolors = $request->color;
            $selsizes = $request->size;
            $stocks = Stock::whereIn('color_id', $selcolors)->whereIn('size_id', $selsizes)->select('product_id')->distinct()->get();
            $products = $products->whereIn('id', $stocks);
        } else if (!($request->has('color')) && $request->has('size')) {
            $selcolors = $request->color;
            $selsizes = $request->size;
            $stocks = Stock::whereIn('size_id', $selsizes)->select('product_id')->distinct()->get();
            $products = $products->whereIn('id', $stocks);
        }

        if ($request->has('cat')) {
            $selcats = $request->cat;
            $products = $products->whereIn('category_id', $selcats);
        }
        if ($request->has('brand')) {
            $selbrands = $request->brand;
            $products = $products->whereIn('brand_id', $selbrands);
        }
        if ($request->has('max')) {
            $max = $request->max;
            $min = $request->min;
            $products = $products->where('price', '>=', $request->min)->where('price', '<=', $request->max);
        }

        $products = $products->paginate(15)->appends(request()->query());
        // dd(compact('cats', 'products', 'selbrands', 'selcats', 'selcolors', 'selsizes', 'min', 'max'));
        return view('front.product.shop', compact('cats', 'products', 'selbrands', 'selcats', 'selcolors', 'selsizes', 'min', 'max'));
    }

    public function productShop_1(Request $request)
    {
        $cats = Category::with('subcat')->where('parent_id', 0)->get();
        $products = Product::where('id', '>', 0);
        $selcats = [];
        $selcolors = [];
        $selbrands = [];
        $selsizes = [];
        $max = -1;
        $min = -1;

        if ($request->has('color') && !($request->has('size'))) {
            $selcolors = $request->color;
            $stocks = Stock::whereIn('color_id', $selcolors)->select('product_id')->distinct()->get();
            $products = $products->whereIn('id', $stocks);
        } else if ($request->has('color') && $request->has('size')) {
            $selcolors = $request->color;
            $selsizes = $request->size;
            $stocks = Stock::whereIn('color_id', $selcolors)->whereIn('size_id', $selsizes)->select('product_id')->distinct()->get();
            $products = $products->whereIn('id', $stocks);
        } else if (!($request->has('color')) && $request->has('size')) {
            $selcolors = $request->color;
            $selsizes = $request->size;
            $stocks = Stock::whereIn('size_id', $selsizes)->select('product_id')->distinct()->get();
            $products = $products->whereIn('id', $stocks);
        }

        if ($request->has('cat')) {
            $selcats = $request->cat;
            $products = $products->whereIn('category_id', $selcats);
        }
        if ($request->has('brand')) {
            $selbrands = $request->brand;
            $products = $products->whereIn('brand_id', $selbrands);
        }
        if ($request->has('max')) {
            $max = $request->max;
            $min = $request->min;
            $products = $products->where('price', '>=', $request->min)->where('price', '<=', $request->max);
        }

        $products = $products->paginate(15)->appends(request()->query());
        // dd(compact('cats', 'products', 'selbrands', 'selcats', 'selcolors', 'selsizes', 'min', 'max'));
        return view('front.product.shop_1', compact('cats', 'products', 'selbrands', 'selcats', 'selcolors', 'selsizes', 'min', 'max'));
        
    }

    public function productShopByCategory($id)
    {
        $catName = Category::where('id', $id)->first();
        $cats = Category::with('subcat')->where('parent_id', 0)->get();
        $products = Product::where('category_id', $id)->where('onsale', 1)->latest()->paginate(16);
        $productCount = Product::where('category_id', $id)->where('onsale', 1)->count();
        return view('front.product.category_wise', compact('cats', 'products', 'productCount', 'catName'));
    }

    public function productShopByBrand($id)
    {
        $brandName = Brand::where('id', $id)->first();
        $cats = Category::with('subcat')->where('parent_id', 0)->get();
        $products = Product::where('brand_id', $id)->where('onsale', 1)->latest()->paginate(16);
        $productCount = Product::where('brand_id', $id)->where('onsale', 1)->count();
        return view('front.product.brand_wise', compact('cats', 'products', 'productCount', 'brandName'));
    }

    public function productDetail($id)
    {
        $cats = Category::with('subcat')->where('parent_id', 0)->get();
        $product = Product::where('id', $id)->first();
        $c_id = Stock::where('product_id', $id)->select('color_id')->get();
        $colors = Color::whereIn('id', $c_id)->get();
        // dd(compact('cats', 'product', 'colors'));
        return view('front.product.single', compact('cats', 'product', 'colors'));
    }

    // price by Size

    public function priceBySize($id)
    {
        $size = Size::where('id', $id)->select('price')->first();
        return response()->json($size);
    }

    // stock check by size

    public function stockGetBySize($product_id, $size_id)
    {
        if (Stock::where('size_id', $size_id)->count() > 0) {
            $stock = Stock::where('product_id', $product_id)->where('size_id', $size_id)->first();
            $tot = $stock->total;
            return response()->json($tot);
        } else {
            return response()->json(0);
        }
    }

    // get size by color

    public function getSizeByColor($color_id, $id)
    {
        $s_ids = Stock::where('product_id', $id)->where('total', '>', 0)->where('color_id', $color_id)->select('size_id')->get();
        $size = Size::whereIn('id', $s_ids)->get();
        return response()->json($size);
    }

    // get price by size 
    public function getPriceBySize($color_id, $size_id, $product_id){
            $stockPrice = Stock::where(['color_id' => $color_id, 'size_id' => $size_id, 'product_id' => $product_id])->select('price','saleprice')->first();
            return response()->json($stockPrice);
    }


    // search product
    public function searchProduct(Request $request)
    {
        // dd($request->all());
        $cats = Category::with('subcat')->where('parent_id', 0)->get();
        if ($request->isMethod('post')) {
            if ($request->has('cat')) {
                $productItem = Product::where('name', 'like', '%' . $request->search . '%')->orwhere('tag', 'like', '%' . $request->search . '%')->orwhere('short_detail', 'like', '%' . $request->search . '%')->where('category_id', $request->cat)->where('onsale', 1)->get();
                $productCount = Product::where('name', 'like', '%' . $request->search . '%')->orwhere('tag', 'like', '%' . $request->search . '%')->orwhere('short_detail', 'like', '%' . $request->search . '%')->where('category_id', $request->cat)->where('onsale', 1)->count();
            } else {
                $productItem = Product::where('name', 'like', '%' . $request->search . '%')->orwhere('tag', 'like', '%' . $request->search . '%')->orwhere('short_detail', 'like', '%' . $request->search . '%')->where('onsale', 1)->get();
                $productCount = Product::where('name', 'like', '%' . $request->search . '%')->orwhere('tag', 'like', '%' . $request->search . '%')->orwhere('short_detail', 'like', '%' . $request->search . '%')->where('onsale', 1)->count();
            }
            return view('front.product.search')->with(compact('cats', 'productItem', 'productCount'));
        } else {
            return view('front.product.search')->with(compact('cats'));
        }
    }


    // product fileter

    public function colorFilter(Request $request)
    {
        // dd($request->all());
        $cats = Category::with('subcat')->where('parent_id', 0)->get();
        $color = Color::where('id', $request->color_id)->first();
        $size = Size::where('id', $request->size_id)->where('color_id', $request->color_id)->first();
        $productBySize = Stock::where('color_id', $request->color_id)->where('size_id', $request->size_id)->get();
        $productCount = Stock::where('color_id', $request->color_id)->where('size_id', $request->size_id)->where('total', '!=', 0)->count();
        $products = [];
        foreach ($productBySize as $key => $value) {
            if ($value->total > 0) {
                $p = Product::where('id', $value->product_id)->where('onsale', 1)->first();
                array_push($products, $p);
            }
        }
        return view('front.filter.color_filter', compact('cats', 'products', 'productCount', 'color', 'size'));
    }


    public function brandFilter(Request $request)
    {
        $cats = Category::with('subcat')->where('parent_id', 0)->get();
        $brand = Brand::where('id', $request->brand)->first();
        $products = Product::where('brand_id', $request->brand)->where('onsale', 1)->get();
        $productCount = Product::where('brand_id', $request->brand)->where('onsale', 1)->count();
        return view('front.filter.brand_filter', compact('cats', 'products', 'productCount', 'brand'));
    }

    public function categoryFilter(Request $request)
    {
        $cats = Category::with('subcat')->where('parent_id', 0)->get();
        $category = Category::where('id', $request->cat)->first();
        $products = Product::where('category_id', $request->cat)->where('onsale', 1)->get();
        $productCount = Product::where('category_id', $request->cat)->where('onsale', 1)->count();
        return view('front.filter.cat_filter', compact('cats', 'products', 'productCount', 'category'));
    }

    public function priceShort(Request $request)
    {
        $cats = Category::with('subcat')->where('parent_id', 0)->get();
        $products = Product::orderBy('sales_price', 'DESC')->where('onsale', 1)->get();
        $productCount = Product::orderBy('sales_price', 'DESC')->where('onsale', 1)->count();
        return view('front.filter.asc', compact('cats', 'products', 'productCount'));
    }
}
