@extends('layouts.dashboard_master')

@section('content')

    <div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="index.html">Starlight</a>
    <span class="breadcrumb-item active">Dashboard</span>
    </nav>

    <div class="sl-pagebody">

    <div class="row row-sm">

           <div class="col-8 ">
            <div class="card">
                <div class="card-header bd-primary text-white">Update information</div>

                @if(session('Success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{session('Success')}}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  @endif

                <div class="card-body">
                <form action="{{route('upload.image')}}" method="POST" enctype="multipart/form-data" >
                        @csrf
                        <div class="form-group">
                          <label for="exampleInputEmail1">Image</label>
                        <input type="file" name="image" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        @php
                            $id  = Auth::user()->id;
                            $user = DB::table('users')->where('id',$id)->first();
                        @endphp
                        <input type="hidden" name="old_image" class="form-control" value="{{$user->avatar}}">


                        @error('image')
                        <span class="text-danger">{{$message}}</span>
                        @enderror

                        </div>

                        <button type="submit" class="btn btn-primary">Upload</button>
                      </form>

                </div>
            </div>

           </div>
           <div class="col-4">
             <div class="card" style="width: 18rem;">
              <img src="{{ asset('fontend/avatar.png') }}" class="card-img-top mt-3" style="height: 120px; width: 120px; margin-left: 34%;" >
              <div class="card-body">
                <h5 class="card-title text-center"> <strong>{{ Auth::user()->name }}</strong></h5>
              </div>

              <ul class="list-group list-group-flush">

                <li class="list-group-item text-center"> </a></li>
                <li class="list-group-item text-center"><a href="{{route('user.profile')}}"> Update Profile </a></li>
              <li class="list-group-item text-center"><a href="{{route('user.image')}}">Change Profile Image </a></li>



              </ul>
              <div class="card-body">
              <a href="" class="btn btn-danger btn-sm btn-block"></a>
              </div>
            </div>
           </div>
        </div>
    </div>
</div>


@endsection
