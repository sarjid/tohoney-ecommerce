@extends('layouts.dashboard_master')
@section('coupon') active @endsection

@section('content')

<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="index.html">Starlight</a>
      <span class="breadcrumb-item active">Coupon Edit</span>

    </nav>

    <div class="sl-pagebody">

      <div class="row row-sm">
        <div class="col-md-8 m-auto">
            <div class="card">
                <div class="card-header">Coupon Edit
                </div>

                <div class="card-body">

                    <form action="{{ url('Coupon/Update/'.$coupons->id) }}" method="POST">
                        @csrf
                        <div class="form-group">
                          <label for="exampleInputEmail1">Coupon Name <span class="text-danger">*</span></label>
                          <input type="text" name="coupon_name" class="form-control @error('coupon_name') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $coupons->coupon_name }}">

                          @error('coupon_name')
                        <span class="text-danger">{{$message}}</span>
                          @enderror

                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Coupon Discount ( % ) <span class="text-danger">*</span></label>
                            <input type="number" name="discount_amount" class="form-control @error('discount_amount') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $coupons->discount_amount }}">

                            @error('discount_amount')
                          <span class="text-danger">{{$message}}</span>
                            @enderror

                          </div>


                        <div class="form-group">
                            <label for="exampleInputEmail1">Validity Till <span class="text-danger">*</span></label>
                            <input type="text" readonly  class="form-control @error('validity_till') is-invalid @enderror" id="exampleInputEmail1" value="{{ Carbon\Carbon::parse ($coupons->validity_till)->format('d F Y') }}" aria-describedby="emailHelp" >

                            <input type="date" name="validity_till" class="form-control @error('validity_till') is-invalid @enderror" id="exampleInputEmail1" min="{{ Carbon\Carbon::now()->format('Y-m-d') }}" aria-describedby="emailHelp" >


                            @error('validity_till')
                          <span class="text-danger">{{$message}}</span>
                            @enderror

                          </div>




                        <button type="submit" class="btn btn-primary">Add</button>
                      </form>




                </div>
            </div>
        </div>

    </div>
</div>
</div>

@endsection
