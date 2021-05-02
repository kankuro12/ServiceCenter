<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
  public function login(Request $request){
      if($request->isMethod('post')){

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect()->route('dashboard');
        }else{
            return redirect()->back()->with('message','Email and password does not match !');
        }
      }else{
          return view('auth.login');
      }
  }

  public function logout(){
    Auth::logout();
    return redirect()->route('login');
  }


}
