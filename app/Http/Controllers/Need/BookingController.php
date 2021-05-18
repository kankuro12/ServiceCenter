<?php

namespace App\Http\Controllers\Need;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ServiceOrder;
use App\Models\ServiceOrderItem;
use App\Models\ServiceType;
use App\Models\ServiceTypeItem;
use App\Orderitem;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function step1(Request $request)
    {
        if ($request->getMethod() == "POST") {
            session([
                'company' => $request->company,
                'year' => $request->year,
                'model' => $request->model,
                'version' => $request->version,
            ]);
            return redirect()->route('n.front.book.step2');
        } else {
            $company = session('company');
            $year = session('year');
            $model = session('model');
            $version = session('version');
            return view('Need.book.step1', compact('company', 'year', 'model', 'version'));
        }
    }

    public function step2(Request $request)
    {
        if ($request->getMethod() == "POST") {
            session([
                'si' => $request->si,
                'service' => $request->service,
                'bp' => $request->bp
            ]);

            if ($request->bp == 1) {
                return redirect()->route('n.front.book.shop');
            } else {
                return redirect()->route('n.front.book.checkout');
            }
        } else {
            $siss=session('si');
            // dd($sis);
            $s=session('service');
            $services = ServiceType::all();
            $serviceitems = ServiceTypeItem::all()->groupBy('service_type_id');
            // dd(compact('services',"serviceitems"));
            return view('Need.book.step2', compact('services', "serviceitems",'s','siss'));
        }
    }

    public function shop(Request $request)
    {
        $products=Product::all();
        $sp=session('products');
        return view('Need.shop.index',compact('products','sp'));
    }

    public function addToCart(Request $request){
        $products=session('products');
        if($products!=null){
            if(!in_array($request->id,$products)){
                $products['prod_'.$request->id]=$request->id;
                session([
                    'products'=>$products
                ]);
            }
        }else{
            session([
                'products'=>[
                    'prod_'.$request->id=>$request->id
                ]
            ]);
        }
        return response('ok');
    } 

    public function removeFromCart(Request $request){
        $products=session('products');
        if($products!=null){
            if(in_array($request->id,$products)){
               unset( $products['prod_'.$request->id]) ;
               session([
                    'products'=>$products
                ]);
            }
        }
        return response('ok');
    } 

    public function checkout(Request $request)
    {
        if(session('products')==null && session('service')==null){
            return redirect()->route('n.front.book.step1');
        }
        if ($request->getMethod() == "POST") {
            $company = session('company');
            $year = session('year');
            $model = session('model');
            $version = session('version');

            $spt=session('service');
            $spi=session('si');
            $sp=session('products');

            $so=new ServiceOrder();
            $so->company=$company;
            $so->year=$year;
            $so->model=$model;
            $so->version=$version;
            $so-> service_type_id=$spt;
            $so-> dc=custom_config('delivery_charge')->value??0;
            $so-> sc=custom_config('service_charge')->value??0;
            $so-> user_id=Auth::user()->id;
            $so->save();
            $total=0;

            if($spt!=null){
                foreach ($spi as $key =>$value) {
                    $service_type_item=ServiceTypeItem::find($value);
                    $service_order_item=new ServiceOrderItem();
                    $service_order_item->service_type_item_id=$value;
                    $service_order_item->service_orders_id=$so->id;
                    $service_order_item->total=$service_type_item->onsale?$service_type_item->sale_price:$service_type_item->price;
                    $service_order_item->save();
                    $total+=$service_order_item->total;
                }
            }

            if($sp!=null){
                foreach ($sp as $key => $value) {
                    $product=Product::find($value);

                    $orderitem=new Orderitem();
                    $orderitem->product_id=$value;
                    $orderitem->rate=$product->onsale?$product->sale_price:$product->price;
                    $orderitem->qty=1;
                    $orderitem->service_orders_id=$so->id;
                    $orderitem->save();
                    $total+=($orderitem->rate);
                }
            }

            $so->total=$total;
            $so->save();
            
            $request->session()->forget('si');
            $request->session()->forget('products');
            $request->session()->forget('service');
            $request->session()->forget('company');
            $request->session()->forget('model');
            $request->session()->forget('year');
            $request->session()->forget('version');

            return view('Need.book.sucess',compact('so'));


        } else {
            // dd($request->session()->all());
           
            // if (session('products') != null) {
            // }
            // if (session('company') == null) {
            //     return redirect()->route('n.front.book.step1');
            // }

            // if (session('service') == null || session('si') == null) {
            //     return redirect()->route('n.front.book.step2');
            // }

            $user = Auth::user();

            //XXX product
            $sp=session('products');
            if($sp!=null){
                $products=Product::whereIn('id',$sp)->get();
            }else{
                $products=[];
            }

            //XXX package
            $spk=session('service');
            if($spk!=null){
                $package = ServiceType::find($spk);
                $services = ServiceTypeItem::whereIn('id', session('si'))->get();
            }else{
                $package=null;
                $services=[];
            }

            $company = session('company');
            $year = session('year');
            $model = session('model');
            $version = session('version');
            return view('Need.book.checkout', compact('products','user', 'package', 'services', 'company', 'year', 'model', 'version'));
        }
    }


}
