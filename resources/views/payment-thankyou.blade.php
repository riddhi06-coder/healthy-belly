@extends('layouts.header')
@section('content')
<?php 
$parent_cat=DB::table('parent_category')->where('status',1)->get();
$sub_cat=DB::table('product_sub_category')->where('status',1)->get();
$social_media=DB::table('social_media')->where('status',1)->get();
$slider=DB::table('sliders')->where('status',1)->get();
$advertise=DB::table('advertisements')->where('status',1)->where('section','Main')->get();
$shop_detail=DB::table('shop_details')->where('id',1)->first();
$cart_count=DB::table('cart')->where('ip_address',$ip_address)->orWhere('user_id',$user_id)->get();
$wishlist_count=DB::table('wishlists')->where('ip_address',$ip_address)->orWhere('user_id',$user_id)->get();
?>
<section class="error-page thankyou">
        <div class="">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
          
              <div class="error-msg black-layer">
                <h1 class="heading-thanks">Thank You !!</h1>
                <h5>Your order has been paced .Please check your email.</h5>
                <a class="default-btn" href="{{route('index')}}">Go to Myorder</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection