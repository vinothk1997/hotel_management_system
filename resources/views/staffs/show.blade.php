@extends('layouts.master')
@section('title','vehicleType')
@section('content')
<p class="h3">Working History Details</p>
<a href="{{route('staff.index')}}" class="btn btn-primary btn-sm px-4">Go Back</a>
<a href="{{route('staffWorkplace.create',$staffId)}}" class="btn btn-success btn-sm px-4">Add</a>
<a href="{{route('report.generateStaffDeatailReport',$staffId)}}" class="btn btn-primary btn-sm px-4" target="_blank">Generate Report</a>
<div style="background-color:white;">
    <table class="table my-3 w-auto table-bordered ">
        <h5 class="mt-3">Summary Details</h5>
        <tr>
            <td class='fw-bold'>First Name</td>
            <td>{{$staff->first_name}}</td>
            <td class='fw-bold'>Last Name</td>
            <td>{{$staff->last_name}}</td>
            <td class='fw-bold'>National Identity Card No</td>
            <td>{{$staff->nic}}</td>
            <td class='fw-bold'>Date of Birth</td>
            <td>{{$staff->dob}}</td>
        </tr>
        <tr>
            <td class='fw-bold'>Gender</td>
            <td>{{$staff->gender}}</td>
            <td class='fw-bold'>Address</td>
            <td>{{$staff->address}}</td>
            <td class='fw-bold'>Mobile</td>
            <td>0{{$staff->mobile}}</td>
        </tr>


    </table>
    <div class='w-25 my-3'>
        @if($staff->status=='active')

        <a href="{{route('staff.edit',$staff->staff_id)}}" class=" btn btn-success w-100">Edit Staff</a>


        @endif
    </div>
</div>

<table class="table">
    <tr>
        <th>Start Date</th>
        <th>End Date</th>
        <th>Designation</th>
        <th>Place Worked</th>
    </tr>
    @foreach($staffWorkplaces as $staffWorkplace)
    <tr>
        <td>{{$staffWorkplace->start_date}}</th>
        <td>{{$staffWorkplace->end_date}}</th>
        <td>{{$staffWorkplace->designation}}</th>
        <td>{{$staffWorkplace->name}}</th>
            @if($staffWorkplace->end_date==null)
        <td>
            <a href="{{route('staffWorkplace.edit',[$staffWorkplace->staff_id,$staffWorkplace->start_date])}}"
                class="btn btn-sm btn-secondary">Edit</a>
        </td>
        @endif
    </tr>
    @endforeach
</table>
@endsection