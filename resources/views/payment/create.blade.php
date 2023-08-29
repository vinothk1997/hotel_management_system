@extends('layouts.master')
@section('title', 'create-price')
@section('content')
    <div class="container mt-3">
        <a href="{{ route('price.index') }}" class="btn btn-sm btn-secondary my-2">Back</a>
        <div>
            <p class="h3">Payment </p>
        </div>
        <Form action="{{ route('payment.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label>Amount :</label>
                        <input type="text" name="amount"class="form-control">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>Status :</label>
                        <select name="status" class="form-control">
                            <option value="">Select Payment Status</option>
                            <option value="partially_paid">Partially Paid</option>
                            <option value="fully_paid">fully Paid</option>
                        </select>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>Method of Payment :</label>
                        <select name="method_of_payment" class="form-control">
                            <option value="">Select Method of Payment</option>
                            <option value="cash">Cash</option>
                            <option value="bank">Bank</option>
                        </select>
                    </div>
                </div>
            </div>
            <input type="hidden" value="{{ $booking_id }}" name="booking_id" />
            <input type="hidden" value="{{ $customer_id }}" name="customer_id" />
            @if ($isSettled != 'disabled')
                <button class="btn btn-sm btn-primary my-2" type="submit">Save</button>
            @endif
        </Form>
        <div class="mt-4">
            <table class="table">
                <tr>
                    <td>Date of Payment</td>
                    <td>Amount Paid</td>
                    <td>status</td>
                    <td>Balance</td>
                </tr>
                @foreach ($payments as $payment)
                    <tr>
                        <td>{{ $payment->date_of_payment }}</td>
                        <td>{{ $payment->amout_paid }}</td>
                        <td>{{ $payment->status }}</td>
                        <td>{{ $payment->amount }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>

@endsection
