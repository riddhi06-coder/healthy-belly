@extends('layouts.header')
@section('content')
    <style>
        .inner-banner-wraps{
            background-image:url(../public/frontend/images/product/{{$product_detail->image}});
        }
    </style>
    
    <style>
        .default-btn1 {
            border-radius: 4px;
            -webkit-border-radius: 4px;
            -moz-border-radius: 18px;
            -ms-border-radius: 18px;
            -o-border-radius: 18px;
            color: #fff;
            background: #462328;
            position: relative;
            z-index: 1;
            font-family: 'Denton';
            margin-bottom: 9px;
        }
    </style>
    
    <?php
                    // Example slug
                    $slug = $product_detail->slug; // "Fruit-N-Nut-Orange-78697"
                    
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
                    
                    $product_name = $product_detail->product_name; // "Desi Laddu Calcium"
                    
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
            
<section class="inner-banner-wraps">
    <div class="black-layer">
    <div class="container">
        <div class="inner-banner-title">
        <h2>{{$desired_word1}}</h2>
        </div>
        <div class="breadcrumb-wrap">
        <ul>
            <li><a href="{{route('index')}}">Home</a></li>
            <li><a href="{{route('product_list')}}">Products</a></li>
            <li class="active"><a href="#">{{$desired_word1}}</a></li>
        </ul>
        </div>
    </div>
    </div>
</section>
<?php
    $new_prod_variant=DB::table('product_variants')->where('status',1)->where('product_id',$product_detail->id)->orderBy('weight','desc')->orderBy('packed_size','desc')->orderBy('size_category','asc')->get(); 
    $new_prod_cost=DB::table('product_variants')->where('status',1)->where('product_id',$product_detail->id)->max('cost');
    $variant_prod_id=DB::table('product_variants')->where('status',1)->where('product_id',$product_detail->id)->where('cost',$new_prod_cost)->first();
?>
@if(Session()->has('success'))
    <div class="alert alert-success">
        {{session()->get('success')}}
    </div>
@endif
<section class="product-wrapper ">
    <div class="container">
    <div class="row">
        <div class="col-md-5 col-sm-12 col-xs-12">
        <div class="insize">
        <div class="product-thumbnail-slider">
        <ul id="products-gallery" class="thumbnail_slider_img  list-unstyled cS-hidden">
            <li data-thumb="{{asset('frontend/images/product')}}/{{$product_detail->image}}"> 
                <a data-fancybox="gallery" href="{{asset('frontend/images/product')}}/{{$product_detail->image}}">
                <img class="img-responsive" src="{{asset('frontend/images/product')}}/{{$product_detail->image}}" />
                </a>
            </li>
            <?php if($product_image->count()>0){ ?>
            @foreach($product_image as $product_images)
            <li data-thumb="{{asset('frontend/images/productImage')}}/{{$product_images->image}}"> 
                <a data-fancybox="gallery" href="{{asset('frontend/images/productImage')}}/{{$product_images->image}}">
                <img class="img-responsive" src="{{asset('frontend/images/productImage')}}/{{$product_images->image}}" />
                </a>
            </li>
            @endforeach
            <?php } ?>
        </div>
        </div>
        </div>
        <div class="col-md-7 col-sm-12 col-xs-12">
        <div class="product-detail-wrap">
                        
        <div class="row">
            <div class="col-md-8 col-sm-6 col-xs-12">
            <div class="product-desc">
                <h1>{{ $desired_word1 }}</h1>
                <h3 style="color:#d4a548;">{{ $desired_word }}</h3>
                <div class="row">
                <div class="col-md-4">
                    <div class="price-product">
                    <h4>₹ <span id="productDetailPrice">{{ $new_prod_cost }}</span></h4>
                    </div>
                </div>
                </div>
            </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="add-to-wishlist">
                <div class="wishlist-icon">
                <?php if(isset($variant_prod_id)){ ?>
                    <a class="add_to_wishlist" data-id="{{$product_detail->id}}" data-variant="{{$variant_prod_id->id}}"><img src="{{asset('frontend/images/svg/heart-white.svg')}}" class="img-responsive" title="Add To wishlist"></a>
                <?php } ?>
                </div>
            </div>
            </div>
        </div>
        <div class="row  mT20">
            <div class="col-md-12 col-sm-12 col-xs-12">
            <?php if($product_detail->available==1){ ?>
            <p class="in-stock">Availability : <span>In Stock <i class="fa fa-check-circle"></i></span></p>
            <?php }else{ ?>
                <p class="in-stock">Availability : <span><i>Out of stock </i></span></p>
            <?php } ?>
            <div class="weight-block form-group">
                <p> Size : <span> 
                <select name="product_weight" id="product_weight" class="form-control">
                    @foreach($new_prod_variant as $new_prod_variants)
                      <option value="{{$new_prod_variants->id}}"><?php if($new_prod_variants->weight!=''){ ?>{{$new_prod_variants->weight}} {{$new_prod_variants->weight_unit}} <?php }elseif($new_prod_variants->size_category!=''){ ?>{{$new_prod_variants->size_category}} <?php }else{ ?>{{$new_prod_variants->packed_size}} <?php } ?></option>
                    @endforeach
                </select>
                </span></p>
            </div>
            <div class="short-desc">
                <h2>Short Description</h2>
                <p>{!!$product_detail->description!!}</p>
            </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-5 col-sm-6 col-xs-12">
            <div class="qtyy mt-5">
                <p> Quantity : </p>
                <span class="minuss bg-dark">-</span>
                <input type="number" class="counts" name="qtyy" value="1" disabled="">
                <span class="pluss bg-dark">+</span>
            </div>
            </div>
            <?php if($product_detail->available==1){ ?>
            <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="add-to-cart-btn">
            <?php if(isset($variant_prod_id)){ ?>
                <a class="btn default-btn product_price add_product_detail_page" data-id="{{$product_detail->id}}" data-variant="{{$variant_prod_id->id}}"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Add to cart</a>
            <?php } ?>
            </div>
            </div>
            <?php } ?>
        </div>
        <!--<div class="col-md-12">-->
        <!--    <div class="row">-->
        <!--    <div class="social-icons mT20">-->
        <!--        <ul class="social-network social-circle">-->
        <!--        <p> Share : </p>-->
        <!--        <li><a href="#" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>-->
        <!--        <li><a href="#" class="icoLinkedin" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>-->
        <!--        <li><a href="#" class="icotwitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>-->
        <!--        <li><a href="#" class="icoinstagram" title="Instagram"><i class="fa fa-instagram"></i></a></li>-->
        <!--        </ul>-->
        <!--    </div>-->
        <!--    </div>-->
        <!--</div>-->
        </div>
        </div>
    </div>
    </div>
