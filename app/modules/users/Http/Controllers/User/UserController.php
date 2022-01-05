<?php

namespace Users\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Session;
use Hash;

class UserController extends Controller
{
    //view login
    public function Login(){

        $MainTitle = 'Sign in as Buyer';
        return view('users::_auth.login',compact('MainTitle'));
    }

    //check login
    public function submitLogin(Request $request){

        $data = $request->all();

        if(Auth::guard('buyer')-> attempt(['email' => $data['email'], 'password' => $data['password']])){
            return redirect()->route('users.home');

        }else {
            Session::flash('error_message','Invalid Email or Password');
            return redirect()->back();
        }
    }

    // view home
    public function Home(){

        return view('users::home');
    }

    public function logout(){
        if(AdminLogged('buyer')){

            auth()->guard('buyer')->logout();
            return redirect('users/login');
        }
        return back();

    }

//    //check login
//    public function submitLogin(Request $request){
//
//        $data = $request->all();
//
//        if(Auth::guard('buyer')-> attempt(['email' => $data['email'], 'password' => $data['password']])){
//            return redirect()->route('users.home');
//
//        }else {
//            Session::flash('error_message','Invalid Email or Password');
//            return redirect()->back();
//        }
//    }
//
//
//    public function home(){
//
//        return view('users::index.home');
//    }
}
