<?php

namespace App\Exports;

//import packages laravel
use Illuminate\Contracts\View\View;
//import packages excel
use Maatwebsite\Excel\Concerns\FromView;
//Import create file developer
use App\Models\Checkout;

class CheckoutsExport implements FromView
{
    protected $user_id;

    public function __construct($user_id)
    {
        $this->user_id = $user_id;
    }

    public function view(): View
    {
        $dataOrderSuccess = Checkout::with(['joinUser', 'joinProducts'])
            ->where('user_id', $this->user_id)
            ->where('status', 'success')
            ->get();

        $dataOrderDelete = Checkout::with(['joinUser', 'joinProducts'])
            ->where('user_id', $this->user_id)
            ->where('status', 'delete')
            ->get();

        $dataOrderCancel = Checkout::with(['joinUser', 'joinProducts'])
            ->where('user_id', $this->user_id)
            ->where('status', 'cancel')
            ->get();

        $dataOrderOrder = Checkout::with(['joinUser', 'joinProducts'])
            ->where('user_id', $this->user_id)
            ->where('status', 'order')
            ->get();

        return view('excel.exportExcelTemp', [
            'dataOrder' => $dataOrderOrder,
            'dataOrderSuccess' => $dataOrderSuccess,
            'dataOrderDelete' => $dataOrderDelete,
            'dataOrderCancel' => $dataOrderCancel,
        ]);
    }
}
