<?php

namespace App\Http\Controllers\Need;

use App\Http\Controllers\Controller;
use App\Models\Delivery;
use App\Models\JobProvider;
use App\Models\JobSeekers;
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
}
