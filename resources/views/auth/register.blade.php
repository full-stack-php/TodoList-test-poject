@extends('layouts.app')

@section('content')
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="row w-100">
            <div class="col-lg-6 col-md-8 col-12 mx-auto p-4 login-card">
                <div class="text-center mb-4">
                    <img src="./assets/img/logo.svg" alt="Task Ease Logo" class="mb-3">
                </div>
                <form role="form" method="POST" action="{{ url('api/users/register') }}" id="register_form">
                    {{ csrf_field() }}
                    <div class="mb-3{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="form-label mb-8 h6">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Type your name" name="name" value="{{ old('name') }}" required autofocus>
                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="mb-3"{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="form-label mb-8 h6">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="test@gmail.com" name="email" value="{{ old('email') }}" required>

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                   @endif
                    </div>
                    <div class="mb-3{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password" class="form-label mb-8 h6">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Password" name="password" value="" required>

                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="mb-12 ">
                        <label for="password_confirmation" class="form-label mb-8 h6">Confirm password</label>
                        <input type="password" class="form-control" id="password_confirmation" placeholder="Confirm password" name="password_confirmation" value="">
                    </div>
                    <button type="submit" class="btn btn-main w-100 mb-12 mt-3">Sign up</button>
                </form>
                <div class="text-center">
                    <p class="text-dark font-15">Already have an account? <a href="{{ url('/login') }}" class="hover-text-decoration-underline fw-medium">Log in</a></p>
                </div>
            </div>
        </div>
    </div>
@endsection
