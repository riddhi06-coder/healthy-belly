@extends('layouts.header')
@section('content')
<section class="inner-banner-checkout">
      <div class="black-layer">
        <div class="container">
          <div class="inner-banner-title">
            <h2>Checkout</h2>
          </div>
          <div class="breadcrumb-wrap">
            <ul>
              <li><a href="{{route('index')}}">Home</a></li>
              <li class="active"><a href="#">Checkout</a></li>
            </ul>
          </div>
        </div>
      </div>
    </section>
    <section class="checkout-form">
      <div class="container">
      <form  method="post" action="{{route('save_temp_detail')}}" enctype="multipart/form-data">
      @csrf
        <div class="row">
            <div class="col-md-6">
                
            
            @if (count($errors) > 0)
                <div class = "alert alert-danger">
                    <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                </div>
            @endif
            <div class="form-section checkbox form-bg pattern-bg contact-us-page">
                <div class="heading text-center">
                <!--<h4>Contact</h4>-->
                <h3>Billing Details</h3>
                </div>
                <div class="row">
                                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                  <label class="control-label" for="user">Select Address Type </label>
                  <select class="form-control" name="address_type" id="address_type">
                    <option value="">Select Address Type</option>
                    @foreach($address as $addresses)
                    <option value="{{$addresses->id}}">{{$addresses->title}}</option>
                    @endforeach
                  </select>
                </div>
                </div>
<div class="row">
                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                  <label class="control-label" for="user">First Name <span class="text-light">*</span></label>
                  <input type="text" class="form-control" id="first_name" name="first_name" value="{{$user_detail->first_name}}">
                </div>
                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                  <label class="control-label" for="lname">Last Name <span class="text-light">*</span></label>
                  <input type="text" class="form-control" id="last_name" name="last_name" value="{{$user_detail->last_name}}">
                </div>
</div>
<div class="row">
                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                  <label class="control-label" for="phone">Phone <span class="text-light">*</span></label>
                  <input type="number" class="form-control" id="phone" name="phone" maxlength="10" value="{{$user_detail->contact}}">
                </div>
                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                  <label class="control-label" for="phone">E-mail Address <span class="text-light">*</span></label>
                  <input type="email" class="form-control" id="email" name="email" value="{{$user_detail->email}}">
                </div>
</div>

<div class="row">
                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                  <label class="control-label" for="code">Address <span class="text-light">*</span></label>
                  <input type="text" class="form-control" id="address" name="address" value="{{$user_detail->address}}">
                </div>
</div>
<div class="row">
                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                  <label class="control-label" for="code">City <span class="text-light">*</span></label>
                  <input type="text" class="form-control" id="city" name="city" value="{{$user_detail->city}}">
                </div>
                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                  <label class="control-label" for="code">State <span class="text-light">*</span></label>
                  <input type="text" class="form-control" id="state" name="state" value="{{$user_detail->state}}">
                </div>
</div>
<div class="row">
                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                  <label class="control-label" for="code">Country <span class="text-light">*</span></label>
                  <input type="text" class="form-control" id="country" name="country" value="{{$user_detail->country}}">
                </div>
                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                  <label class="control-label" for="code">Pincode <span class="text-light">*</span></label>
                  <input type="text" class="form-control" id="pincode" name="pincode" maxlength="6" value="{{$user_detail->zipcode}}">
                </div>
