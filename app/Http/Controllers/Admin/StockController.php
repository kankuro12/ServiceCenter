<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Simplestock;
use App\Stock;


class StockController extends Controller
{
    public function __construct()
    {
        $this->middleware('is_admin');
    }


    public function manageStock($product_id)
    {
        $product = Product::where('id', $product_id)->first();
        if ($product->type == 0) {
            return view('back.product.stock', compact('product'));
        } else {
            return view('back.product.stockv1', compact('product'));
        }
    }

    public function manageStockStore(Request $request, $product_id)
    {
        if ($request->has('s_total')) {
            if ($pre = Simplestock::where('product_id', $product_id)->first()) {
                $pre->total = 0;
                $pre->total = $request->s_total;
                $pre->save();
                return redirect()->back()->with('success', 'Product stock has been Updated successfully');
            } else {
                $stock = new Simplestock();
                $stock->total = $request->s_total;
                $stock->product_id = $product_id;
                $stock->save();
                return redirect()->back()->with('success', 'Product stock has been added successfully');
            }
        } else {

            foreach ($request->size_id as $key => $size) {
                $stockCount =  Stock::where('product_id', $product_id)->where('size_id', $size)->where('color_id', $request->color_id[$key])->count();
                if ($stockCount > 0) {
                    $stock =  Stock::where('product_id', $product_id)->where('size_id', $size)->where('color_id', $request->color_id[$key])->first();
                    $stock->size_id = $size;
                    $stock->total = $request->total[$key];
                    $stock->product_id = $product_id;
                    $stock->color_id = $request->color_id[$key];
                    $stock->save();
                } else {
                    $stock = new Stock();
                    $stock->size_id = $size;
                    $stock->total = $request->total[$key];
                    $stock->product_id = $product_id;
                    $stock->color_id = $request->color_id[$key];
                    $stock->save();
                }
            }
            return redirect()->back()->with('success', 'Product stock has been added successfully');
        }
    }

    public function VariantStock(Request $request)
    {
        $stockCount =  Stock::where('product_id', $request->product_id)->where('size_id', $request->size_id)->where('color_id', $request->color_id)->count();
        if ($stockCount > 0) {
            $stock =  Stock::where('product_id', $request->product_id)->where('size_id', $request->size_id)->where('color_id', $request->color_id)->first();
            $stock->total = $request->total;
            $stock->price = $request->price;
            $stock->saleprice = $request->saleprice;

            $stock->save();
        } else {
            $stock = new Stock();
            $stock->size_id = $request->size_id;
            $stock->product_id = $request->product_id;
            $stock->color_id = $request->color_id;
            $stock->total = $request->total;
            $stock->price = $request->price;
            $stock->saleprice = $request->saleprice;
            $stock->save();
        }
        return redirect()->back()->with('success', 'Product stock has been added successfully');
    }
}
