@extends('layouts.fontend_master')
@section('title') {{ $products->product_name }} @endsection
@section('fontend_content')

        <!-- .breadcumb-area start -->
        <div class="breadcumb-area bg-img-4 ptb-100">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcumb-wrap text-center">
                            <h2>Shop Page</h2>
                            <ul>
                                <li><a href="index.html">Home</a></li>
                                <li><span>Shop</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- .breadcumb-area end -->
        <!-- single-product-area start-->
        <div class="single-product-area ptb-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="product-single-img">
                            <div class="product-active owl-carousel">
                                <div class="item">
                                <img src="{{asset($products->product_thambnail)}}" alt="">
                                </div>
                                @foreach ($multiple_photos as $multiple_photo)
                                <div class="item">
                                <img src="{{asset($multiple_photo->photo_name)}}" alt="">
                                </div>

                                @endforeach

                            </div>
                            <div class="product-thumbnil-active  owl-carousel">
                                <div class="item">
                                    <img src="{{asset($products->product_thambnail)}}" alt="">
                                </div>
                                @foreach ($multiple_photos as $multiple_photo)
                                <div class="item">
                                <img src="{{asset($multiple_photo->photo_name)}}" alt="">
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="product-single-content">
                        <h3>{{ucwords($products->product_name)}}</h3>
                            <div class="rating-wrap fix">
                            <span class="pull-left">${{$products->product_price}}</span>
                                <ul class="rating pull-right">
                                 @php
                                 $products_review = App\productreview::where('product_id',$products->id)->get();
                                 @endphp
                                 @if(count($products_review) )
                                 <li><i class="fa fa-star"></i></li>
                                 <li><i class="fa fa-star"></i></li>
                                 <li><i class="fa fa-star"></i></li>
                                 <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li > {{count($products_review)}} (  Customar Review)</li>

                                 @else

                                 <strong class="badge badge-danger">No Review This Product</strong>
                                 @endif



                                </ul>
                            </div>
                        <p>{{$products->short_description}}</p>
                            <ul class="input-style">
                            <form action="{{route('add.cart')}}" method="POST">
                                @csrf
                                <input type="hidden" name="p_id" id="product_id" />

                                <li class="quantity cart-plus-minus">

                                    <input type="text" name="quantity" value="1" />
                                </li>
                                <li>
                                    <button class="btn btn-primary" type="submit">Add to Cart</button>
                                </li>
                            </form>
                            </ul>
                            <ul class="cetagory">
                                <li>Categories:</li>
                            <li><a href="#">{{$products->category->category_name}}</a></li>
                            </ul>
                            <ul class="socil-icon">
                                <li>Share :</li>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row mt-60">
                    <div class="col-12">
                        <div class="single-product-menu">
                            <ul class="nav">
                                <li><a class="active" data-toggle="tab" href="#description">Description</a> </li>
                                <li><a data-toggle="tab" href="#tag">Faq</a></li>
                                <li><a data-toggle="tab" href="#review">Review</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="tab-content">
                            <div class="tab-pane active" id="description">
                                <div class="description-wrap">
                                    <p>{!! $products->long_description !!}</p>
                                </div>
                            </div>
                            <div class="tab-pane" id="tag">
                                <div class="faq-wrap" id="accordion">
                                    @foreach ($faqs as $faq)
                                    <div class="card">
                                        <div class="card-header" id="headingTwo">
                                            <h5><button class="collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">{{ $faq->question }}</button></h5>
                                        </div>
                                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                            <div class="card-body">
                                                {{ $faq->answer }}
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach

                                </div>
                            </div>
                            <div class="tab-pane" id="review">
                                <div class="review-wrap">
                                    <ul>
                                        @foreach ($product_reviews as $review)

                                        <li class="review-items">
                                            <div class="review-img">
                                            <img src="{{asset('fontend')}}/assets/images/comment/4.png" alt="">
                                            </div>
                                            <div class="review-content">
                                            <h3><a href="#" class="text-danger">{{$review->name}}</a></h3>
                                            <span>
                                                {{$review->created_at->format('d F Y')}} <br>
                                                {{$review->created_at->diffForHumans()}}
                                            </span>
                                                <p>{{$review->review}}</p>
                                                <ul class="rating">
                                                    @if($review->stars == 1)
                                                    <li><i class="fa fa-star"></i></li>
                                                    @elseif($review->stars == 2)
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    @elseif($review->stars == 3)
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    @elseif($review->stars == 4)
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>

                                                    @else

                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    @endif

                                                </ul>
                                            </div>
                                        </li>
                                        @endforeach

                                    </ul>
                                </div>
                                <div class="add-review">
                                    <h4>Add A Review</h4>
                                <form action="{{route('store.review')}}" method="POST">
                                     @csrf
                                <input type="hidden" name="id" value="{{$products->id}}">
                                    <div class="ratting-wrap">
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th>task</th>
                                                    <th>1 Star</th>
                                                    <th>2 Star</th>
                                                    <th>3 Star</th>
                                                    <th>4 Star</th>
                                                    <th>5 Star</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>How Many Stars?</td>
                                                    <td>
                                                        <input type="radio"  name="stars" value="1" />
                                                    </td>
                                                    <td>
                                                        <input type="radio" name="stars" value="2" />
                                                    </td>
                                                    <td>
                                                        <input type="radio" name="stars" value="3" />
                                                    </td>
                                                    <td>
                                                        <input type="radio" name="stars" value="4" />
                                                    </td>
                                                    <td>
                                                        <input type="radio" name="stars" value="5" />
                                                    </td>
                                                </tr>

                                            </tbody>

                                        </table>
                                        @error('stars')
                                        <span class="text-danger">{{$message}}</span>
                                      @enderror
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <h4>Name:</h4>
                                            <input type="text" name="name" placeholder="Your name here..." />
                                            @error('name')
                                            <span class="text-danger">{{$message}}</span>
                                          @enderror
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <h4>Email:</h4>
                                            <input type="email" name="email" placeholder="Your Email here..." />
                                            @error('email')
                                            <span class="text-danger">{{$message}}</span>
                                          @enderror
                                        </div>
                                        <div class="col-12">
                                            <h4>Your Review:</h4>
                                            <textarea name="review" id="massage" cols="30" rows="10" placeholder="Your review here..."></textarea>
                                            @error('review')
                                            <span class="text-danger">{{$message}}</span>
                                          @enderror
                                        </div>
                                        <div class="col-12">
                                            <button class="btn-style">Submit</button>
                                        </div>
                                    </div>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- single-product-area end-->
        <!-- featured-product-area start -->
        <div class="featured-product-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title text-left">
                            <h2>Related Product</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @forelse ($related_p as $related)
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="featured-product-wrap">
                            <div class="featured-product-img">
                            <img src="{{asset($related->product_thambnail)}}" alt="">
                            </div>
                            <div class="featured-product-content">
                                <div class="row">
                                    <div class="col-7">
                                    <h3><a href="shop.html">{{$related->product_name}}</a></h3>
                                    <p>${{$related->product_price}}</p>
                                    </div>
                                    <div class="col-5 text-right">
                                        <ul>
                                            <li><a href="cart.html"><i class="fa fa-shopping-cart"></i></a></li>
                                            <li><a href="cart.html"><i class="fa fa-heart"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <strong class="text-danger m-auto">No Related products</strong>
                    @endforelse

                </div>
            </div>
        </div>
        <!-- featured-product-area end -->

@endsection
