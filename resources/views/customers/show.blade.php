@extends('layouts.master')
@section('title', 'familyHeads')
@section('content')
    <p class="h3">Bookings</p>
    <div>
        <a href="{{ route('customer.index') }}" class="btn btn-sm btn-secondary my-2">Back</a>
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
                <tr class="text-danger">
                    <td>
                        {{ $booking->rooms->pluck('room_no')->implode(', ') }}
                    </td>
                    <td>{{ $booking->booking_date }}</td>
                    <td>{{ $booking->check_in_date }}</td>
                    <td>{{ $booking->check_out_date }}</td>
                    <td>{{ $booking->no_of_adults }}</td>
                    <td>{{ $booking->no_of_childrens }}</td>
                    <td>{{ $booking->status }}</td>

                    @if ($booking->status != 'Cancelled')
                        <td>
                            <form class="d-inline me-1" action="{{ route('customer.show') }}" method="GET">
                                @csrf
                                @method('GET')
                                <input type="hidden" name="id" value="{{ $booking->id }}" />
                                <button type="submit" class="btn btn-sm btn-primary">View</a>
                            </form>

                            <form class="d-inline" action="{{ route('booking.edit') }}" method="GET">

                                <input type="hidden" name="id" value="{{ $booking->id }}" />
                                <button type="submit" class="btn btn-sm btn-secondary mx-2">Edit</a>
                            </form>

                            <form class="d-inline" action="{{ route('booking.checkout') }}" method="GET">

                                <input type="hidden" name="id" value="{{ $booking->id }}" />
                                <button type="submit" class="btn btn-sm btn-success mx-2">Check Out</a>
                            </form>
                            <form class="d-inline" action="{{ route('booking.cancel') }}" method="GET">
                                <input type="hidden" name="id" value="{{ $booking->id }}">
                                <button type="submit" class="btn btn-sm btn-danger">Cancel</a>
                            </form>
                        </td>
                        @else
                        <td>No Action</td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
    <script>
        $(document).ready(function() {
            var table = $('#example').DataTable();
        });
        table
            .order([1, 'desc'])
            .draw();
    </script>
@endsection
