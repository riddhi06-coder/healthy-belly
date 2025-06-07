@extends('layouts.header')
@section('content')
<section class="inner-banner-our-story">
    <div class="black-layer">
    <div class="container">
        <div class="inner-banner-title">
        <h2>Our Story</h2>
        </div>
        <div class="breadcrumb-wrap">
        <ul>
            <li><a href="{{route('index')}}">Home</a></li>
            <li class="active"><a href="#">Our Story</a></li>
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
        <h3>Crafting Delightful and Nutritious Indian Sweets</h3>
        </div>
        <p style="text-align: justify;">Healthy Belly began its journey in 1989 with Harsnishji, a dedicated milkman who supplied fresh milk to households from 1982 to 1989. Driven by a passion for creating delightful sweets, Harsnishji transitioned from milk delivery to manufacturing traditional Indian sweets like milk peda and barfis, starting a new chapter in his culinary adventure. </p>
      
    </div>
    </div>
    </div>
</section>

<section class="our-mission pattern-bg">
    <div class="container">

        <div class="main-box-one">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="info-content right-content">
                        <h3>(1989-1997)</h3>
                        <h3>Humble Beginnings</h3>
                        <p style="text-align: justify;">In the initial years, he operated from a small rental shop with just a couple of helping hands. Over time, his reputation for crafting delicious sweets grew, leading to the inclusion of more team members. By 1997, Healthy Belly expanded its operations and gradually embraced automation to ensure consistency and quality, while maintaining a balance with human expertise. </p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="image-format">
                        <img class="img-responsive" src="{{asset('frontend/images/image.png')}}"/>
                    </div>
                </div>
            </div>
        </div>
        <div class="main-box-one">
            <div class="row align-items-center">

                <div class="col-md-6">
                    <div class="image-format">
                        <img class="img-responsive" src="{{asset('frontend/images/image.png')}}"/>
                    </div>
                </div>
                        <div class="col-md-6">
                    <div class="info-content left-content">
                        <h3>(2004-2005)</h3>
                        <h3>Innovations and Growth</h3>
                        <p style="text-align: justify;">Embracing innovation, Healthy Belly introduced its first table-top machine in 2004, enhancing the shelf life of sweets through vacuum and nitrogen flushing techniques. In response to growing demand, an in-house machine for kaju katli sheeting was developed in 2005, followed by various mechanical advancements to perfect the craft. </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="main-box-one">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="info-content right-content">
                        <h3>(2006-2009)</h3>
                        <h3>Notable Achievements</h3>
                        <p style="text-align: justify;">We were also the first to create enormous Kalash modaks, including one weighing 82 kg for Prime Minister Vajpayee's 82nd birthday. In 2006, Healthy Belly made giant modaks, weighing up to 25 kg each. The subsequent years saw continuous innovation, including the acquisition of a chamber vacuum and flushing machine from Germany, and the creation of fully motorised stainless-steel machines by 2009. </p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="image-format">
                        <img class="img-responsive" src="{{asset('frontend/images/image.png')}}"/>
                    </div>
                </div>
            </div>
        </div>
        <div class="main-box-one">
            <div class="row align-items-center">

                <div class="col-md-6">
                    <div class="image-format">
                        <img class="img-responsive" src="{{asset('frontend/images/image.png')}}"/>
                    </div>
                </div>
                        <div class="col-md-6">
                    <div class="info-content left-content">
                        <h3>(2009-Present)  </h3>
                        <h3>Modernisation and Excellence </h3>
                        <p style="text-align: justify;">Healthy Belly's dedication to quality and hygiene led to the introduction of induction stoves in 2011 for better quality control. By 2013, we became the first mithaiwala in India to adopt MAP thermoforming packaging, imported from Germany, ensuring greater shelf life and hygiene standards. </p>
                        <p style="text-align: justify;">Our journey didn't stop there. We pioneered ultrasonic customised cutting machines and expanded our reach beyond Mumbai, bringing our delectable sweets to a wider audience. </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

@endsection