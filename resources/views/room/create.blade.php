@extends('layouts.master')
@section('title', 'room')
@section('content')
    <div class="container mt-3">
        <div>
            <form class="d-inline me-1" action="{{ route('roomType.show') }}" method="GET">
                @csrf
                @method('GET')
                <input type="hidden" name="room_type_id" value="{{ $room_type_id }}" />
                <button type="submit" class="btn btn-sm btn-secondary">Back</a>
            </form>
        </div>
        <div>
            <p class="h3">Create Room Type </p>
        </div>
        <Form action="{{ route('room.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label>Room No:</label>
                        <input type="text" name="room_no" id=""
                            class="form-control  @error('room_no') is-invalid @enderror" value="{{ old('room_no') }}">
                        @error('room_no')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>No of Beds:</label>
                        <input type="text" name="no_of_beds" id="" onkeypress="return isNumberKey(event)"
                            class="form-control  @error('no_of_beds') is-invalid @enderror" value="{{ old('no_of_beds') }}">
                        @error('no_of_beds')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>No of Bathroom:</label>
                        <input type="text" name="no_of_bathrooms" id="" onkeypress="return isNumberKey(event)"
                            class="form-control  @error('no_of_bathrooms') is-invalid @enderror" value="{{ old('no_of_bathrooms') }}">
                        @error('no_of_bathrooms')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>Width (Feet):</label>
                        <input type="text" name="width" id="" onkeypress="return isNumberKey(event)"
                            class="form-control  @error('width') is-invalid @enderror" value="{{ old('width') }}">
                        @error('width')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>Length(Feet):</label>
                        <input type="text" name="length" id="" onkeypress="return isNumberKey(event)"
                            class="form-control  @error('width') is-invalid @enderror" value="{{ old('length') }}">
                        @error('length')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>No of Chairs:</label>
                        <input type="text" name="no_of_chairs" id="" onkeypress="return isNumberKey(event)"
                            class="form-control  @error('no_of_chairs') is-invalid @enderror" value="{{ old('no_of_chairs') }}">
                        @error('no_of_chairs')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>No of Tables:</label>
                        <input type="text" name="no_of_tables" id="" onkeypress="return isNumberKey(event)"
                            class="form-control  @error('no_of_tables') is-invalid @enderror" value="{{ old('no_of_tables') }}">
                        @error('no_of_tables')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <input type="hidden" name="room_type_id" value="{{$room_type_id}}"/>
            </div>
            <button class="btn btn-sm btn-primary my-2" type="submit">Save</button>
        </Form>
    </div>
@endsection
