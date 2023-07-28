@extends('layouts.master')
@section('title','forget_change_password')
@section('content')
<div class="w-100 d-flex justify-content-center align-items-center">
    <form class="h-100" action="{{route('auth.changePassword')}}" method="POST" onsubmit="return check_password()">
        @csrf
        <div>
            <label class="form-label">User Name:</label>
            <input type="text" name="user_name" id="user_name" value="{{Session::get('user')['name']}}" readonly
                class="form-control">
        </div>
        <div>
            <label class="form-label">Current Password:</label>
            <input type="password" name="current_password" id="user_name" class="form-control">
        </div>
        <div>
            <label class="form-label">New Password:</label>
            <input type="password" name="new_password" id="new_password" class="form-control">
        </div>
        <div>
            <label class="form-label">Confirm Password:</label>
            <input type="password" name="confirm_new_password" password="confirm_new_password" id="confirm_new_password"
                class="form-control">
        </div>
        <div class="my-3">
            <a href="" name="clear" class="btn btn-primary px-5 ">Clear</a>
            <input type="submit" value="Change password" name="changePassword" class="btn btn-success ms-3 px-5" />
        </div>
    </form>
    <script>
    function check_password() {
        var new_password = document.getElementById('new_password').value;
        var confirm_new_password = document.getElementById('confirm_new_password').value;
        if (new_password.length < 1) {
            alert('Please enter your new password!');
            return false;
        }
        if (new_password == confirm_new_password) {
            return true;
        } else {
            alert('Password mismatched!!!');
            return false;
        }

    }
    </script>
    @if(isset($wrong_current_pw))
    <script>
    alert('You have entered wrong current password!');
    </script>
    @endif

    @if(isset($mismatched_pw))
    <script>
    alert('You entered password not mached with confirm password');
    </script>

    @endif
</div>
@endsection