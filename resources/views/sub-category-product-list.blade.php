@extends('layouts.header')
@section('content')
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
              <!-- <div class="single-sidebar-item range-height" id="">
                <div class="single-sidebar-title">
                  <h4>Price Range</h4>
                </div>
                  <input type="hidden" id="hidden_minimum_price" value="0" />
                  <input type="hidden" id="hidden_maximum_price" value="50" />
                  <p id="price_show">0 - 50</p>
                  <div id="price_range"></div>
              </div> -->
            </div>
          </div>
          <!-- <div class="clearfix"></div> -->
          <div class="col-md-9 col-sm-12 col-xs-12">
            <div class="row filter_result">
              <div class="product-listings">
              <?php if($all_product->count()<1){ ?>
              <h4>No Product Found !!</h4>
              <?php }else{ ?>
              
                @foreach($all_product as $key=>$all_products)
                <?php
                $all_prod_variant=DB::table('product_variants')->where('status',1)->where('product_id',$all_products->id)->orderBy('weight','desc')->orderBy('packed_size','desc')->orderBy('size_category','asc')->get(); 
                $all_prod_cost=DB::table('product_variants')->where('status',1)->where('product_id',$all_products->id)->max('cost');
                $variant_prod_id=DB::table('product_variants')->where('status',1)->where('product_id',$all_products->id)->where('cost',$all_prod_cost)->first();
                ?>
                <div class="col-md-4 col-sm-6 col-xs-12">
                  <div class="single-product thumb_swap">
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
                      <h4 class="product-title"><a href="{{route('product_detail')}}/{{$all_products->slug}}">{{$all_products->product_name}}</a></h4>
                     <div class="price-sec">
                <span class="price left-cell"><strong style="font-family:Gilroy;"> ₹ <span class="catproductPrice-{{$key}}" >{{$all_prod_cost}}</span></strong></span>
                <span class="price right-cell">
                <select name="catprice_weight" class="catprice_weight" data-id="-{{$key}}" style="font-family:Gilroy;">
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
                        <?php } ?>
                    </div>
                    <?php }else{ ?>
                        <span class="btn-default ">Out of Stock</span>
                    <?php } ?>
                    </div>
                  </div>
                </div>
                @endforeach
                <?php } ?>
              </div>
            </div>
            {{$all_product->links()}}
          </div>
        </div>
        <!-- /.container -->
      </div>
    </div>
      <!-- /.primary -->
    </section>
    
@endsection