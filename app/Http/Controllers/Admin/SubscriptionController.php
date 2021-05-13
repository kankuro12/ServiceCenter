<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subscription;
use App\Models\UserSubscription;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    //

    public function index(){
        $subs=Subscription::all();
        return view('back.subs.index',compact('subs'));
    }

    public function add(Request $request){
        $sub=new Subscription();
        $sub->title=$request->title;
        $sub->price=$request->price;
        $sub->desc=$request->desc;
        $sub->save();
        return redirect()->back()->with('success','Subscription Package has been created successfully.');
    }
    public function update(Request $request){
        $sub=Subscription::find($request->id);
        $sub->title=$request->title;
        $sub->price=$request->price;
        $sub->desc=$request->desc;
        $sub->save();
        return redirect()->back()->with('success','Subscription Package has been updated successfully.');
    }
    public function del(Subscription $sub){
        $sub->delete();
        return redirect()->back()->with('success','Subscription Package has been deleted successfully.');
    }

    public function user($type){
        $subs=[];
        $today=Carbon::today();

        if($type==0){
            $subs=UserSubscription::where('accecpted',0)->paginate(20);
        }elseif($type==1){
            $subs=UserSubscription::where('accecpted',1)->whereDate('validtill','>=',$today)->paginate(20);
        }else{
            $subs=UserSubscription::where('accecpted',1)->whereDate('validtill','<',$today)->paginate(20);
        }
        // dd($type);
        return view('back.subs.user',compact('subs','type'));
    }

    public function user_del(Request $request){
        $sub=UserSubscription::find($request->id);
        $sub->delete();
        return response('ok');
    }
    public function user_accecpt(Request $request){
        $sub=UserSubscription::find($request->id);
        $sub->validtill=$request->validtill;
        $sub->accecpted=1;
        $sub->save();
        return response('ok');
    }
}
