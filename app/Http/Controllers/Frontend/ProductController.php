<?php

namespace App\Http\Controllers\Frontend;

//import packages laravel
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
//Import create file developer
use App\Http\Requests\ProductAddRequest;
use App\Models\Product;



class ProductController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'is_verify_email']); // Add 'is_verify_email' middleware
    }

    public function product()
    {
        $getDataProduct = Product::paginate(3);
        $countProduct = Product::all()->count();
        return view('frontend.Pages.Product.product')->with([
            'dataProduct' => $getDataProduct,
            'totalProduct' => $countProduct
        ]);
    }

    public function productAdd()
    {
        return view('frontend.Pages.Product.productAdd')->with([]);
    }


    public function productAddData(ProductAddRequest $productAddRequest)
    {
        $dataCheck = $productAddRequest->validated();
        $randomString = Str::random(40);
        $fileImageProduct = $dataCheck['image_product'];
        $namaFileProduct = $randomString . '.' . $fileImageProduct->extension();
        $fileImageProduct->move(public_path('assets/images/products'), $namaFileProduct);

        Product::create([
            'name_product' => $dataCheck['name_product'],
            'slug_product' => Str::slug($dataCheck['name_product']),
            'price' => $dataCheck['price'],
            'qty' => $dataCheck['qty'],
            'image_product' =>  $namaFileProduct,
        ]);
        return redirect()->route('product')->with('pesan', 'Data berhasil Ditambahkan!');
    }


    public function productUpdate($id)
    {
        $query =  Product::find($id);
        if (!$query) {
            abort(404);
        }
        return view('frontend.Pages.Product.productUpdate')->with([

            'dataProduct' => $query
        ]);
    }


    public function productUpdateData($id)
    {
        $query = Product::find($id);
        if (!$query) {
            abort(404);
        }
        if (Request()->image_product <> "") {

            $query = Product::find($id);
            $random = Str::random(40);
            $fileImageProduct = Request()->image_product;

            $namaFileProduct = $random . '.' . $fileImageProduct->extension();
            $fileImageProduct->move(public_path('assets/images/products'), $namaFileProduct);

            $data = [
                'name_product' =>  Request()->name_product,
                'slug_product' =>  Str::slug(Request()->name_product),
                'price' =>  Request()->price,
                'qty' =>  Request()->qty,
                'image_product' =>  $namaFileProduct,
            ];
            $query->update($data);
        }
        $query = Product::find($id);
        $data = [
            'name_product' =>  Request()->name_product,
            'slug_product' =>  Str::slug(Request()->name_product),
            'price' =>  Request()->price,
            'qty' =>  Request()->qty,
        ];
        $query->update($data);
        return redirect()->route('product')->with('pesan', 'Data Berhasil Diupdate');
    }

    public function productDelete($id)
    {
        $query = Product::find($id);
        if (!$query) {
            abort(404);
        }
        unlink(public_path('assets/images/products') . '/' . $query->image_product);
        Product::destroy($id);
        return redirect()->route('product')->with('pesan', 'Data Berhasil Dihapus');
    }
}
