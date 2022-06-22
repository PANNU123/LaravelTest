<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function login(){
        if(Auth::guard('admin')->user()){
            return redirect()->route('admin.dashboard');
        }
        return view('admin.pages.auth.login');
    }
    public  function loginDashboard(Request $request){
        if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect()->route('admin.dashboard');
        }else{
            // Toastr::error('Invalid Creadential', 'Login Failed', ["positionClass" => "toast-top-right"]);
            return redirect()->back();
        }
    }

    public function logout(){
        if (Auth::guard('admin')->check()) {
            Auth::logout();
            return redirect()->route('login');
        }
        return redirect()->back();
    }
}
