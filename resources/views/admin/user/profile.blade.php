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
                <div class="card-header">Update information</div>

                @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{session('success')}}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  @endif

                <div class="card-body">
                <form action="{{route('update.info')}}" method="POST">
                        @csrf
                        <div class="form-group">
                          <label for="exampleInputEmail1">User Name</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$users->name}}">

                        @error('name')
                        <span class="text-danger">{{$message}}</span>
                        @enderror

                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$users->email}}">

                          @error('email')
                          <span class="text-danger">{{$message}}</span>
                          @enderror

                          </div>




                        <button type="submit" class="btn btn-primary">Update</button>
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


                <li class="list-group-item text-center"><a href="{{route('user.profile')}}"> Update Profile </a></li>
              <li class="list-group-item text-center"><a href="{{route('user.image')}}">Change Profile Image </a></li>



              </ul>
              <div class="card-body">
              <a href="{{route('logout')}}" class="btn btn-danger btn-sm btn-block"></a>
              </div>
            </div>
           </div>
        </div>
    </div>
</div>


@endsection
