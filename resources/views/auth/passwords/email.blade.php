@extends('layouts.app')

<!-- Main Content -->
@section('content')
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="row w-100">
            <div class="col-lg-6 col-md-8 col-12 mx-auto p-4 login-card">
                <div class="text-center mb-4">
                    <img src="/assets/img/logo.svg" alt="Task Ease Logo" class="mb-3">
                </div>
                <div >
                    <h2 class="mb-8">Forgot Password?</h2>
                    <p class="text-gray font-15 mb-32">Lost your password? Please enter your email address. You will receive a link to create a new password via email.</p>
                </div>
                <form role="form" method="POST" action="{{ url('/password/email') }}">
                {{ csrf_field() }}
                    <div class="mb-12{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="form-label mb-8 h6">E-Mail Address</label>
                        <input type="email" class="form-control" id="email" placeholder="test@gmail.com" name="email" value="{{ old('email') }}" required>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-main w-100 mb-12 mt-3">Send reset link</button>
                </form>
                <div class="text-center">
                    <p class="text-dark font-15">
                        <a href="{{ url('/login') }}" class="fw-medium">
                            <i class="fa fa-arrow-left"></i>
                            Back to login
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