</section>
<section class="product-info">
    <div class="container">
    <div class="tab-section-div pattern-bg">
        <ul class="nav justify-content-center nav-tabs">
        <li class="active"><a data-toggle="tab" href="#home">Description</a></li>
        
        <li><a data-toggle="tab" href="#menu1">Reviews</a></li>
        
        <?php if(Auth::guard('web')->check()){ ?>
        <li><a data-toggle="tab" href="#menu2">Write Review</a></li>
        <?php } ?>
        </ul>
        <div class="tab-content">
        <div id="home" class="tab-pane fade in active">
            <div class="row">
            <div class="col-md-12">
                <p style="text-align: justify;">{!!$product_detail->description!!}</p>
                
            </div>
            </div>
        </div>
        <div id="menu1" class="tab-pane fade">
            <div class="card">
            <div class="card-body">
                @foreach($user_review as $user_reviews)
                <?php
                $u_detail=DB::table('users')->where('id',$user_reviews->user_id)->first(); 
                ?>
                <div class="row">
                    <div class="col-md-12">
                        <p> <strong>{{$u_detail->first_name}} {{$u_detail->last_name}}</strong></p>
                        <div class="clearfix"></div>
                        <p style="text-align: justify">{{$user_reviews->review}} </p>
                    </div>
                </div>
                <hr>
                @endforeach
            </div>
            </div>
        </div>
        
        <?php if(Auth::guard('web')->check()){ ?>
        <div id="menu2" class="tab-pane fade">
            <div class="card">
            <div class="card-body">
                <?php
                    $user_id=Auth::guard('web')->user()->id; 
                    $u_detail=DB::table('users')->where('id',$user_id)->first(); 
                ?>
                <form method="post" action="{{route('save_review')}}" enctype="multipart/form-data">
                @csrf
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <td><label for="inputName" class="control-label">Write Review :</label>
                            <input type="hidden" name="user_id" value="{{$user_id}}">
                            <input type="hidden" name="email" value="{{$u_detail->email}}">
                            <input type="hidden" name="name" value="{{$u_detail->first_name}} {{$u_detail->last_name}}">
                            <input type="hidden" name="product_id" value="{{$product_detail->id}}">
                            <input type="hidden" name="slug" value="{{$product_detail->slug}}">
                            <textarea type="text" class="form-control" id="review" name="review" value="{{old('review')}}" rows="5" placeholder="Add Review" ></textarea>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="row">
                        <button type="submit" name="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                    </div>
                <form>   
            </div>
            </div>
        </div>
        <?php } ?>
        </div>
    </div>
    </div>
