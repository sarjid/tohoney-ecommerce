@extends('layouts.dashboard_master')
@section('home')
    active

@endsection

@section('content')

<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="index.html">Starlight</a>
      <span class="breadcrumb-item active">Dashboard</span>
    </nav>

    <div class="sl-pagebody">

      <div class="row row-sm">


        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                   <b> {{Auth::user()->name}} <span class="badge badge-success">  Active Now</span></b>
                    <h3 style="float:right;">Total Users <span class="badge badge-danger">{{$count}}</span> </h3>
                </div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">SL</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Created At</th>
                          </tr>
                        </thead>
                        <tbody>
                            {{-- @php($i = 1) --}}
                            @foreach ($users as $user)
                          <tr>
                          <th scope="row">{{$users->firstItem()+$loop->index}}</th>
                          <td>{{$user->name}}</td>
                          <td>{{$user->email}}</td>
                          <td>
                              {{$user->created_at->format('d-m-y h:i:sa')}}
                              <br>
                              {{$user->created_at->diffForHumans()}}
                            </td>
                          </tr>
                          @endforeach
                       </tbody>
                      </table>
                     <span style="float:right;"> {{$users->links()}}</span>
                </div>

                </div>
            </div>

         </div>

        </div>
</div>

@endsection
