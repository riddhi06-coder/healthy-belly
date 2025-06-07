<!DOCTYPE html>
<html lang="en">
<head>
  <title>Healthy Belly</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" href="{{asset('frontend/images/Untitled-1.png')}}" sizes="32x32" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
  <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/owl.theme.default.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/owl.carousel.min.css')}}">
  <link rel="stylesheet" href="{{asset('frontend/css/lightslider.css')}}">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
  <link rel="stylesheet" href="{{asset('frontend/css/hover.css')}}">
  <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">
  <link rel="stylesheet" href="{{asset('frontend/css/media.css')}}">

  <style>
          @font-face {
            font-family: 'Gilroy';
            src: url('path/to/fonts/Gilroy-Regular.woff2') format('woff2'),
                 url('path/to/fonts/Gilroy-Regular.woff') format('woff');
            font-weight: normal;
            font-style: normal;
        }

        @font-face {
            font-family: 'Denton';
            src: url('path/to/fonts/Denton-Regular.woff2') format('woff2'),
                 url('path/to/fonts/Denton-Regular.woff') format('woff');
            font-weight: normal;
            font-style: normal;
        }

        .badge {
          padding-left: 9px;
          padding-right: 9px;
          -webkit-border-radius: 9px;
          -moz-border-radius: 9px;
          border-radius: 9px;
        }
        
        .label-warning[href],
        .badge-warning[href] {
          background-color: #c67605;
        }
        #lblCartCount {
            font-size: 12px;
            background: white;
            color: #000;
            padding: 0px 5px;
            vertical-align: top;
            margin-left: -17px;
            margin-top: -34px;
        }
  </style>
  
