@extends('layouts.master')
@section('title','edit-vehicleType')
@section('content')
@php
  $positions=['Manager','Cashier','cleaning Staff'];
@endphp
<div class="container mt-3">
    <a class="btn btn-primary btn-sm" href="{{route('staff.index')}}">Back</a>
    <p class="h3">Edit Staff Form</p>
    <Form action="{{route('staff.update')}}" method="POST">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label>First Name:</label>
                    <input type="text" name="fname" onkeypress="return isTextKey(event)" value="{{ $staff->fname }}"
                        id="" class="form-control @error('fname') is-invalid @enderror">
                    @error('fname')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label>Last Name:</label>
                    <input type="text" name="lname" onkeypress="return isTextKey(event)"
                        value="{{ $staff->lname}}" id=""
                        class="form-control @error('lname') is-invalid @enderror">
                    @error('lname')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label>National Identity Card No:</label>
                    <input type="text" name="nic" value="{{ $staff->nic }}" id="nic"
                        class="form-control @error('nic') is-invalid @enderror">
                    @error('nic')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label>Date of Birth:</label>
                    <input type="date" name="dob" value="{{ $staff->dob}}" id="dob" readonly
                        class="form-control @error('dob') is-invalid @enderror">
                    @error('dob')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label>Gender:</label>
                    <input type="text" name="gender" value="{{ $staff->gender}}" id="gender" readonly
                        class="form-control @error('gender') is-invalid @enderror">
                    @error('gender')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label>Address:</label>
                    <input type="text" name="address" onkeypress="return isTextKey(event)"
                        value="{{ $staff->address }}" id=""
                        class="form-control @error('address') is-invalid @enderror">
                    @error('address')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label>Mobile No:</label>
                    <input type="text" name="mobile" onkeypress="return isNumberKey(event)"
                        onblur="return phonenumber('mobile')" value="{{ $staff->phone_no }}" id=""
                        class="form-control @error('mobile') is-invalid @enderror">
                    @error('mobile')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label>Email:</label>
                    <input type="email" name="email" id="" value="{{$staff->email}}"
                        class="form-control @error('email') is-invalid @enderror">
                    @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label>Designation:</label>
                    <select class="form-control @error('designation') is-invalid @enderror" name="designation"
                        id="designation" >
                        <option value="N/A">-- Choose designation --</option>
                        @foreach($positions as $position)
                        <option @if($staff->position==$position) selected @endif  >{{$position}}</option>
                        @endforeach

                    </select>
                </div>
                @error('designation')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <input type="hidden" name="id" value="{{$staff->id}}"/>
        <button class="btn btn-sm btn-primary my-2" type="submit">Update</button>
    </Form>
</div>
@endsection