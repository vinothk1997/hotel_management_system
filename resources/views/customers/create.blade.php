@extends('layouts.master')
@section('content')
    <div class="container mt-3">
        <p class="h3">Join with us, </p>
        @if (Session::get('user') && Session::get('user')['user_type'] == 'admin')
            <a class="btn btn-sm btn-primary" href="{{ route('customer.index') }}">Back</a>
        @endif
        <Form action="{{ route('customer.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label>First Name:</label>
                        <input type="text" name="fname" id="" onkeypress="return isTextKey(event)"
                            class="form-control  @error('fname') is-invalid @enderror" value="{{ old('fname') }}">
                        @error('fname')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>Last Name:</label>
                        <input type="text" name="lname" id="" onkeypress="return isTextKey(event)"
                            class="form-control @error('lname') is-invalid @enderror" value="{{ old('lname') }}">
                        @error('lname')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>National Identity Card:</label>
                        <input type="text" name="nic" id="nic" onblur="nicnumber()"
                            class="form-control @error('nic') is-invalid @enderror" value="{{ old('nic') }}">
                        @error('nic')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>Date of Birth:</label>
                        <input type="date" name="dob" id="dob"
                            class="form-control @error('dob') is-invalid @enderror" value="{{ old('dob') }}">
                        @error('dob')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>Gender:</label>
                        <select name="gender" id="gender"   class="form-control @error('gender') is-invalid @enderror">
                            <option value="">Select gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                        @error('gender')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>Mobile No:</label>
                        <input type="text" name="phone_no" id="phone_no" onblur="return phonenumber('mobile')"
                            class="form-control @error('phone_no') is-invalid @enderror" value="{{ old('phone_no') }}">
                        @error('phone_no')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label> Address:</label>
                        <input type="text" name="address" id="" onkeypress="return isTextKey(event)"
                            class="form-control @error('address') is-invalid @enderror" value="{{ old('address') }}">
                        @error('address')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label>Email:</label>
                        <input type="email" name="email" id=""
                            class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                        @error('email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <button class="btn btn-sm btn-primary my-2" type="submit">Register</button>
        </Form>
    </div>
@endsection
