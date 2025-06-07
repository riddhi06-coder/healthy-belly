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
    .default-btn {
        line-height: 12px;
        padding: 15px 22px;
    }
</style>
<section class="login-form ">
      <div class="container">
        <div class="row">
          <div class="col-md-10 col-md-offset-1">
            <div class="form-section pattern-bg login-sec">
              <div class="heading text-center mB30">
                <h4>Register your account</h4>
                <h3>Register Here</h3>
              </div>
              @isset($url)
                <form method="POST" action='{{ url("register/$url") }}'>
                @else
                <form method="POST" action="{{ route('register') }}">
                @endisset
                    @csrf
                <div class="form-group col-md-6">
                  <label class="control-label" for="user">First Name : <span class="text-light">*</span></label>
                  <input type="text" class="form-control @error('first_name') is-invalid @enderror" id="first_name" name="first_name" value="{{ old('first_name') }}" autocomplete="first_name" autofocus>
                  @error('first_name')
                        <span class="invalid-feedback" role="alert" style="color:red;">
                            <strong style="color:white;">{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                  <label class="control-label" for="user">Last Name : <span class="text-light">*</span></label>
                  <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="last_name" name="last_name" value="{{ old('last_name') }}" autocomplete="last_name" autofocus>
                  @error('last_name')
                        <span class="invalid-feedback" role="alert" style="color:red;">
                            <strong style="color:white;">{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                  <label class="control-label" for="email">E-mail Address : <span class="text-light">*</span></label>
                  <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" autocomplete="email">
                  @error('email')
                        <span class="invalid-feedback" role="alert" style="color:red;">
                            <strong style="color:white;">{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                  <label class="control-label" for="phone">Contact : <span class="text-light">*</span></label>
                  <input type="text" class="form-control @error('contact') is-invalid @enderror" id="contact" name="contact" value="{{ old('contact') }}" autocomplete="contact">
                  @error('contact')
                        <span class="invalid-feedback" role="alert" style="color:red;">
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
                <div class="clearfix"></div>
                <div class="sign-up-btn-wrap mt-5">
                  <p class="text-center"><b>By Signin up I agree with terms &amp; Conditions.</b></p><br>
                  <p class="text-center p-4">Already have account? &nbsp; &nbsp; &nbsp; <a class="btn default-btn" href="{{ route('login') }}">Sign In</a></p>
                  
                  <div class="btn-sec">
                        <button type="submit" class="btn default-btn">
                            {{ __('Register') }}
                        </button>
                  </div>
                  
                  
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
<!-- asdf -->
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    @isset($url)
                    <form method="POST" action='{{ url("register/$url") }}'>
                    @else
                    <form method="POST" action="{{ route('register') }}">
                    @endisset
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Contact') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="contact" class="form-control @error('contact') is-invalid @enderror" name="contact" value="{{ old('contact') }}" required autocomplete="contact">

                                @error('contact')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->
@endsection
