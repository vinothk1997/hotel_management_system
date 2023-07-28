@extends('layouts.master')
@section('title', 'familyHeads')
@section('content')
    <p class="h3">Customers Details</p>
    @if (Session::get('user') && Session::get('user')['user_type'] == 'admin')
        {{-- <a href="{{route('bookings.create')}}" class="btn btn-sm btn-primary my-2">Add New</a> --}}
        <a href="" class="btn btn-sm btn-primary my-2" target="_blank">Generate Report</a>
    @endif
    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Mobile No</th>
                <th>Gender</th>
                <th>Address</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($customers as $customer)
            <tr>
                <td>{{$customer->fname}}</td>
                <td>{{$customer->lname}}</td>
                <td>{{$customer->phone_no}}</td>
                <td>{{$customer->gender}}</td>
                <td>{{$customer->address}}</td>
                <td>
                    <form class="d-inline me-1" action="{{route('customer.show')}}" method="GET">
                        @csrf
                        @method('GET')
                        <input type="hidden" name="id" value="{{$customer->id}}" />
                        <button type="submit" class="btn btn-sm btn-primary">View</a>
                    </form>
                    <form class="d-inline" action="" method="POST">
                        @csrf
                        @method('POST')
                        <input type="hidden" name="id" value="{{$customer->id}}" />
                        <button type="submit" class="btn btn-sm btn-secondary mx-2">Edit</a>
                    </form>
                    <form class="d-inline" action="" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{$customer->id}}">
                        @method('DELETE') <button type="submit" onclick="return deletedata()"
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
