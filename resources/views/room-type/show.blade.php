@extends('layouts.master')
@section('title', 'rooms')
@section('content')
    <p class="h3">
        Rooms</p>
    <div>
        <a href="{{ route('roomType.index') }}" class="btn btn-sm btn-secondary my-2">Back</a>
        <form class="d-inline me-1" action="{{ route('room.create') }}" method="GET">
            @csrf
            @method('GET')
            <input type="hidden" name="room_type_id" value="{{ $room_type_id }}" />
            <button type="submit" class="btn btn-sm btn-primary">Add New</a>
        </form>
    </div>
    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Room No</th>
                <th>No of Beds</th>
                <th>No of Bathrooms</th>
                <th>Width</th>
                <th>Length</th>
                <th>No of Chairs</th>
                <th>No of Tables</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rooms as $room)
                <tr>
                    <td>{{ $room->room_no }}</td>
                    <td>{{ $room->no_of_beds }}</td>
                    <td>{{ $room->no_of_bathrooms }}</td>
                    <td>{{ $room->width }}</td>
                    <td>{{ $room->length }}</td>
                    <td>{{ $room->no_of_chairs }}</td>
                    <td>{{ $room->no_of_tables }}</td>
                    <td>{{ $room->is_occupied }}</td>
                    <td>
                        <form class="d-inline me-1" action="" method="GET">
                            @csrf
                            @method('GET')
                            <input type="hidden" name="room_id" value="{{ $room->id }}" />
                            <button type="submit" class="btn btn-sm btn-primary">View</a>
                        </form>
                        <form class="d-inline me-1" action="{{ route('room.maintanaceMode') }}" method="GET">
                            @csrf
                            @method('GET')
                            <input type="hidden" name="room_id" value="{{ $room->id }}" />

                            @if ($room->is_occupied == 'Maintanance')
                                <button type="submit" class="btn btn-sm btn-danger">
                                    Remove Maintanance
                                </button>
                            @elseif($room->is_occupied == 'No')
                                <button type="submit" class="btn btn-sm btn-success">
                                    Maintance
                                </button>
                            @endif

                        </form>
                        <form class="d-inline" action="{{route('room.edit')}}">
                            <input type="hidden" name="room_id" value="{{ $room->id }}" />
                            <button type="submit" class="btn btn-sm btn-secondary mx-2">Edit</a>
                        </form>
                        {{-- <form class="d-inline" action="" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="room_type_id" value="{{ $room->id }}">
                            <button type="submit" onclick="return deletedata()" class="btn btn-sm btn-danger">Delete</a>
                        </form> --}}
                    </td>
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
