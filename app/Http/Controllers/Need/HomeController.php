<?php

namespace App\Http\Controllers\Need;

use App\Http\Controllers\Controller;
use App\Models\ClientMessage;
use App\Models\Delivery;
use App\Models\JobProvider;
use App\Models\JobSeekers;
use App\Models\Subscription;
use App\Models\UserSubscription;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        return view('Need.home.index');
    }

    public function postjob(Request $request){
        if($request->getMethod()=="POST"){
            $job=new JobProvider();
            $job->user_id=Auth::user()->id;
            $job->title=$request->title;
            $job->desc=$request->desc;
            if($request->hasFile('file')){
                $job->file=$request->file->store('uploads/job/provider');
            }
            $job->save();
            return view('Need.job.post.sucess',['title'=>$job->title,'id'=>$job->id]);

        }else{
            return view('Need.job.post.index');
        }
    }

    public function postcv(Request $request){
        if($request->getMethod()=="POST"){
            $job=new JobSeekers();
            $job->user_id=Auth::user()->id;

            $job->desc=$request->desc;
            if($request->hasFile('file')){
                $job->file=$request->file->store('uploads/job/seekers');
            }
            $job->save();
            return view('Need.job.cv.sucess',['title'=>$job->title,'id'=>$job->id]);

        }else{
            return view('Need.job.cv.index');
        }
    }

    public function delivery(Request $request){
        if($request->getMethod()=="POST"){
            $job=new Delivery();
            $job->user_id=Auth::user()->id;
            $job->desc=$request->desc;
            if($request->hasFile('file')){
                $job->file=$request->file->store('uploads/deliveries');
            }
            $job->save();
            return view('Need.delivery.sucess',['title'=>$job->title,'id'=>$job->id]);

        }else{
            return view('Need.delivery.index');
        }
    }

    public function message(Request $request){
        $msg=new ClientMessage();
        $msg->name=$request->name;
        $msg->phone=$request->phone;
        $msg->email=$request->email;
        $msg->message=$request->message;
        $msg->save();
        return response('ok');
    }

    public function subs(Request $request){
        $user=Auth::user();
        $today=Carbon::today();
        if($request->getMethod()=="POST"){
            $so=new UserSubscription();
            $so->subscription_id=$request->service;
            $so->user_id=$user->id;
            $so->accecpted=0;
            $so->save();
            return view('Need.subscription.sucess',compact('so'));
        }else{
            if(UserSubscription::where('user_id',$user->id)->whereDate('validtill','>=',$today)->orWhere('accecpted',0)->count()>0){
                $us=UserSubscription::where('user_id',$user->id)->orderBy('id','desc')->first();
                return view('Need.subscription.subscribed',compact('us'));
            }else{
                $subs=Subscription::all();
                return view('Need.subscription.index',compact('subs'));
            }
        }
    }
}
