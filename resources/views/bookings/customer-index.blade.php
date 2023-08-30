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
    <h4 class="caption-top">Active Booking</h4>
    <hr>
    <table id="booked" class="display" style="width:100%">
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
                @if ($booking->status == 'booked')
                    <tr>
                        <td>{{ $booking->rooms->pluck('room_no')->implode(',') }}</td>
                        <td>{{ $booking->booking_date }}</td>
                        <td>{{ $booking->check_in_date }}</td>
                        <td>{{ $booking->check_out_date }}</td>
                        <td>{{ $booking->no_of_adults }}</td>
                        <td>{{ $booking->no_of_childrens }}</td>
                        <td>{{ $booking->status }}</td>
                        {{-- <td>{{$booking->customer?$booking->customer->fname.' '.$booking->customer->lname:''}}</td>
                <td>{{$booking->customer?$booking->customer->phone_no:''}}</td> --}}
                        <td>
                            @if ($booking->status == 'booked')
                                <form class="d-inline me-1" action="{{ route('booking.cancel') }}" method="GET">
                                    @csrf
                                    @method('GET')
                                    <input type="hidden" name="id" value="{{ $booking->id }}" />
                                    <button type="submit" class="btn btn-sm btn-primary">Cancel</a>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>

    <h4 class="caption-top">checkOut Booking</h4>
    <hr>
    <table id="checkOut" class="display" style="width:100%">
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
                @if ($booking->status == 'checkOut')
                    <tr>
                        <td>{{ $booking->rooms->pluck('room_no')->implode(',') }}</td>
                        <td>{{ $booking->booking_date }}</td>
                        <td>{{ $booking->check_in_date }}</td>
                        <td>{{ $booking->check_out_date }}</td>
                        <td>{{ $booking->no_of_adults }}</td>
                        <td>{{ $booking->no_of_childrens }}</td>
                        <td>{{ $booking->status }}</td>
                        {{-- <td>{{$booking->customer?$booking->customer->fname.' '.$booking->customer->lname:''}}</td>
                <td>{{$booking->customer?$booking->customer->phone_no:''}}</td> --}}
                        <td>
                            @if ($booking->status == 'booked')
                                <form class="d-inline me-1" action="{{ route('booking.cancel') }}" method="GET">
                                    @csrf
                                    @method('GET')
                                    <input type="hidden" name="id" value="{{ $booking->id }}" />
                                    <button type="submit" class="btn btn-sm btn-primary">Cancel</a>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>

    <h4 class="caption-top">Cancelled Booking</h4>
    <hr>
    <table id="cancelled" class="display" style="width:100%">
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
                @if ($booking->status == 'Cancelled')

                    <tr>
                        <td>{{ $booking->rooms->pluck('room_no')->implode(',') }}</td>
                        <td>{{ $booking->booking_date }}</td>
                        <td>{{ $booking->check_in_date }}</td>
                        <td>{{ $booking->check_out_date }}</td>
                        <td>{{ $booking->no_of_adults }}</td>
                        <td>{{ $booking->no_of_childrens }}</td>
                        <td>{{ $booking->status }}</td>
                        {{-- <td>{{$booking->customer?$booking->customer->fname.' '.$booking->customer->lname:''}}</td>
                <td>{{$booking->customer?$booking->customer->phone_no:''}}</td> --}}
                        <td>
                            @if ($booking->status == 'booked')
                                <form class="d-inline me-1" action="{{ route('booking.cancel') }}" method="GET">
                                    @csrf
                                    @method('GET')
                                    <input type="hidden" name="id" value="{{ $booking->id }}" />
                                    <button type="submit" class="btn btn-sm btn-primary">Cancel</a>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>
    <script>
        $(document).ready(function() {
            var table = $('#cancelled').DataTable();
        });

        $(document).ready(function() {
            var table = $('#booked').DataTable();
        });
        $(document).ready(function() {
            var table = $('#checkOut').DataTable();
        });
    </script>
@endsection
