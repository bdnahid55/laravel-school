@extends('back.layout.auth-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Reset Password')
@section('content')

    <div class="login-box bg-white box-shadow border-radius-10">
        <div class="login-title">
            <h2 class="text-center text-primary">Reset Password</h2>
        </div>
        <h6 class="mb-20">Enter your new password, confirm and submit</h6>

        <form action="{{ route('admin.password-reset-handler',['token'=>request()->token]) }}" method="POST">
            {{-- <form action="{{ route('admin.password-reset-handler') }}" method="POST"> --}}
            @csrf

            @if (Session::get('fail'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    {{ Session::get('fail') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            @endif

            @if (Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ Session::get('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            @endif

            <div class="input-group custom">
                <input type="email" name="email" class="form-control form-control-lg" placeholder="Email">
                <div class="input-group-append custom">
                    <span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
                </div>
            </div>

            <div class="input-group custom">
                <input type="text" name="new_password" class="form-control form-control-lg" placeholder="New Password">
                <div class="input-group-append custom">
                    <span class="input-group-text"><i class="dw dw-padlock1"></i></span>
                </div>
            </div>

            @error('new_password')
                <div style="color: red">{{ $message }}</div><br>
            @enderror

            <div class="input-group custom">
                <input type="text" name="new_password_confirmation" class="form-control form-control-lg" placeholder="Confirm New Password">
                <div class="input-group-append custom">
                    <span class="input-group-text"><i class="dw dw-padlock1"></i></span>
                </div>
            </div>

            @error('new_password_confirmation')
                <div style="color: red">{{ $message }}</div><br>
            @enderror

            <div class="row align-items-center">
                <div class="col-5">
                    <div class="input-group mb-0">
                        <input class="btn btn-primary btn-lg btn-block" type="submit" value="Submit">
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection
