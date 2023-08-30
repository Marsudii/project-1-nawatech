<?php

namespace App\Http\Controllers\Frontend;

//import packages laravel
use App\Http\Controllers\Controller;
//Import create file developer
use App\Models\Product;

class HomeController extends Controller
{
    public function home(){
        $getProduct = Product::paginate(6);
        return view('frontend.Pages.Home.home')->with([
            'dataProduct' => $getProduct
        ]);
    }
}