</div>

                <div class="row">
                              <div class="form-group col-md-12 col-sm-6 col-xs-12">
                  <label class="control-label" for="code">Note</label>
                  <textarea class="form-control" name="note" rows="4" cols="50"></textarea>
                </div>      
                </div>

                
                <!-- <div class="form-group col-md-12 col-sm-6 col-xs-12">
                  <label><input type="checkbox" value=""> Shipping address same as billing</label>
                </div> -->
                <div class="clearfix"></div>
              
            </div>
          <?php if($cart_product->count()>0){ ?>
          </div>
          <div class="col-md-6">
            <div class="cart-item-div form-section form-bg pattern-bg">
              <div class="table-cart">
              <table class="table">
                <thead>
                  <tr>
                    <th>Sweet</th>
                    <th>Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <!-- <th></th> -->
                  </tr>
                </thead>
                <tbody>
                <?php $sub_total=0; ?>
                @foreach($cart_product as $cart_products)
                <?php 
                    $prod_detail=DB::table('products')->where('id',$cart_products->product_id)->first();
                    $product_cost=DB::table('product_variants')->where('product_id',$cart_products->product_id)->first();
                  ?>
                  <tr>
                    <td><img src="{{asset('public/frontend/images/product')}}/{{$prod_detail->image}}" alt="gulabjamun" title="gulabjamun"></td>
                    <td>{{$prod_detail->product_name}}</td>
                    <td>
                        <div class="qty mt-5">
                            <span class="minus bg-dark" data-id="{{$cart_products->id}}" data-prod_id="{{$cart_products->product_id}}" data-cost="{{$cart_products->price}}" data-weight="{{$cart_products->weight}}">-</span>
                            {{$cart_products->quantity}}
                            <span class="plus bg-dark" data-id="{{$cart_products->id}}" data-prod_id="{{$cart_products->product_id}}" data-cost="{{$cart_products->price}}" data-weight="{{$cart_products->weight}}">+</span>
                        </div>
                    </td>
                    <td>₹ {{$cart_products->total_price}} </td>
                    <td>
                      <div class="remove-icon">
                        <a title="Remove this item" class="remove" data-id="{{$cart_products->id}}">
                          <!-- <img src="{{('public/frontend/images/svg/delete.svg')}}" class="img-responsive"> -->
                          <i class="fa fa-trash"></i>
                        </a>
                      </div>
                    </td>
                  </tr>
                  <?php $sub_total+=$cart_products->total_price ?>
                  @endforeach
                </tbody>
                <tfoot>
                  <tr>
                    <th>SubTotal</th>
                    <td></td>
                    <td></td>
                    <td>₹ {{$sub_total}}</td>
                  </tr>
                  <tr>
                    <th>Shipping Charge</th>
                    <td></td>
                    <td></td>
                    <td><?php if($sub_total<=15){?>₹ <?php echo $shipping_charge=2; }else{ $shipping_charge=0; echo "Free"; } ?></td>
                  </tr>
                  <tr>
                    <th>Total</th>
                    <td></td>
                    <td></td>
                    <td>₹ <b>{{$total=$sub_total+$shipping_charge}}</b></td>
                  </tr>
                </tfoot>
              </table>
            </div>
            <div class="row mT25">
                               <div class="col-md-12 col-sm-6 col-xs-12">
                  <h2 class="mB20"> Payment Option : </h2>
                  <div class="payment-opt d-block my-3">
                    <div class="custom-control custom-radio">
                      <input id="credit" name="paymentMethod" type="radio" value="Online" class="custom-control-input" checked="" required="">
                      <label class="custom-control-label" for="credit">Online</label>
                    </div>
                    <div class="custom-control custom-radio">
                      <input id="debit" name="paymentMethod" type="radio" value="Cash On Delivery" class="custom-control-input" required="">
                      <label class="custom-control-label" for="debit">Cash On Delivery</label>
                    </div>
                  </div>
                </div>
            </div>

                <!-- <div class="col-md-12 col-sm-6 col-xs-12">
                  <div class="payment-way mT20">
                  <h2> We Accept </h2>
                <ul>
                  <li><img src="images/icons/visa.png" class="img-responsive" alt="visa" title="visa"></li>
                  <li><img src="images/icons/mastercard.jpg" class="img-responsive" alt="mastercard" title="mastercard"></li>
                  <li><img src="images/icons/american-express.png" class="img-responsive" alt="american express" title="american express"></li>
                </ul>
              </div>
                </div> -->
                <div class="clearfix"></div>
                 <div class="sign-up-btn-wrap mT10">
                  <div class="btn-sec mT15">
                    <input type="hidden" name="sub_total" value="{{$sub_total}}">
                    <input type="hidden" name="shipping_charge" value="{{$shipping_charge}}">
                    <input type="hidden" name="total_amt" value="{{$total}}">
                    <input type="hidden" name="user_id" value="{{$user_detail->id}}">
                    <input type="submit" name="submit" class="btn default-btn btn-block" value="Place Order">
                  </div>
                </div>
            </div>
          </div>
          <?php }else{ ?>
            <div class="col-md-6">
            <div class="cart-item-div form-section form-bg pattern-bg">
                <div class="table-cart">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Your Cart is empty</th>
                      </tr>
                    </thead>
                  </table>
                </div>
                <a href="{{route('product_list')}}"><input class="btn default-btn btn-block" value="Shop Now"></a>
              </div>
            </div>
              <?php } ?>
        </div>
        </form>
      </div>
    </section>
@endsection