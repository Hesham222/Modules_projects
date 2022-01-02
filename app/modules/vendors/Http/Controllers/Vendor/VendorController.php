<?php

namespace Vendors\Http\Controllers\Vendor;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VendorController extends Controller
{
    //view login
    public function Login(){

        $MainTitle = 'Sign in as vendor';
        return view('vendors::_auth.login',compact('MainTitle'));
    }

    //check login
    public function submitLogin(Request $request){

        $data = $request->all();

        if(Auth::guard('vendor')-> attempt(['email' => $data['email'], 'password' => $data['password']])){
            return redirect()->route('vendors.dashboard');

        }else {
            Session::flash('error_message','Invalid Email or Password');
            return redirect()->back();
        }
    }

    // view dashboard
    public function dashboard(){

        return view('vendors::dashboard');
    }

    public function logout(){
        if(AdminLogged('vendor')){

            auth()->guard('vendor')->logout();
            return redirect('vendors/login');
        }
        return back();

    }
}
