@extends('layouts.header')
@section('content')
<style>
        .default-btn1 {
            border-radius: 4px;
            -webkit-border-radius: 4px;
            -moz-border-radius: 18px;
            -ms-border-radius: 18px;
            -o-border-radius: 18px;
            color: #fff;
            background: #462328;
            position: relative;
            z-index: 1;
            font-family: 'Denton';
            margin-bottom: 9px;
        }
    </style>
<section class="inner-banner-wrapper">
      <div class="black-layer">
        <div class="container">
          <div class="inner-banner-title">
            <h2>Cart</h2>
          </div>
          <div class="breadcrumb-wrap">
            <ul>
              <li><a href="index.html">Home</a></li>
              <li class="active"><a href="#">Cart</a></li>
            </ul>
          </div>
        </div>
      </div>
    </section>
    <?php
            if($cart_product->count()<1){
            ?>
            <section class="add-to-cart form-section pattern-bg">
            <div class="container">
                <div class="row">
                  <div class="col-md-4 col-md-offset-4 col-sm-4 col-sm-offset-4 col-xs-12">
            <h3 style="color:white;">Your Cart is Empty !!  </h3><br><br>
            <a href="{{route('all_product_list')}}"><button class="default-btn">Shop Now</button></a>
            
                </div>
               </div>
            </div>
            </section>
            <?php
            }else{ ?>
    <section class="add-to-cart form-section pattern-bg">
      <div class="container">
        <div class="row">
          <div class="col-md-7 col-sm-6 col-xs-12">
            <div class="card-order">
            <?php $sub_total=0; ?>
              @foreach($cart_product as $cart_products)
              <?php 
                $prod_detail=DB::table('products')->where('id',$cart_products->product_id)->first();
                $product_cost=DB::table('product_variants')->where('product_id',$cart_products->product_id)->first();
              ?>
              <div class="row">
                <div class="col-md-3">
                  <div class="img-wrapper">
                    <img src="{{('public/frontend/images/product')}}/{{$prod_detail->image}}" class="img-responsive">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="product-price">
                    <p>₹ {{$cart_products->price}}/- </p>
                  </div>
                  <div class="product-heading">
                    <h3>{{$prod_detail->product_name}} | <span> {{$cart_products->weight}} {{$cart_products->weight_unit}} {{$cart_products->size_category}} {{$cart_products->packed_size}} </span> </h3>
                    <a title="Remove this item" class="remove" data-id="{{$cart_products->id}}">
                        <p><i class="fa fa-trash"></i>Remove Item </p>
                    </a>
                    <a href="{{route('product_detail')}}/{{$prod_detail->slug}}" class="product-title">
                        <p><button class="default-btn1" style="padding: 1px 12px; margin-left: 18px; top: 0px;"><img src="https://mbihosting.in/healthy-belly/public/frontend/images/icons/Eye.png"> </button></p>
                    </a>
                    <!--<p><i class="fa fa-heart"></i>Move to wishlist</p>-->
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="qty mt-5">
                    <span class="minus bg-dark" data-id="{{$cart_products->id}}" data-prod_id="{{$cart_products->product_id}}" data-cost="{{$cart_products->price}}" data-weight="{{$cart_products->weight}}">-</span>
                    <input type="number" class="count" name="qty" value="{{$cart_products->quantity}}">
                    <span class="plus bg-dark" class="plus bg-dark" data-id="{{$cart_products->id}}" data-prod_id="{{$cart_products->product_id}}" data-cost="{{$cart_products->price}}" data-weight="{{$cart_products->weight}}">+</span>
                  </div>
                </div>
              </div>
              <hr>
              <?php $sub_total+=$cart_products->total_price ?>
             @endforeach
            </div>
          </div>
          <div class="col-md-5 col-sm-6 col-xs-12">
            <div class="cart-item-div">
              <h2>Cart Totals </h2>
              <div class="table-cart">
                <table class="table">
                  <!--<thead>-->
                  <!--  <tr>-->
                  <!--    <th>Cart Subtotal</th>-->
                  <!--  </tr>-->
                  <!--</thead>-->
                  <tbody>
                    <tr>
                      <td style="color: #462328 !important;"> ₹ {{ $sub_total }} </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div class="col-md-12 col-sm-6 col-xs-12">
                <div class="payment-way mT20 mB20">
                  <h2> We Accept </h2>
                  <ul>
                    <li><img src="{{asset('public/frontend/images/icons/visa.png')}}" class="img-responsive" alt="visa" title="visa"></li>
                    <li><img src="{{asset('public/frontend/images/icons/mastercard.jpg')}}" class="img-responsive" alt="mastercard" title="mastercard"></li>
                    <li><img src="{{asset('public/frontend/images/icons/american-express.png')}}" class="img-responsive" alt="american express" title="american express"></li>
                  </ul>
                </div>
              </div>
              <div class="sign-up-btn-wrap mT10">
                <div class="btn-sec mT15">
                  <?php if(Auth::guard('web')->check()){ ?>
                      <h2><a class="default-btn" href="{{route('checkout_view')}}">Proceed to Checkout</a></h2>
                    <?php }else{ ?>
                      <h2><a class="default-btn" href="{{route('login')}}">Proceed to Checkout</a></h2>
                    <?php } ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <?php } ?>
@endsection