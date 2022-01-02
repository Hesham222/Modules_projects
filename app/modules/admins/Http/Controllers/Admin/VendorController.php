<?php

namespace Admins\Http\Controllers\Admin;

use Admins\Http\Requests\VendorRequest;
use Admins\Models\Area;
use Admins\Models\Vendor;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class VendorController extends Controller
{
    //view vendors
    public function vendors(){
        Session::put('page','vendors');

         $vendors = Vendor::with(['area'])->get();

        return view('admins::vendors.vendors',compact('vendors'));
    }
    //view add vendors
    public function addVendors(){

        $areas = Area::get();
        return view('admins::vendors.add_vendors',compact('areas'));
    }

    //store vendors
    public function storeVendors(VendorRequest $request){
        DB::beginTransaction();
        try {
            Vendor::create([
                'name' => $request->input('vendor_name'),
                'email' => $request->input('vendor_email'),
                'mobile' => $request->input('vendor_mobile'),
                'password' => bcrypt($request->input('vendor_password')),
                'area_id' => $request->input('area_id')
            ]);

            DB::commit();

            Session::flash('success_message','Vendor added Successfully ');
            return redirect()->route('admins.vendors');

        }catch (\Exception $exception){
            DB::rollBack();
            Session::flash('error_message','Vendor not added ');
            return redirect()->back();
        }

    }
    //edit vendors
    public function editVendors($id){

        $vendor = Vendor::find($id);
        $areas = Area::get();

        return view('admins::vendors.edit_vendors',compact('vendor','areas'));
    }

    //update Vendors
    public function updateVendors(VendorRequest $request ,$id){
        $vendor = Vendor::find($id);
        DB::beginTransaction();
        try {
            Vendor::where('id',$vendor->id)->update([
                'name' => $request->input('vendor_name'),
                'email' => $request->input('vendor_email'),
                'mobile' => $request->input('vendor_mobile'),
                'password' => bcrypt($request->input('vendor_password')),
                'area_id' => $request->input('area_id')
            ]);

            DB::commit();

            Session::flash('success_message','Vendor updated Successfully ');
            return redirect()->route('admins.vendors');

        }catch (\Exception $ex){
            return $ex;
            DB::rollBack();
            Session::flash('error_message','Vendor not updated ');
            return redirect()->back();
        }

    }

    //delete vendor

    public function deleteVendor($id){

        try {
            $vendor = Vendor::find($id);
            $vendor->delete();
            $message = "Vendor has been deleted";

            Session::flash('success_message',$message);
            return redirect()->back();


        } catch (\Exception $th) {
            return $th;
            Session::flash('error_message',"Vendor hasn't been deleted");
            return redirect()->back();
        }
    }




}
