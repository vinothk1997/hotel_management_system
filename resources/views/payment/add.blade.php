@extends('layouts.master')
@section('title', 'payment')
@section('content')
    <div class="container d-flex align-items-center justify-content-center vh-100">
        <div class="row">
            <div class="col-12 border border-dark bg-white p-5">
                <form action="{{ route('bookings.store') }}" method="POST">
                    @csrf
                    <p class="h3 text-center">Payment -slip</p>
                    <hr>
                    <div class="form-group">
                        <span>Payment Method :</span>
                        <select name="payment_method">
                            <option value="">Select Payment</option>
                            <option value="bank_payment">Bank Payment</option>
                            <option value="cash_payment">Cash Payment</option>
                        </select>
                        @error('payment_method')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <p>Total: <span>Rs. {{ $total }}</span></p>
                    <p>Date of Payment: {{ date('Y-m-d') }} at {{ date('h:i') }}</p>
                    <p>No of Rooms: <span>{{ $no_of_rooms }}</span><span>({{ $room_no }})</span></p>
                    <p>No of childrens: <span>{{ $no_of_childrens }}</span></p>
                    <p>No of Adults: <span>{{ $no_of_adults }}</span></p>
                    <div>
                        <input type="submit" value="Confirm your payment" class="btn btn-success" />
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection
