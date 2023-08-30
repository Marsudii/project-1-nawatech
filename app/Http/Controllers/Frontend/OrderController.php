<?php

namespace App\Http\Controllers\Frontend;

//import packages laravel
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

//Import create file developer
use App\Jobs\OrderCancelJob;
use App\Jobs\OrderDeleteJob;
use App\Jobs\OrderSuccessJob;
use App\Models\Checkout;
use App\Exports\CheckoutsExport;
use App\Http\Requests\OrderPaymentRequest;
use App\Models\Product;

class OrderController extends Controller
{
    public function __construct()
    {   //Set Rules
        $this->middleware(['auth', 'is_verify_email']);
    }

    public function order($user_id)
    {
        //Data order success
        $dataOrderSuccess = Checkout::with(['joinUser', 'joinProducts'])
            ->where('user_id', $user_id)
            ->where('status', 'success')
            ->get();
        //Data order Delete
        $dataOrderDelete = Checkout::with(['joinUser', 'joinProducts'])
            ->where('user_id', $user_id)
            ->where('status', 'delete')
            ->get();
        //Data order Cancel
        $dataOrderCancel = Checkout::with(['joinUser', 'joinProducts'])
            ->where('user_id', $user_id)
            ->where('status', 'cancel')
            ->get();
        //Data order order
        $dataOrderOrder = Checkout::with(['joinUser', 'joinProducts'])
            ->where('user_id', $user_id)
            ->where('status', 'order')
            ->get();

        return view('frontend.Pages.Orders.order')->with([
            'dataOrderSuccess' => $dataOrderSuccess,
            'dataOrderCancel' => $dataOrderCancel,
            'dataOrderDelete' => $dataOrderDelete,
            'dataOrderPending' => $dataOrderOrder,
        ]);
    }

    public function orderSuccess($user_id, OrderPaymentRequest $orderPaymentRequest)
    {
        //Check Vallidation rules form request from (OrderPaymentRequest)
        $dataCheckoutValidated = $orderPaymentRequest->validated();

        //Search id order
        $dataValid = Checkout::find(request()->id_order);
        //create data update status and nominal payment
        $data = [
            'status' =>  'success',
            'payment' => $dataCheckoutValidated['payment']
        ];
        // Update the checkout data with the new status
        $dataValid->update($data);


        //Update Stock Product if order success
        $dataProductUpdate = Product::find(request()->id_product);
        $resultStock = $dataProductUpdate->qty - request()->order_qty;
        $dataUpdateProduct = [
            'qty' => $resultStock
        ];
        $dataProductUpdate->update($dataUpdateProduct);


        //search data order based on user_id and id product
        $dataOrderSuccessEmail = Checkout::with(['joinUser', 'joinProducts'])
            ->where('user_id', $user_id)
            ->where('id', $dataValid->id)
            ->first();

        //get data email to send from mail
        $email = $dataOrderSuccessEmail->joinUser->email;

        //get Job Order Success queue send email
        dispatch(new OrderSuccessJob($email, $dataOrderSuccessEmail));

        return redirect()->route('order', $user_id);
    }



    public function orderCancel($user_id)
    {

        $dataCheckout = Checkout::find(Request()->id_order);
        $data = [
            'status' =>  'cancel',
        ];
        // Update the checkout data with the new status
        $dataCheckout->update($data);
        // Retrieve the updated checkout data
        $dataOrderSuccessEmail = Checkout::with(['joinUser', 'joinProducts'])
            ->where('user_id', $user_id)
            ->where('id', $dataCheckout->id)
            ->first();
        $email = $dataOrderSuccessEmail->joinUser->email;
        dispatch(new OrderCancelJob($email, $dataOrderSuccessEmail));
        return redirect()->route('order', $user_id);
    }

    public function orderDelete($user_id)
    {
        $dataCheckout = Checkout::find(Request()->id_order);
        $data = [
            'status' =>  'delete',
        ];
        $dataCheckout->update($data);
        $dataOrderSuccessEmail = Checkout::with(['joinUser', 'joinProducts'])
            ->where('user_id', $user_id)
            ->where('id', $dataCheckout->id)
            ->first();
        $email = $dataOrderSuccessEmail->joinUser->email;
        dispatch(new OrderDeleteJob($email, $dataOrderSuccessEmail));
        return redirect()->route('order', $user_id);
    }


    public function exportExcel()
    {
        $user_id = auth()->user()->id;
        return Excel::download(new CheckoutsExport($user_id), 'data-export-my-order.xlsx');
    }
}
