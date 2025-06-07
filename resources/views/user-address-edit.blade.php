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
  <div class="col-md-12">
    <div class="custom-class total-cart pattern-bg form-bg"> 
  <div class="tab-content">
   <!--  <div class="custom-class total-cart pattern-bg form-bg"> -->
    <div id="home" class="tab-pane fade in active">
      <h3>Update Address</h3>
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <div class="account-change">
            <form action="{{route('update_user_address')}}" method="post" class="mT15">
            @csrf
              <div class="form-group">
                <label class="control-label" for="Address Title">Address Title </label>
                  <input type="text" class="form-control" id="title" name="title" value="{{$address->title}}">
              </div>
              <div class="form-group">
                <label class="control-label" for="First Name">Address </label>
                  <input type="text" class="form-control" id="address" name="address" value="{{$address->address}}">
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
                  <input type="number" class="form-control" id="zipcode" name="zipcode" value="{{$address->zipcode}}">
              </div>
              <div style="margin-top: 7px;" id="CheckPasswordMatch"></div>
              <input type="hidden" name="id" value="{{$address->id}}" >
              <input type="hidden" name="user_id" value="{{$address->user_id}}" >
              <button type="submit" class="btn default-btn" id="add" name="submit"> Update </button>
            </form>
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