</section>
<section class="all-product-home-wrap pattern-bg custom">
    <div class="container">
    <div class="heading heading-left">
        <h4>Making People Happy</h4>
        <h3>Related Products</h3>
    </div>
    <div class="owl-carousel owl-theme" id="all-products">
        @foreach($related_product as $key=>$related_products)
        <?php
        $rel_prod_variant=DB::table('product_variants')->where('status',1)->where('product_id',$related_products->id)->orderBy('weight','desc')->orderBy('packed_size','desc')->orderBy('size_category','asc')->get(); 
        $rel_prod_cost=DB::table('product_variants')->where('status',1)->where('product_id',$related_products->id)->max('cost');
        $variant_prod_id=DB::table('product_variants')->where('status',1)->where('product_id',$related_products->id)->where('cost',$rel_prod_cost)->first();
        ?>
        <div class="item">
        <div class="single-product thumb_swap">
        <?php if($related_products->best_seller==1){ ?>
            <div class="product-tag2">Best Seller</div>
            <?php }elseif($related_products->new_arrival==1){ ?>
              <div class="product-tag1">New</div>
            <?php } ?>
            <div class="product-img">
            <a href="{{route('product_detail')}}/{{$related_products->slug}}">
            <img src="{{asset('frontend/images/product')}}/{{$related_products->image}}" alt="Product Image" class="w-100">
            </a>
            <a href="{{route('product_detail')}}/{{$related_products->slug}}">
            <img src="{{asset('frontend/images/product')}}/{{$related_products->image}}" alt="Product Image" class="w-100 img_swap">
            </a>
            </div>
            <div class="product-content">
            <div class="actions-btn">
            <?php if(isset($variant_prod_id)){ ?>
                <a class="add_to_wishlist" data-id="{{$related_products->id}}" data-variant="{{$variant_prod_id->id}}"><img src="{{asset('frontend/images/svg/heart-black.svg')}}"></a> 
            <?php } ?>
                <!-- <a href="#"><img src="{{asset('frontend/images/svg/cart-black.svg')}}"></a> 
                <a href="#"><img src="{{asset('frontend/images/svg/view-black.svg')}}"></a>  -->
            </div>
            
            <?php
                    // Example slug
                    $slug = $related_products->slug; // "Fruit-N-Nut-Orange-78697"
                    
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
                    
                    $product_name = $related_products->product_name; // "Desi Laddu Calcium"
                    
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
            
            <h6 class="product-subtitle"><a href="{{route('product_detail')}}/{{$related_products->slug}}">{{$desired_word1}}</a></h6>
            <h4><a style="color:#d4a548;" href="{{route('product_detail')}}/{{$related_products->slug}}">{{$desired_word}}</a></h4>
            <br>
            <span class="price"><strong>₹ <span class="relproductPrice-{{$key}}">{{$rel_prod_cost}}</span></strong></span>
            <span class="price form-group">
                <select name="relprice_weight" class="relprice_weight form-control" data-id="-{{$key}}">
                @foreach($rel_prod_variant as $rel_prod_variants)
                  <option value="{{$rel_prod_variants->id}}"><?php if($rel_prod_variants->weight!=''){ ?>{{$rel_prod_variants->weight}} {{$rel_prod_variants->weight_unit}} <?php }elseif($rel_prod_variants->size_category!=''){ ?>{{$rel_prod_variants->size_category}} <?php }else{ ?>{{$rel_prod_variants->packed_size}} <?php } ?></option>
                @endforeach
                </select>
              </span>
              <hr>
              <?php if($related_products->available==1){ ?>
              <div class="product-title">
                <a href="{{route('product_detail')}}/{{$related_products->slug}}"><button class="default-btn1 img-btn-i"><img src="https://mbihosting.in/healthy-belly/public/frontend/images/icons/Eye.png"></button></a>
                <?php if(isset($variant_prod_id)){ ?>
                <button class="default-btn1 product_price-{{$key}} add_product" data-id="{{$related_products->id}}" data-variant="{{$variant_prod_id->id}}"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Add to cart</button>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$('#product_weight').change(function() {
  var id = $(this).val();
  var token = '{{ csrf_token() }}';
  if( id == '' ){		
        return false;
    } else {
    $.ajax({
        type: "POST",
        url: "{{route('product_detail_weight')}}",
        data: {'id': id,
                _token : token,
        },
        success: function(data){
            $("#productDetailPrice").html(data.price);
            $(".product_price").attr("data-variant",data.id);
        }
    });
}
});
</script>
@endsection