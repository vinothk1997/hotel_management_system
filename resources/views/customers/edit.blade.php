@extends('layouts.master')
@section('content')
    <div class="container mt-3">
        <p class="h3">Join with us, </p>
        @if (Session::get('user') && Session::get('user')['user_type'] == 'admin')
            <a class="btn btn-sm btn-primary" href="{{route('customer.index')}}">Back</a>
        @endif
        <Form action="{{ route('customer.update') }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label>First Name:</label>
                        <input type="text" name="fname" id="" onkeypress="return isTextKey(event)"
                            class="form-control  @error('fname') is-invalid @enderror" value="{{ $customer->fname }}">
                        @error('fname')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>Last Name:</label>
                        <input type="text" name="lname" id="" onkeypress="return isTextKey(event)"
                            class="form-control @error('lname') is-invalid @enderror" value="{{$customer->lname}}">
                        @error('lname')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>National Identity Card:</label>
                        <input type="text" name="nic" id="nic" onblur="nicnumber()"
                            class="form-control @error('nic') is-invalid @enderror" value="{{$customer->nic}}">
                        @error('nic')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>Date of Birth:</label>
                        <input type="date" name="dob" id="dob"
                            class="form-control @error('dob') is-invalid @enderror" value="{{ $customer->dob }}">
                        @error('dob')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>Gender:</label>
                        <input type="text" name="gender" id="gender"
                            class="form-control @error('gender') is-invalid @enderror" value="{{ $customer->gender }}">
                        @error('gender')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>Mobile No:</label>
                        <input type="text" name="phone_no" id="phone_no" onblur="return phonenumber('mobile')"
                            class="form-control @error('mobile') is-invalid @enderror" value="{{ $customer->phone_no}}">
                        @error('phone_no')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label> Address:</label>
                        <input type="text" name="address" id="" onkeypress="return isTextKey(event)"
                            class="form-control @error('p_address') is-invalid @enderror" value="{{$customer->address}}">
                        @error('p_address')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label>Email:</label>
                        <input type="email" name="email" id=""
                            class="form-control @error('email') is-invalid @enderror" value="{{ $customer->email}}">
                        @error('house_no')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <input type="hidden" name="customer_id" value="{{$customer->id}}"/>
            <button class="btn btn-sm btn-primary my-2" type="submit">Save</button>
        </Form>
    </div>
@endsection
