@extends('layouts.dashboard_master')
@section('blog')
active

@endsection

@section('content')

<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="index.html">Starlight</a>
      <span class="breadcrumb-item active">All Comments</span>
    </nav>

    <div class="sl-pagebody">

      <div class="row row-sm">

        <div class="card pd-20 pd-sm-40 col-md-12 m-auto">

            <h6 class="card-body-title"> All Comments

            </h6>

            <div class="table-wrapper">
              <table id="datatable1" class="table display responsive nowrap">
                <thead>
                  <tr>
                    <th class="wd-15p">SL</th>
                    <th class="wd-20p">Post image</th>
                    <th class="wd-20p">Post Title</th>
                    <th class="wd-15p">Name</th>
                    <th class="wd-20p">Comment</th>
                    <th class="wd-10p">Status</th>
                    <th class="wd-25p">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @php($serial = 1)
                    @foreach ($comments as $row)
                 <tr>
                 <td>{{$serial++}}</td>
                 <td><img src="{{asset($row->post->image)}}" alt="image" height="40px;" width="40px;"></td>
                 <td>{{Str::limit($row->post->title,10)}}</td>
                 <td>{{$row->name}}</td>
                 <td>{!!Str::limit($row->comment,20)!!}</td>

                <td>
                    @if($row->status == 1)
                    <span class="badge badge-success">Approve</span>
                    @else
                    <span class="badge badge-danger">Pending</span>
                    @endif

                 </td>

                    <td>
                    <a href="{{ URL::to('Comment-View/'.$row->id) }}" class="btn btn-sm btn-primary"  title="View"><i class="fa fa-eye"></i> </a>
                    <a href="{{ URL::to('Delete-Comment/'.$row->id) }}" class="btn btn-sm btn-danger" id="delete" title="Delete" ><i class="fa fa-trash"></i></a>

                    @if($row->status == 1)

                    @else
                    <a href="{{url('publish/'.$row->id)}}" class="btn btn-sm btn-success" title="status Publish"><i class="fa fa-arrow-up"></i> </a>
                    @endif
                    </td>
                  </tr>
                  @endforeach


                </tbody>
              </table>
            </div><!-- table-wrapper -->
          </div><!-- card -->




        <div class="col-md-4"></div>

    </div>
</div>
</div>

@endsection
