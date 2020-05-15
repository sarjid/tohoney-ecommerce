@extends('layouts.dashboard_master')
@section('coupon') active @endsection

@section('content')

<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="index.html">Starlight</a>
      <span class="breadcrumb-item active">Coupon</span>

    </nav>

    <div class="sl-pagebody">

      <div class="row row-sm">

        <div class="card pd-20 pd-sm-40 col-md-8 m-auto">

            <h6 class="card-body-title"> Product Coupon

            </h6>

            <div class="table-wrapper">
              <table id="datatable1" class="table display responsive nowrap">
                <thead>
                  <tr>
                    <th class="wd-15p">SL</th>
                    <th class="wd-15p">Coupon Name</th>
                    <th class="wd-10p">Discount</th>
                    <th class="wd-10p">validity Till</th>
                    <th class="wd-10p">Status</th>
                    <th class="wd-25p">Action</th>
                  </tr>
                </thead>
                <tbody>
                   @php($serial = 1)
                    @foreach ($coupons as $row)
                 <tr>
                 <td>{{$serial++}}</td>
                 <td>{{$row->coupon_name}}</td>
                 <td>{{ $row->discount_amount }}%</td>
                 <td>{{ Carbon\Carbon::parse ($row->validity_till)->format('d F Y') }}</td>
                 <td>
                     
                     @if ($row->validity_till >= Carbon\Carbon::now()->format('Y-m-d'))
                    <span class="badge badge-success">Valid </span>
                     @else 
                     <span class="badge badge-danger">Invalid </span>
                     @endif
                </td>
                 <td>
                    <a href="{{ URL::to('Banner-view/'.$row->id) }}" class="btn btn-sm btn-primary"  title="View"><i class="fa fa-eye"></i> </a>
                    <a href="{{ URL::to('Product/Coupon-Edit/'.$row->id) }}" class="btn btn-sm btn-info" title="Edit" ><i class="fa fa-edit"></i></a>
                    <a href="{{ URL::to('Coupon/Delete/'.$row->id) }}" id="delete" class="btn btn-sm btn-danger" title="Delete" ><i class="fa fa-trash"></i></a>
                </td>

                  </tr>
                  @endforeach


                </tbody>
              </table>
            </div><!-- table-wrapper -->
          </div><!-- card -->


        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Coupon Add
                </div>

                <div class="card-body">

                    <form action="{{route('coupon.store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                          <label for="exampleInputEmail1">Coupon Name <span class="text-danger">*</span></label>
                          <input type="text" name="coupon_name" class="form-control @error('coupon_name') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="coupon_name">

                          @error('coupon_name')
                        <span class="text-danger">{{$message}}</span>
                          @enderror

                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Coupon Discount ( % ) <span class="text-danger">*</span></label>
                            <input type="number" name="discount_amount" class="form-control @error('discount_amount') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Discount Amount">

                            @error('discount_amount')
                          <span class="text-danger">{{$message}}</span>
                            @enderror

                          </div>


                        <div class="form-group">
                            <label for="exampleInputEmail1">Validity Till <span class="text-danger">*</span></label>
                            <input type="date" name="validity_till" class="form-control @error('validity_till') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" min="{{ Carbon\Carbon::now()->format('Y-m-d') }}" >

                            @error('validity_till')
                          <span class="text-danger">{{$message}}</span>
                            @enderror

                          </div>




                        <button type="submit" class="btn btn-primary">Add Coupon</button>
                      </form>




                </div>
            </div>
        </div>

    </div>
</div>
</div>

@endsection
