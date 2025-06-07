@extends('layouts.header')
@section('content')
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
      <div class="col-md-4">
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home"><i class="fa fa-tachometer"></i> Dashboard</a></li>
    <li><a data-toggle="tab" href="#menu1"><i class="fa fa-shopping-cart mR10"></i> Order</a></li>
    <!-- <li><a data-toggle="tab" href="#menu2"><i class="fa fa-tags mR10"></i> My Coupons & Vouchers</a></li> -->
    <li><a data-toggle="tab" href="#menu3"><i class="fa fa-map-marker mR10"></i> Address</a></li>
    <li><a data-toggle="tab" href="#menu4"><i class="fa fa-user mR10"></i> Account Details</a></li>
    <li><a data-toggle="tab" href="#menu5"><i class="fa fa-key mR10"></i> Password</a></li>
    <li><a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();"><i class="fa fa-sign-out mR10"></i> Logout</a></li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
  </ul>
</div>

  <div class="col-md-8">
    <div class="custom-class total-cart pattern-bg form-bg"> 
  <div class="tab-content">
   <!--  <div class="custom-class total-cart pattern-bg form-bg"> -->
    <div id="home" class="tab-pane fade in active">
      <h3>Dashboard</h3>
      <div class="row">
        <div class="col-md-6">
            <a data-toggle="tab" href="#menu4">
            <div class="wrapper-profile">
                <img src="{{('public/frontend/images/svg/user-profile.svg')}}" class="img-responsive" alt="user profile">
                <h2> My Profile </h2>
             </div>
            </a>
      </div>
        <div class="col-md-6">
        <a data-toggle="tab" href="#menu1">
          <div class="wrapper-profile">
            <img src="{{('public/frontend/images/svg/shopping-bag.svg')}}" class="img-responsive" alt="order">
            <h2> My Order </h2>
          </div>
        </a>
      </div>
        <!-- <div class="col-md-6">
        <a data-toggle="tab" href="#menu4">
            <div class="wrapper-profile">
                <img src="{{('public/frontend/images/svg/home.svg')}}" class="img-responsive" alt="address">
                <h2> Account Detail </h2>
            </div>
        </a>
      </div> -->
        <!-- <div class="col-md-6">
        <a data-toggle="tab" href="#menu2">
            <div class="wrapper-profile">
                <img src="{{('public/frontend/images/svg/coupon.svg')}}" class="img-responsive" alt="coupons">
                <h2> My Coupons </h2>
            </div>
        </a>
      </div> -->
      </div>
    </div>
    <div id="menu1" class="tab-pane fade">
      <h3>Your Orders</h3>
      <div class="row">
      <div class="col-md-12">
        <div class="table-responsive cart-detail mT15">
              <table class="table table-bordered">
                <thead class="">
                  <tr>
                    <th>No</th>
                    <th>Date</th>
                    <th>Transation Id</th>
                    <th>Invoice No.</th>
                    <th>Total Amount</th>
                    <th>Order Status</th>
                    <th>::</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i=1; ?>
                  @foreach($parent_table_order as $parent_table_orders)
                  <tr>
                    <td>{{$i}}.</td>
                    <td>{{$parent_table_orders->created_at}}</td>
                    <td>{{$parent_table_orders->trans_id}}</td>
                    <td>{{$parent_table_orders->invoice_no}}</td>
                    <td>{{$parent_table_orders->total_amount}}</td>
                    <td>{{$parent_table_orders->order_status}}</td>
                    <td><a href="{{route('user_order_description')}}/{{$parent_table_orders->invoice_no}}"><img src="{{('public/frontend/images/svg/view.svg')}}" class="img-responsive" alt="view order"></a></td>
                  </tr>
                  <?php $i++; ?>
                 @endforeach
                </tbody>
              </table>
            </div>
      </div>
    </div>
  </div>
    <!-- <div id="menu2" class="tab-pane fade">
      <h3> My Coupon & Vouchers </h3>
     <div class="coupon-post">
        <div class="row">
          <div class="col-md-6">
            <div class="coupon-detail">
            <h2>On minimum purchase of Rs. 999 </h2>
            <p>Lorem ipsum dolor sit amet, et nam pertinax gloriatur. Sea te minim soleat senserit,</p>
            <p>Use Promo Code: <span class="promo">BOH232</span></p>
            <p class="expire">Expires: Jan 03, 2021</p>
          </div>
        </div>
          <div class="col-md-6">
            <div class="coupon-detail">
            <h2>On minimum purchase of Rs. 999 </h2>
            <p>Lorem ipsum dolor sit amet, et nam pertinax gloriatur. Sea te minim soleat senserit,</p>
            <p>Use Promo Code: <span class="promo">BOH232</span></p>
            <p class="expire">Expires: Jan 03, 2021</p>
          </div>
        </div>
        </div>

     </div>
    </div> -->
    <div id="menu3" class="tab-pane fade">
    <div class="add-order">
      <div class="row">
        @foreach($address as $addresses)
        <div class="col-md-5">
          <h3><img src="{{('public/frontend/images/svg/package.svg')}}" class="img-responsive" alt="shipping"> {{$addresses->title}} </h3>
          <p>{{$addresses->address}}, {{$addresses->city}} {{$addresses->state}} {{$addresses->zipcode}}, {{$addresses->region}} </p>
          <p><a href="{{route('edit_user_address')}}/{{$addresses->id}}"><button class="btn btn-primary btn-xs">Edit</button></a></p>
        </div>
        @endforeach
        <div class="col-md-2">
        <a data-toggle="tab" href="#menu7"><button class="btn btn-md btn-primary"> Add Address </button></a>
        </div>
      </div>
    </div>
  </div>
    <div id="menu4" class="tab-pane fade">
    <div class="profile-desc">
      <div class="row">
        <div class="col-md-10">
          <div class="brief-desc">
            <h5>{{$user_detail->first_name}} {{$user_detail->last_name}}</h5>
            <p><strong> Email : </strong> <a href="mailto:{{$user_detail->email}}"><span> {{$user_detail->email}} </span> </a></p>
            <p><strong> Phone : </strong> <a href="tel:+91 9854712555"> <span> {{$user_detail->contact}} </span> </a></p>
            <p><strong> Address : </strong> <span> {{$user_detail->address}} {{$user_detail->city}} {{$user_detail->state}} {{$user_detail->country}} {{$user_detail->zipcode}}</span></p>
          </div>
        </div>
        <div class="col-md-2">
        <a data-toggle="tab" href="#menu6"><button class="btn btn-md btn-primary"> Edit Detail </button></a>
        </div>
      </div>
    </div>
    </div>
    <div id="menu5" class="tab-pane fade">
      <h3>Change Password</h3>
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <div class="account-change">
            <?php if($user_detail->password!=''){ ?>
            <form action="{{route('save_changed_password')}}" method="post" class="mT15">
            @csrf
              <div class="form-group">
                <label class="control-label" for="pwd">Old Password </label>
                  <input type="password" class="form-control" id="old_pwd" name="old_pwd">
              </div>
            <?php }else{ ?>
            <form action="{{route('save_changed_new_password')}}" method="post" class="mT15">
            @csrf
            <?php } ?>
              <div class="form-group">
                <label class="control-label" for="pwd">New Password </label>
                  <input type="password" class="form-control" id="pwd" name="pwd">
              </div>
               <div class="form-group">
                <label class="control-label" for="pwd">Re-Enter Password </label>
                  <input type="password" class="form-control" id="confirmpwd" name="confirmpwd">
              </div>
              <div style="margin-top: 7px;" id="CheckPasswordMatch"></div>
              <input type="hidden" name="user_id" value="{{$user_detail->id}}" >
              <input type="hidden" name="email" value="{{$user_detail->email}}" >
              <input type="hidden" name="db_pwd" value="{{$user_detail->password}}" >
              <button type="submit" class="btn default-btn" id="change_password" name="submit" disabled> Change </button>
            </form>
          </div>
        </div>
        </div>
    </div>
    <div id="menu6" class="tab-pane fade">
      <h3>Update Detail</h3>
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <div class="account-change">
            <form action="{{route('update_user_detail')}}" method="post" class="mT15">
            @csrf
              <div class="form-group">
                <label class="control-label" for="First Name">First Name </label>
                  <input type="text" class="form-control" id="first_name" name="first_name" value="{{$user_detail->first_name}}">
              </div>
              <div class="form-group">
                <label class="control-label" for="Last Name">Last Name </label>
                  <input type="text" class="form-control" id="last_name" name="last_name" value="{{$user_detail->last_name}}">
              </div>
              <div class="form-group">
                <label class="control-label" for="Contact">Contact </label>
                  <input type="number" class="form-control" id="contact" name="contact" value="{{$user_detail->contact}}">
              </div>
              <div class="form-group">
                <label class="control-label" for="Contact">Address </label>
                  <textarea type="text" class="form-control" id="address" row="3" name="address">{{$user_detail->address}}</textarea>
              </div>
              <div class="form-group">
                <label class="control-label" for="City">City </label>
                  <input type="text" class="form-control" id="city" name="city" value="{{$user_detail->city}}">
              </div>
              <div class="form-group">
                <label class="control-label" for="State">State </label>
                  <input type="text" class="form-control" id="state" name="state" value="{{$user_detail->state}}">
              </div>
              <div class="form-group">
                <label class="control-label" for="Country">Country </label>
                  <input type="text" class="form-control" id="country" name="country" value="{{$user_detail->country}}">
              </div>
              <div class="form-group">
                <label class="control-label" for="Zipcode">Zipcode </label>
                  <input type="number" class="form-control" id="zipcode" name="zipcode" value="{{$user_detail->zipcode}}">
              </div>
              <div style="margin-top: 7px;" id="CheckPasswordMatch"></div>
              <input type="hidden" name="user_id" value="{{$user_detail->id}}" >
              <input type="hidden" name="email" value="{{$user_detail->email}}" >
              <button type="submit" class="btn default-btn" id="change_password" name="submit"> Update </button>
            </form>
          </div>
    </div>
  </div>
  </div>

  <!-- Add address start -->
  <div id="menu7" class="tab-pane fade">
      <h3>Update Detail</h3>
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <div class="account-change">
            <form action="{{route('add_user_address')}}" method="post" class="mT15">
            @csrf
              <div class="form-group">
                <label class="control-label" for="Address Title">Address Title </label>
                  <input type="text" class="form-control" id="title" name="title" value="{{old('title')}}">
              </div>
              <div class="form-group">
                <label class="control-label" for="First Name">Address </label>
                  <input type="text" class="form-control" id="address" name="address" value="{{old('address')}}">
              </div>
              <div class="form-group">
                <label class="control-label" for="State">City </label>
                  <select class="form-control" id="city" name="city">
                    <option value="Slough">Slough</option>
                    <option value="London">London</option>
                  </select>
              </div>
              <div class="form-group">
                <label class="control-label" for="State">County </label>
                  <select class="form-control" id="state" name="state">
                    <option value="Berkshire">Berkshire</option>
                  </select>
              </div>
              <div class="form-group">
                <label class="control-label" for="Country">Region </label>
                  <select class="form-control" id="country" name="country">
                    <option value="UK">UK</option>
                  </select>
              </div>
              <div class="form-group">
                <label class="control-label" for="Zipcode">Zipcode </label>
                  <input type="number" class="form-control" id="zipcode" name="zipcode">
              </div>
              <div style="margin-top: 7px;" id="CheckPasswordMatch"></div>
              <input type="hidden" name="user_id" value="{{$user_detail->id}}" >
              <button type="submit" class="btn default-btn" id="add" name="submit"> Save </button>
            </form>
          </div>
    </div>
  </div>
  </div>
  <!-- Add address end -->
</div>
</div>
</div>
</div>
</div>
  
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function () {
   $("#confirmpwd").on('keyup', function(){
    var password = $("#pwd").val();
    var confirmPassword = $("#confirmpwd").val();
    if (password != confirmPassword){
        $("#CheckPasswordMatch").html("Password does not match !").css("color","red");
        $('#change_password').prop('disabled', true);
    }else{
        if($("#pwd").val().length <=7){
            $("#CheckPasswordMatch").html("Password length must be atleast 8  !").css("color","red");
            $('#change_password').prop('disabled', true);
        }else{
            $("#CheckPasswordMatch").html("Password match !").css("color","green");
            $('#change_password').prop('disabled', false);
        }
    }
   });
});
</script>
@endsection