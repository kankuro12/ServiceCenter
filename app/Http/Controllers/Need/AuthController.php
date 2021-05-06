<?php

namespace App\Http\Controllers\Need;

use App\Http\Controllers\Controller;
use App\Models\Delivery;
use App\Models\JobProvider;
use App\Models\JobSeekers;
use App\Models\ServiceOrder;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index(){
        // dd(session('redirect'));
        if(Auth::check()){
            return redirect()->route('n.front.home');
        }else{
            return view('Need.auth.login');
        }
    }

    public function login(Request $request){
        // dd($request->all());
        $user=User::where('phone',$request->phone)->first();
        if($user!=null){
            if(Hash::check($request->password, $user->password)){
                Auth::login($user,true);
                return redirect(session('redirect')??"/");
            }
        }
        return redirect()->back()->withInput($request->all())->with('msg_login',"Login Failed");

    }

    public function logout(Request $request){
        Auth::logout();
    }
    public function signup(Request $request){
        $user=User::where('phone',$request->phone)->first();
        if($user!=null){
            return redirect()->back()->withInput($request->all())->with('msg_signup',"A Account Already Exists With This Phone Number");
        }
        $user=new User();
        $user->name=$request->name;
        $user->address=$request->address;
        $user->phone=$request->phone;
        $user->role=2;
        $user->email=$request->phone."@text.com";
        $user->password=bcrypt($request->password);
        $user->save();
        Auth::login($user,true);
        return redirect(session('redirect')??"/");
    }

    public function user(){
        $user=Auth::User();
        $jobs=JobProvider::where('user_id',$user->id)->get();
        $cvs=JobSeekers::where('user_id',$user->id)->get();
        $orders=ServiceOrder::where('user_id',$user->id)->get();
        $deliveries=Delivery::where('user_id',$user->id)->get();
        return view('Need.user.index',compact('user','jobs','cvs','orders','deliveries'));
    }
}
