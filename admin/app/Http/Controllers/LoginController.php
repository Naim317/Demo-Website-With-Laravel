<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AdminModel;

class LoginController extends Controller
{
    function adminLoginIndex(){
        return view('Login');
    }

    function logoutAdmin(Request $request){
        $request->session()->flush();
        return redirect('/Login');
    }

    function onLogin(Request $request){

        $username = $request->input('username');
        $password = $request->input('password');
        $countValue=AdminModel::where('username', '=', $username)->where('password', '=', $password)->count();
        if($countValue==1){
            $request->session()->put('username',$username);

            return 1;
        }
        else{
            return 0;
        }


    }
   
}
