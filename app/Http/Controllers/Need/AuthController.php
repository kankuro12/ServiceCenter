<?php

namespace App\Http\Controllers\Need;

use App\Http\Controllers\Controller;
use App\Models\Delivery;
use App\Models\JobProvider;
use App\Models\JobSeekers;
use App\Models\ServiceOrder;
use App\User;
use App\Models\UserSubscription;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function index(){
        // dd(session('redirect'));
        if(Auth::check()){
            return redirect()->route('n.front.home');
        }else{
            return redirect()->route('n.front.login');
        }
    }

    public function login(Request $request){
        // dd($request->all());
        if($request->getMethod()=="POST"){

            $user=User::where('phone',$request->phone)->first();
            if($user!=null){
                if(Hash::check($request->password, $user->password)){
                    Auth::login($user,true);
                    if(Session::has('redirect')){
                        return redirect(session('redirect')??"/");

                    }else{

                        return redirect()->route($user->getRoute());
                    }
                }
            }
            return redirect()->back()->withInput($request->all())->with('msg_login',"Login Failed");
        }else{
            return view('Need.auth.login');
        }

    }

    public function logout(Request $request){
        Auth::logout();
    }
    public function signup(Request $request){
        if($request->getMethod()=="POST"){

            $user=User::where('phone',$request->phone)->first();
            if($user!=null){
                return redirect()->back()->withInput($request->all())->with('msg_signup',"A Account Already Exists With This Phone Number");
            }
            $user=new User();
            $user->name=$request->name;
            $user->address=$request->address;
            $user->phone=$request->phone;
            $user->email=$request->email;
            $user->company=$request->company;
            $user->desc=$request->desc;
            $user->role=$request->type==1?3:2;
            $user->password=bcrypt($request->password);
            $user->save();
            Auth::login($user,true);
            return redirect(session('redirect')??"/");
        }else{
            return view('Need.auth.signup');
        }
    }

    public function check(Request $request){
        return response()->json(
            [
                'phone'=>User::where('phone',''.$request->phone)->count()<=0,
                'email'=>User::where('email',''.$request->email)->count()<=0,
            ]
        );
    }
    public function user(){
        return redirect()->route('n.front.vendor.index');
        $user=Auth::User();
        $jobs=JobProvider::where('user_id',$user->id)->get();
        $cvs=JobSeekers::where('user_id',$user->id)->get();
        $orders=ServiceOrder::where('user_id',$user->id)->get();
        $deliveries=Delivery::where('user_id',$user->id)->get();


        $sub=UserSubscription::where('user_id',$user->id)->orderBy('id','desc')->first();
        $hassub=false;
        $state=0;
        if($sub!=null){
            if($sub->accecpted==1){
                if($sub->validtill<Carbon::today()){
                    $state=3;
                }else{
                    $state=2;
                }
            }
            if($sub->accecpted==0){
                $state=1;
            }
        }

        return view('Need.user.index',compact('user','jobs','cvs','orders','deliveries','sub','state'));
    }

    public function order(ServiceOrder $order){
        return view('Need.user.order',compact('order'));
    }
}
