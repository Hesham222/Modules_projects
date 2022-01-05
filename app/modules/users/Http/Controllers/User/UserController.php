<?php

namespace Users\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            return redirect('user/home');

        }else {
            Session::flash('error_message','Invalid Email or Password');
            return redirect()->back();
        }
    }


    public function home(){

        return view('users::index.home');
    }
}
