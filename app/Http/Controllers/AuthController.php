<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request){
        if($request->getMethod()=="POST"){

        }else{
            return view('back.login');
        }
    }
}
