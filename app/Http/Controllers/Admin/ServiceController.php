<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ServiceType;
use App\Models\ServiceTypeItem;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index(){
        return view('back.service.index');
    }

    public function create(){
        return view('back.service.create');
    }

    public function store(Request $request){
        $service = new ServiceType();
        $service->title = $request->title;
        $service->desc = $request->desc;
        $service->active = $request->has('active')?1:0;
        $service->save();
        return redirect()->back()->with('success','Service added successfully !');
    }

    public function edit($id){
        $service = ServiceType::where('id',$id)->first();
        return view('back.service.edit',compact('service'));
    }

    public function update(Request $request, $id){
        $service = ServiceType::where('id',$id)->first();
        $service->title = $request->title;
        $service->desc = $request->desc;
        $service->active = $request->has('active')?1:0;
        $service->save();
        return redirect()->back()->with('success','Service updated successfully !');
    }

    public function delete($id){
        $service = ServiceType::where('id',$id)->first();
        $service->delete();
        return redirect()->back()->with('success','Service deleted successfully !');
    }

    // service items
    public function item(){
        return view('back.service.item.index');
    }

    public function createItem(){
        return view('back.service.item.create');
    }

    public function storeItem(Request $request){
        // dd($request->all());
        $item = new ServiceTypeItem();
        $item->title = $request->title;
        $item->desc = $request->desc;
        $item->price = $request->price;
        $item->sale_price = $request->sale_price;
        $item->service_type_id = $request->service_type_id;
        $item->onsale = $request->has('onsale')?1:0;
        $item->save();
        return redirect()->back()->with('success','Service item added successfully!');
    }

    public function editItem($id){
        $item = ServiceTypeItem::where('id',$id)->first();
       return view('back.service.item.edit',compact('item'));
    }

    public function updateItem(Request $request,$id){
        $item = ServiceTypeItem::where('id',$id)->first();
        $item->title = $request->title;
        $item->desc = $request->desc;
        $item->price = $request->price;
        $item->sale_price = $request->sale_price;
        $item->service_type_id = $request->service_type_id;
        $item->onsale = $request->has('onsale')?1:0;
        $item->save();
        return redirect()->back()->with('success','Service item updated successfully!');
    }

    public function deleteItem($id){
        $item = ServiceTypeItem::where('id',$id)->first();
        $item->delete();
        return redirect()->back()->with('success','Service item deleted successfully!');

    }
}
