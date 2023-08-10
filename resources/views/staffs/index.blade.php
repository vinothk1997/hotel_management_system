@extends('layouts.master')
@section('title', 'vehicleType')
@section('content')
    <p class="h3">Staffs</p>
    <a href="{{ route('staff.create') }}" class="btn btn-primary btn-sm">Add New</a>
    <table class="table" class="display" style="width:100%" id="example">
        <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>NIC</th>
                <th>DOB</th>
                <th>Gender</th>
                <th>Address</th>
                <th>Mobile</th>
                <th>position</th>
                <th>email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($staffs as $staff)
                <tr>
                    <td>{{ $staff->fname }}</th>
                    <td>{{ $staff->lname }}</th>
                    <td>{{ $staff->nic }}</th>
                    <td>{{ $staff->dob }}</th>
                    <td>{{ $staff->gender }}</th>
                    <td>{{ $staff->address }}</th>
                    <td>{{ $staff->phone_no }}</th>
                    <td>{{ $staff->position }}</th>
                    <td>{{ $staff->email }}</th>
                    <td>
                        <a href="" class="btn btn-sm btn-success">View</a>
                        <form class="d-inline" action="{{ route('staff.edit') }}" method="GET">
                            <input type="hidden" name="id" value="{{ $staff->id }}">
                            <button class="btn btn-sm btn-secondary">Edit</button>
                        </form>
                        {{-- @if ($staff->status == 'active')
                            <form class="d-inline" action="{{ route('staff.destroy', $staff->id) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        @endif --}}
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
