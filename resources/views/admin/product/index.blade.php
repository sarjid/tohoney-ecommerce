@extends('layouts.dashboard_master')
@section('products')
active
@section('all_product')
active
@endsection

@endsection

@section('content')

<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="index.html">Starlight</a>
      <span class="breadcrumb-item active">All Prouduct</span>
    </nav>

    <div class="sl-pagebody">

      <div class="row row-sm">

        <div class="card pd-20 pd-sm-40 col-md-12 m-auto">

            <h6 class="card-body-title"> All Products
            <a href="{{route('add.product')}}" style="float:right;" class="btn btn-danger">Add New</a>
            </h6>

            <div class="table-wrapper">
              <table id="datatable1" class="table display responsive nowrap">
                <thead>
                    <tr>
                        <th class="wd-15p">SL</th>
                        <th class="wd-15p">Prouduct Name</th>
                        <th class="wd-20p">Prouduct image</th>
                        <th class="wd-20p">Prouduct price</th>
                        <th class="wd-20p">Prouduct Quantity</th>
                        <th class="wd-10p">Status</th>
                        <th class="wd-25p">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @php($serial = 1)
                        @foreach ($product as $row)
                     <tr>
                     <td>{{$serial++}}</td>
                     <td>{{$row->product_name}}</td>
                     <td><img src="{{asset($row->product_thambnail)}}" alt="image" height="40px;" width="40px;"></td>
                     <td>{{$row->product_price}}</td>
                     <td>{{($row->product_quantity)}}</td>
                   
                    <td>
                        @if($row->status == 1)
                        <span class="badge badge-success">Active</span>
                        @else 
                        <span class="badge badge-danger">Inactive</span>
                        @endif
    
                     </td>
    
                        <td>
                        <a href="{{ url('product-view/'.$row->id) }}" class="btn btn-sm btn-primary"  title="View"><i class="fa fa-eye"></i> </a>
                        <a href="{{ URL::to('Product-Edit/'.$row->id) }}" class="btn btn-sm btn-info" title="Edit" ><i class="fa fa-edit"></i></a>
                        <a href="{{ URL::to('Delete/Product/'.$row->id) }}" class="btn btn-sm btn-danger" id="delete" title="Delete" ><i class="fa fa-trash"></i></a>
                             
                        @if($row->status == 1)
                        <a href="{{url('product/inactive/'.$row->id)}}" class="btn btn-sm btn-danger" title="Status Active"><i class="fa fa-arrow-up"></i> </a>
                        @else
                        <a href="{{url('product/active/'.$row->id)}}" class="btn btn-sm btn-success" title="status Inactive"><i class="fa fa-arrow-down"></i> </a>  
                        @endif
                        </td>
                      </tr>
                      @endforeach


                </tbody>
              </table>
            </div><!-- table-wrapper -->
          </div><!-- card -->




        <div class="col-md-4"></div>

    </div>
</div>
</div>

@endsection
