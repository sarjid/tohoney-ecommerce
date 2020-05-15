@extends('layouts.dashboard_master')
@section('blog')
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

        <div class="card pd-20 pd-sm-40 col-md-12 m-auto">

            <h6 class="card-body-title">View Comments
            <a href="{{route('post.comment')}}" style="float:right;" class="btn btn-danger">Back</a>
            </h6>
     
                <div class="modal-body col-md-12  pd-20">
                    <div class="col-lg-8">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Post Title</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$comments->post->title}}">
            
                  </div>
                </div>

                <div class="col-lg-4">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$comments->name}}">
            
                  </div>
                </div>

                <div class="col-lg-4">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$comments->email}}" name="title">
                     
  
                  </div>
                </div>
                
                <div class="col-lg-8">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Post Image</label> <br>
                     
                    <img src="{{asset($comments->post->image)}}"  style="height:70px; width:70px;" >
                  
                    </div>
                  </div>

                  <div class="col-lg-8">
                  <div class="form-group">
                    <label for="message-text" class="col-form-label">Review:</label>
                    <textarea class="form-control "  cols="50" rows="6"  name="review" id="message-text">{{$comments->comment}}</textarea>
                  
                  </div>
                </div>
              
                </div><!-- modal-body -->
              
    </div>
</div>
</div>

@endsection
