

<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta name="csrf" value="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Tohoney - @yield('title')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" type="image/png" href="{{asset('fontend')}}/assets/images/favicon.png">
    <!-- Place favicon.ico in the root directory -->
    <!-- all css here -->
    <!-- bootstrap v4.0.0-beta.2 css -->
    <link rel="stylesheet" href="{{asset('fontend')}}/assets/css/bootstrap.min.css">
    <!-- owl.carousel.2.0.0-beta.2.4 css -->
    <link rel="stylesheet" href="{{asset('fontend')}}/assets/css/owl.carousel.min.css">
    <!-- font-awesome v4.6.3 css -->
    <link rel="stylesheet" href="{{asset('fontend')}}/assets/css/font-awesome.min.css">
    <!-- flaticon.css -->
    <link rel="stylesheet" href="{{asset('fontend')}}/assets/css/flaticon.css">
    <!-- jquery-ui.css -->
    <link rel="stylesheet" href="{{asset('fontend')}}/assets/css/jquery-ui.css">
    <!-- metisMenu.min.css -->
    <link rel="stylesheet" href="{{asset('fontend')}}/assets/css/metisMenu.min.css">
    <!-- swiper.min.css -->
    <link rel="stylesheet" href="{{asset('fontend')}}/assets/css/swiper.min.css">
    <!-- style css -->
    <link rel="stylesheet" href="{{asset('fontend')}}/assets/css/styles.css">
    <!-- responsive css -->
    <link rel="stylesheet" href="{{asset('fontend')}}/assets/css/responsive.css">
    {{-- toaster  --}}
    <link rel="stylesheet" href="{{asset('fontend')}}/assets/toastr/toastr.css">
    <link rel="stylesheet" href="{{asset('fontend')}}/assets/sweetalert2.min.css">
    <!-- modernizr css -->
    <script src="{{asset('fontend')}}/assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!--Start Preloader-->
    {{-- <div class="preloader-wrap">
        <div class="spinner"></div>
    </div> --}}
    <!-- search-form here -->
    <div class="search-area flex-style">
        <span class="closebar">Close</span>
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2 col-12">
                    <div class="search-form">
                        <form action="#">
                            <input type="text" placeholder="Search Here...">
                            <button><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- search-form here -->
    <!-- header-area start -->
    <header class="header-area">
        <div class="header-top bg-2">
            <div class="fluid-container">
                <div class="row">
                    <div class="col-md-6 col-12">
                        <ul class="d-flex header-contact">
                            <li><i class="fa fa-phone"></i> +01 123 456 789</li>
                            <li><i class="fa fa-envelope"></i> youremail@gmail.com</li>
                        </ul>
                    </div>
                    <div class="col-md-6 col-12">
                        <ul class="d-flex account_login-area">
                            <li>
                                <a href="javascript:void(0);"><i class="fa fa-user"></i> My Account <i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown_style">
                                    <li><a href="login.html">Login</a></li>
                                    <li><a href="register.html">Register</a></li>
                                    <li><a href="cart.html">Cart</a></li>
                                    <li><a href="checkout.html">Checkout</a></li>
                                    <li><a href="wishlist.html">wishlist</a></li>
                                </ul>
                            </li>
                            @guest
                            <li><a href="{{ route('Customer.register') }}">Register </a></li>
                            @else
                            @endguest

                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-bottom">
            <div class="fluid-container">
                <div class="row">
                    <div class="col-lg-3 col-md-7 col-sm-6 col-6">
                        <div class="logo">
                            <a href="index.html">
                        <img src="{{ asset('fontend') }}/assets/images/logo.png" alt="">
                        </a>
                        </div>
                    </div>
                    <div class="col-lg-7 d-none d-lg-block">
                        <nav class="mainmenu">
                            <ul class="d-flex">
                                <li class="@yield('home') "><a href="{{url('/')}}">Home</a></li>
                            <li class="@yield('about') "><a href="{{route('about.page')}}">About</a></li>
                            <li class="@yield('shop') "><a href="{{route('shop.page')}}">Shop</a></li>

                                <li class="@yield('blog') ">
                                <a href="{{route('blog.page')}}">Blog</a>

                                </li>
                            <li class="@yield('contact') "><a href="{{route('contact.page')}}">Contact</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="col-md-4 col-lg-2 col-sm-5 col-4">
                        <ul class="search-cart-wrapper d-flex">
                            <li class="search-tigger"><a href="javascript:void(0);"><i class="flaticon-search"></i></a></li>
                            <li>
                                @php
                                $subtotal = 0;
                                $wishlists = App\Wishlist::where('ip_address',request()->ip())->get();
                                @endphp
                                <a href="javascript:void(0);"><i class="flaticon-like"></i>
                                    <span>{{ count($wishlists) }}</span></a>
                                <ul class="cart-wrap dropdown_style">
                                    @foreach ($wishlists as $wishlist)
                                    <li class="cart-items">
                                        <div class="cart-img">
                                            <img src="{{asset($wishlist->product->product_thambnail)}}" style="height:40px; width:40px;" alt="">
                                        </div>
                                        <div class="cart-content">
                                            <a href="{{route('wishlist.page')}}">{{ $wishlist->product->product_name}}</a>
                                            <span>QTY : 1</span>
                                            <p>${{ $wishlist->product->product_price }}</p>
                                            <a href="{{ url('delete-wishlist/'.$wishlist->id) }}"><i class="fa fa-times"></i> </a>
                                        </div>
                                        @php
                                        $subtotal = $subtotal + $wishlist->product->product_price;
                                        @endphp
                                    </li>
                                    @endforeach

                                    <li>Subtotol: <span class="pull-right">${{ $subtotal }}</span></li>
                                    <li>
                                        <a href="{{route('wishlist.page')}}"  class="btn btn-danger">Wishlist</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                @php
                                $carts = App\Cart::where('ip_address',request()->ip())->get();
                                @endphp
                                <a href="javascript:void(0);"><i class="flaticon-shop"></i> <span>{{ count($carts) }}</span></a>
                                <ul class="cart-wrap dropdown_style">
                                    @php
                                    $subtotal = 0;
                                $carts = App\Cart::where('ip_address',request()->ip())->get();
                                @endphp

                                    @foreach ($carts as $cart)

                                    <li class="cart-items">
                                        <div class="cart-img">
                                            <img src="{{asset($cart->product->product_thambnail)}}" style="height:50px; width:50px;" alt="">
                                        </div>
                                        <div class="cart-content">
                                        <a href="{{url('cart')}}">{{$cart->product->product_name}}</a>
                                        <span>QTY : {{$cart->quantity}}</span>
                                        <p>${{$cart->product->product_price * $cart->quantity}}</p>
                                        @php
                                            $subtotal = $subtotal + ($cart->product->product_price * $cart->quantity)
                                        @endphp
                                            <a href="{{ url('delete-cart/'.$cart->id) }}" > <i class="fa fa-times"></i> </a>
                                        </div>
                                    </li>
                                    @endforeach

                                <li>Subtotal: <span class="pull-right">${{$subtotal}}</span></li>
                                    <li>
                                    <a href="{{url('cart')}}" class="btn btn-danger">Cart</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-1 col-sm-1 col-2 d-block d-lg-none">
                        <div class="responsive-menu-tigger">
                            <a href="javascript:void(0);">
                        <span class="first"></span>
                        <span class="second"></span>
                        <span class="third"></span>
                        </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- responsive-menu area start -->
            <div class="responsive-menu-area">
                <div class="container">
                    <div class="row">
                        <div class="col-12 d-block d-lg-none">
                            <ul class="metismenu">
                            <li class="@yield('home') "><a href="{{url('/')}}">Home</a></li>
                                <li class="@yield('about') "><a href="{{route('about.page')}}">About</a></li>
                                <li class="@yield('shop') ">
                                    <a  aria-expanded="false" href="{{route('shop.page')}}">Shop </a>

                                </li>

                                <li class="@yield('blog') ">
                                    <a  aria-expanded="false" href="{{route('blog.page')}}">Blog</a>
                                </li>
                                <li class="@yield('contact') "><a href="{{route('contact.page')}}">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- responsive-menu area start -->
        </div>
    </header>
    <!-- header-area end -->


    @yield('fontend_content')

    <!-- start social-newsletter-section -->
    <section class="social-newsletter-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="newsletter text-center">
                        <h3>Subscribe  Newsletter</h3>
                        <div class="newsletter-form">
                            <form>
                                <input type="text" class="form-control" placeholder="Enter Your Email Address...">
                                <button type="submit"><i class="fa fa-send"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end container -->
    </section>
    <!-- end social-newsletter-section -->
    <!-- .footer-area start -->
    <div class="footer-area">
        <div class="footer-top">
            <div class="container">
                <div class="footer-top-item">
                    <div class="row">
                        <div class="col-lg-12 col-12">
                            <div class="footer-top-text text-center">
                                <ul>
                                    <li><a href="{{url('/')}}">home</a></li>
                                    <li><a href="#">our story</a></li>
                                    <li><a href="#">feed shop</a></li>
                                    <li><a href="blog.html">how to eat blog</a></li>
                                    <li><a href="contact.html">contact</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2 col-md-3 col-sm-12">
                        <div class="footer-icon">
                            <ul class="d-flex">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-8 col-sm-12">
                        <div class="footer-content">
                            <p>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure righteous indignation and dislike</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-8 col-sm-12">
                        <div class="footer-adress">
                            <ul>
                                <li><a href="#"><span>Email:</span> domain@gmail.com</a></li>
                                <li><a href="#"><span>Tel:</span> 0131234567</a></li>
                                <li><a href="#"><span>Adress:</span> 52 Web Bangale , Adress line2 , ip:3105</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-12">
                        <div class="footer-reserved">
                            <ul>
                                <li>Copyright © 2019 Tohoney All rights reserved.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- .footer-area end -->
    <!-- Modal area start -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="modal-body d-flex">
                    <div class="product-single-img w-50">
                        <img src="" style="height:300px; width:350px;" id="pimage"  alt="">
                    </div>
                    <div class="product-single-content w-50">
                        <h3 id="pname"></h3>
                        <div class="rating-wrap fix">
                            <h5 class="pull-left" > $<span id="pprice"></span></h5>
                            <ul class="rating pull-right">

                                <h5>Quantity: <span id="pqty"></span></h5>
                            </ul>
                        </div>
                        <p id="short_description"></p>
                        <form action="{{route('add.cart')}}" method="POST">
                            @csrf
                            <input type="hidden" name="p_id" id="product_id" />
                        <ul class="input-style">
                            <li class="quantity cart-plus-minus">
                                <input type="text" name="quantity" value="1" />
                            </li>
                            <br> <br>
                            <li > <button class="btn btn-sm btn-primary" style="padding-right:100px; padding-top:-100px; margin-top:20px; margin-right:-60px; font-size:17px;  " type="submit">Add to Cart</button></li>

                        </ul>



                    </form>
                        <ul class="cetagory">
                            <li>Stock:</li>
                            <li><span class="badge badge-success"</span>Aviable</li>

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
        </div>
    </div>
    <!-- Modal area start -->
    <!-- jquery latest version -->
    <script src="{{asset('fontend')}}/assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap js -->
    <script src="{{asset('fontend')}}/assets/js/bootstrap.min.js"></script>
    <!-- owl.carousel.2.0.0-beta.2.4 css -->
    <script src="{{asset('fontend')}}/assets/js/owl.carousel.min.js"></script>
    <!-- scrollup.js -->
    <script src="{{asset('fontend')}}/assets/js/scrollup.js"></script>
    <!-- isotope.pkgd.min.js -->
    <script src="{{asset('fontend')}}/assets/js/isotope.pkgd.min.js"></script>
    <!-- imagesloaded.pkgd.min.js -->
    <script src="{{asset('fontend')}}/assets/js/imagesloaded.pkgd.min.js"></script>
    <!-- jquery.zoom.min.js -->
    <script src="{{asset('fontend')}}/assets/js/jquery.zoom.min.js"></script>
    <!-- countdown.js -->
    <script src="{{asset('fontend')}}/assets/js/countdown.js"></script>
    <!-- swiper.min.js -->
    <script src="{{asset('fontend')}}/assets/js/swiper.min.js"></script>
    <!-- metisMenu.min.js -->
    <script src="{{asset('fontend')}}/assets/js/metisMenu.min.js"></script>
    <!-- mailchimp.js -->
    <script src="{{asset('fontend')}}/assets/js/mailchimp.js"></script>
    <!-- jquery-ui.min.js -->
    <script src="{{asset('fontend')}}/assets/js/jquery-ui.min.js"></script>
    <!-- main js -->
    <script src="{{asset('fontend')}}/assets/js/scripts.js"></script>
    <script src="{{asset('fontend/assets')}}/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
          $('.addwishlist').on('click', function(){
            var id = $(this).data('id');

            if(id) {
               $.ajax({
                   url: "{{  url('/add/wishlist/') }}/"+id,
                   type:"GET",
                   dataType:"json",
                   success:function(data) {
                     const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                      })

                     if($.isEmptyObject(data.error)){
                          Toast.fire({
                            type: 'success',
                            title: data.success
                          })
                     }else{
                           Toast.fire({
                              type: 'error',
                              title: data.error
                          })
                     }

                   },

               });
           } else {
               alert('danger');
           }
            e.preventDefault();
       });
   });

