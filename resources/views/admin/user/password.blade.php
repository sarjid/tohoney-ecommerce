@extends('layouts.dashboard_master')

@section('content')

    <div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="index.html">Starlight</a>
    <span class="breadcrumb-item active">Dashboard</span>
    </nav>

    <div class="sl-pagebody">

    <div class="row row-sm">

           <div class="col-8 m-auto">
            <div class="card">
                <div class="card-header bg-success text-white">Password Change</div>

                @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{session('success')}}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  @endif

                <div class="card-body">
                    <form action="{{route('update.pass')}}" method="POST">
                        @csrf
                    <input type="hidden" name="old_password">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Old Passeword</label>
                        <input type="password" name="old_password" class="form-control @error('old_password') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Current Password">

                        @error('old_password')
                        <span class="text-danger">{{$message}}</span>
                        @enderror


                     @if(session('warning'))
                       <span class="text-danger"><b>{{session('warning')}}</b> </span>
                         @endif

                        </div>


                        <div class="form-group">
                            <label for="exampleInputEmail1">New Passeword</label>
                          <input type="password" name="new_password" class="form-control @error('new_password') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Current Password">

                          @error('new_password')
                          <span class="text-danger">{{$message}}</span>
                          @enderror

                          </div>



                          <div class="form-group">
                            <label for="exampleInputEmail1">Confirm Passeword</label>
                          <input type="password" name="confirm_password" class="form-control @error('confirm_password') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Current Password">

                          @error('confirm_password')
                          <span class="text-danger">{{$message}}</span>
                          @enderror

                     @if(session('error'))
                     <span class="text-danger"><b>{{session('error')}}</b> </span>
                       @endif

                          </div>


                        <button type="submit" class="btn btn-primary">Changer Password</button>
                      </form>


                </div>
            </div>

           </div>

        </div>
    </div>
</div>


@endsection
