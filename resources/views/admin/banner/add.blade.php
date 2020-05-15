@extends('layouts.dashboard_master')
@section('banner')
active

@endsection

@section('content')

<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="index.html">Starlight</a>
      <span class="breadcrumb-item active">Banner</span>
    </nav>

    <div class="sl-pagebody">

      <div class="row row-sm">

        <div class="card pd-20 pd-sm-40 col-md-6 m-auto">

            <h6 class="card-body-title">Add Banner
            <a href="{{route('all.banner')}}" style="float:right;" class="btn btn-danger">Show list</a>
            </h6>
        <form method="post" action="{{route('store.banner')}}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body col-md-12  pd-20">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Banner Title</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="title" name="banner_title">
                      @error('banner_title')
                      <strong class="text-danger">{{$message}}</strong>
                      @enderror

                  </div>

                  <div class="form-group">
                    <label for="message-text" class="col-form-label">Description:</label>
                    <textarea class="form-control @error('banner_description') is-invalid @enderror" placeholder="Banner Description" name="banner_description" id="message-text"></textarea>
                      @error('banner_description')
                      <strong class="text-danger">{{$message}}</strong>
                      @enderror

                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Banner Image</label>
                    <input type="file" class="form-control"  aria-describedby="emailHelp" onchange="readURL(this);"  name="banner_image">
                    <br>
                    <img src="#" id="one" >
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
