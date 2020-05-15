@extends('layouts.fontend_master')
@section('title') Cart  @endsection


@section('fontend_content')

       <!-- .breadcumb-area start -->
       <div class="breadcumb-area bg-img-4 ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcumb-wrap text-center">
                        <h2>Shopping Cart</h2>
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li><span>Shopping Cart</span></li>
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
                    <form action="{{ route('cart.update') }}" method="POST">
                        @csrf
                        <table class="table-responsive cart-wrap">
                            <thead>
                                <tr>
                                    <th class="images">Image</th>
                                    <th class="product">Product</th>
                                    <th class="ptice">Price</th>
                                    <th class="quantity">Quantity</th>
                                    <th class="total">Total</th>
                                    <th class="remove">Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $cart_subtotal = 0;
                                @endphp
                                @foreach ($carts as $cart)

                                <tr>
                                <td class="images"><img src="{{$cart->product->product_thambnail}}" alt=""></td>
                                <td class="product"><a href="single-product.html">{{$cart->product->product_name}}</a></td>
                                <td class="ptice">${{$cart->product->product_price}}</td>
                                    <td class="quantity cart-plus-minus">
                                    <input type="text"" value="{{$cart->quantity}}" name="cart_quantity[{{ $cart->id }}]" />
                                    </td>
                                <td class="total">${{$cart->product->product_price * $cart->quantity}}</td>
                                    <td class="remove">
                                    <a href="{{url('delete-cart/'.$cart->id)}}"><i class="fa fa-times"></i></a></td>
                                </tr>
                                @php
                               $cart_subtotal = $cart_subtotal + ($cart->product->product_price * $cart->quantity)
                                @endphp
                                @endforeach

                            </tbody>
                        </table>
                        <div class="row mt-60">
                            <div class="col-xl-4 col-lg-5 col-md-6 ">
                                <div class="cartcupon-wrap">
                                    <ul class="d-flex">
                                        <li>
                                            <button type="submit">Update Cart</button>
                                        </li>
                                    </form>
                                        <li><a href="shop.html">Continue Shopping</a></li>
                                    </ul>
                                    @isset($discount_amount)
                                    @else
                                    <h3>Cupon</h3>
                                    <p>Enter Your Cupon Code if You Have One</p>
                                    <div class="cupon-wrap">
                                        <input type="text"  id="coupon_text" placeholder="Cupon Code">
                                        <a class="btn btn-danger" id="apply-coupon-btn" >Apply Cupon</a>
                                    </div>
                                    @endisset
                                </div>
                            </div>
                            <div class="col-xl-3 offset-xl-5 col-lg-4 offset-lg-3 col-md-6">
                                <div class="cart-total text-right">
                                    <h3>Cart Totals</h3>
                                    <ul>
                                        <li><span class="pull-left">Subtotal </span>${{ $cart_subtotal }} </li>
                                        @isset($discount_amount)
                                        <li><span class="pull-left">Discount ( {{ $discount_amount }}% )</span>- ${{ round($cart_subtotal * ($discount_amount/100)) }} </li>
                                        @else
                                        @endisset
                                        @isset($discount_amount)
                                        <li><span class="pull-left"> Total </span> ${{ $final_total = round($cart_subtotal - $cart_subtotal * ($discount_amount/100) ) }}</li>
                                        @else
                                        <li><span class="pull-left"> Total </span> ${{ $final_total = $cart_subtotal }}</li>
                                        @endisset


                                    </ul>
                                    <form action="{{ url('Checkout') }}" method="POST">
                                        @csrf
                                        <input type="hidden" value="{{$final_total}}" name="total"> <br>
                                        @isset($discount_amount)
                                        <input type="hidden" value="{{$discount_amount}}" name="discount_amount"> <br>
                                        @else 
                                        @endisset
                                       
                                        <button type="submit" class="btn btn-danger" >Proceed to Checkout</a>
                                    </form>
                                </div>
                            </div>
                        </div>

                </div>
            </div>
        </div>
    </div>
    <!-- cart-area end -->



@endsection
