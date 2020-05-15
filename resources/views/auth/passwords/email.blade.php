@extends('layouts.dashboard_master')

@section('content')

<div class="d-flex align-items-center justify-content-center bg-sl-primary ht-100v">

    <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white">
      <div class="signin-logo tx-center tx-24 tx-bold tx-inverse">Reset Password</div>
      <hr>
     <div class="mt-5"></div>
      <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <div class="form-group">
        <input type="email" name="email" class="form-control  @error('email') is-invalid @enderror" placeholder="Enter your Email" value="{{ old('email') }}">
        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
         @enderror
        </div><!-- form-group -->


        <button type="submit" class="btn btn-info btn-block"> {{ __('Send Password Reset Link') }}</button>
    </form>
    </div><!-- login-wrapper -->
  </div><!-- d-flex -->


@endsection