</script>


{{-- cart add  --}}
<script type="text/javascript">
    $(document).ready(function() {
          $('.addcart').on('click', function(){
            var id = $(this).data('id');

            if(id) {
               $.ajax({
                   url: "{{  url('/add/cart/') }}/"+id,
                   type:"GET",
                   dataType:"json",
                   success:function(data) {
                     const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                      })

                     if($.isEmptyObject(data.error)){
                          Toast.fire({
                            type: 'success',
                            title: data.success
                          })
                     }else{
                           Toast.fire({
                              type: 'error',
                              title: data.error
                          })
                     }

                   },

               });
           } else {
            //    alert('danger');
           }
            e.preventDefault();
       });
   });

</script>

{{-- cart Delete  --}}
<script type="text/javascript">
    $(document).ready(function() {
          $('.deletecart').on('click', function(){
            var id = $(this).data('id');

            if(id) {
               $.ajax({
                   url: "{{  url('/delete/cart/') }}/"+id,
                   type:"GET",
                   dataType:"json",
                   success:function(data) {
                     const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                      })

                     if($.isEmptyObject(data.error)){
                          Toast.fire({
                            type: 'success',
                            title: data.success
                          })
                     }else{
                           Toast.fire({
                              type: 'error',
                              title: data.error
                          })
                     }

                   },

               });
           } else {
               alert('danger');
           }
            e.preventDefault();
       });
   });

