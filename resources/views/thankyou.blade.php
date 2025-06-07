@extends('layouts.header')
@section('content')
<section class="error-page thankyou">
        <div class="">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
          
              <div class="error-msg black-layer">
                <h1 class="heading-thanks">Thank You !!</h1>
                <!-- <h5>Please check your email for further instructions on how to complete your account setup.</h5> -->
                <a class="default-btn" href="{{route('index')}}">Go to home page</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection