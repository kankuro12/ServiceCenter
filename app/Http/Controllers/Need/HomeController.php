<?php

namespace App\Http\Controllers\Need;

use App\Http\Controllers\Controller;
use App\Models\ClientMessage;
use App\Models\Delivery;
use App\Models\JobCategory;
use App\Models\JobProvider;
use App\Models\JobSeekers;
use App\Models\Subscription;
use App\Models\UserSubscription;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(){

        $test='select concat(jp.id,"|",jp.title,"|",jp.lastdate,"|",u.company)  as sdata from job_providers jp join users u on u.id=jp.user_id  where lastdate >= curdate() and jp.job_category_id =?   ORDER BY RAND() limit 15 ';
        //    $test=DB::select('select group_concat(jp.id,"|",jp.title,"|",jp.lastdate,"|",u.company)  as sdata,job_category_id from job_providers jp join users u on u.id=jp.user_id  where lastdate> curdate() group by job_category_id limit 8 ');
        // dd($test);
        $sql="select id as i ,name as n from job_categories ";
        // dd($sql);
        $cats=DB::select($sql);
        foreach ($cats as $key => $cat) {
            $cat->j=DB::select($test,[$cat->i]);
        }
        // dd($cats);
        return view('Need.home.index',compact('cats'));
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

    public function viewJob(JobProvider $job)
    {
        // dd($job);
        return view('Need.job.view.index',compact('job'));
    }
    public function JobCategory(Request $request,JobCategory $cat)
    {
        $offset=($request->page??0)*100;
        $test='select concat(jp.id,"|",jp.title,"|",jp.lastdate,"|",u.company)  as j from job_providers jp join users u on u.id=jp.user_id  where lastdate >= curdate() and jp.job_category_id =?   limit '.($offset>0?$offset.',':'').'100 ';

        $jobs=DB::select($test,[$cat->id]);
        $next=($request->page??0)+1;
        $total= DB::selectOne('select count(*) as no from job_providers where job_category_id = '.$cat->id);
        $hasmore=$total->no >($offset+100);
        // dd($jobs);
        return $request->getMethod()=='POST'? response()->json([
            'jobs'=> $jobs,
            'next'=> $next,
            'more'=> $hasmore,
            ]) : view('Need.job.category.index',compact('cat','jobs','next'));

    }

    public function allCategory()
    {
        $cats=DB::table('job_categories')->get(['id','name']);
        return view('Need.job.category.list',compact('cats'));
    }
}
