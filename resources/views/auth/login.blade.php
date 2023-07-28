@extends('layouts.master')
@section('title','login')
@section('content')
<div id="updated"></div>
<div class="w-100 d-flex justify-content-center align-items-center">

    <form class="h-100 m-5" action="{{route('auth.login')}}" method="POST">
        @csrf
        <div>
            <label class="form-label">User Name:</label>
            <input name="user_name" type="text" id="user_name" class="form-control">
            <label class="text-danger text-center " id="user_error"></label>
            @if(isset($message))
            @if ( $message=="user_error" )
            <script>
            document.getElementById("user_error").innerText = "User name is incorrect";
            </script>
            @endif
            @endif
        </div>
        <div>
            <label clas="form-label">Password:</label>
            <input name="password" type="password" id="password" class="form-control">
            <label class="text-danger text-center " id="password_error"></label>
            @if(isset($message))
            @if ( $message=="password_error" )
            <script>
            document.getElementById("password_error").innerText = "Your password is wrong , try again";
            </script>
            @endif
            @endif
        </div>
        <div class="my-3">
            <a href="/" class="btn btn-primary px-5 ">Cancel</a>
            <input type="submit" value="Login" class="btn btn-success ms-3 px-5" />
        </div>
        <div class="text-success" id="updated"></div>
        <div>
            <a href="{{route('auth.customForgetPassword')}}">forget password?</a>
        </div>
        @if(Session::has('updated'))
        <script>
        var updating = setTimeout(update, 1);
        var clear = setTimeout(clear, 6000)

        function clear() {
            clearTimeout(updating);
            document.getElementById('updated').innerText = "";
            document.getElementById('updated').className = "";

        }

        function update() {
            document.getElementById('updated').innerText = "Your new password has been updated.";
            document.getElementById('updated').classList.add('alert', 'alert-info');

        }
        </script>
        @endif
        @if(isset($changed))
        <script>
        alert('Your password  has been changed, Login again!');
        </script>

        @endif
    </form>
</div>
@endsection