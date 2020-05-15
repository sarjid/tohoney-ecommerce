@extends('layouts.fontend_master')
@section('blog') active @endsection
@section('title') Blog @endsection
@section('fontend_content')

   <!-- .breadcumb-area start -->
   <div class="breadcumb-area bg-img-4 ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcumb-wrap text-center">
                    <h2>Blog</h2>
                    <ul>
                    <li><a href="{{url('/')}}">Home</a></li>
                        <li><span>Blog</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>


  <!-- blog-area start -->
  <div class="blog-area">
    <div class="container">
        <div class="col-lg-12">
            <div class="section-title  text-center">
                <h2>Latest News</h2>
                <img src="assets/images/section-title.png" alt="">
            </div>
        </div>
        <div class="row">

            @foreach ($blogs as $post)
            <div class="col-lg-4 col-md-6 col-12">
                <div class="blog-wrap">
                    <div class="blog-image">
                        <img src="{{asset($post->image)}}" alt="">
                        <ul>
                            <li>{{$post->created_at->format('d')}}</li>
                            <li>{{$post->created_at->format('F')}}</li>
                        </ul>
                    </div>
                    <div class="blog-content">
                        <div class="blog-meta">
                            <ul>
                                <li><a href="{{url('Blog/Post-Details/'.$post->id)}}"><i class="fa fa-user"></i> {{ucwords($post->user->name)}}</a></li>
                                <li class="pull-right"><a href="{{url('Blog/Post-Details/'.$post->id)}}"><i class="fa fa-clock-o"></i> {{$post->created_at->diffForHumans()}}</a></li>
                            </ul>
                        </div>
                        <h3><a href="{{url('Blog/Post-Details/'.$post->id)}}">{{ucwords($post->title)}}</a></h3>
                        {{-- <p>{!! Str::limit($post->description,200) !!}</p> --}}
                    </div>
                </div>
            </div>
            @endforeach


            <div class="col-12 ">
                {{$blogs->links()}}
            </div>
        </div>
    </div>
</div>

<!-- blog-area end -->





@endsection





