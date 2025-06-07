@extends('layouts.header')
@section('content')
    <style>
        .default-btn1 {
            border-radius: 4px;
            -webkit-border-radius: 4px;
            -moz-border-radius: 18px;
            -ms-border-radius: 18px;
            -o-border-radius: 18px;
        }
    </style>
   
  <section class="hero-banner-wrap">
    <div id="myCarousel" class="carousel slide carousel-fade" data-ride="carousel">
      <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
       <li data-target="#myCarousel" data-slide-to="1"></li>
      </ol>
      <div class="carousel-inner ">
      @foreach($slider as $key=>$sliders)
      <?php if($key==0){ ?>
        <div class="item active">
      <?php }else{ ?>
        <div class="item">
      <?php } ?>
          <img src="{{asset('frontend/images/banner')}}/{{$sliders->image}}" alt="The Mithaibox" class="hidden-xs">
          <img src="{{asset('frontend/images/xsbanner')}}/{{$sliders->xs_image}}" alt="The Mithaibox" class="hidden-lg hidden-md hidden-sm">
          <div class="carousel-caption">
            <p style="font-family:Gilroy;">{{$sliders->title}}</p>
            <!--<img src="{{asset('frontend/banner_logo.png')}}" class="img-responsive"/>-->
          </div>
        </div>
      @endforeach
      </div>
      <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <img src="https://mbihosting.in/healthy-belly/public/frontend/images/Arrow-white.png"/>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <img src="https://mbihosting.in/healthy-belly/public/frontend/images/Arrow-white.png"/>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </section>
  <section class="category-wrap pattern-bg">
    <div class="container">
      <!--<div class="row">-->
        <div class="upper-cat-box">
          <div class="owl-carousel owl-theme" id="category">
          @foreach($sub_cat as $sub_cats)
            <a >
              <div class="item">
                <div class="single-category hvr-icon-push">
                  <img src="{{asset('frontend/images/subCategory')}}/{{$sub_cats->image}}" class="img-responsive hvr-icon">
                  <h4>{{$sub_cats->name}}</h4>
                </div>
              </div>
            </a>
            @endforeach
          </div>
        </div>
      <!--</div>-->
    </div>
  </section>
  <section class="new-banner-wrap pattern-bg">
    <div class="container">
      <div class="row">
        @foreach($advertise as $ads)
        <div class="col-sm-4 col-lg-4"> 
          <div class="banner-item" data-aos="fade-right" data-aos-duration="1200"> 
            <a href="{{$ads->link}}"> 
              <img src="{{asset('frontend/images/advertisement')}}/{{$ads->image}}" alt="banner"> 
            </a>
            <div class="banner-text">
              <!--<h4 style="font-family:Denton; color:white;">{!!$ads->title!!}</h4>-->
              <!--<a class="default-btn" href="{{$ads->link}}">Shop Now</a> -->
            </div>
          </div> 
        </div>
        @endforeach
      </div>
    </div>
  </section>
  <section class="top-product-home-wrap pattern-bg">
    <div class="container">
        
                  <div class="heading text-center">
        <h4>Our Specials</h4>
        <h3 style="color:#462328;">Best Seller</h3>
      </div>

          <div class="owl-carousel owl-theme" id="seller">
        @foreach($best_seller as $key=>$best_sellers)
        
        <?php
            // Example slug
            $slug = $best_sellers->slug; // "Fruit-N-Nut-Orange-78697"
            
            // Split the slug into parts using the hyphen as a delimiter
            $parts = explode('-', $slug);
            
            // Reverse the array to start checking from the end
            $parts = array_reverse($parts);
            
            // Find the first non-numeric word from the end
            $desired_word = '';
            foreach ($parts as $part) {
            if (!is_numeric($part)) {
            $desired_word = $part;
            break;
            }
            }
            
            $product_name = $best_sellers->product_name; // "Desi Laddu Calcium"
            
            // The word you want to search for
            // Find the position of the search word in the product name
            $position = strpos($product_name, $desired_word);
            
            if ($position !== false) {
            // Cut the product name from the start up to the position of the search word
            $desired_word1 = substr($product_name, 0, $position - 1);
            } else {
            // If the word is not found, keep the original name
            $desired_word1 = $product_name;
            }
            
            ?>
            
            
        <?php
        $prod_variant=DB::table('product_variants')->where('status',1)->where('product_id',$best_sellers->id)->orderBy('weight','desc')->orderBy('packed_size','desc')->orderBy('size_category','asc')->get(); 
        $prod_cost=DB::table('product_variants')->where('status',1)->where('product_id',$best_sellers->id)->max('cost');
        $variant_prod_id=DB::table('product_variants')->where('status',1)->where('product_id',$best_sellers->id)->where('cost',$prod_cost)->first();
        ?>
        <div class="item">
          <div class="single-product thumb_swap">
            <div class="product-img">
              <a href="{{route('product_detail')}}/{{$best_sellers->slug}}">
                <img src="{{asset('frontend/images/product')}}/{{$best_sellers->image}}" alt="Product Image" class="w-100">
              </a>
              <a href="{{route('product_detail')}}/{{$best_sellers->slug}}">
                <img src="{{asset('frontend/images/product')}}/{{$best_sellers->image}}" alt="Product Image" class="w-100 img_swap">
              </a>
            </div>
            <div class="product-content">
              <div class="actions-btn">
                <?php if(isset($variant_prod_id)){ ?>
                <a class="add_to_wishlist" data-id="{{$best_sellers->id}}" data-variant="{{$variant_prod_id->id}}"><img src="{{asset('frontend/images/svg/heart-black.svg')}}"></a> 
                <?php } ?>
                <!-- <a href="#"><img src="{{asset('frontend/images/svg/cart-black.svg')}}"></a> 
                <a href="#"><img src="{{asset('frontend/images/svg/view-black.svg')}}"></a>  -->
              </div>
              <h6 class="product-subtitle"><a href="{{route('product_detail')}}/{{$best_sellers->slug}}">{{$desired_word1}}</a></h6>
                <h4  ><a style="color:#d4a548;" href="{{route('product_detail')}}/{{$best_sellers->slug}}">{{$desired_word}}</a></h4>
              <div class="price-sec">
              <span class="price left-cell"><strong style="font-family:Gilroy;"> ₹ <span class="productPrice-{{$key}}" >{{$prod_cost}}</span></strong></span>
              <span class="price right-cell form-group">
                <select name="price_weight" class="price_weight form-control" data-id="-{{$key}}" style="font-family:Gilroy;">
                @foreach($prod_variant as $prod_variants)
                  <option value="{{$prod_variants->id}}"><?php if($prod_variants->weight!=''){ ?>{{$prod_variants->weight}} {{$prod_variants->weight_unit}} <?php }elseif($prod_variants->size_category!=''){ ?>{{$prod_variants->size_category}} <?php }else{ ?>{{$prod_variants->packed_size}} <?php } ?></option>
                @endforeach
                </select>
              </span>
              </div>
              <hr>
                           <?php if($best_sellers->available==1){ ?>
              <div class="product-title">
                <a href="{{route('product_detail')}}/{{$best_sellers->slug}}">
                    <button class="default-btn1 img-btn-i">
                        <img src="https://mbihosting.in/healthy-belly/public/frontend/images/icons/Eye.png">
                    </button>
                </a>
                <?php if(isset($variant_prod_id)){ ?> 
                <button class="default-btn1 product_price-{{$key}} add_product" data-id="{{$best_sellers->id}}" data-variant="{{$variant_prod_id->id}}"><i class="fa fa-shopping-cart" aria-hidden="true"></i>
 Add to cart</button>
                <?php } ?>
              </div>
     
              <?php }else{ ?>
                <span class="btn-default">Out Of Stock</span>
              <?php } ?>
            </div>
          </div>
        </div>
        @endforeach
      </div>

      
    </div>
  </section>
  <section class="about-wrap pattern-bg">
    <div class="container">
      <div class="flex-row" data-aos="fade-up" data-aos-duration="1000">
        <div class="col-md-6 col-sm-6 pr0 about-img"> 
          <!--<div class="about-img"></div>-->
        </div>
        <div class="col-md-6 col-sm-6 pL0"> 
          <div class="about-content Love-Dedication">
            <div class="heading heading-left">
              <h4>With Love & Dedication</h4>
              <h3>{{$aboutus->title}}</h3>
            </div>
            <div style="font-family: 'Gilroy';" class="text-justify">
                {!! $aboutus->about_us !!}
            </div>
            <a class="default-btn mT20" href="{{route('about_us')}}">Read More</a> 
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="find-section">
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-sm-6 col-xs-12">
          <h2>Nothing Like Tasty After</h2><h2> You Get Our Mithais</h2>
          <a class="default-btn" style="background-color:#c5a34f;" href="{{route('all_product_list')}}"><span>Explore Now</span></a>
        </div>
        <div class="col-md-4 col-sm-5 col-xs-12">
          <div class="dish-img">
            <img class="img-responsive find-option-img" src="{{asset('frontend/images/Healthy_Belly_Round_Circle_Image_Option.png')}}" alt="" id="home-pic-3">
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="all-product-home-wrap pattern-bg">
    <div class="container">
      <div class="heading text-center">
        <h4>Making People Happy</h4>
        <h3>All Products</h3>
      </div>
      <div class="owl-carousel owl-theme" id="all-products">
        @foreach($all_product as $key=>$all_products)
        <?php
        $all_prod_variant=DB::table('product_variants')->where('status',1)->where('product_id',$all_products->id)->orderBy('weight','desc')->orderBy('packed_size','desc')->orderBy('size_category','asc')->get(); 
        $all_prod_cost=DB::table('product_variants')->where('status',1)->where('product_id',$all_products->id)->max('cost');
        $variant_prod_id=DB::table('product_variants')->where('status',1)->where('product_id',$all_products->id)->where('cost',$all_prod_cost)->first();
        ?>
        <div class="item">
          <div class="single-product thumb_swap">
            <?php if($all_products->best_seller==1){ ?>
            <div class="product-tag2">Best Seller</div>
            <?php }elseif($all_products->new_arrival==1){ ?>
              <div class="product-tag1">New</div>
            <?php } ?>
            <div class="product-img">
              <a href="{{route('product_detail')}}/{{$all_products->slug}}">
                <img src="{{asset('frontend/images/product')}}/{{$all_products->image}}" alt="Product Image" class="w-100">
              </a>
              <a href="{{route('product_detail')}}/{{$all_products->slug}}">
                <img src="{{asset('frontend/images/product')}}/{{$all_products->image}}" alt="Product Image" class="w-100 img_swap">
              </a>
            </div>
            <div class="product-content">
              <div class="actions-btn">
              <?php if(isset($variant_prod_id)){ ?>
                <a class="add_to_wishlist" data-id="{{$all_products->id}}" data-variant="{{$variant_prod_id->id}}"><img src="{{asset('frontend/images/svg/heart-black.svg')}}"></a> 
              <?php } ?>
                <!-- <a href="#"><img src="{{asset('frontend/images/svg/cart-black.svg')}}"></a> 
                <a href="#"><img src="{{asset('frontend/images/svg/view-black.svg')}}"></a>  -->
              </div>
              
                <?php
            // Example slug
            $slug = $all_products->slug; // "Fruit-N-Nut-Orange-78697"
            
            // Split the slug into parts using the hyphen as a delimiter
            $parts = explode('-', $slug);
            
            // Reverse the array to start checking from the end
            $parts = array_reverse($parts);
            
            // Find the first non-numeric word from the end
            $desired_word = '';
            foreach ($parts as $part) {
            if (!is_numeric($part)) {
            $desired_word = $part;
            break;
            }
            }
            
            $product_name = $all_products->product_name; // "Desi Laddu Calcium"
            
            // The word you want to search for
            // Find the position of the search word in the product name
            $position = strpos($product_name, $desired_word);
            
            if ($position !== false) {
            // Cut the product name from the start up to the position of the search word
            $desired_word1 = substr($product_name, 0, $position - 1);
            } else {
            // If the word is not found, keep the original name
            $desired_word1 = $product_name;
            }
            
            ?>
            
              <h6 class="product-subtitle"><a href="{{route('product_detail')}}/{{$all_products->slug}}">{{$desired_word1}}</a></h6>
              <h4><a style="color:#d4a548;" href="{{route('product_detail')}}/{{$all_products->slug}}">{{$desired_word}}</a></h4>
              <div class="price-sec">
                                <span class="price left-cell"><strong  >₹ <span class="allproductPrice-{{$key}}">{{$all_prod_cost}}</span></strong></span>
              <span class="price right-cell  form-group">
                <select name="allprice_weight" class="allprice_weight form-control" data-id="-{{$key}}">
                @foreach($all_prod_variant as $all_prod_variants)
                  <option value="{{$all_prod_variants->id}}"><?php if($all_prod_variants->weight!=''){ ?>{{$all_prod_variants->weight}} {{$all_prod_variants->weight_unit}} <?php }elseif($all_prod_variants->size_category!=''){ ?>{{$all_prod_variants->size_category}} <?php }else{ ?>{{$all_prod_variants->packed_size}} <?php } ?></option>
                @endforeach
                </select>
              </span>
              </div>

              <hr>
              <?php if($all_products->available==1){ ?>
              <div class="product-title">
                <a href="{{route('product_detail')}}/{{$all_products->slug}}"><button class="default-btn1 img-btn-i"><img src="https://mbihosting.in/healthy-belly/public/frontend/images/icons/Eye.png">
</button></a>
                <?php if(isset($variant_prod_id)){ ?>
                <button class="default-btn1 product_price-{{$key}} add_product" data-id="{{$all_products->id}}" data-variant="{{$variant_prod_id->id}}"><i class="fa fa-shopping-cart" aria-hidden="true"></i>
 Add to cart</button>
                <?php } ?>
              </div>
              <?php }else{ ?>
                <span class="btn-default ">Out of Stock</span>
              <?php } ?>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>
  <section class="new-product-arrival-wrap">
    <div class="container">
      <div class="heading text-center white-heading">
        <h4>From Our Best</h4>
        <h3>New Arrivals</h3>
      </div>
      <?php
      $adv=DB::table('advertisements')->where('status',1)->where('section','NewArrival')->first(); 
      ?>
      <div class="row">
        <div class="col-md-5">
          <div class="arivals_chocolate" data-aos="fade-left" data-aos-duration="1000">
            <div class="arivals_pic">
              <img class="img-fluid" src="{{asset('frontend/images/advertisement')}}/{{$adv->image}}" alt="New Arrival">
              <!--<div class="price_text">-->
              <!--  <h5>£ {{$adv->price}}</h5>-->
              <!--</div>-->
            </div>
            <div class="arivals_text">
              <h4 >{!!$adv->title!!}</h4>
              <a href="{{$adv->link}}">Bramhi Walnut</a>
            </div>
          </div>
        </div>
        <div class="col-md-7">
          <div class="owl-carousel owl-theme" id="newarrive">
            @foreach($new_arrival as $key=>$new_arrivals)
            
             <?php
            // Example slug
            $slug = $new_arrivals->slug; // "Fruit-N-Nut-Orange-78697"
            
            // Split the slug into parts using the hyphen as a delimiter
            $parts = explode('-', $slug);
            
            // Reverse the array to start checking from the end
            $parts = array_reverse($parts);
            
            // Find the first non-numeric word from the end
            $desired_word = '';
            foreach ($parts as $part) {
            if (!is_numeric($part)) {
            $desired_word = $part;
            break;
            }
            }
            
            $product_name = $new_arrivals->product_name; // "Desi Laddu Calcium"
            
            // The word you want to search for
            // Find the position of the search word in the product name
            $position = strpos($product_name, $desired_word);
            
            if ($position !== false) {
            // Cut the product name from the start up to the position of the search word
            $desired_word1 = substr($product_name, 0, $position - 1);
            } else {
            // If the word is not found, keep the original name
            $desired_word1 = $product_name;
            }
            
            ?>
            
            <?php
            $new_prod_variant=DB::table('product_variants')->where('status',1)->where('product_id',$new_arrivals->id)->orderBy('weight','desc')->orderBy('packed_size','desc')->orderBy('size_category','asc')->get(); 
            $new_prod_cost=DB::table('product_variants')->where('status',1)->where('product_id',$new_arrivals->id)->max('cost');
            $variant_prod_id=DB::table('product_variants')->where('status',1)->where('product_id',$new_arrivals->id)->where('cost',$new_prod_cost)->first();
            ?>
            <div class="item">
              <div class="single-product thumb_swap">
                <div class="product-tag1">New</div>
                <div class="product-img">
                  <a href="{{route('product_detail')}}/{{$new_arrivals->slug}}">
                    <img src="{{asset('frontend/images/product')}}/{{$new_arrivals->image}}" alt="Product Image" class="w-100">
                  </a>
                  <a href="{{route('product_detail')}}/{{$new_arrivals->slug}}">
                    <img src="{{asset('frontend/images/product')}}/{{$new_arrivals->image}}" alt="Product Image" class="w-100 img_swap">
                  </a>
                </div>
                <div class="product-content">
                  <div class="actions-btn">
                  <?php if(isset($variant_prod_id)){ ?>
                    <a class="add_to_wishlist" data-id="{{$new_arrivals->id}}" data-variant="{{$variant_prod_id->id}}"><img src="{{asset('frontend/images/svg/heart-black.svg')}}"></a> 
                  <?php } ?>
                    <!-- <a href="#"><img src="{{asset('frontend/images/svg/cart-black.svg')}}"></a> 
                    <a href="#"><img src="{{asset('frontend/images/svg/view-black.svg')}}"></a>  -->
                  </div>
                  <h6 class="product-subtitle"><a href="{{route('product_detail')}}/{{$new_arrivals->slug}}">{{$desired_word1}}</a></h6>
                  <h4><a style="color:#d4a548;"  href="{{route('product_detail')}}/{{$new_arrivals->slug}}">{{$desired_word}}</a></h4>
                <div class="price-sec">
                <span class="price left-cell"><strong style="font-family:Gilroy;"> ₹ <span class="newproductPrice-{{$key}}" >{{$new_prod_cost}}</span></strong></span>
                <span class="price right-cell  form-group">
                <select name="newprice_weight" class="newprice_weight form-control" data-id="-{{$key}}" style="font-family:Gilroy;">
                @foreach($new_prod_variant as $new_prod_variants)
                      <option value="{{$new_prod_variants->id}}"><?php if($new_prod_variants->weight!=''){ ?>{{$new_prod_variants->weight}} {{$new_prod_variants->weight_unit}} <?php }elseif($new_prod_variants->size_category!=''){ ?>{{$new_prod_variants->size_category}} <?php }else{ ?>{{$new_prod_variants->packed_size}} <?php } ?></option>
                @endforeach
                </select>
                </span>
                </div>
                
                  <!--<span class="price"><strong >₹ <span class="newproductPrice-{{$key}}">{{$new_prod_cost}}</span></strong></span>-->
                  <!--<span class="price">-->
                  <!--  <select name="newprice_weight" class="newprice_weight" data-id="-{{$key}}">-->
                  <!--  @foreach($new_prod_variant as $new_prod_variants)-->
                  <!--    <option value="{{$new_prod_variants->id}}"><?php if($new_prod_variants->weight!=''){ ?>{{$new_prod_variants->weight}} {{$new_prod_variants->weight_unit}} <?php }elseif($new_prod_variants->size_category!=''){ ?>{{$new_prod_variants->size_category}} <?php }else{ ?>{{$new_prod_variants->packed_size}} <?php } ?></option>-->
                  <!--  @endforeach-->
                  <!--  </select>-->
                  <!--</span>-->
                  <hr>
                    <?php if($new_arrivals->available==1){ ?>
                    <div class="product-title">
                    <a href="{{route('product_detail')}}/{{$new_arrivals->slug}}"><button class="default-btn1 img-btn-i"><img src="https://mbihosting.in/healthy-belly/public/frontend/images/icons/Eye.png"
                    </button></a>
                    <?php if(isset($variant_prod_id)){ ?>
                    <button class="default-btn1 product_price-{{$key}} add_product" data-id="{{$new_arrivals->id}}" data-variant="{{$variant_prod_id->id}}"><i class="fa fa-shopping-cart" aria-hidden="true"></i>
                    Add to cart</button>
                    <?php } ?>
                    </div>
                  <?php }else{ ?>
                    <span class="btn-default ">Out of Stock</span>
                  <?php } ?>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>      
    </div>
  </section>
  <section class="testimonials-wrap pattern-bg">
    <div class="container">
      <div class="heading text-center">
        <h4>Testimonials</h4>
        <h3 style="color:#462328;">What People Say</h3>
      </div>
      <div class="owl-carousel owl-theme" id="testimonials">
        @foreach($testimonial as $testimonials)
        <div class="item">
          <div class="andro_testimonial">
            <div class="andro_testimonial-body">
              <h5>{{$testimonials->name}}</h5>
              <!--<div class="andro_rating-wrapper">-->
                
                  <!--<p>{{$testimonials->designation}}</p>-->
              <!--</div>-->
              <p class="text-justify">{!!$testimonials->description!!}</p>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>
  <section class="helpline">
    <div class="container">
      <div class="row">
        <ul class="helpline-list">
          <li class="box col-md-2 col-sm-6 col-xs-12" data-aos="fade-up" data-aos-duration="1000">
            <div class="icon">
              <img src="{{asset('frontend/images/icons/food-delivery.png')}}">
            </div>
            <div class="text-part">
              <h3>Fast Delivery</h3>
            </div>
          </li>
          <li class="box col-md-2 col-sm-6 col-xs-12" data-aos="fade-up" data-aos-duration="1300">
            <div class="icon">
              <img src="{{asset('frontend/images/icons/gift-box.png')}}">
            </div>
            <div class="text-part">
              <h3>No Minimum Order</h3>
            </div>
          </li>
          <li class="box col-md-2 col-sm-6 col-xs-12" data-aos="fade-up" data-aos-duration="1500">
            <div class="icon">
              <img src="{{asset('frontend/images/icons/wallet.png')}}">
            </div>
            <div class="text-part">
              <h3>Cash On Delivery</h3>
            </div>
          </li>
          <li class="box col-md-2 col-sm-6 col-xs-12" data-aos="fade-up" data-aos-duration="1800">
            <div class="icon">
              <img src="{{asset('frontend/images/icons/tray.png')}}">
            </div>
            <div class="text-part">
              <h3>Food Quality</h3>
            </div>
          </li>
          <li class="box col-md-2 col-sm-6 col-xs-12" data-aos="fade-up" data-aos-duration="1800">
            <div class="icon">
              <img src="{{asset('frontend/images/icons/tray.png')}}">
            </div>
            <div class="text-part">
              <h3>Food Quality</h3>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </section>
  
@endsection
