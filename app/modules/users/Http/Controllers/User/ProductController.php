<?php

namespace Users\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Vendors\Models\Product;


class ProductController extends Controller
{
    //view products to buyers
    public function products(){
        $products = Product::with('category')->get();
        return view('users::products.products',compact('products'));
    }

}
