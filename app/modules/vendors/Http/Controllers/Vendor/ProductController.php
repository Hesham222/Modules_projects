<?php

namespace Vendors\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Vendors\Http\Requests\ProductRequest;
use Vendors\Models\Category;
use Vendors\Models\Product;
use Illuminate\Http\Request;
use Session;
class ProductController extends Controller
{

    public function index()
    {
        Session::put('page','products');
        $products = Product::with('category')->get();
        return view('vendors::products.products',compact('products'));
    }


    public function create()
    {
        $categories = Category::get();

        return view('vendors::products.add_product',compact('categories'));

    }


    public function store(ProductRequest $request)
    {
        DB::beginTransaction();
        try {
            Product::create([
                'name' => $request->input('product_name'),
                'category_id' => $request->input('category_id'),
                'color' => $request->input('product_color'),
                'price' => $request->input('product_price'),

            ]);

            DB::commit();

            Session::flash('success_message','Product added Successfully ');
            return redirect()->route('vendors.products.index');


        }catch (\Exception $ex){
            DB::rollBack();
            Session::flash('error_message','Product not added ');
            return redirect()->back();
        }
    }


    public function show(Product $product)
    {
        //
    }


    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::get();
        return view('vendors::products.edit_product',compact('product','categories'));
    }


    public function update(ProductRequest $request, $id)
    {
        $product = Product::find($id);
        DB::beginTransaction();
        try {
            Product::where('id',$product->id)->update([

                'name' => $request->input('product_name'),
                'category_id' => $request->input('category_id'),
                'color' => $request->input('product_color'),
                'price' => $request->input('product_price'),
            ]);

            DB::commit();

            Session::flash('success_message','Product updated Successfully ');
            return redirect()->route('vendors.products.index');

        }catch (\Exception $ex){
            DB::rollBack();
            Session::flash('error_message','Product not updated ');
            return redirect()->back();
        }

    }

    public function destroy($id)
    {
        try {
            $product = Product::find($id);
            $product->delete();
            $message = "Product has been deleted";

            Session::flash('success_message',$message);
            return redirect()->back();


        } catch (\Exception $th) {
            //return $th;
            Session::flash('error_message',"Product hasn't been deleted");
            return redirect()->back();
        }
    }
}
