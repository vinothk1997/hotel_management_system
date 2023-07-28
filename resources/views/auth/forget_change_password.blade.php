@extends('layouts.master')
@section('title','forget_change_password')
@section('content')
<div class="w-100 d-flex justify-content-center align-items-center">
    <form action="{{route('auth.storeConfirmedpassword')}}" method="POST" onsubmit="return check_password();">
        @csrf
        <div>
            <label class="form-label">User Name:</label>
            <input name="user_name" type="text" id="user_name" value="@if($user_name){{$user_name}} @endif" readonly
                class=" form-control">
        </div>
        <div>
            <label class="form-label">New Password:</label>
            <input type="text" name="new_password" id="new_password" class="form-control">
        </div>
        <div>
            <label class="form-label">Confirm Password:</label>
            <input type="text" name="confirm_new_password" id="confirm_new_password" class="form-control">
        </div>
        <div class="my-3">
            <a href="" name="clear" class="btn btn-primary px-5 ">Clear</a>
            <input type="submit" class="btn btn-success ms-3 px-5" value="Verify" />
        </div>
    </form>
    <script>
    function check_password() {
        var new_password = document.getElementById('new_password').value;
        var confirm_new_password = document.getElementById('confirm_new_password').value;
        if (new_password == confirm_new_password) {
            return true;
        } else {
            alert('Password mismatched!!!')
            return false;
        }

    }
    </script>
</div>
@endsection