@extends('layouts.app')

@section('content')
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="row w-100">
            <div class="col-lg-6 col-md-8 col-12 mx-auto p-4 login-card">
                <div class="text-center mb-4">
                    <img src="./assets/img/logo.svg" alt="Task Ease Logo" class="mb-3">
                </div>
                <form role="form" method="POST" action="{{ url('/login') }}" id="login_form">
                    {{ csrf_field() }}
                    <div class="mb-8 {{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="form-label mb-8 h6">Log In</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="test@gmail.com"  value="{{ old('email') }}" required autofocus>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="mb-16 {{ $errors->has('password') ? ' has-error' : '' }}">
                        <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="d-flex justify-content-between flex-wrap mb-12">
                        <div class="form-check">
                            <input type="checkbox" name="remember" class="form-check-input flex-shrink-0 rounded-1" value id="remember" {{ old('remember') ? 'checked' : ''}}>
                            <label class="form-check-label flex-grow-1 font-15" for="remember">Remember me</label>
                        </div>
                        <a href="{{ url('/password/reset') }}" class="font-15 hover-text-decoration-underline fw-medium">Forgot password?</a>
                    </div>
                    <button type="submit" class="btn btn-main w-100 mb-12">Login</button>
                </form>
                <div class="text-center">
                    <p class="text-dark font-15">Do you have an account? <a href="{{ url('/register') }}" class="hover-text-decoration-underline fw-medium">Sign Up</a></p>
                </div>
            </div>
        </div>
    </div>
@endsection