</head>
<body data-auth="{{ Auth::check() ? 'true' : 'false' }}">
  <section class="topbar-wrap pattern-bg" style="background-color:#462328;">
    <div class="container">
      <div class="row">
        <div class="col-md-4 col-sm-4">
          <form method="get" action="{{route('search_product_list')}}" enctype="multipart/form-data">
            <div class="custom-search-input">
              <input type="text" style="font-family:Gilroy;" id="search_product" name="search_product" placeholder="Search Here">
              <div id="suggesstion-box">
              </div>
              <a href=""><button type="submit"><i class="fa fa-search"></i></button></a>
            </div>
          </form>
        </div>
        <div class="col-md-4 col-sm-4">
          <div class="logo-topbar">
            <a class="navbar-brand" href="{{route('index')}}">
              <!--<img src="{{asset('frontend/images/logo')}}/{{$shop_detail->shop_logo}}" class="img-responsive">-->
              <img src="{{asset('frontend/Healthy_Belly_Logo.png')}}" alt="Healthy Belly" style="width:300px;">
              <!--<p style="color:black;">Sweets | Savouries | Snacks</p>-->
            </a>
          </div>
        </div>
        <div class="col-md-4 col-sm-4">
          <div class="header-right right-topbar">
           
              <div class="icon-box-icon">
                         <?php if(Auth::guard('web')->check()){ ?>
            <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#"><img src="{{ asset('User.svg')}}"> </a>
            <span style="color:white;">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</span>
            <ul class="dropdown-menu">
            <li><a href="{{route('user_dashboard')}}">Dashboard</a></li>
            <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">Logout</a></li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </ul>
          </li>
          <?php }else{ ?>
           <li class="login-sec row d-flex">
            <a style="color:#c5a34f; line-height: 12px;" class="btn default-btn" href="{{ route('login') }}">Login</a>
            <a style="color:#c5a34f; line-height: 12px;" class="btn default-btn" href="{{ route('register')}}"> Sign Up</a>
            </li>
          <?php } ?>
              </div>
            
            <?php
            $w_count=$wishlist_count->count();
            ?>
            <a href="{{route('view_wishlist')}}" class="wishlist">
              <img src="{{asset('heart.svg')}}">
              <span class='badge badge-warning' id='lblWishlistCount'> {{$w_count}} </span>
            </a>
            
            <a href="{{route('view_cart')}}" class="cart-icon-box">
              <div class="icon-box-icon">
                <img src="{{asset('cart.svg')}}">
              </div>
            </a>
            <?php
            $c_count=$cart_count->count(); 
        
            ?>
            <span class='badge badge-warning' id='lblCartCount'> {{$cart_count->count()}} </span>
          </div>
        </div>
      </div>
    </div>
  </section>
  <nav class="navbar navbar-inverse pattern-bg">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>                        
        </button>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
          <li class="active"><a href="{{route('index')}}">Home</a></li>
          <li><a href="{{route('about_us')}}">About</a></li>
          <li><a href="{{route('our_story')}}">Our Story</a></li>
          <?php
          $pro =DB::table('parent_category')
          ->where('status',"=",1)
          ->get();
          ?>
          @if(!empty($pro))
          @foreach($pro as $val)
          <li><a href="{{route('product_list')}}/{{$val->id}}">{{$val->category_name}}</a></li>
          @endforeach
          @endif

          <li><a href="{{route('contact_us')}}">Contact</a></li>
          
   
        </ul>
      </div>
    </div>
  </nav>
  @yield('content')
  <footer class="footer-section"> 
    <div class="footer-top black-pattern-bg">
      <div class="container">
        <div class="row">
          <div class="col-md-3 col-sm-6 col-xs-12 first-col">
            <div class="widget-text"> 
              <a href="{{route('index')}}">
                <img src="{{asset('frontend/Healthy_Belly_Logo.png')}}" alt="Healthy Belly" style="width:232px;">
              </a>
              <h6>Question or feedback?</h6>
              <div class="widget-content">
                  <ul class="info-list clearfix">
                    <li><i class="fa fa-envelope"></i>
                       <a href="mailto:{{$shop_detail->email1}}">{{$shop_detail->email1}}  </a>
                    </li>
                    <li><i class="fa fa-phone"></i>
                       <a href="tel:{{$shop_detail->contact1}}">{{$shop_detail->contact1}}  </a>
                    </li>
                    <li><i class="fa fa-map-marker"></i>
                    {{$shop_detail->address1}}<br> {{$shop_detail->address2}} <br>{{$shop_detail->address3}}.
                    <!--{{ $shop_detail->description }}-->
                    </li>
                  </ul>
                </div>
            </div>
          </div>
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="single-footer-widget">
              <h2 class="widget-title">Healthy Belly</h2>
              <ul class="widget-list p-0">
                <li><a href="{{route('about_us')}}">About Us</a></li>
                <li><a href="{{route('our_story')}}">Our Story</a></li>
                <!--<li><a href="#">Why Us</a></li>-->
                <li><a href="{{route('contact_us')}}">Contact Us</a></li>
                <li><a href="{{route('faq')}}">FAQ's</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="single-footer-widget">
              <h2 class="widget-title">Products</h2>
              <ul class="widget-list p-0">
                  <?php
                 $cat = DB::table('parent_category')
                 ->where('status',"=",1)
                 ->get();
                  ?>
                  @if(!empty($cat))
              @foreach($cat as $parent_cats)
              <li><a href="{{route('product_list')}}/{{$parent_cats->id}}">{{$parent_cats->category_name}}</a></li>
              @endforeach
              @endif
              </ul>
            </div>
          </div>
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="single-footer-widget">
              <h2 class="widget-title">Policies</h2>
              <ul class="widget-list p-0">
                <li><a href="{{route('terms_service')}}">Terms of Service</a></li>
                <!--<li><a href="#">Security</a></li>-->
                <li><a href="{{route('refund_policy')}}">Return &amp; Refund</a></li>
                <li><a href="{{route('privacy_policy')}}">Privacy Policy</a></li>
                <li><a href="{{route('shipping_policy')}}">Shipping Policy</a></li>
                <!-- <li><a href="#">Grievance Cell</a></li> -->
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="footer-bottom">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-12 col-xs-12">
            <div class="copyright text-center">
              <p>Copyright © {{date('Y')}} Healthy Belly. All Rights Reserved. | Crafted by <a href="https://www.matrixbricks.com/" target="_blank">Matrix Bricks</a>
            </p>
          </div>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script type="text/javascript" src="{{asset('frontend/js/owl.carousel.js')}}"></script>
  <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
  <script src="{{asset('frontend/js/lightslider.js')}}"></script>
  <script src="{{asset('frontend/js/custom.js')}}"></script>
  <!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   <!--<script src="https://www.google.com/recaptcha/api.js"></script>-->
   <!--<script src="https://www.google.com/recaptcha/api.js?render=6Lcgsz8bAAAAAFh4nACnutdbhzQPucll6vZ6B5Jr"></script>-->
  <script>
  $('.price_weight').change(function() {
  var id = $(this).val();
  var data_id=$(this).data('id');
  $.ajax({
      type: "GET",
      dataType: "json",
      url: 'price-weight',
      data: {'id': id},
      success: function(data){
        $(".productPrice"+data_id).html(data.price);
        $(".product_price"+data_id).attr("data-variant",data.id);
      }
  });
});
$('.allprice_weight').change(function() {
  var id = $(this).val();
  var data_id=$(this).data('id');
  $.ajax({
      type: "GET",
      dataType: "json",
      url: 'all-price-weight',
      data: {'id': id},
      success: function(data){
        $(".allproductPrice"+data_id).html(data.price);
        $(".product_price"+data_id).attr("data-variant",data.id);
      }
  });
});
$('.newprice_weight').change(function() {
  var id = $(this).val();
  var data_id=$(this).data('id');
  $.ajax({
      type: "GET",
      dataType: "json",
      url: 'all-price-weight',
      data: {'id': id},
      success: function(data){
        $(".newproductPrice"+data_id).html(data.price);
        $(".product_price"+data_id).attr("data-variant",data.id);
      }
  });
});
$('.relprice_weight').change(function() {
  var id = $(this).val();
  var data_id=$(this).data('id');
  var token = '{{ csrf_token() }}';
  $.ajax({
      type: "POST",
      dataType: "json",
      url: "{{route('related_product_weights')}}",
      data: {'id': id,
        _token : token,
      },
      success: function(data){
        $(".relproductPrice"+data_id).html(data.price);
        $(".product_price"+data_id).attr("data-variant",data.id);
      }
  });
});
$('.catprice_weight').change(function() {
  var id = $(this).val();
  var data_id=$(this).data('id');
  var token = '{{ csrf_token() }}';
  $.ajax({
      type: "POST",
      dataType: "json",
      url: "{{route('category_product_weights')}}",
      data: {'id': id,
        _token : token,
      },
      success: function(data){
        $(".catproductPrice"+data_id).html(data.price);
        $(".product_price"+data_id).attr("data-variant",data.id);
      }
  });
});



