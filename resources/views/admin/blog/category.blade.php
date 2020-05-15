@extends('layouts.dashboard_master')
@section('blog')
active

@endsection

@section('content')

<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="index.html">Starlight</a>
      <span class="breadcrumb-item active">Blog</span>
      <span class="breadcrumb-item active">Category All</span>
    </nav>

    <div class="sl-pagebody">

      <div class="row row-sm">

        <div class="card pd-20 pd-sm-40 col-md-8 m-auto">

            <h6 class="card-body-title"> All Category
           
            </h6>

            <div class="table-wrapper">
              <table id="datatable1" class="table display responsive nowrap">
                <thead>
                  <tr>
                    <th class="wd-15p">SL</th>
                    <th class="wd-15p">Category Name</th>
                    <th class="wd-10p">Status</th>
                    <th class="wd-25p">Action</th>
                  </tr>
                </thead>
                <tbody>
                   @php($serial = 1)
                    @foreach ($category as $row)
                 <tr>
                 <td>{{$serial++}}</td>
                 <td>{{$row->category_name}}</td>

               
                <td>
                    @if($row->status == 1)
                    <span class="badge badge-success">Active</span>
                    @else 
                    <span class="badge badge-danger">Inactive</span>
                    @endif

                 </td>

                    <td>
                    <a href="{{ URL::to('Banner-view/'.$row->id) }}" class="btn btn-sm btn-primary"  title="View"><i class="fa fa-eye"></i> </a>
                    <a href="{{ URL::to('Banner-Edit/'.$row->id) }}" class="btn btn-sm btn-info" title="Edit" ><i class="fa fa-edit"></i></a>
                    <a href="{{ URL::to(''.$row->id) }}" class="btn btn-sm btn-danger" title="Delete" ><i class="fa fa-trash"></i></a>
                         
                    @if($row->status == 1)
                    <a href="{{url('inactive/'.$row->id)}}" class="btn btn-sm btn-danger" title="Status Active"><i class="fa fa-arrow-up"></i> </a>
                    @else
                    <a href="{{url('active/'.$row->id)}}" class="btn btn-sm btn-success" title="status Inactive"><i class="fa fa-arrow-down"></i> </a>  
                    @endif
                    </td>
                  </tr>
                  @endforeach 


                </tbody>
              </table>
            </div><!-- table-wrapper -->
          </div><!-- card -->


        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Add Category
                </div>

                <div class="card-body">

                    <form action="{{route('blog.category.store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                          <label for="exampleInputEmail1">Add Category</label>
                          <input type="text" name="category_name" class="form-control @error('category_name') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Category">

                          @error('category_name')
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
