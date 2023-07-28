<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\User;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers=Customer::all();
        return view('customers.index',compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // storing to customer table
        $customer= new Customer;
        $customer->fname=$request->fname;
        $customer->lname=$request->lname;
        $customer->gender=$request->gender;
        $customer->nic=$request->nic;
        $customer->dob=$request->dob;
        $customer->address=$request->address;
        $customer->phone_no=$request->phone_no;
        $customer->email=$request->email;
        $customer->save();

        // Storing to User Table
        $user=new User;
        $user->user_id=$request->phone_no;
        $user->name=$request->fname.''.$request->lname;
        $user->password= Hash::make($request->phone_no);
        $user->user_type='customer';
        $user->attempt='0';
        $user->status='active';
        $user->save();
        return redirect()->to('/');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $customer_id=$request->id;
        $bookings=Booking::where('customer_id',$customer_id)->get();
        return view('customers.show',compact('bookings','customer_id'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        //
    }
}
