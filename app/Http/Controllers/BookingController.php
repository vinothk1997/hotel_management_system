<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Models\Customer;
use App\Models\Booking;
use Carbon\Carbon;

class BookingController extends Controller
{
    function index(){
        $customer=Customer::where('phone_no',session()->get('user')['user_id'])->get()->first();
        $bookings=$customer?$customer->booking:'';
        return view('bookings.index',compact('customer','bookings'));
    }

    function create(Request $request){
        $customer_id=$request->customer_id;
        $customers=Customer::all();
        return view('bookings.create',compact('customers','customer_id'));
    }

    function store(Request $request){
        $booking = new Booking;
        $booking->booking_date = Carbon::now();
        $booking->check_in_date = $request->arival_date;
        $booking->check_out_date = $request->departure_date;
        $booking->check_in_time = $request->arival_time;
        $booking->check_out_time = $request->departure_time;
        $booking->no_of_adults = $request->no_of_adults;
        $booking->no_of_childrens = $request->no_of_children;
        $booking->customer_id = $request->customer_id;
        $booking->room_id = $request->room_id;
        $booking->save();
    }
}
