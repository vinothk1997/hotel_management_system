@extends('layouts.master')
@section('title', 'price')
@section('content')
    <p class="h3">Room Prices</p>
    <a href="{{ route('price.create') }}" class="btn btn-sm btn-primary my-2">Add New</a>
    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Room No</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($prices as $price)
            <tr>
                <td>{{$price->room_no}}</td>
                <td>{{$price->price_per_day}}</td>
                <td>
                    <form class="d-inline" action="{{route('price.edit')}}">
                        <input type="hidden" name="id" value="{{$price->id}}" />
                        <button type="submit" class="btn btn-sm btn-secondary mx-2">Edit</a>
                    </form>
                    {{-- <form class="d-inline" action="" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="id" value="{{$price->id}}">
                         <button type="submit" onclick="return deletedata()"
                            class="btn btn-sm btn-danger">Delete</a>
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
