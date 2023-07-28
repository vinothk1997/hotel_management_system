@extends('layouts.master')
@section('title', 'create-booking')
@section('content')
    <div class="container mt-3">
        <div>
            <p class="h3">Create a Booking for Room, </p>
            <form class="d-inline me-1" action="{{ route('customer.show') }}" method="GET">
                @csrf
                @method('GET')
                <input type="hidden" name="id" value="{{ $customer_id }}" />
                <button type="submit" class="btn btn-sm btn-secondary">Back</a>
            </form>
        </div>
        <Form action="{{ route('bookings.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label>Type of Room:</label>
                        <select name="room_type" class="form-control">
                            <option>Select Room Type</option>
                        </select>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>Room No:</label>
                        <input type="text" name="room_no" id="" onkeypress="return isTextKey(event)"
                            class="form-control  @error('room_no') is-invalid @enderror" value="{{ old('room_no') }}">
                        @error('room_no')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>Date of Arival:</label>
                        <input type="date" name="arival_date" id="" onkeypress="return isTextKey(event)"
                            class="form-control @error('arival_date') is-invalid @enderror"
                            value="{{ old('arival_date') }}">
                        @error('arival_date')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>Date of Departure:</label>
                        <input type="date" name="departure_date" id="departure_date"
                            class="form-control @error('departure_date') is-invalid @enderror"
                            value="{{ old('departure_date') }}">
                        @error('departure_date')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>Time of Arival:</label>
                        <input type="date" name="arival_time" id="arival_time"
                            class="form-control @error('arival_time') is-invalid @enderror"
                            value="{{ old('arival_time') }}">
                        @error('arival_time')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>Time of Departure:</label>
                        <input type="date" name="departure_time" id="departure_time"
                            class="form-control @error('departure_time') is-invalid @enderror"
                            value="{{ old('departure_time') }}">
                        @error('departure_time')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>No of Adults:</label>
                        <input type="text" name="no_of_adults" id="no_of_adults"
                            class="form-control @error('no_of_adults') is-invalid @enderror"
                            value="{{ old('no_of_adults') }}">
                        @error('no_of_adults')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label>No of Childrens:</label>
                        <input type="text" name="no_of_children" id="no_of_children"
                            class="form-control @error('no_of_children') is-invalid @enderror"
                            value="{{ old('no_of_children') }}">
                        @error('no_of_children')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label> Room Type:</label>
                        <select class="form-control" name="room_type">
                            <option>Select room Type</option>
                            <option>Luxury</option>
                        </select>
                    </div>
                </div>
                <input type="hidden" name="customer_id" value="{{ $customer_id }}" />
                {{-- <div class="col-6">
                    <div class="form-group">
                        <label>Customer:</label>
                        <select class="form-control" name="customer">
                            <option>Select Customer</option>
                            @foreach ($customers as $customer)
                                <option value="{{$customer->id}}">{{$customer->fname}} ({{$customer->phone_no}})</option>
                            @endforeach
                        </select>
                    </div>
                </div> --}}
            </div>
            <button class="btn btn-sm btn-primary my-2" type="submit">Reserve</button>
        </Form>
    </div>
@endsection
