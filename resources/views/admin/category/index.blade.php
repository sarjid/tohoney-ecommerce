@extends('layouts.dashboard_master')
@section('category')
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

        <div class="col-md-12 m-auto">
            <div class="card">
                <div class="card-header">Category List</div>
                @if(session('successupdate'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{session('successupdate')}}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  @endif
                  @if(session('success'))
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>{{session('success')}}</strong>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    @endif
                  @if(session('Delete'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>{{session('Delete')}}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  @endif

                <div class="card-body">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">SL</th>
                            <th scope="col">Category Name</th>
                            <th scope="col">Category photo</th>
                            <th scope="col">Added By</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Updated At</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            {{-- @php($i = 1) --}}
                            @foreach ($categories as $category)
                          <tr>
                          <th scope="row">{{$categories->firstItem()+$loop->index}}</th>
                          <td>{{$category->category_name}}</td>
                          <td>
                          <img src="{{asset($category->category_photo)}}" style="height:80px; width:80px; border-radius:50%" alt="">
                          </td>
                          <td>{{$category->user->name}}</td>
                          <td>
                              {{$category->created_at->format('d F Y h:i: A')}}
                              <br>
                              {{$category->created_at->diffForHumans()}}
                            </td>
                            <td>
                                @if($category->updated_at == NULL)
                                <span class="text-danger">Not Updated</span>
                                @else

                                <br>
                                {{$category->updated_at->diffForHumans()}}
                                @endif
                              </td>
                            <td>
                            <a href="{{url('Category/Edit/'.$category->id)}}" class="btn btn-sm btn-primary">Edit</a>
                            <a href="{{url('category/delete/'.$category->id)}}" id="delete" class="btn btn-sm btn-danger">Delete</a>

                            </td>
                          </tr>
                          @endforeach
                       </tbody>
                      </table>
                      <span style="float:right;"> {{$categories->links()}}</span>
                </div>
            </div>
        </div>


        <div class="col-md-12 mt-3">
            <div class="card">
                <div class="card-header">Trash List</div>

                  @if(session('hardDelete'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>{{session('hardDelete')}}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  @endif

                  @if(session('Restore'))
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>{{session('Restore')}}</strong>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    @endif

                <div class="card-body">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">SL</th>
                            <th scope="col">Category Name</th>
                            <th scope="col">Category image</th>
                            <th scope="col">Added By</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Deleted At</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            {{-- @php($i = 1) --}}
                            @foreach ($trashcat as $category)
                          <tr>
                          <th scope="row">{{$categories->firstItem()+$loop->index}}</th>
                          <td>{{$category->category_name}}</td>
                          <td>
                            <img src="{{asset($category->category_photo)}}" style="height:80px; width:80px; border-radius:50%" alt="">
                            </td>
                          <td>{{$category->user->name}}</td>
                          <td>
                              {{$category->created_at->format('d F Y h:i: A')}}
                              <br>
                              {{$category->created_at->diffForHumans()}}
                            </td>
                            <td>
                                @if($category->deleted_at == NULL)
                                <span class="text-danger">Not Updated</span>
                                @else

                                <br>
                                {{$category->deleted_at->diffForHumans()}}
                                @endif
                              </td>
                            <td>
                            <a href="{{url('Category/restore/'.$category->id)}}" class="btn btn-sm btn-primary">Restore</a>
                            <a href="{{url('category/hardDelete/'.$category->id)}}" id="pdelete" class="btn btn-sm btn-danger">Hard</a>

                            </td>
                          </tr>
                          @endforeach
                       </tbody>
                      </table>
                      <span style="float:right;"> {{$categories->links()}}</span>
                </div>
            </div>
        </div>

        <div class="col-md-4"></div>

    </div>
</div>
</div>
@endsection
