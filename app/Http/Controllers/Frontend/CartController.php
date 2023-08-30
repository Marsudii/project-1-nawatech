<?php

namespace App\Http\Controllers\Frontend;

//import packages laravel
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
//Import create file developer
use App\Http\Requests\CheckoutCartRequest;
use App\Models\Checkout;


class CartController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'is_verify_email']);
    }


    public function cart($user_id)
    {
        $dataCheckout = Checkout::with(['joinUser', 'joinProducts'])
            ->where('user_id', $user_id)
            ->where('status', 'cart')
            ->get();
        $total = 0;
        foreach ($dataCheckout as $checkout) {
            $total += $checkout->total;
        }

        if ($dataCheckout->isEmpty()) {
            return view('frontend.Pages.Cart.cart')->with([
                'dataCheckoutCart' => $dataCheckout,

            ]);
        }
        return view('frontend.Pages.Cart.cart')->with([
            'dataCheckoutCart' => $dataCheckout,
            'total' => $total  // Pass the calculated total to the view
        ]);
    }



    public function checkoutCart(CheckoutCartRequest $checkoutCartRequest)
    {
        $dataCheckoutCart = $checkoutCartRequest->validated();
        $hargaSatuan = (int) str_replace('.', '', Request()->price);
        $totalHarga = intval($hargaSatuan) * intval($dataCheckoutCart['qty']);
        Checkout::create([
            'user_id' => $dataCheckoutCart['user_id'],
            'product_id' => $dataCheckoutCart['product_id'],
            'qty' => $dataCheckoutCart['qty'],
            'total' => $totalHarga,
            'status' => 'cart'
        ]);
        return redirect()->route('cart', Auth::user()->id)->with('pesan', 'Data berhasil Ditambahkan!');
    }

    public function orderOne($id)
    {
        $getProductOrder = Checkout::find($id);
        $data = [
            'status' =>  'order',
        ];
        $getProductOrder->update($data);
        return redirect()->route('order', Auth::user()->id)->with('pesan', 'Data Berhasil Diupdate');
    }
}
