@extends('layouts.master')
@section('title','verification')
@section('content')
<div class="w-100 d-flex justify-content-center align-items-center ">
    <form action="{{route('auth.verifyCode')}}" method="POST" class="my- 5">
        @csrf
        <label class="form-label">Verification code:</label>
        <input onblur="return isNumberKey(event)" name="verification_code" type="text" id="verification_code"
            class="form-control">
        <input type="hidden" name="user_name" value="{{$user_name}}">
        <div class="my-3">
            <a href="" class="btn btn-primary px-5 ">Clear</a>
            <input type="submit" class="btn btn-success" />
        </div>
    </form>
</div>
@endsection