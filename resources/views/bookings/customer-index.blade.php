@extends('layouts.master')
@section('title', 'familyHeads')
@section('content')
    <p class="h3">Booking Details</p>
    <div>
        <form class="d-inline me-1" action="{{ route('bookings.create') }}" method="GET">
            @csrf
            @method('GET')
            <input type="hidden" name="customer_id" value="{{ $customer_id }}" />
            <button type="submit" class="btn btn-sm btn-primary">Add New</a>
        </form>
    </div>
    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Room No</th>
                <th>Booking Date</th>
                <th>Arival Date</th>
                <th>Departure Date</th>
                <th>No of Adults</th>
                <th>No of Childrens</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bookings as $booking)
            <tr>
                <td>{{$booking->rooms->pluck('room_no')->implode(',')}}</td>
                <td>{{$booking->booking_date}}</td>
                <td>{{$booking->check_in_date}}</td>
                <td>{{$booking->check_out_date}}</td>
                <td>{{$booking->no_of_adults}}</td>
                <td>{{$booking->no_of_childrens}}</td>
                <td>{{$booking->status}}</td>
                {{-- <td>{{$booking->customer?$booking->customer->fname.' '.$booking->customer->lname:''}}</td>
                <td>{{$booking->customer?$booking->customer->phone_no:''}}</td> --}}
                <td>
                    @if($booking->status=='booked' ) 
                    <form class="d-inline me-1" action="{{route('booking.cancel')}}" method="GET">
                        @csrf
                        @method('GET')
                        <input type="hidden" name="id" value="{{$booking->id}}" />
                        <button type="submit" class="btn btn-sm btn-primary">Cancel</a>
                    </form>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <script>
        $(document).ready(function() {
            var table = $('#example').DataTable();
        });
    </script>
@endsection