// $('.add_product').click(function() {
//   var product_id = $(this).data('id');
//   var variant_id = $(this).data('variant');
//   var token = '{{ csrf_token() }}';
//   $(this).removeClass("add_product");
//   $(this).removeClass("default-btn1");
//   $(this).addClass("btn-sm");
//   $(this).html('Added');
//   $(this).attr('disabled',true);

//   if( product_id == '' ){		
//         return false;
//     } else {
//     $.ajax({
//         type: "POST",
//         url: "{{route('add_product')}}",
//         data: {'product_id': product_id,
//               'variant_id':variant_id,
//                 _token : token,
//         },
//         success: function(data){
//           Swal.fire({
//             position: 'center',
//             icon: 'success',
//             text: 'Success',
//             title: 'Added to Cart',
//             showConfirmButton: false,
//             timer: 2000
//           });
//         }
//     });
// }
// });


$('.add_product').click(function() {
    var product_id = $(this).data('id');
    var variant_id = $(this).data('variant');
    var token = '{{ csrf_token() }}';

    var isLoggedIn = $('body').data('auth'); 

    if (!isLoggedIn) {
        Swal.fire({
            position: 'center',
            icon: 'warning',
            title: 'Please login First!!',
            showConfirmButton: true,
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '{{ route('login') }}';
            }
        });
    } else {
        $(this).removeClass("add_product");
        $(this).removeClass("default-btn1");
        $(this).addClass("btn-sm");
        $(this).html('Added');
        $(this).attr('disabled', true);

        if (product_id == '') {
            return false;
        } else {
            $.ajax({
                type: "POST",
                url: "{{route('add_product')}}",
                data: {
                    'product_id': product_id,
                    'variant_id': variant_id,
                    _token: token,
                },
                success: function(data) {
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Added to Cart',
                        text: 'Success',
                        showConfirmButton: false,
                        timer: 2000
                    });
                }
            });
        }
    }
});




$('.add_product_detail_page').click(function() {
  var product_id = $(this).data('id');
  var variant_id = $(this).data('variant');
  var qtyy = $('.counts').val();
  var token = '{{ csrf_token() }}';

  if( product_id == '' ){		
        return false;
    } else {
    $.ajax({
        type: "POST",
        url: "{{route('add_product')}}",
        data: {'product_id': product_id,
              'variant_id':variant_id,
              'qtyy' : qtyy,
                _token : token,
        },
        success: function(data){
          Swal.fire({
            position: 'center',
            icon: 'success',
            text: 'Success',
            title: 'Product Added to Cart'
          }).then(function(){
            location.reload();
          });
          
        }
    });
}
});

