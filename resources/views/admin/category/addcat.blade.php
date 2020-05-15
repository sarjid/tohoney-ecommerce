@extends('layouts.dashboard_master')
@section('category')
active

@endsection

@section('content')

<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="index.html">Dragon</a>
      <span class="breadcrumb-item active">Category</span>
      <span class="breadcrumb-item active">Add Category</span>
    </nav>

    <div class="sl-pagebody">

      <div class="row row-sm">


        <div class="col-md-8 m-auto">
            <div class="card">
                <div class="card-header">Add Category</div>

                @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{session('success')}}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  @endif

                <div class="card-body">
                <form action="{{route('add.category')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                          <label for="exampleInputEmail1">Category Name</label>
                          <input type="text" name="category_name" class="form-control @error('category_name') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Category">

                        @error('category_name')
                        <span class="text-danger">{{$message}}</span>
                        @enderror

                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Category Image</label>
                            <input type="file" name="category_photo" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >

                          @error('category_photo')
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
