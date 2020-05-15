@extends('layouts.dashboard_master')

@section('content')

<div class="d-flex align-items-center justify-content-center bg-sl-primary ht-100v">

    <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white">
      <div class="signin-logo tx-center tx-24 tx-bold tx-inverse">Admin Login </div>
      <div class="mt-3"></div>
    <form action="{{route('login')}}" method="POST">
          @csrf
        <div class="form-group">
        <input type="email" name="email" class="form-control  @error('email') is-invalid @enderror" placeholder="Enter your Email" value="{{ old('email') }}">
        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
         @enderror
        </div><!-- form-group -->
        <div class="form-group">
            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter your password">

            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </div><!-- form-group -->
        <div class="form-group">
            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
            <span class="checkmark"></span>
            <label class="chech_container">Remember me

            </label>
            <a href="{{ route('password.request') }}" class="tx-info tx-12 d-block mg-t-10">Forgot password?</a>
        </div>

        <button type="submit" class="btn btn-info btn-block">Log In</button>
    </form>
    </div><!-- login-wrapper -->
  </div><!-- d-flex -->

@endsection
