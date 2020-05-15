@extends('layouts.dashboard_master')
@section('category')
active

@endsection

@section('content')

<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="index.html">Dragon</a>
      <span class="breadcrumb-item active">Category</span>
      <span class="breadcrumb-item active">Edit Category</span>
    </nav>

    <div class="sl-pagebody">

      <div class="row row-sm">

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Update Category</div>

                @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{session('success')}}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  @endif

                <div class="card-body">
                <form action="{{url('update.category/'.$category->id)}}" method="POST">
                        @csrf
                        <div class="form-group">
                          <label for="exampleInputEmail1">Category Name</label>
                        <input type="text" name="category_name" class="form-control @error('category_name') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$category->category_name}}">

                        @error('category_name')
                        <span class="text-danger">{{$message}}</span>
                        @enderror

                        </div>


                        <button type="submit" class="btn btn-primary">Update</button>
                      </form>

                </div>
            </div>
        </div>

    </div>
</div>
</div>
@endsection
