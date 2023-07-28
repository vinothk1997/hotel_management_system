@extends('layouts.master')
@section('title', 'familyHeads')
@section('content')
    <p class="h3">Dashboard</p>
    @if (Session::get('user') && Session::get('user')['user_type'] == 'admin')
        <a href="" class="btn btn-sm btn-primary my-2">Add New</a>
        <a href="" class="btn btn-sm btn-primary my-2" target="_blank">Generate Report</a>
    @endif
    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Room No</th>
                <th>Booking Date</th>
                <th>Arival Date</th>
                <th>Departure Date</th>
                <th>Date of birth</th>
                <th>No of Adults</th>
                <th>No of Childrens</th>
                <th>Room Type</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            {{-- @foreach ($familyHeads as $familyHead) --}}
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
               
                <td>
                    <form class="d-inline me-1" action="" method="GET">
                        @csrf
                        @method('GET')
                        <input type="hidden" name="familyId" value="" />
                        <button type="submit" class="btn btn-sm btn-primary">View</a>
                    </form>
                    <form class="d-inline" action="" method="POST">
                        @csrf
                        @method('POST')
                        <input type="hidden" name="familyId" value="" />
                        <button type="submit" class="btn btn-sm btn-secondary mx-2">Edit</a>
                    </form>
                    <form class="d-inline" action="" method="POST">
                        @csrf
                        <input type="hidden" name="familyId" value="">
                        @method('DELETE') <button type="submit" onclick="return deletedata()"
                            class="btn btn-sm btn-danger">Delete</a>
                    </form>
                </td>
            </tr>
            {{-- @endforeach --}}
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