// delete cart item
$('.remove').click(function() {
  var id=$(this).data('id');
  $.ajax({
      type: "GET",
      dataType: "json",
      url: 'remove-product',
      data: {'id': id},
      success: function(data){
        if(data==true){
          location.reload();
        }
      }
  });
});
$('.minus').click(function() {
  var id=$(this).data('id');
  var cost=$(this).data('cost');
  var weight=$(this).data('weight');
  var prod_id=$(this).data('prod_id');
  $.ajax({
      type: "GET",
      dataType: "json",
      url: 'minus-product',
      data: {'id': id,
            'cost':cost,
            'weight':weight,
            'prod_id':prod_id},
      success: function(data){
        if(data==true){
          location.reload();
        }
      }
  });
});
$('.plus').click(function() {
  var id=$(this).data('id');
  var cost=$(this).data('cost');
  var weight=$(this).data('weight');
  var prod_id=$(this).data('prod_id');
  $.ajax({
      type: "GET",
      dataType: "json",
      url: 'plus-product',
      data: {'id': id,
            'cost':cost,
            'weight':weight,
            'prod_id':prod_id},
      success: function(data){
        if(data==true){
          location.reload();
        }
      }
  });
});

$('.add_to_wishlist').click(function() {
  var product_id = $(this).data('id');
  var variant_id = $(this).data('variant');
  var token = '{{ csrf_token() }}';
  if( product_id == '' ){		
        return false;
    } else {
    $.ajax({
        type: "POST",
        url: "{{route('add_to_wishlist')}}",
        data: {'product_id': product_id,
              'variant_id':variant_id,
                _token : token,
        },
        success: function(data){
          // alert("Added to wishlisttt !!");
          Swal.fire({
            position: 'center',
            icon: 'success',
            text: 'Success',
            title: 'Added to wishlist',
            showConfirmButton: false,
            timer: 2000
          });
        }
    });
}
});
$('.add_wishlist_product').click(function() {
  var product_id = $(this).data('id');
  var variant_id = $(this).data('variant');
  var p_id = $(this).data('pid');
  var token = '{{ csrf_token() }}';
  $(this).closest('tr').find('td').fadeOut('slow', 
    function(){ 
      $(this).closest('tr').remove();                    
    });
  if( product_id == '' ){		
        return false;
    } else {
    $.ajax({
        type: "POST",
        url: "{{route('add_wishlist_product')}}",
        data: {'product_id': product_id,
              'variant_id':variant_id,
              'p_id':p_id,
                _token : token,
        },
        success: function(data){
          Swal.fire({
            position: 'center',
            icon: 'success',
            text: 'Success',
            title: 'Added to Cart',
            showConfirmButton: false,
            timer: 2000
          });
          if(data==true){
          location.reload();
          }
        }
    });
}
});

// delete wishlist item
$('.remove_wishlist').click(function() {
  var id=$(this).data('id');
  $(this).closest('tr').find('td').fadeOut('slow', 
    function(){ 
      $(this).closest('tr').remove();                    
    });
  $.ajax({
      type: "GET",
      dataType: "json",
      url: 'remove-wishlist-product',
      data: {'id': id},
      success: function(data){
        if(data==true){
          location.reload();
        }
      }
  });
});

$('.range-height').find('input:checkbox').on('click', function(){
  if($('.range-height').find('input:checked').data('from')){
    var val=$('.range-height').find('input:checked').data('from');
    alert(val);
  }else{
    alert("all");
  }
  
});

$('#address_type').change(function() {
  var id=$(this).val();
  $.ajax({
      type: "GET",
      dataType: "json",
      url: 'select-address-type',
      data: {'id': id},
      success: function(data){
        $('#address').val(data.address);
        $('#pincode').val(data.zipcode);
      }
  });
});

// $('#search_product').keyup(function(){
//   var prod_val=$(this).val();
//   var token = '{{ csrf_token() }}';
//   $.ajax({
//     type:'post',
//     url:'search-product',
//     data:{'keyword':prod_val,
//           _token : token,
//           },
//     success:function(data){
//       $("#suggesstion-box").show();
//       $("#suggesstion-box").html(data);
//       $("#search-box").css("background","#FFF");
//     }
//   });
// });
// function selectProduct(val,id) {
// $("#search_product").val(val);
// $("#search_id").val(id);
// $("#suggesstion-box").hide();
// }

function onSubmit(token) {
     document.getElementById("form-data").submit();
   }
   function onClick(e) {
        e.preventDefault();
        grecaptcha.ready(function() {
          grecaptcha.execute('6Lcgsz8bAAAAAFh4nACnutdbhzQPucll6vZ6B5Jr', {action: 'submit'}).then(function(token) {
              // Add your logic to submit to your backend server here.
          });
        });
      }
</script>
</body>
</html>
