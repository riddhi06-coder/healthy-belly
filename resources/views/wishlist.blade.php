@extends('layouts.header')
@section('content')
<section class="inner-banner-wishlist">
    <div class="black-layer">
    <div class="container">
        <div class="inner-banner-title">
        <h2>Wishlist</h2>
        </div>
        <div class="breadcrumb-wrap">
        <ul>
            <li><a href="{{route('index')}}">Home</a></li>
            <li class="active"><a href="#">Wishlist</a></li>
        </ul>
        </div>
    </div>
    </div>
</section>
<section class="product-filter form-section pattern-bg">
    <?php if($wishlist_item->count() != 0){ ?>
      <div class="container">
        <div class="row">
           <div class="col-md-8 col-md-offset-2 col-sm-6 col-sm-offset-3 col-xs-12">
            <div class="card-order">
            @foreach($wishlist_item as $key=>$wishlist_items)
             <?php $product_detail=DB::table('products')->where('id',$wishlist_items->product_id)->first(); ?>
              <div class="row">
                <div class="col-md-3">
                  <div class="img-wrapper">
                    <img src="{{asset('public/frontend/images/product')}}/{{$product_detail->image}}" class="img-responsive">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="product-price">
                    <p>₹ {{$wishlist_items->price}}/- </p>
                  </div>
                  <div class="product-heading">
                    <h2>{{$product_detail->product_name}} | <span> {{$wishlist_items->weight}} {{$wishlist_items->weight_unit}} {{$wishlist_items->size_category}} {{$wishlist_items->packed_size}} </span> </h2>
                    <?php if($product_detail->available==1){ ?>
                    <a href="#" class="btn default-btn add_wishlist_product" data-pid="{{$wishlist_items->id}}" data-id="{{$wishlist_items->product_id}}" data-variant="{{$wishlist_items->cost_variant_id}}"> Add to Cart</a>
                    <?php } ?>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="product-price">
                  <?php if($product_detail->available==1){ ?>
                  <p> In Stock </p>
                  <?php }else{ ?>
                  <p> Out Of Stock </p>
                  <?php } ?>
                 </div>
                </div>
                <div class="col-md-3">
                  <div class="remove-icon">
                      <a title="Remove this item" class="remove_wishlist" data-id="{{$wishlist_items->id}}">
                        <img src="{{asset('public/delete.svg')}}" class="img-responsive">
                    </a>
                    </div>
                </div>
              </div>
              <hr>
              @endforeach
            </div>
          </div>
           
        </div>
      </div>
      <?php }else{ ?>
         <div class="row">
           <div class="col-md-2 col-md-offset-5 col-sm-2 col-sm-offset-5 col-xs-12">
               <p><h3><i>No Item Found</i></h3></p>
            </div>
         </div>
            <?php } ?>
    </section>
@endsection