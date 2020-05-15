@extends('layouts.dashboard_master')
@section('testimonial')
active

@endsection

@section('content')

<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="index.html">Starlight</a>
      <span class="breadcrumb-item active">Testimonial</span>
    </nav>

    <div class="sl-pagebody">

      <div class="row row-sm">

        <div class="card pd-20 pd-sm-40 col-md-6 m-auto">

            <h6 class="card-body-title">Add Client Review
            <a href="{{route('all.testimonial')}}" style="float:right;" class="btn btn-danger">Show ALL</a>
            </h6>
        <form method="post" action="{{route('store.testimonial')}}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body col-md-12  pd-20">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Name" name="name">
                      @error('name')
                      <strong class="text-danger">{{$message}}</strong>
                      @enderror
  
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Name Title</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="title" name="title">
                      @error('title')
                      <strong class="text-danger">{{$message}}</strong>
                      @enderror
  
                  </div>

                  <div class="form-group">
                    <label for="message-text" class="col-form-label">Review:</label>
                    <textarea class="form-control @error('review') is-invalid @enderror" placeholder="Client Review" name="review" id="message-text"></textarea>
                      @error('review')
                      <strong class="text-danger">{{$message}}</strong>
                      @enderror
  
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Client Image</label>
                    <input type="file" class="form-control" onchange="readURL(this);"  aria-describedby="emailHelp"  name="image">
                    <img src="#" id="one" >
                 
                    @error('image')
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

<script type="text/javascript">
	function readURL(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function (e) {
              $('#one')
                  .attr('src', e.target.result)
                  .width(80)
                  .height(80);
          };
          reader.readAsDataURL(input.files[0]);
      }
   }
</script>

@endsection
