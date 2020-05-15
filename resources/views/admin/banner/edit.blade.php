@extends('layouts.dashboard_master')
@section('banner')
active

@endsection

@section('content')

<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="index.html">Starlight</a>
      <span class="breadcrumb-item active">Banner Edit</span>
    </nav>

    <div class="sl-pagebody">

      <div class="row row-sm">

        <div class="card pd-20 pd-sm-40 col-md-6 m-auto">

            <h6 class="card-body-title">Edit Banner
            <a href="{{route('all.banner')}}" style="float:right;" class="btn btn-primary">Show list</a>
            </h6>
        <form method="post" action="{{url('Banner-Update/'.$banners->id)}}" enctype="multipart/form-data">
                @csrf
        <input type="hidden" name="old_image" value="{{$banners->banner_image}}">

                <div class="modal-body col-md-12  pd-20">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Banner Title</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$banners->banner_title}}" name="banner_title">
                      @error('banner_title')
                      <strong class="text-danger">{{$message}}</strong>
                      @enderror

                  </div>

                  <div class="form-group">
                    <label for="message-text" class="col-form-label">Description:</label>
                    <textarea class="form-control @error('banner_description') is-invalid @enderror" name="banner_description" id="message-text">{{$banners->banner_description}}</textarea>
                      @error('banner_description')
                      <strong class="text-danger">{{$message}}</strong>
                      @enderror

                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Banner Image</label>
                    <input type="file" class="form-control"  aria-describedby="emailHelp"  name="banner_image">
                    <img style="float:right;" src="{{asset($banners->banner_image)}}" alt="image" height="70px;" width="100px;">
                    @error('banner_image')
                    <strong class="text-danger">{{$message}}</strong>
                    @enderror
                  </div>
                </div><!-- modal-body -->
                <div class="form-group ml-3">
                    <label for="message-text" class="col-form-label"></label>
                    <button type="submit" class="btn btn-info pd-x-20">Add </button>

                  </div>

              </form>



        <div class="col-md-4"></div>

    </div>
</div>
</div>

@endsection
