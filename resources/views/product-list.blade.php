@extends('layouts.header')
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
 
@section('content')
<section class="inner-banner-wrap">
      <div class="black-layer">
        <div class="container">
          <div class="inner-banner-title">
            <h2>Products</h2> 
          </div>
          <div class="breadcrumb-wrap">
              <?php
              $cat =DB::table('parent_category')
              ->where('status','=',1)
              ->get();
              $parent_cat =DB::table('products')
              ->where('parent_cat','=',$id)
              ->where('status','=',1)
              ->get();
              ?>
            <ul>
              <li><a href="{{route('index')}}">Home</a></li>
              <li class="active"><a href="#">Products</a></li>
            </ul>
          </div>
        </div>
      </div>
    </section>
    <section class="product-filter-wrap">
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
                   <div class="ac">
                    <label class="ac-label main-cat" for="ac-{{$k}}"><a style="text-decoration:none; color:white;" href="{{route('all_product_list')}}">All Product</label></a>
                  </div>
                  @foreach($cat as $key=>$parent_cats)
                  <div class="ac">
                    <input class="ac-input" id="ac-{{$k}}" name="ac-{{$k}}" type="checkbox">
                    <label class="ac-label main-cat" for="ac-{{$k}}"><a style="text-decoration:none; color:white;" href="{{route('product_list')}}/{{$parent_cats->id}}">{{$parent_cats->category_name}}</label></a>
                   
                  </div>
                  <?php $k++; ?>
                    @endforeach
                </div>
              </div>
              <div class="single-sidebar-item range-height">
    <div class="single-sidebar-title">
        <h4>Price Range</h4>
    </div>
    <div class="price-input-container">
        <label for="min_price">Min Price</label>
        <input type="number" id="min_price" name="min_price" />
        <label for="max_price">Max Price</label>
        <input type="number" id="max_price" name="max_price" />
        <input type="hidden" id="id" name="id" value="{{$id}}" />
    </div>
</div>
            </div>
          </div>
          <!-- <div class="clearfix"></div> -->
          <?php 
            if($parent_cat->count()<1){
              echo "<h2 class='text-center'> No Product Found !!</h2>";
            }else{
            ?>
          <div class="col-md-9 col-sm-12 col-xs-12">
            <div class="row filter_result">
              <div class="product-listings" id="product_listings">
                @foreach($parent_cat as $key=>$all_products)
                <?php
                $all_prod_variant=DB::table('product_variants')->where('status',1)->where('product_id',$all_products->id)->orderBy('weight','desc')->orderBy('packed_size','desc')->orderBy('size_category','asc')->get(); 
                $all_prod_cost=DB::table('product_variants')->where('status',1)->where('product_id',$all_products->id)->max('cost');
                $variant_prod_id=DB::table('product_variants')->where('status',1)->where('product_id',$all_products->id)->where('cost',$all_prod_cost)->first();
                ?>
                <div class="col-md-4 col-sm-6 col-xs-12">
                  <div class="single-product thumb_swap ">
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
                      <h4 class="product-title" ><a style="color:#d4a548;" href="{{route('product_detail')}}/{{$all_products->slug}}">{{$desired_word}}</a></h4>
                    <div class="price-sec">
                    <span class="price left-cell"><strong style="font-family:Gilroy;"> ₹ <span class="allproductPrice-{{$key}}" >{{$all_prod_cost}}</span></strong></span>
                    <span class="price right-cell form-group">
                    <select name="allprice_weight" class="allprice_weight form-control" data-id="-{{$key}}" style="font-family:Gilroy;">
                    @foreach($all_prod_variant as $all_prod_variants)
                    <option value="{{$all_prod_variants->id}}"><?php if($all_prod_variants->weight!=''){ ?>{{$all_prod_variants->weight}} {{$all_prod_variants->weight_unit}} <?php }elseif($all_prod_variants->size_category!=''){ ?>{{$all_prod_variants->size_category}} <?php }else{ ?>{{$all_prod_variants->packed_size}} <?php } ?></option>
                    @endforeach
                    </select>
                    </span>
                    </div>
                    <hr>
                    <?php if($all_products->available==1){ ?>
              <div class="product-title">
                <a href="{{route('product_detail')}}/{{$all_products->slug}}"><button class="default-btn1 img-btn-i"><img src="https://mbihosting.in/healthy-belly/public/frontend/images/icons/Eye.png"></button></a>
                <?php if(isset($variant_prod_id)){ ?>
                <button class="default-btn1 product_price-{{$key}} add_product" data-id="{{$all_products->id}}" data-variant="{{$variant_prod_id->id}}"><i class="fa fa-shopping-cart" aria-hidden="true"></i>Add to cart</button>
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
            {{$all_product->links()}}
          </div>
        <?php } ?>
        </div>
        <!-- /.container -->
      </div>
    </div>
      <!-- /.primary -->
    </section>
    <!-- <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"> -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        $('#min_price, #max_price').on('input', function() {
            filterProducts();
        });

        function filterProducts() {
            var minPrice = $('#min_price').val();
            var id = $('#id').val();
            var maxPrice = $('#max_price').val();

            if (minPrice !== '' && maxPrice !== '') {
                fetchData(minPrice, maxPrice,id);
            }
        }

        function fetchData(minPrice, maxPrice,id) {
            $.ajax({
                url: "{{ route('price.filter') }}",
                method: "GET",
                data: {
                    min_price: minPrice,
                    max_price: maxPrice,
                    id: id,
                },
                success: function(data) {
                    console.log(data);
                    updateProductListings(data);
                }
            });
        }

        function updateProductListings(products) {
            var product_listings = $('#product_listings');
            product_listings.empty(); // Clear existing products

            $.each(products, function(index, product) {
                var productHtml = `
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="single-product thumb_swap">
                            ${product.best_seller ? '<div class="product-tag2">Best Seller</div>' : ''}
                            ${product.new_arrival ? '<div class="product-tag1">New</div>' : ''}
                            <div class="product-img">
                                <a href="{{route('product_detail', '')}}/${product.slug}">
                                    <img src="{{asset('frontend/images/product')}}/${product.image}" alt="Product Image" class="w-100">
                                </a>
                                <a href="{{route('product_detail', '')}}/${product.slug}">
                                    <img src="{{asset('frontend/images/product')}}/${product.image}" alt="Product Image" class="w-100 img_swap">
                                </a>
                            </div>
                            <div class="product-content">
                                <div class="actions-btn">
                                    <a class="add_to_wishlist" data-id="${product.id}" data-variant="${product.variant_id}">
                                        <img src="{{asset('frontend/images/svg/heart-black.svg')}}">
                                    </a>
                                </div>
                                <h4 class="product-title">
                                    <a href="{{route('product_detail', '')}}/${product.slug}">${product.product_name}</a>
                                </h4>
                                <span class="price"><strong>₹ <span class="allproductPrice-${index}">${product.cost}</span></strong></span>
                                <hr>
                                ${product.available == 1 ? `
                                    <div class="product-title">
                                        <a href="{{route('product_detail', '')}}/${product.slug}">
                                            <button class="default-btn1">View detail</button>
                                        </a>
                                        <button class="default-btn1 product_price-${index} add_product" data-id="${product.id}" data-variant="${product.variant_id}">
                                            Add to cart
                                        </button>
                                    </div>
                                ` : `
                                    <span class="btn-default">Out of Stock</span>
                                `}
                            </div>
                        </div>
                    </div>
                `;
                product_listings.append(productHtml);
            });
        }
    });
</script>
@endsection
