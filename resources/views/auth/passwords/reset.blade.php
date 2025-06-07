@extends('layouts.header')
<?php
$parent_cat=DB::table('parent_category')->where('status',1)->get();
$sub_cat=DB::table('product_sub_category')->where('status',1)->get();
$social_media=DB::table('social_media')->where('status',1)->get();
$shop_detail=DB::table('shop_details')->where('id',1)->first();
$aboutus=DB::table('abouts')->where('id',1)->first();
if (getenv('HTTP_X_FORWARDED_FOR')) {
$ip_address = getenv('HTTP_X_FORWARDED_FOR');
if ($first_ip_in_list = stristr($ip_address, ',', true))
    $ip_address = $first_ip_in_list;
}
elseif (getenv('HTTP_X_REAL_IP')) {
    $ip_address = getenv('HTTP_X_REAL_IP');
}
else {
    $ip_address = $_SERVER['REMOTE_ADDR'] ?? '127.0.0.1';
}
// $ip_address = '103.246.242.18';
$user_id="";
if(Auth::guard('web')->check()){
    $user_id=Auth::guard('web')->user()->id;
}
$cart_count=DB::table('cart')->where('ip_address',$ip_address)->where('user_id',$user_id)->get();
$wishlist_count=DB::table('wishlists')->where('ip_address',$ip_address)->where('user_id',$user_id)->get();
?>
@section('content')
<style>
    .login-sec a {
        padding: 6px 11px;
        font-family: 'Gilroy';
    }
    
    .sign-up-btn-wrap .g-btn {
        border: 1px solid #462328;
        margin-bottom: 9px;
        padding: 13px;
        border-radius: 8px; 
    }
    
    .sign-img img {
        height: 100%;
        width: 100%;
        object-fit: cover;
    }
    
    .heading h3 {
        font-size: 32px;
    }
    .default-btn {
        line-height: 12px;
        padding: 15px 22px;
    }
</style>

<section class="login-form">
      <div class="container">
          <div class="row align-items-center">
        <div class="col-md-6">
            @if(Session()->has('status'))
                  <div class="alert alert-success text-light">
                      {{session()->get('status')}}
                  </div>
              @endif
          <div class="form-section pattern-bg login login-sec">
                       <div class="heading text-center mB30">
          <h4>Reset Password your account11111</h4>
          <h3>Reset Password</h3>
        </div>
        @isset($url)
            <form method="POST" action='{{ route("password.update", $url) }}'>
            @else
            <form method="POST" action="{{ route('password.update') }}">
            @endisset
                @csrf
                
                <input type="hidden" name="token" value="{{ $token }}">
                
                <div class="form-group">
                    <label class="control-label" for="email">E-mail Address : <span class="text-light">*</span></label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}"  autocomplete="email" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong style="color:white;">{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
              
                <div class="form-group col-md-6">
                    <label class="control-label" for="pwd">Password : <span class="text-light">*</span></label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" autocomplete="new-password">
                    @error('password')
                        <span class="invalid-feedback" style="color:red;" role="alert">
                            <strong style="color:white;">{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                
                <div class="form-group col-md-6">
                  <label class="control-label" for="pwd">Confirm Password : <span class="text-light">*</span></label>
                  <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password-confirm" name="password_confirmation" autocomplete="new-password">
                  @error('password_confirmation')
                        <span class="invalid-feedback" style="color:red;" role="alert">
                            <strong style="color:white;">{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
              
              <div class="sign-up-btn-wrap mt-5">
                  <div class="btn-sec">
                        <button type="submit" class="btn default-btn">
                            {{ __('Reset Password') }}
                        </button>
                  </div>
                  <br>
                  
                  <p class="text-center p-4">Already have account? &nbsp; &nbsp; &nbsp; <a class="btn default-btn" href="{{ route('login') }}">Sign In</a></p><br><br>
                  <p class="text-center p-4">I dont't have a account? &nbsp; &nbsp; &nbsp; <a class="btn default-btn" href="{{ route('register') }}">Sign Up</a></p>
                  
                </div>
              
            </form>
          </div>
        </div>
        <div class="col-md-6">
          <div class="sign-img">
            <img src="{{asset('public/frontend/images/healthy_belly_login_page_banner.png')}}" class="img-responsive" alt="The Mthai Box">
          </div>
        </div>
      </div>
      </div>
    </section>
@endsection
