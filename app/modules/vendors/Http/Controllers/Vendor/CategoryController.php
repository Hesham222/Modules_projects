<?php

namespace Vendors\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Vendors\Http\Requests\CategoryRequest;
use Vendors\Models\Category;
use Illuminate\Http\Request;
use Session;
class CategoryController extends Controller
{
    //view categories
    public function index()
    {
        Session::put('page','categories');
        $categories = Category::get();
        return view('vendors::categories.categories',compact('categories'));
    }

    //view add categories
    public function create()
    {

        return view('vendors::categories.add_category');
    }

    // store categories
    public function store(CategoryRequest $request)
    {
        DB::beginTransaction();
        try {
            Category::create([
                'name' => $request->input('category_name')
            ]);

            DB::commit();

            Session::flash('success_message','Category added Successfully ');
            return redirect()->route('vendors.categories.index');


        }catch (\Exception $ex){
            DB::rollBack();
            Session::flash('error_message','Category not added ');
            return redirect()->back();
        }

    }

    //view edit categories
    public function edit($id)
    {
        $category = Category::find($id);
        return view('vendors::categories.edit_category',compact('category'));

    }

    // update categories
    public function update(CategoryRequest $request,$id)
    {
        $category = Category::find($id);
        DB::beginTransaction();
        try {
            Category::where('id',$category->id)->update([

                'name' => $request->input('category_name')
            ]);

            DB::commit();

            Session::flash('success_message','Category updated Successfully ');
            return redirect()->route('vendors.categories.index');

        }catch (\Exception $ex){
            DB::rollBack();
            Session::flash('error_message','Category not updated ');
            return redirect()->back();
        }

    }

    //delete categories
    public function destroy($id)
    {
        try {
            $category = Category::find($id);
            $category->delete();
            $message = "Category has been deleted";

            Session::flash('success_message',$message);
            return redirect()->back();


        } catch (\Exception $th) {
            //return $th;
            Session::flash('error_message',"Category hasn't been deleted");
            return redirect()->back();
        }
    }

}
