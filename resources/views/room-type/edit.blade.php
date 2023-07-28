@extends('layouts.master')
@section('title', 'create-room-type')
@section('content')
    <div class="container mt-3">
    <a href="{{ route('roomType.index') }}" class="btn btn-sm btn-secondary my-2">Back</a>
        <div>
            <p class="h3">Edit Room Type </p>
        </div>
        <Form action="{{ route('roomType.update') }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label>Type of Room:</label>
                       <input type="text" name="room_type" class="form-control" value="{{$roomType->type}}"/>
                    </div>
                </div>
            </div>
            <input type="hidden" name="room_type_id" class="form-control" value="{{$roomType->id}}"/>
            <button class="btn btn-sm btn-primary my-2" type="submit">Save</button>
        </Form>
    </div>
@endsection
