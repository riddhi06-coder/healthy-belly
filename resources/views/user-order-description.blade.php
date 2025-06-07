@extends('layouts.header')
@section('content')
<?php
$parent_cat=DB::table('parent_category')->where('status',1)->get();
$sub_cat=DB::table('product_sub_category')->where('status',1)->get();
$social_media=DB::table('social_media')->where('status',1)->get();
$slider=DB::table('sliders')->where('status',1)->get();
$advertise=DB::table('advertisements')->where('status',1)->where('section','Main')->get();
$shop_detail=DB::table('shop_details')->where('id',1)->first();
?>
<section class="inner-banner-my-account">
    <div class="black-layer">
    <div class="container">
        <div class="inner-banner-title">
        <h2>My Account</h2>
        </div>
        <div class="breadcrumb-wrap">
        <ul>
            <li><a href="{{route('index')}}">Home</a></li>
            <li class="active"><a href="#">My Account</a></li>
        </ul>
        </div>
    </div>
    </div>
</section>
@if(Session()->has('success'))
<div class="alert alert-success">
    {{session()->get('success')}}
</div>
@endif
@if (count($errors) > 0)
    <div class = "alert alert-danger">
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif
<section class="account-wrapper">
  <div class="container">
    <div class="row">
  <div class="col-md-12">
    <div class="custom-class total-cart pattern-bg form-bg"> 
  <div class="tab-content">
   <!--  <div class="custom-class total-cart pattern-bg form-bg"> -->
    <a href="{{route('user_dashboard')}}" class="btn default-btn"><< Back</a>
    <div id="home" class="tab-pane fade in active">
      <h3>Your Orders</h3>
      <div class="row">
      <div class="col-md-12">
        <div class="table-responsive cart-detail mT15">
              <table class="table table-bordered">
                <thead class="">
                  <tr>
                    <th>Sr no.</th>
                    <th>product Name</th>
                    <th>Price</th>
                    <th>Weight</th>
                    <th>Size Category</th>
                    <th>packed Size</th>
                    <th>Quantity</th>
                    <th>Total Amount</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $user_parent_detail=DB::table('parent_order_table')->where('id',$parent_cats->id)->first();
                  $order_detail=DB::table('child_order_table')->where('parent_id',$parent_cats->id)->get();
                  ?>
                  @foreach($order_detail as $order_details)
                  <?php
                  $product_detail=DB::table('products')->where('id',$order_details->product_id)->first();
                  ?>
                  <tr>
                    <td>{{$i++}}</td>
                    <td>{{$product_detail->product_name}}</td>
                    <td>₹{{$order_details->price}}</td>
                    <?php if($order_details->weight!=''){ ?>
                    <td>{{$order_details->weight}} {{$order_details->weight_unit}}</td>
                    <?php }else{ ?>
                    <td>-</td>
                    <?php }if($order_details->size_category!=''){ ?>
                    <td>{{$order_details->size_category}}</td>
                    <?php }else{ ?>
                    <td>-</td>
                    <?php }if($order_details->packed_size!=''){ ?>
                    <td>{{$order_details->packed_size}}</td>
                    <?php }else{ ?>
                    <td>-</td>
                    <?php } ?>
                    <td>{{$order_details->quantity}}</td>
                    <td>₹{{$order_details->price*$order_details->quantity}}</td>
                  </tr>
                  <?php $ship_charge=$order_details->shipping_charge; ?>
                  @endforeach
                  <tr>
                    <td colspan="7"><b>Shipping Charge</b></td>
                    <td><b>₹{{$ship_charge}}</b></td>
                  </tr>
                  <tr>
                    <td colspan="7"><b>Final Amount</b></td>
                    <td><b>₹{{$user_parent_detail->total_amount}}</b></td>
                  </tr>
                </tbody>
              </table>
            </div>
      </div>
    </div>
    </div>
</div>
</div>
</div>
</div>
</div>
  
</section>
@endsection