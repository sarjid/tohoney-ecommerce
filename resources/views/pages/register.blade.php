@extends('layouts.fontend_master')
@section('title') Register  @endsection


@section('fontend_content')

            <!-- .breadcumb-area start -->
    <div class="breadcumb-area bg-img-4 ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcumb-wrap text-center">
                        <h2>Register</h2>
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li><span>Register</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- .breadcumb-area end -->
    <!-- checkout-area start -->
    <div class="account-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-12">
                    <div class="account-form form-style">
                    <form action="{{ route('Register') }}" method="POST">
                        @csrf
                        <p>Full Name*</p>
                        <input type="text" name="name" value="{{ old('name') }}" placeholder="Full Name">
                        @error('name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <p> Email Address *</p>
                        <input type="email" value="{{ old('email') }}" name="email" placeholder="Email Address">
                        @error('email')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <p>Password *</p>
                        <input type="password" value="{{ old('password') }}" name="password" placeholder="password">
                        @error('password')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror

                     @if(session('error'))
                     <span class="text-danger"><b>{{session('error')}}</b> </span>
                       @endif
                        <p>Confirm Password *</p>
                        <input type="password" value="{{ old('confirm_password') }}" name="confirm_password" placeholder="Re-type password">
                        @error('confirm_password')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <button>Register</button>
                    </form>
                        <div class="text-center">
                            <a href="{{ url('login') }}">Or Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- checkout-area end -->


@endsection
