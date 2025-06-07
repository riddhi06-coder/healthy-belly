@extends('layouts.header')
@section('content')
<section class="inner-banner-about">
    <div class="black-layer">
    <div class="container">
        <div class="inner-banner-title">
        <h2>About Us</h2>
        </div>
        <div class="breadcrumb-wrap">
        <ul>
            <li><a href="{{route('index')}}">Home</a></li>
            <li class="active"><a href="#">About Us</a></li>
        </ul>
        </div>
    </div>
    </div>
</section>
<section class="approch-section pattern-bg">
    <div class="container">
    <div class="row">
        
        <div class="col-md-12">
            <div class="heading text-center commitment-text">
        <h4></h4>
        <h3>Our Commitment to Purity 
 </h3>
        </div>
        {!!$about->our_approch!!}
    </div>
    </div>
    </div>
</section>

<section class="our-mission pattern-bg">
    <div class="container">
    <div class="row">
        <div class="heading text-center">
        <!--<h4>Our</h4>-->
        <h3 style="color:#462328;">Why Choose Healthy Belly? </h3>
        </div>
        <!--{!!$about->our_mission!!}-->
    </div>
    <div class="row">
        <div class="col-md-4 col-sm-6">
        <div class="single-service-item">
        <div class="service-icon">
        <img src="{{asset('Healthy_Ingredients.png')}}" class="img-responsive hvr-icon">
        </div>
        <h5>Healthy Ingredients</h5>
        <p style="text-align: justify;">We prioritise your health by using natural sweeteners and ingredients, ensuring you enjoy your treats guilt-free. </p>
        </div>
        </div>
        
        <div class="col-md-4 col-sm-6">
        <div class="single-service-item">
        <div class="service-icon">
        <img src="{{asset('Innovative_Twists.png')}}" class="img-responsive hvr-icon">
        </div>
        <h5>Innovative Twists</h5>
        <p style="text-align: justify;">While we stay true to traditional recipes, we also offer innovative variations to surprise your palate.</p>
        </div>
        </div>
        
        <div class="col-md-4 col-sm-6">
        <div class="single-service-item">
        <div class="service-icon">
        <img src="{{asset('handcrafted_with_love.png')}}" class="img-responsive hvr-icon">
        </div>
        <h5>Handcrafted with Love</h5>
        <p style="text-align: justify;">Each sweet is handcrafted by skilled artisans, ensuring the highest level of craftsmanship and quality. </p>
        </div>
        </div>
        
        <div class="col-md-4 col-sm-6">
        <div class="single-service-item">
        <div class="service-icon">
        <img src="{{asset('Diverse_Range.png')}}" class="img-responsive hvr-icon">
        </div>
        <h5>Diverse Range</h5>
        <p style="text-align: justify;">From classic favorites to unique creations, our wide variety of sweets caters to every taste and occasion. </p>
        </div>
        </div>
        
        <div class="col-md-4 col-sm-6">
        <div class="single-service-item">
        <div class="service-icon">
        <img src="{{asset('Hygiene_and_Safety.png')}}" class="img-responsive hvr-icon">
        </div>
        <h5>Hygiene and Safety</h5>
        <p style="text-align: justify;">Our production process follows stringent hygiene standards to ensure the safety and freshness of every sweet. </p>
        </div>
        </div>
        
        <div class="col-md-4 col-sm-6">
        <div class="single-service-item">
        <div class="service-icon">
        <img src="{{asset('Nutritional_Transparency.png')}}" class="img-responsive hvr-icon">
        </div>
        <h5>Nutritional Transparency</h5>
        <p style="text-align: justify;">We provide clear and detailed nutritional information for every product, so you can make informed choices about what you're eating.</p>
        </div>
        </div>
    </div>

</section>

@endsection