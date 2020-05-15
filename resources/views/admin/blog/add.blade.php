@extends('layouts.dashboard_master')
@section('blog')
active

@endsection

@section('content')

<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="index.html">Starlight</a>
      <span class="breadcrumb-item active">Add Post</span>
    </nav>

    <div class="sl-pagebody">

      <div class="row row-sm">

        <div class="card pd-20 pd-sm-40 col-md-12 m-auto">

            <h6 class="card-body-title">Add Post
            <a href="{{route('all.post')}}" style="float:right;" class="btn btn-danger">ALL Post</a>
            </h6>
        <form action="{{route('store.post')}}" method="post" enctype="multipart/form-data">
                @csrf

            <div class="form-layout">
              <div class="row mg-b-25">

                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">Post Title: <span class="tx-danger">*</span></label>
                    <input class="form-control @error('title') is-invalid @enderror" placeholder="post Title" type="text" name="title">
                    @error('title')
                    <strong class="text-danger">{{$message}}</strong>
                    @enderror

                  </div>
                </div><!-- col-4 -->

                <div class="col-lg-4">
                  <div class="form-group mg-b-10-force">
                    <label class="form-control-label">Category: <span class="tx-danger">*</span></label>
                    <select class="form-control select2" data-placeholder="Choose Category" name="category_id">
                      <option label="Choose Category"></option>
                      @foreach($category as $row)
                      <option value="{{ $row->id }}">{{ ucwords($row->category_name) }}</option>
                      @endforeach
                    </select>
                    @error('category_id')
                    <strong class="text-danger">{{$message}}</strong>
                    @enderror
                  </div>

                </div><!-- col-4 -->
                <div class="col-lg-4">
                    <div class="form-group">
                    <label>Post Image<span class="tx-danger">*</span></label>
                    <label class="custom-file">
                    <input type="file" id="file" class="custom-file-input" name="image" onchange="readURL(this);" accept="image">
                    <span class="custom-file-control"></span>
                    <img src="#" id="one">
                    </label>
                    <br>
                        @error('image')
                        <strong class="text-danger">{{$message}}</strong>
                        @enderror
                </div>
            </div>

                <div class="col-lg-12">
                    <div class="form-group">
                    <label class="form-control-label">Post Description<span class="tx-danger">*</span></label>
                     <textarea class="form-control" id="summernote" name="description">

                     </textarea>
                     @error('description')
                     <strong class="text-danger">{{$message}}</strong>
                     @enderror
                  </div>

                </div>

              </div>

              <div class="form-layout-footer">
                <button class="btn btn-info mg-r-5" type="submit">Submit </button>
              </div><!-- form-layout-footer -->
            </div><!-- form-layout -->
            </form>
    </div>
</div>
</div>

<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>


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
