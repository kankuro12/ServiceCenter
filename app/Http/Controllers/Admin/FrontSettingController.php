<?php

namespace App\Http\Controllers\Admin;

use App\Aboutinfo;
use App\Footerheader;
use App\Footerinfo;
use App\Homeinfo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Newsletter;
use App\Popup;
use App\Termsinfo;

class FrontSettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('is_admin');
    }

    public function aboutInfo(Request $request){
        if($request->isMethod('post')){
            $info = Aboutinfo::where('id',1)->first();
            $info->detail = $request->detail;

            if($request->has('signature')){
                unlink(public_path('front/images/info/'.$info->signature));
                $imageName = time().'.'.$request->signature->getClientOriginalExtension();
                $request->signature->move(public_path('front/images/info'), $imageName);
                $info->signature = $imageName;
                }
                if($request->has('image')){
                    unlink(public_path('front/images/info/'.$info->image));
                    $imageName = time().'.'.$request->image->getClientOriginalExtension();
                    $request->image->move(public_path('front/images/info'), $imageName);
                    $info->image = $imageName;
                    }
                    $info->save();
                    return redirect()->back()->with('success','Info has been updated successfully!');
        }else{
            $info = Aboutinfo::where('id',1)->first();
            return view('back.front_setting.about_info',compact('info'));
        }
    }

    public function termsAndConditionInfo(Request $request){
        if($request->isMethod('post')){
            Termsinfo::where('id',1)->update(['terms' => $request->terms]);
            return redirect()->back()->with('success','Terms & Condition info has been updated successfully!');
        }else{
            $info = Termsinfo::where('id',1)->first();
            return view('back.front_setting.terms_info',compact('info'));
        }
    }

    public function basicInfo(Request $request){
        if($request->isMethod('post')){
            $info = Homeinfo::where('id',1)->first();
            if($request->has('logo')){
                $info->logo =  $request->logo->store('front/images/info');
                }
                $info->short_detail = $request->short_detail;
                $info->phone = $request->phone;
                $info->address = $request->address;
                $info->email = $request->email;
                $info->product_top = $request->product_top??"";
                $info->product_bottom = $request->product_bottom;
                $info->clearance = $request->clearance??"";
                $info->save();
                return redirect()->back()->with('success','Basic info has been updated successfully!');
        }else{
            $info = Homeinfo::where('id',1)->first();
            return view('back.front_setting.basic_info',compact('info'));
        }
    }

    public function popupBoxInfo(Request $request){
        if($request->isMethod('post')){
            $pop = Popup::where('id',1)->first();
            if($request->has('image')){
                unlink(public_path('front/images/info/'.$pop->image));
                $imageName = time().'.'.$request->image->getClientOriginalExtension();
                $request->image->move(public_path('front/images/info'), $imageName);
                $pop->image = $imageName;
                }
            $pop->title = $request->title;
            $pop->short_detail = $request->short_detail;
            $pop->status = $request->has('status')?1:0;
            $pop->save();
            return redirect()->back()->with('success','Popup info has been updated successfully!');
        }else{
            $pop = Popup::where('id',1)->first();
            return view('back.front_setting.popup_info',compact('pop'));
        }
    }

    public function footerHead(Request $request){
        if($request->isMethod('post')){
             Footerheader::where('id',$request->title_id)->update(['title'=>$request->title]);
            return redirect()->back()->with('success','Title has been updated successfully!');
        }else{
            return view('back.front_setting.footer_header');
        }
    }

    public function footerExtraInfo(Request $request){
        if($request->isMethod('post')){
            $info = Footerinfo::where('id',1)->first();
                $info->col_1 = $request->col_1;
                $info->item_1 = $request->item_1;
                $info->col_2 = $request->col_2;
                $info->item_2 = $request->item_2;
                $info->col_3 =  $request->col_3;
                $info->item_3 = $request->item_3;
                $info->col_4 = $request->col_4;
                $info->item_4 = $request->item_4;
                $info->save();
            return redirect()->back()->with('success','Footer info has been updated successfully!');
        }else{
            $footer_info = Footerinfo::where('id',1)->first();
            return view('back.front_setting.footer_extra_info',compact('footer_info'));
        }
    }



}
