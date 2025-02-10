<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PageTwoManagment;


class PageTwoManagmentController extends Controller
{
    public function ViewPageTwo(){

        $types = PageTwoManagment::all(); 
        return view('admin.index', compact('types'));

    }
}
