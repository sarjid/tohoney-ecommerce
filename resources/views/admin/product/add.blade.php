@extends('layouts.dashboard_master')
@section('products')
active
@section('add_product')
active
@endsection

@endsection

@section('content')

<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="index.html">Starlight</a>
      <span class="breadcrumb-item active">Add product</span>
    </nav>

    <div class="sl-pagebody">

      <div class="row row-sm">

        <div class="card pd-20 pd-sm-40 col-md-12 m-auto">

            <h6 class="card-body-title">Add Product
            <a href="{{route('all.product')}}" style="float:right;" class="btn btn-danger">Show ALL</a>
            </h6>
        <form action="{{route('store.product')}}" method="post" enctype="multipart/form-data">
                @csrf

            <div class="form-layout">
              <div class="row mg-b-25">

                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">Product Name: <span class="tx-danger">*</span></label>
                    <input class="form-control @error('product_name') is-invalid @enderror" type="text" name="product_name"  >
                    @error('product_name')
                    <strong class="text-danger">{{$message}}</strong>
                    @enderror

                  </div>
                </div><!-- col-4 -->

                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">price <span class="tx-danger">*</span></label>
                    <input class="form-control @error('product_price') is-invalid @enderror" type="number" name="product_price">
                    @error('product_price')
                    <strong class="text-danger">{{$message}}</strong>
                    @enderror
                  </div>

                </div><!-- col-4 -->
                <div class="col-lg-4">
                    <div class="form-group">
                      <label class="form-control-label">Quantity <span class="tx-danger">*</span></label>
                      <input class="form-control @error('product_quantity') is-invalid @enderror" type="number" name="product_quantity">
                      @error('product_quantity')
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
                    <label>Main Thumbnail<span class="tx-danger">*</span></label>
                    <label class="custom-file">
                          <input type="file" id="file" class="custom-file-input" name="product_thambnail" onchange="readURL(this);" accept="image">
                          <span class="custom-file-control"></span>
                        </label>
                        <br>
                        @error('product_thambnail')
                        <strong class="text-danger">{{$message}}</strong>
                        @enderror
                </div>
                <div class="col-lg-4">

                    <label class="custom-file">

                          <img src="#" id="one">
                        </label>
                </div>
                <div class="col-lg-4">
                    <label>Multiple Image<span class="tx-danger"></span></label>
                    <label class="form-group">
                          <input type="file"  class="form-control" name="product_multiple_photos[]" multiple>
            
                        </label>
                        <br>
                       
                </div>
                


                <div class="col-lg-8">
                    <div class="form-group">
                        <label class="form-control-label">Product Short Description<span class="tx-danger">*</span></label>
                        <textarea class="form-control" name="short_description"> </textarea>
                        @error('short_description')
                        <strong class="text-danger">{{$message}}</strong>
                        @enderror
                    </div>

                  </div><!-- col-4 -->


                <div class="col-lg-12">
                    <div class="form-group">
                    <label class="form-control-label">Product Long Description<span class="tx-danger">*</span></label>
                     <textarea class="form-control" id="summernote" name="long_description">

                     </textarea>
                     @error('long_description')
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
