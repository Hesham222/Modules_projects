<?php

namespace Admins\Http\Controllers\Admin;

use Admins\Http\Requests\confirmPasswordRequest;
use Admins\Http\Requests\loginRequest;
use Admins\Http\Requests\updateAdminDetailsRequest;
use Admins\Models\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use Hash;

class AdminController extends Controller
{

      //view login page
      public function Login(){

          $MainTitle = 'Sign in as admin';
          return view('admins::_auth.login',compact('MainTitle'));
      }

      //check login
      public function submitLogin(loginRequest $request){

            $data = $request->all();

            if(Auth::guard('admin')-> attempt(['email' => $data['email'], 'password' => $data['password']])){
                return redirect()->route('admins.dashboard');

            }else {
                Session::flash('error_message','Invalid Email or Password');
                return redirect()->back();
            }
      }

      // view dashboard
      public function dashboard(){

          return view('admins::dashboard');
      }

      // logout
    public function logout(){
        if(AdminLogged('admin')){

            auth()->guard('admin')->logout();
            return redirect('admins/login');
        }
        return back();

    }

    //admin setting
    public function settings(){
        Session::put('page','settings');

        $adminDetails = Admin::where('email',Auth::guard('admin')->user()->email)->first();

        return view('admins::admin.settings',compact('adminDetails'));
    }

    // update current password
    public function checkCurrentPassword(Request $request){

        $data = $request->all();

        if(Hash::check($data['current_password'],Auth::guard('admin')->user()->password)){
            echo "true";
        }else {
            echo "false";
        }
    }

    //confirm new password
    public function updateCurrentPassword(confirmPasswordRequest $request){
        try {
            $data = $request -> all();

            if(Hash::check($data['current_password'],Auth::guard('admin')->user()->password)){

                if($data['new_password'] == $data['confirm_password']){
                    Admin::where('id',Auth::guard('admin')->user()->id)->update(['password' =>bcrypt($data['new_password'])]);

                    Session::flash('success_message','Password has been Updated Successfully ');
                    return redirect()->back();

                }else {
                    Session::flash('error_message','New password and Confirm password not match ');
                    return redirect()->back();
                }
            }
        }catch (\Exception $ex){
            Session::flash('error_message','Your Current password is incorrect ');
            return redirect()->back();
        }
    }
    //admin details
    public function adminDetails(){

        $adminDetails = Admin::where('email',Auth::guard('admin')->user()->email)->first();

        return view('admins::admin.admin_details',compact('adminDetails'));
    }

    //update admin details
    public function updateAdminDetails(updateAdminDetailsRequest $request){
        try {

                $data = $request->all();

                Admin::where('id',Auth::guard('admin')->user()->id)->update([
                    'name' => $data['admin_name'],
                    'mobile' => $data['admin_mobile'],
                ]);


                Session::flash('success_message','Admin Details has been Updated Successfully ');
                return redirect()->back();

        } catch (\Exception $ex) {
            return $ex;

        }
    }





}
