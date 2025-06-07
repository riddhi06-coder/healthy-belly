@extends('layouts.header')
@section('content')
<section class="inner-banner-contact">
    <div class="black-layer">
    <div class="container">
        <div class="inner-banner-title">
        <h2>Contact Us</h2>
        </div>
        <div class="breadcrumb-wrap">
        <ul>
            <li><a href="{{route('index')}}">Home</a></li>
            <li class="active"><a href="#">Contact Us</a></li>
        </ul>
        </div>
    </div>
    </div>
</section>
<section class="contact-us">
    <!--Contact heading-->
    <div class="container">
    <div class="row">
        <div class="col-sm-6 col-xs-12 col-md-6">
        @if (count($errors) > 0)
            <div class = "alert alert-danger">
                <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                </ul>
            </div>
        @endif
        <div class="total-cart pattern-bg form-bg">
            <div class="contact-form contact-us-page">
            <form method="post" id="form-data" action="{{route('user_enquiry')}}" enctype="multipart/form-data">
            @csrf
                <div class="heading text-center">
                <h4>Contact</h4>
                <h3>Get In Touch</h3>
                </div>
                <div class="form-group">
                <label>Your Name <span class="text-light">*</span></label>
                <input type="text" class="form-control " name="name" id="name" value="{{old('name')}}">
                </div>
                <div class="form-group">
                <label for="email">Email <span class="text-light">*</span></label>
                <input type="email" class="form-control " name="email" id="email" value="{{old('email')}}">
                </div>
                <div class="form-group">
                <label>Phone Number <span class="text-light">*</span></label>
                <input type="text" class="form-control" maxlength="10" name="contact" id="contact" value="{{old('contact')}}">
                </div>
                <div class="form-group">
                <label>Messgae <span class="text-light">*</span></label>
                <textarea class="form-control" name="message" id="message">{{old('message')}}</textarea>
                </div>
                <div class="sign-up-btn-wrap">
                <button class="default-btn" name="submit" class="g-recaptcha" 
                data-sitekey="reCAPTCHA_site_key" 
                data-callback='onSubmit' 
                data-action='submit'>Submit</button>
                </div>
            </form>
            </div>
        </div>
        </div>
        <div class="col-sm-6 col-md-6 col-xs-12">
        <div class="address-wrapper">
            <div class="contact-form">
            
            <div class="row text-center mB20">
                <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="location">
                    <div class="icon-wrapper">
                    <img src="{{asset('public/frontend/images/svg/pin.svg')}}" class="img-responsive" alt="location" title="location">
                    </div>
                    <h4> Our Address </h4>
                    <p class="wrapper-info"> {{$shop_detail->address1}} {{$shop_detail->address2}} {{$shop_detail->address3}}</p>
                </div>
                <hr>
                </div>

                <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="location">
                    <div class="icon-wrapper">
                    <img src="{{asset('public/frontend/images/svg/telephone.svg')}}" class="img-responsive" alt="call us" title="call us">
                    </div>
                    <h4> Phone Number </h4>
                    <p class="wrapper-info"><a href="tel:{{$shop_detail->contact1}}">{{$shop_detail->contact1}}  </a></p>
                </div>
                    <hr>
                </div>
            
                <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="location">
                    <div class="icon-wrapper">
                    <img src="{{asset('public/frontend/images/svg/mail-1.svg')}}" class="img-responsive" alt="mail" title="mail">
                    </div>
                    <h4>Send Mail </h4>
                    <p class="wrapper-info"><a href="mailto:{{$shop_detail->email1}}">{{$shop_detail->email1}}  </a></p>
                </div>
                <hr>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="location follow-on">
                        <h4>Follow Us On :  </h4> 
                        <div class="widget-social-contact justify-content-start">
                            <ul class="d-flex m-0 p-0">
                            @foreach($social_media as $socials)
                              <li class="hvr-grow"><a href="{{$socials->url}}"><i class="{{$socials->logo}}"></i></a> </li>
                            @endforeach
                            </ul>
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