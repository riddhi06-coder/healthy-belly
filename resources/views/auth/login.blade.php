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
</style>

<section class="login-form">
      <div class="container">
          <div class="row align-items-center">
        <div class="col-md-6">
            @if(Session()->has('success'))
                  <div class="alert alert-success text-light">
                      {{session()->get('success')}}
                  </div>
              @endif
          <div class="form-section pattern-bg login login-sec">
                       <div class="heading text-center mB30">
          <h4>Register your account</h4>
          <h3>Login Here</h3>
        </div>
        @isset($url)
            <form method="POST" action='{{ url("login/$url") }}'>
            @else
            <form method="POST" action="{{ route('login') }}">
            @endisset
                @csrf
              <div class="form-group">
                <label class="control-label" for="email">E-mail Address : <span class="text-light">*</span></label>
                  <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}"  autocomplete="email" autofocus>
                  @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong style="color:white;">{{ $message }}</strong>
                    </span>
                 @enderror
                 
                 
              </div>
              <div class="form-group">
                <label class="control-label" for="pwd">Password : <span class="text-light">*</span></label>
                        
                  <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password"  autocomplete="current-password">
                  @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong style="color:white;">{{ $message }}</strong>
                        </span>
                    @enderror
              </div>
              <div class="form-group p-3">
                  <label><input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> Remember me</label>
              </div>
                <div class="sign-up-btn-wrap mb-5">
                  <button type="submit" name="submit" class="btn default-btn" >
                  {{ __('Login') }}
                  </button>
                  <a  href="{{ route('register') }}" class="btn default-btn" >Sign Up</a>
                </div>
                
                <div class="">
                    <div class="g-btn d-flex">
                        <a href="{{ url('auth/google') }}" class="btn default-btn"><i class="fa fa-google"></i> With Google</a>
                        <a href="{{ url('login/facebook') }}" class="btn default-btn"><i class="fa fa-facebook"></i> Facebook</a>
                      
                        @if (Route::has('password.request'))
                            <a class="btn default-btn" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>
                </div>

              
            </form>
          </div>
        </div>
        <div class="col-md-6">
          <div class="sign-img">
            <img src="{{asset('frontend/images/healthy_belly_login_page_banner.png')}}" class="img-responsive" alt="The Mthai Box">
          </div>
        </div>
      </div>
      </div>
    </section>
@endsection
