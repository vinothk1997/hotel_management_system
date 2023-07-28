@extends('layouts.master')
@section('title','login')
@section('content')
<div class="w-100 d-flex justify-content-center align-items-center ">
    <form class="h-100 my-5" action="{{route('auth.recover')}}" method="POST">
        @csrf
        <div>
            <label class="form-label">User Name:</label>
            <input type="text" name="user_name" id="user_name"
                value="@if(Session::has('name')){{Session::get('name')}} @endif" class="form-control"
                @if(Session::has('name')) readonly @endif>
            <label id="wrong_user_name" class="d-block  text-danger"></label>
            @if(isset($wrong_user))
            @if($wrong_user==true)
            <script>
            document.getElementById('wrong_user_name').innerText = "*Your user name is not correct."
            </script>
            @endif
            @endif
        </div>
        <div>
            <label clas="form-label">Mobile:</label>
            <input name="mobile" onblur="return phonenumber('mobile')" onkeypress="return isNumberKey(event)"
                type="text" id="mobile" class="form-control">
        </div>
        <label id="wrong_mobile_number" class="d-block  text-danger"></label>
        @if(isset($wrong_mobile))
        @if($wrong_mobile==true)
        <script>
        document.getElementById('wrong_mobile_number').innerText = "*Invalid mobile Number."
        </script>
        @endif
        @endif
        <div class="my-3">
            <a href="" class="btn btn-primary px-5 ">Clear</a>
            <input type="submit" class="btn btn-success ms-3 px-5" value="Recover" />
        </div>
        <div class="modal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Modal body text goes here.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary">Save changes</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

@endsection