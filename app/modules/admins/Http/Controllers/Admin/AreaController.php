<?php

namespace Admins\Http\Controllers\Admin;

use Admins\Models\Area;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;

class AreaController extends Controller
{
    //view areas
    public function areas(){

        Session::put('page','areas');

        $areas = Area::get();
        return view('admins::areas.areas',compact('areas'));
    }




}
