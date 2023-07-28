@extends('layouts.master')
@section('title', 'room types')
@section('content')
    <p class="h3">Room Types</p>
    <a href="{{ route('roomType.create') }}" class="btn btn-sm btn-primary my-2">Add New</a>
    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>id</th>
                <th>Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($roomTypes as $roomType)
            <tr>
                <td>{{$roomType->id}}</td>
                <td>{{$roomType->type}}</td>
                <td>
                    <form class="d-inline me-1" action="{{route('roomType.show')}}" method="GET">
                        @csrf
                        @method('GET')
                        <input type="hidden" name="room_type_id" value="{{$roomType->id}}" />
                        <button type="submit" class="btn btn-sm btn-primary">View</a>
                    </form>
                    <form class="d-inline" action="{{route('roomType.edit')}}">
                        <input type="hidden" name="room_type_id" value="{{$roomType->id}}" />
                        <button type="submit" class="btn btn-sm btn-secondary mx-2">Edit</a>
                    </form>
                    <form class="d-inline" action="" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="room_type_id" value="{{$roomType->id}}">
                         <button type="submit" onclick="return deletedata()"
                            class="btn btn-sm btn-danger">Delete</a>
                    </form>
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
