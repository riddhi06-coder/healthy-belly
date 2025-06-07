@extends('layouts.header')
@section('content')
    <style>
        .default-btn1 {
            display: inline-block !important;
            line-height: 32px;
            padding: 5px 13px;
            font-size: 14px;
            text-transform: capitalize;
            font-weight: 600;
            letter-spacing: 1px;
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
<section class="inner-banner-wrap">
      <div class="black-layer">
        <div class="container">
          <div class="inner-banner-title">
            <h2>Products</h2>
          </div>
          <div class="breadcrumb-wrap">
            <ul>
              <li><a href="{{route('index')}}">Home</a></li>
              <li class="active"><a href="#">Products</a></li>
            </ul>
          </div>
        </div>
      </div>
    </section>
    <section class="product-filter">
      <div class="container">
      <div class="">
        <div class="row">
          <div class="col-md-3 col-sm-12 col-xs-12">
            <div class="sidebar-wrap">
              <div class="single-sidebar-item">
                <div class="single-sidebar-title">
                  <h4>Category</h4>
                </div>
                <div class="product-sidebar-wrap">
                  <?php $k=1000;$i=2000; ?>
                  @foreach($parent_cat as $key=>$parent_cats)
                  <div class="ac">
                    <input class="ac-input" id="ac-{{$k}}" name="ac-{{$k}}" type="checkbox">
                    <label class="ac-label main-cat" for="ac-{{$k}}">{{$parent_cats->category_name}}</label>
                    <article class="ac-text">
                    <?php 
                    $s_category=DB::table('product_sub_category')->where('status',1)->where('parent_cat_id',$parent_cats->id)->get();
                     ?>
                      @foreach($s_category as $sub_cats)
                      <div class="ac-sub">
                        <input class="ac-input" id="ac-{{$i}}" name="ac-{{$i}}" type="checkbox">
                        <label class="ac-label sub-cat" for="ac-{{$i}}"><a href="{{route('sub_category_product_list')}}/{{$sub_cats->slug}}">{{$sub_cats->name}}</a></label>
                        <article class="ac-sub-text">
                        <?php 
                        $prod_detail=DB::table('products')->where('status',1)->where('sub_cat',$sub_cats->id)->get();
                        ?>
                          <ul>
                            @foreach($prod_detail as $prod_details)
                            <li><a href="{{route('product_detail')}}/{{$prod_details->slug}}"> {{$prod_details->product_name}} </a></li>
                            @endforeach
                          </ul>
                        </article>
                      </div>
                      <?php $i++; ?>
                      @endforeach
                    </article>
                  </div>
                  <?php $k++; ?>
                    @endforeach
                </div>
              </div>
            </div>
          </div>
          <!-- <div class="clearfix"></div> -->
          <?php 
          $all_product=DB::table('products')->where('status',1)
                    ->where('product_name','like','%'.$keyword.'%')->paginate(6);
            if($all_product->count()<1){
              echo "<h2 class='text-center'> No Product Found !!</h2>";
            }else{
            ?>
          <div class="col-md-9 col-sm-12 col-xs-12">
            <div><h3><i>Search Result - " {{$keyword}} "</i></h3></div>
            <div class="row filter_result">
              <div class="product-listings">
                @foreach($all_product as $key=>$all_products)
                <?php
                $all_prod_variant=DB::table('product_variants')->where('status',1)->where('product_id',$all_products->id)->orderBy('weight','desc')->orderBy('packed_size','desc')->orderBy('size_category','asc')->get(); 
                $all_prod_cost=DB::table('product_variants')->where('status',1)->where('product_id',$all_products->id)->max('cost');
                $variant_prod_id=DB::table('product_variants')->where('status',1)->where('product_id',$all_products->id)->where('cost',$all_prod_cost)->first();
                ?>
                <div class="col-md-4 col-sm-6 col-xs-12 ">
                  <div class="single-product thumb_swap ">
                  <?php if($all_products->best_seller==1){ ?>
                    <div class="product-tag2">Best Seller</div>
                    <?php }elseif($all_products->new_arrival==1){ ?>
                    <div class="product-tag1">New</div>
                    <?php } ?>
                    <div class="product-img">
                      <a href="{{route('product_detail')}}/{{$all_products->slug}}">
                      <img src="{{asset('public/frontend/images/product')}}/{{$all_products->image}}" alt="Product Image" class="w-100">
                      </a>
                      <a href="{{route('product_detail')}}/{{$all_products->slug}}">
                      <img src="{{asset('public/frontend/images/product')}}/{{$all_products->image}}" alt="Product Image" class="w-100 img_swap">
                      </a>
                    </div>
                    <div class="product-content">
                      <div class="actions-btn">
                      <?php if(isset($variant_prod_id)){ ?>
                        <a class="add_to_wishlist" data-id="{{$all_products->id}}" data-variant="{{$variant_prod_id->id}}"><img src="{{asset('public/frontend/images/svg/heart-black.svg')}}"></a> 
                      <?php } ?>
                        <!-- <a href="#"><img src="images/svg/cart-black.svg"></a> 
                        <a href="#"><img src="images/svg/view-black.svg"></a>  -->
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
                      
                      <h4 class="product-title"><a href="{{route('product_detail')}}/{{$all_products->slug}}">{{$desired_word1}}</a></h4>
                      <h4><a style="color:#d4a548;" href="{{route('product_detail')}}/{{$all_products->slug}}">{{$desired_word}}</a></h4>
                      <span class="price"><strong> ₹ <span class="allproductPrice-{{$key}}">{{$all_prod_cost}}</span></strong></span>
                      <span class="price">
                        <select name="allprice_weight" class="allprice_weight" data-id="-{{$key}}">
                        @foreach($all_prod_variant as $all_prod_variants)
                        <option value="{{$all_prod_variants->id}}"><?php if($all_prod_variants->weight!=''){ ?>{{$all_prod_variants->weight}} {{$all_prod_variants->weight_unit}} <?php }elseif($all_prod_variants->size_category!=''){ ?>{{$all_prod_variants->size_category}} <?php }else{ ?>{{$all_prod_variants->packed_size}} <?php } ?></option>
                        @endforeach
                        </select>
                    </span>
                    <hr>
                    <?php if($all_products->available==1){ ?>
                    <div class="product-title">
                        <a href="{{route('product_detail')}}/{{$all_products->slug}}"><button class="default-btn1 img-btn-i"><img src="https://mbihosting.in/healthy-belly/public/frontend/images/icons/Eye.png"></button></a>
                        <?php if(isset($variant_prod_id)){ ?>
                        <button class="default-btn1 product_price-{{$key}} add_product" data-id="{{$all_products->id}}" data-variant="{{$variant_prod_id->id}}"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Add to cart</button>
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
              {{$all_product->links()}}
            </div>
            
          </div>
        <?php } ?>
        </div>
        <!-- /.container -->
      </div>
    </div>
      <!-- /.primary -->
    </section>
    <!-- <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> -->
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
    function filter_data()
    {
      var action = 'fetch_data';
      var minimum_price = $('#hidden_minimum_price').val();
      var maximum_price = $('#hidden_maximum_price').val();
      var token = '{{ csrf_token() }}';
      $.ajax({
          url:"{{route('filter_product_data')}}",
          type: "POST",
          data:{'action':action,
              'minimum_price':minimum_price,
              'maximum_price':maximum_price,
              _token : token,
            },
              
          success:function(data){
              $('.filter_result').html(data);
          }
      });
    }
    $('#price_range').slider({
        range:true,
        min:0,
        max:50,
        values:[0, 50],
        step:0.5,
        stop:function(event, ui)
        {
            $('#price_show').html(ui.values[0] + ' - ' + ui.values[1]);
            $('#hidden_minimum_price').val(ui.values[0]);
            $('#hidden_maximum_price').val(ui.values[1]);
            filter_data();
        }
    });
    </script>
@endsection