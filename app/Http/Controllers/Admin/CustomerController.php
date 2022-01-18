<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Delivery;
use App\Models\JobProvider;
use App\Models\ServiceOrder;
use App\Models\User as ModelsUser;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('is_admin');
    }

    public function customerActivate(Request $request){
        $user=User::find($request->id);
        $user->active=1;
        $user->till=$request->till;
        $user->save();
        return redirect()->back()->with('message',"User Activated Successfully");
    }
    public function customerDeactivate(Request $request){
        $user=User::find($request->id);
        $user->active=0;
        $user->save();
        return redirect()->back()->with('message',"User Deactivated Successfully");
    }
    private function isActive($user)
    {

        if($user->role==3){
            $active=true;
        }else{

            if($user->till==null){
                $active=false;
            }else{

                $result = Carbon::now()->lte($user->till);
                $active=$user->active && $result;
            }
        }
        return $active ;
    }
    public function customerSingle ($id)
    {
        $customer=User::find($id);
        $orders=ServiceOrder::where('user_id',$id)->latest()->get();
        $active=$this->isActive($customer);
        $deliveries=Delivery::where('user_id',$id)->get();
        $jobs = JobProvider::join('job_categories', 'job_categories.id', '=', 'job_providers.job_category_id')
        ->where('job_providers.user_id', $id)
        ->select(DB::raw('job_providers.id,job_providers.title,job_providers.updated_at,job_providers.lastdate,job_categories.name as category,(select count(*) from applied_jobs where job_provider_id=job_providers.id) as applicants'))
        ->get();
        $now=Carbon::now()->format('Y-m-d');
        // dd($jobs);

        return view('back.customer.detail',compact('orders','jobs','customer','deliveries','active','now'));
        dd(compact('orders','jobs','customer','active'));
    }
    public function customerList(){

        $current=Carbon::now();
        $customers = User::whereIn('role',[2,3])->get()->groupBy('role');
        // dd($customers['3'],$customers['2']);
        return view('back.customer.list',compact('customers','current'));
    }

    public function customerMessage(){
        return view('back.customer.message');
    }

    public function messageSeen($id){
    \App\Message::where('id',$id)->update(['status' => 1]);
    return redirect()->back()->with('success','Message has been seen !');
    }


}
