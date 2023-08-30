<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;


class ShopController extends Controller
{
    public function shop(){
        $getDataProduct = Product::paginate(6);
        return view('frontend.Pages.Shop.shop')->with(
            [
                'dataProduct' => $getDataProduct
            ]
        );
    }

    public function shopDetail($slug){
        $getProductDetail = Product::where('slug_product', $slug)->first();
        return view('frontend.Pages.Shop.shopDetail')->with(
            [
                'productDetail' => $getProductDetail
            ]
        );
    }
}
