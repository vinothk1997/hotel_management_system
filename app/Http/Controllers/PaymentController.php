<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use Carbon\Carbon;

class PaymentController extends Controller
{
    function create(Request $request){
        $booking_id=$request->booking_id;
        $customer_id = $request->customer_id;

        $payments = Payment::where('booking_id',$booking_id)
        ->where('customer_id',$customer_id)
        ->get();
        $isSettled=$payments->last() &&$payments->last()->amount<=0 ?'disabled':'';
        // return $isSettled;
        return view('payment.create',compact('booking_id','customer_id','payments','isSettled'));
    }

    function store(Request $request){
        $validated = $request->validate([
            'amount' => 'required',
            'status' => 'required',
            ]);

            $booking_id=$request->booking_id;
            $customer_id = $request->customer_id;
            $amount=$request->amount;
            $status = $request->status;
            $method_of_payment = $request->method_of_payment;

            $checkRecord = Payment::get();
            if($checkRecord->count()==1 && $checkRecord->first()->status=='Not Paid'){
                $payment = Payment::where('booking_id',$booking_id)
                ->where('customer_id',$customer_id)
                ->update([
                    'amout_paid'=>$amount,
                    'status'=>$status,
                    'date_of_payment'=>Carbon::today(),
                    'method_of_payment'=>$method_of_payment
                ]);
            }
            else
            {
                $last_payment=Payment::latest()->first()->amount;
                $payment= new Payment;
                $payment->booking_id = $request->booking_id;
                $payment->customer_id = $request->customer_id;
                $payment->amout_paid = $request->amount;                    
                $payment->amount = $last_payment-$request->amount;                    
                $payment->status = $request->status;
                $payment->date_of_payment = Carbon::today();
                $payment->method_of_payment = $request->method_of_payment;
                $payment->save();
            
            }
     }
}