</script>

{{-- modal data view  --}}

<script type="text/javascript">
    function productview(id){

          $.ajax({
                     url: "{{  url('/cart/product/view/') }}/"+id,
                     type:"GET",
                     dataType:"json",
                     success:function(data) {
                       $('#pname').text(data.product_name);
                       $('#pimage').attr('src',data.product_thambnail);
                       $('#pcat').text(data.category_id);
                       $('#pprice').text(data.product_price);
                       $('#short_description').text(data.short_description);
                       $('#pqty').text(data.product_quantity);
                       $('#product_id').val(data.id);

             }
      })
    }
</script>

    {{-- Toaster  --}}
    <script src="{{asset('fontend')}}/assets/toastr/toastr.min.js"></script>
    <script src="{{asset('fontend')}}/assets/sweetalert2@8.js"></script>
    <script>
        @if(Session::has('messege'))
            var type ="{{Session::get('alert-type','info')}}"
            switch(type){
                case 'info':
                    toastr.info(" {{Session::get('messege')}} ");
                    break;

                case 'success':
                    toastr.success(" {{Session::get('messege')}} ");
                    break;

                case 'warning':
                    toastr.warning(" {{Session::get('messege')}} ");
                    break;

                case 'error':
                    toastr.error(" {{Session::get('messege')}} ");
                    break;
            }
        @endif
  </script>
  <script type="text/javascript">
    $(document).ready(function(){
        $('#apply-coupon-btn').click(function(){

            var coupon_text = $('#coupon_text').val();
            var link_to_go = "{{ url('cart') }}/"+coupon_text;
            window.location.href = link_to_go;
        });
    });
</script>
</body>

</html>
