@extends('layouts.master')
@section('title', 'create-price')
@section('content')
    <div class="container mt-3">
    <a href="{{ route('price.index') }}" class="btn btn-sm btn-secondary my-2">Back</a>
        <div>
            <p class="h3">Edit Price for Room </p>
        </div>
        <Form action="{{ route('price.update') }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label>Price Per Day</label>
                       <input type="text" name="price_per_day" class="form-control" value="{{$price->price_per_day}}"/>
                    </div>
                </div>
            </div>
            <input type="hidden" name="id" value="{{$price->id}}"/>
            <button class="btn btn-sm btn-primary my-2" type="submit">Save</button>
        </Form>
    </div>
@endsection
