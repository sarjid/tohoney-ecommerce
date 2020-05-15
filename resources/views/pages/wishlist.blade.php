@extends('layouts.fontend_master')

@section('fontend_content')

        <!-- .breadcumb-area start -->
        <div class="breadcumb-area bg-img-4 ptb-100">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcumb-wrap text-center">
                            <h2>Wishlist</h2>
                            <ul>
                                <li><a href="index.html">Home</a></li>
                                <li><span>Wishlist</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- .breadcumb-area end -->
        <!-- cart-area start -->
        <div class="cart-area ptb-100">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <form action="{{route('add.cart.wishlist')}}" method="POST">
                            @csrf
                            <table class="table-responsive cart-wrap">
                                <thead>
                                    <tr>
                                        <th class="images">Image</th>
                                        <th class="product">Product</th>
                                        <th class="ptice">Price</th>
                                        <th class="stock">Stock Stutus </th>
                                        <th class="addcart">Add to Cart</th>
                                        <th class="remove">Remove</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($wishlists as $wishlist)

                                    <tr>
                                        <td class="images"><img src="{{ asset($wishlist->product->product_thambnail) }}" alt=""></td>
                                        <td class="product"><a href="single-product.html">{{ $wishlist->product->product_name }}</a></td>
                                        <td class="ptice">${{ $wishlist->product->product_price }}</td>
                                        <input type="hidden" name="product_id" value="{{ $wishlist->product_id }}" />
                                        <input type="hidden" name="w_id" value="{{ $wishlist->id }}" />
                                        <td class="quantity cart-plus-minus">
                                            <input type="text" name="quantity" value="1" />
                                        </td>
                                        <td class="addcart"><button type="submit"  class="btn btn-sm btn-danger">Add to Cart</a></button>
                                    </form>
                                        <td class="remove">  <a href="{{ url('delete-wishlist/'.$wishlist->id) }}"><i class="fa fa-times"></i> </a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- cart-area end -->

@endsection
