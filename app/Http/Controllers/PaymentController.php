<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($id)
    {
        //
        $payment = \App\Payment::find($id);
        return view('payment.pay')->with('info',$payment);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Request $request)
    {
        //
        $info = [
            'merchant_id' => $request->input('merchant_id'),
            'amount' => $request->input('amount'),
            'order_id' => $request->input('order_id'),
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'pincode' => $request->input('pincode'),
            'phone' => $request->input('phone'),
            'paid' => false
        ];
        $payment  = new \App\Payment($info);
        $payment->save();

        return redirect('/pay/'.$payment->id);
    }

}
