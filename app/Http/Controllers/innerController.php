<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Hash;
use DB;
use Mail;
use Session;
use Auth;

class innerController extends Controller
{
    public function index(){
        $parent_cat=DB::table('parent_category')->where('status',1)->get();
        $sub_cat=DB::table('product_sub_category')->where('status',1)->get();
        $social_media=DB::table('social_media')->where('status',1)->get();
        $slider=DB::table('sliders')->where('status',1)->get();
        $advertise=DB::table('advertisements')->where('status',1)->where('section','Main')->get();
        $shop_detail=DB::table('shop_details')->where('id',1)->first();
        $testimonial=DB::table('testimonials')->get();
        // $all_product=DB::table('products')->where('status',1)
        //                                 ->where('best_seller',NULL)
        //                                 ->where('new_arrival',NULL)->get();
        $all_product=DB::table('products')->where('status',1)->get();
        $best_seller=DB::table('products')->where('status',1)->where('best_seller',1)->get();
        $new_arrival=DB::table('products')->where('status',1)->where('new_arrival',1)->get();
        $aboutus=DB::table('abouts')->where('id',1)->first();
        if (getenv('HTTP_X_FORWARDED_FOR')) {
        $ip_address = getenv('HTTP_X_FORWARDED_FOR');
        if ($first_ip_in_list = stristr($ip_address, ',', true))
            $ip_address = $first_ip_in_list;
        }
        elseif (getenv('HTTP_X_REAL_IP')) {
            $ip_address = getenv('HTTP_X_REAL_IP');
        }
        else {
            $ip_address = $_SERVER['REMOTE_ADDR'] ?? '127.0.0.1';
        }
        // $ip_address = '103.246.242.18';
        $user_id="";
        if(Auth::guard('web')->check()){
            $user_id=Auth::guard('web')->user()->id;
        }
        $cart_count=DB::table('cart')->where('ip_address',$ip_address)->where('user_id',$user_id)->get();
        $wishlist_count=DB::table('wishlists')->where('ip_address',$ip_address)->where('user_id',$user_id)->get();
        return view('index',compact('parent_cat','sub_cat','social_media','slider','advertise','shop_detail',
        'testimonial','all_product','best_seller','new_arrival','aboutus','cart_count','wishlist_count'));
    }
    
    
      public function filterPrice(Request $request)
      {
    $min_price = $request->get('min_price');
    $max_price = $request->get('max_price');
       $id =$request->get('id');
       
       
    // Query using the DB facade
    if(!empty($id)){
    $pri = DB::table('products')
        ->join('product_variants', 'products.id', '=', 'product_variants.product_id')
        ->whereBetween('product_variants.cost', [$min_price, $max_price])
        ->where('parent_cat', $id)
        ->select('products.*', 'product_variants.id as variant_id', 'product_variants.cost')
        ->get();
        return response()->json($pri);
}
else
{
     $pri = DB::table('products')
        ->join('product_variants', 'products.id', '=', 'product_variants.product_id')
        ->whereBetween('product_variants.cost', [$min_price, $max_price])
        ->where('parent_cat', $id)
        ->select('products.*', 'product_variants.id as variant_id', 'product_variants.cost')
        ->get();
        return response()->json($pri);
}

        
      }
      
      public function our_story()
      {
            $user_id="";
        if(Auth::guard('web')->check()){
            $user_id=Auth::guard('web')->user()->id;
        }
           if (getenv('HTTP_X_FORWARDED_FOR')) {
        $ip_address = getenv('HTTP_X_FORWARDED_FOR');
        if ($first_ip_in_list = stristr($ip_address, ',', true))
            $ip_address = $first_ip_in_list;
        }
        elseif (getenv('HTTP_X_REAL_IP')) {
            $ip_address = getenv('HTTP_X_REAL_IP');
        }
        else {
            $ip_address = $_SERVER['REMOTE_ADDR'] ?? '127.0.0.1';
        }
                  $shop_detail=DB::table('shop_details')->where('id',1)->first();
                     $cart_count=DB::table('cart')->where('ip_address',$ip_address)->where('user_id',$user_id)->get();
        $wishlist_count=DB::table('wishlists')->where('ip_address',$ip_address)->where('user_id',$user_id)->get();
$parent_cat=DB::table('parent_category')->where('status',1)->get();
        $sub_cat=DB::table('product_sub_category')->where('status',1)->get();
        $social_media=DB::table('social_media')->where('status',1)->get();
        $slider=DB::table('sliders')->where('status',1)->get();
        $advertise=DB::table('advertisements')->where('status',1)->where('section','Main')->get();
        
          return view('our-story',compact('shop_detail','cart_count','wishlist_count','parent_cat','sub_cat','social_media','slider','advertise'));
         
      }
  

    public function product_detail($slug){
        $parent_cat=DB::table('parent_category')->where('status',1)->get();
        $sub_cat=DB::table('product_sub_category')->where('status',1)->get();
        $social_media=DB::table('social_media')->where('status',1)->get();
        $shop_detail=DB::table('shop_details')->where('id',1)->first();
        $aboutus=DB::table('abouts')->where('id',1)->first();
        $product_detail=DB::table('products')->where('slug',$slug)->first();
        $user_review=DB::table('reviews')->where('status',1)->where('product_id',$product_detail->id)->get();
        $related_product=DB::table('products')->where('status',1)->where('sub_cat',$product_detail->sub_cat)->get();
        $product_image=DB::table('product_images')->where('status',1)->where('product_id',$product_detail->id)->get();
        if (getenv('HTTP_X_FORWARDED_FOR')) {
        $ip_address = getenv('HTTP_X_FORWARDED_FOR');
        if ($first_ip_in_list = stristr($ip_address, ',', true))
            $ip_address = $first_ip_in_list;
        }
        elseif (getenv('HTTP_X_REAL_IP')) {
            $ip_address = getenv('HTTP_X_REAL_IP');
        }
        else {
            $ip_address = $_SERVER['REMOTE_ADDR'] ?? '127.0.0.1';
        }
        // $ip_address = '103.246.242.18';
        $user_id="";
        if(Auth::guard('web')->check()){
            $user_id=Auth::guard('web')->user()->id;
        }
        $cart_count=DB::table('cart')->where('ip_address',$ip_address)->where('user_id',$user_id)->get();
        $wishlist_count=DB::table('wishlists')->where('ip_address',$ip_address)->where('user_id',$user_id)->get();
        return view('product-detail',compact('parent_cat','sub_cat','social_media','shop_detail',
        'aboutus','cart_count','product_detail','related_product','product_image','wishlist_count','user_review'));
    }

    public function product_list($id){
        $parent_cat=DB::table('parent_category')->where('status',1)->get();
        $sub_cat=DB::table('product_sub_category')->where('status',1)->get();
        $social_media=DB::table('social_media')->where('status',1)->get();
        $shop_detail=DB::table('shop_details')->where('id',1)->first();
        $aboutus=DB::table('abouts')->where('id',1)->first();
        $all_product=DB::table('products')->where('status',1)->paginate(6);
        if (getenv('HTTP_X_FORWARDED_FOR')) {
        $ip_address = getenv('HTTP_X_FORWARDED_FOR');
        if ($first_ip_in_list = stristr($ip_address, ',', true))
            $ip_address = $first_ip_in_list;
        }
        elseif (getenv('HTTP_X_REAL_IP')) {
            $ip_address = getenv('HTTP_X_REAL_IP');
        }
        else {
            $ip_address = $_SERVER['REMOTE_ADDR'] ?? '127.0.0.1';
        }
        // $ip_address = '103.246.242.18';
        $user_id="";
        if(Auth::guard('web')->check()){
            $user_id=Auth::guard('web')->user()->id;
        }
        $cart_count=DB::table('cart')->where('ip_address',$ip_address)->where('user_id',$user_id)->get();
        $wishlist_count=DB::table('wishlists')->where('ip_address',$ip_address)->where('user_id',$user_id)->get();
        return view('product-list',compact('parent_cat','sub_cat','social_media','shop_detail',
        'aboutus','cart_count','all_product','wishlist_count','id'));
    }
    
    public function all_product_list(){
        $parent_cat=DB::table('parent_category')->where('status',1)->get();
        $sub_cat=DB::table('product_sub_category')->where('status',1)->get();
        $social_media=DB::table('social_media')->where('status',1)->get();
        $shop_detail=DB::table('shop_details')->where('id',1)->first();
        $aboutus=DB::table('abouts')->where('id',1)->first();
        $all_product=DB::table('products')->where('status',1)->paginate(6);
        if (getenv('HTTP_X_FORWARDED_FOR')) {
        $ip_address = getenv('HTTP_X_FORWARDED_FOR');
        if ($first_ip_in_list = stristr($ip_address, ',', true))
            $ip_address = $first_ip_in_list;
        }
        elseif (getenv('HTTP_X_REAL_IP')) {
            $ip_address = getenv('HTTP_X_REAL_IP');
        }
        else {
            $ip_address = $_SERVER['REMOTE_ADDR'] ?? '127.0.0.1';
        }
        // $ip_address = '103.246.242.18';
        $user_id="";
        if(Auth::guard('web')->check()){
            $user_id=Auth::guard('web')->user()->id;
        }
        $cart_count=DB::table('cart')->where('ip_address',$ip_address)->where('user_id',$user_id)->get();
        $wishlist_count=DB::table('wishlists')->where('ip_address',$ip_address)->where('user_id',$user_id)->get();
        return view('all-product-list',compact('parent_cat','sub_cat','social_media','shop_detail',
        'aboutus','cart_count','all_product','wishlist_count'));
    }

    public function search_product_list(Request $request){
        $parent_cat=DB::table('parent_category')->where('status',1)->get();
        $sub_cat=DB::table('product_sub_category')->where('status',1)->get();
        $social_media=DB::table('social_media')->where('status',1)->get();
        $shop_detail=DB::table('shop_details')->where('id',1)->first();
        $aboutus=DB::table('abouts')->where('id',1)->first();
        $keyword=$request->search_product;
        if (getenv('HTTP_X_FORWARDED_FOR')) {
        $ip_address = getenv('HTTP_X_FORWARDED_FOR');
        if ($first_ip_in_list = stristr($ip_address, ',', true))
            $ip_address = $first_ip_in_list;
        }
        elseif (getenv('HTTP_X_REAL_IP')) {
            $ip_address = getenv('HTTP_X_REAL_IP');
        }
        else {
            $ip_address = $_SERVER['REMOTE_ADDR'] ?? '127.0.0.1';
        }
        // $ip_address = '103.246.242.18';
        $user_id="";
        if(Auth::guard('web')->check()){
            $user_id=Auth::guard('web')->user()->id;
        }
        $cart_count=DB::table('cart')->where('ip_address',$ip_address)->where('user_id',$user_id)->get();
        $wishlist_count=DB::table('wishlists')->where('ip_address',$ip_address)->where('user_id',$user_id)->get();
        return view('search-list',compact('parent_cat','sub_cat','social_media','shop_detail',
        'aboutus','cart_count','keyword','wishlist_count'));
    }

    public function category_product_list($id){
        $parent_cat=DB::table('parent_category')->where('status',1)->get();
        $sub_cat=DB::table('product_sub_category')->where('status',1)->get();
        $social_media=DB::table('social_media')->where('status',1)->get();
        $shop_detail=DB::table('shop_details')->where('id',1)->first();
        $aboutus=DB::table('abouts')->where('id',1)->first();
        $p_id=DB::table('parent_category')->where('slug',$id)->first();
        $all_product=DB::table('products')->where('status',1)->where('parent_cat',$p_id->id)->paginate(6);
        if (getenv('HTTP_X_FORWARDED_FOR')) {
        $ip_address = getenv('HTTP_X_FORWARDED_FOR');
        if ($first_ip_in_list = stristr($ip_address, ',', true))
            $ip_address = $first_ip_in_list;
        }
        elseif (getenv('HTTP_X_REAL_IP')) {
            $ip_address = getenv('HTTP_X_REAL_IP');
        }
        else {
            $ip_address = $_SERVER['REMOTE_ADDR'] ?? '127.0.0.1';
        }
        // $ip_address = '103.246.242.18';
        $user_id="";
        if(Auth::guard('web')->check()){
            $user_id=Auth::guard('web')->user()->id;
        }
        $cart_count=DB::table('cart')->where('ip_address',$ip_address)->where('user_id',$user_id)->get();
        $wishlist_count=DB::table('wishlists')->where('ip_address',$ip_address)->where('user_id',$user_id)->get();
        return view('category-product-list',compact('parent_cat','sub_cat','social_media','shop_detail',
        'aboutus','cart_count','all_product','wishlist_count'));
    }

    public function sub_category_product_list($id){
        $parent_cat=DB::table('parent_category')->where('status',1)->get();
        $sub_cat=DB::table('product_sub_category')->where('status',1)->get();
        $social_media=DB::table('social_media')->where('status',1)->get();
        $shop_detail=DB::table('shop_details')->where('id',1)->first();
        $aboutus=DB::table('abouts')->where('id',1)->first();
        $sub_cat_id=DB::table('product_sub_category')->where('slug',$id)->first();
        $all_product=DB::table('products')->where('status',1)->where('sub_cat',$sub_cat_id->id)->paginate(6);
        if (getenv('HTTP_X_FORWARDED_FOR')) {
        $ip_address = getenv('HTTP_X_FORWARDED_FOR');
        if ($first_ip_in_list = stristr($ip_address, ',', true))
            $ip_address = $first_ip_in_list;
        }
        elseif (getenv('HTTP_X_REAL_IP')) {
            $ip_address = getenv('HTTP_X_REAL_IP');
        }
        else {
            $ip_address = $_SERVER['REMOTE_ADDR'] ?? '127.0.0.1';
        }
        // $ip_address = '103.246.242.18';
        $user_id="";
        if(Auth::guard('web')->check()){
            $user_id=Auth::guard('web')->user()->id;
        }
        $cart_count=DB::table('cart')->where('ip_address',$ip_address)->where('user_id',$user_id)->get();
        $wishlist_count=DB::table('wishlists')->where('ip_address',$ip_address)->where('user_id',$user_id)->get();
        return view('category-product-list',compact('parent_cat','sub_cat','social_media','shop_detail',
        'aboutus','cart_count','all_product','wishlist_count'));
    }

    public function contact_us(){
        $parent_cat=DB::table('parent_category')->where('status',1)->get();
        $sub_cat=DB::table('product_sub_category')->where('status',1)->get();
        $social_media=DB::table('social_media')->where('status',1)->get();
        $shop_detail=DB::table('shop_details')->where('id',1)->first();
        $aboutus=DB::table('abouts')->where('id',1)->first();
        if (getenv('HTTP_X_FORWARDED_FOR')) {
        $ip_address = getenv('HTTP_X_FORWARDED_FOR');
        if ($first_ip_in_list = stristr($ip_address, ',', true))
            $ip_address = $first_ip_in_list;
        }
        elseif (getenv('HTTP_X_REAL_IP')) {
            $ip_address = getenv('HTTP_X_REAL_IP');
        }
        else {
            $ip_address = $_SERVER['REMOTE_ADDR'] ?? '127.0.0.1';
        }
        // $ip_address = '103.246.242.18';
        $user_id="";
        if(Auth::guard('web')->check()){
            $user_id=Auth::guard('web')->user()->id;
        }
        $cart_count=DB::table('cart')->where('ip_address',$ip_address)->where('user_id',$user_id)->get();
        $wishlist_count=DB::table('wishlists')->where('ip_address',$ip_address)->where('user_id',$user_id)->get();
        return view('contact-us',compact('parent_cat','sub_cat','social_media','shop_detail',
        'aboutus','cart_count','wishlist_count'));
    }

    public function about_us(){
        $parent_cat=DB::table('parent_category')->where('status',1)->get();
        $sub_cat=DB::table('product_sub_category')->where('status',1)->get();
        $social_media=DB::table('social_media')->where('status',1)->get();
        $shop_detail=DB::table('shop_details')->where('id',1)->first();
        $aboutus=DB::table('abouts')->where('id',1)->first();
        $testimonial=DB::table('testimonials')->get();
        if (getenv('HTTP_X_FORWARDED_FOR')) {
        $ip_address = getenv('HTTP_X_FORWARDED_FOR');
        if ($first_ip_in_list = stristr($ip_address, ',', true))
            $ip_address = $first_ip_in_list;
        }
        elseif (getenv('HTTP_X_REAL_IP')) {
            $ip_address = getenv('HTTP_X_REAL_IP');
        }
        else {
            $ip_address = $_SERVER['REMOTE_ADDR'] ?? '127.0.0.1';
        }
        // $ip_address = '103.246.242.18';
        $user_id="";
        if(Auth::guard('web')->check()){
            $user_id=Auth::guard('web')->user()->id;
        }
        $cart_count=DB::table('cart')->where('ip_address',$ip_address)->where('user_id',$user_id)->get();
        $wishlist_count=DB::table('wishlists')->where('ip_address',$ip_address)->where('user_id',$user_id)->get();
        $about=DB::table('abouts')->where('id',1)->first();
        $chef=DB::table('our_chefs')->where('status',1)->get();
        return view('about-us',compact('parent_cat','sub_cat','social_media','shop_detail','testimonial',
        'aboutus','cart_count','wishlist_count','about','chef'));
    }

    public function view_wishlist(Request $request){
        $parent_cat=DB::table('parent_category')->where('status',1)->get();
        $sub_cat=DB::table('product_sub_category')->where('status',1)->get();
        $social_media=DB::table('social_media')->where('status',1)->get();
        $shop_detail=DB::table('shop_details')->where('id',1)->first();
        $aboutus=DB::table('abouts')->where('id',1)->first();
        if (getenv('HTTP_X_FORWARDED_FOR')) {
        $ip_address = getenv('HTTP_X_FORWARDED_FOR');
        if ($first_ip_in_list = stristr($ip_address, ',', true))
            $ip_address = $first_ip_in_list;
        }
        elseif (getenv('HTTP_X_REAL_IP')) {
            $ip_address = getenv('HTTP_X_REAL_IP');
        }
        else {
            $ip_address = $_SERVER['REMOTE_ADDR'] ?? '127.0.0.1';
        }
        // $ip_address = '103.246.242.18';
        $user_id="";
        if(Auth::guard('web')->check()){
            $user_id=Auth::guard('web')->user()->id;
        }
        $cart_count=DB::table('cart')->where('ip_address',$ip_address)->where('user_id',$user_id)->get();
        $wishlist_item=DB::table('wishlists')->where('ip_address',$ip_address)->where('user_id',$user_id)->get();
        $wishlist_count=DB::table('wishlists')->where('ip_address',$ip_address)->where('user_id',$user_id)->get();
        return view('wishlist',compact('parent_cat','sub_cat','social_media','shop_detail',
        'aboutus','cart_count','wishlist_item','wishlist_count'));
    }

    public function add_to_wishlist(Request $request){
        if (getenv('HTTP_X_FORWARDED_FOR')) {
        $ip_address = getenv('HTTP_X_FORWARDED_FOR');
        if ($first_ip_in_list = stristr($ip_address, ',', true))
            $ip_address = $first_ip_in_list;
        }
        elseif (getenv('HTTP_X_REAL_IP')) {
            $ip_address = getenv('HTTP_X_REAL_IP');
        }
        else {
            $ip_address = $_SERVER['REMOTE_ADDR'] ?? '127.0.0.1';
        }
        // $ip_address = '103.246.242.18';
        $user_id=NULL;
        if(Auth::guard('web')->check()){
            $user_id=Auth::guard('web')->user()->id;
        }
        $prod_detail=DB::table('product_variants')->where('id',$request->variant_id)->first();
        $check_data=DB::table('wishlists')->where('ip_address',$ip_address)->where('cost_variant_id',$request->variant_id)->get();
        if($check_data->count()!=0){
            return true;
        }else{
            $data=array('ip_address'=>$ip_address,'user_id'=>$user_id,'product_id'=>$request->product_id,'cost_variant_id'=>$request->variant_id,
            'price'=>$prod_detail->cost,'weight'=>$prod_detail->weight,'weight_unit'=>$prod_detail->weight_unit,'size_category'=>$prod_detail->size_category,
            'packed_size'=>$prod_detail->packed_size);
            DB::table('wishlists')->insert($data);
            return true;
        }

    }
    
    public function refund_policy(){
        $parent_cat=DB::table('parent_category')->where('status',1)->get();
        $sub_cat=DB::table('product_sub_category')->where('status',1)->get();
        $social_media=DB::table('social_media')->where('status',1)->get();
        $slider=DB::table('sliders')->where('status',1)->get();
        $advertise=DB::table('advertisements')->where('status',1)->where('section','Main')->get();
        $shop_detail=DB::table('shop_details')->where('id',1)->first();
        $testimonial=DB::table('testimonials')->get();
        $all_product=DB::table('products')->where('status',1)->get();
        $best_seller=DB::table('products')->where('status',1)->where('best_seller',1)->get();
        $new_arrival=DB::table('products')->where('status',1)->where('new_arrival',1)->get();
        $aboutus=DB::table('abouts')->where('id',1)->first();
        if (getenv('HTTP_X_FORWARDED_FOR')) {
        $ip_address = getenv('HTTP_X_FORWARDED_FOR');
        if ($first_ip_in_list = stristr($ip_address, ',', true))
            $ip_address = $first_ip_in_list;
        }
        elseif (getenv('HTTP_X_REAL_IP')) {
            $ip_address = getenv('HTTP_X_REAL_IP');
        }
        else {
            $ip_address = $_SERVER['REMOTE_ADDR'] ?? '127.0.0.1';
        }
        // $ip_address = '103.246.242.18';
        $user_id="";
        if(Auth::guard('web')->check()){
            $user_id=Auth::guard('web')->user()->id;
        }
        $cart_count=DB::table('cart')->where('ip_address',$ip_address)->where('user_id',$user_id)->get();
        $wishlist_count=DB::table('wishlists')->where('ip_address',$ip_address)->where('user_id',$user_id)->get();
        return view('refund-policy',compact('parent_cat','sub_cat','social_media','slider','advertise','shop_detail',
        'testimonial','all_product','best_seller','new_arrival','aboutus','cart_count','wishlist_count'));
    }
    
    public function privacy_policy(){
        $parent_cat=DB::table('parent_category')->where('status',1)->get();
        $sub_cat=DB::table('product_sub_category')->where('status',1)->get();
        $social_media=DB::table('social_media')->where('status',1)->get();
        $slider=DB::table('sliders')->where('status',1)->get();
        $advertise=DB::table('advertisements')->where('status',1)->where('section','Main')->get();
        $shop_detail=DB::table('shop_details')->where('id',1)->first();
        $testimonial=DB::table('testimonials')->get();
        $all_product=DB::table('products')->where('status',1)->get();
        $best_seller=DB::table('products')->where('status',1)->where('best_seller',1)->get();
        $new_arrival=DB::table('products')->where('status',1)->where('new_arrival',1)->get();
        $aboutus=DB::table('abouts')->where('id',1)->first();
        if (getenv('HTTP_X_FORWARDED_FOR')) {
        $ip_address = getenv('HTTP_X_FORWARDED_FOR');
        if ($first_ip_in_list = stristr($ip_address, ',', true))
            $ip_address = $first_ip_in_list;
        }
        elseif (getenv('HTTP_X_REAL_IP')) {
            $ip_address = getenv('HTTP_X_REAL_IP');
        }
        else {
            $ip_address = $_SERVER['REMOTE_ADDR'] ?? '127.0.0.1';
        }
        // $ip_address = '103.246.242.18';
        $user_id="";
        if(Auth::guard('web')->check()){
            $user_id=Auth::guard('web')->user()->id;
        }
        $cart_count=DB::table('cart')->where('ip_address',$ip_address)->where('user_id',$user_id)->get();
        $wishlist_count=DB::table('wishlists')->where('ip_address',$ip_address)->where('user_id',$user_id)->get();
        return view('privacy-policy',compact('parent_cat','sub_cat','social_media','slider','advertise','shop_detail',
        'testimonial','all_product','best_seller','new_arrival','aboutus','cart_count','wishlist_count'));
    }
    
    public function terms_service(){
        $parent_cat=DB::table('parent_category')->where('status',1)->get();
        $sub_cat=DB::table('product_sub_category')->where('status',1)->get();
        $social_media=DB::table('social_media')->where('status',1)->get();
        $slider=DB::table('sliders')->where('status',1)->get();
        $advertise=DB::table('advertisements')->where('status',1)->where('section','Main')->get();
        $shop_detail=DB::table('shop_details')->where('id',1)->first();
        $testimonial=DB::table('testimonials')->get();
        $all_product=DB::table('products')->where('status',1)->get();
        $best_seller=DB::table('products')->where('status',1)->where('best_seller',1)->get();
        $new_arrival=DB::table('products')->where('status',1)->where('new_arrival',1)->get();
        $aboutus=DB::table('abouts')->where('id',1)->first();
        if (getenv('HTTP_X_FORWARDED_FOR')) {
        $ip_address = getenv('HTTP_X_FORWARDED_FOR');
        if ($first_ip_in_list = stristr($ip_address, ',', true))
            $ip_address = $first_ip_in_list;
        }
        elseif (getenv('HTTP_X_REAL_IP')) {
            $ip_address = getenv('HTTP_X_REAL_IP');
        }
        else {
            $ip_address = $_SERVER['REMOTE_ADDR'] ?? '127.0.0.1';
        }
        // $ip_address = '103.246.242.18';
        $user_id="";
        if(Auth::guard('web')->check()){
            $user_id=Auth::guard('web')->user()->id;
        }
        $cart_count=DB::table('cart')->where('ip_address',$ip_address)->where('user_id',$user_id)->get();
        $wishlist_count=DB::table('wishlists')->where('ip_address',$ip_address)->where('user_id',$user_id)->get();
        return view('term-service',compact('parent_cat','sub_cat','social_media','slider','advertise','shop_detail',
        'testimonial','all_product','best_seller','new_arrival','aboutus','cart_count','wishlist_count'));
    }
    
    public function faq(){
        $parent_cat=DB::table('parent_category')->where('status',1)->get();
        $sub_cat=DB::table('product_sub_category')->where('status',1)->get();
        $social_media=DB::table('social_media')->where('status',1)->get();
        $slider=DB::table('sliders')->where('status',1)->get();
        $advertise=DB::table('advertisements')->where('status',1)->where('section','Main')->get();
        $shop_detail=DB::table('shop_details')->where('id',1)->first();
        $testimonial=DB::table('testimonials')->get();
        $all_product=DB::table('products')->where('status',1)->get();
        $best_seller=DB::table('products')->where('status',1)->where('best_seller',1)->get();
        $new_arrival=DB::table('products')->where('status',1)->where('new_arrival',1)->get();
        $aboutus=DB::table('abouts')->where('id',1)->first();
        if (getenv('HTTP_X_FORWARDED_FOR')) {
        $ip_address = getenv('HTTP_X_FORWARDED_FOR');
        if ($first_ip_in_list = stristr($ip_address, ',', true))
            $ip_address = $first_ip_in_list;
        }
        elseif (getenv('HTTP_X_REAL_IP')) {
            $ip_address = getenv('HTTP_X_REAL_IP');
        }
        else {
            $ip_address = $_SERVER['REMOTE_ADDR'] ?? '127.0.0.1';
        }
        // $ip_address = '103.246.242.18';
        $user_id="";
        if(Auth::guard('web')->check()){
            $user_id=Auth::guard('web')->user()->id;
        }
        $cart_count=DB::table('cart')->where('ip_address',$ip_address)->where('user_id',$user_id)->get();
        $wishlist_count=DB::table('wishlists')->where('ip_address',$ip_address)->where('user_id',$user_id)->get();
        return view('faq',compact('parent_cat','sub_cat','social_media','slider','advertise','shop_detail',
        'testimonial','all_product','best_seller','new_arrival','aboutus','cart_count','wishlist_count'));
    }
    
    public function shipping_policy(){
        $parent_cat=DB::table('parent_category')->where('status',1)->get();
        $sub_cat=DB::table('product_sub_category')->where('status',1)->get();
        $social_media=DB::table('social_media')->where('status',1)->get();
        $slider=DB::table('sliders')->where('status',1)->get();
        $advertise=DB::table('advertisements')->where('status',1)->where('section','Main')->get();
        $shop_detail=DB::table('shop_details')->where('id',1)->first();
        $testimonial=DB::table('testimonials')->get();
        $all_product=DB::table('products')->where('status',1)->get();
        $best_seller=DB::table('products')->where('status',1)->where('best_seller',1)->get();
        $new_arrival=DB::table('products')->where('status',1)->where('new_arrival',1)->get();
        $aboutus=DB::table('abouts')->where('id',1)->first();
        if (getenv('HTTP_X_FORWARDED_FOR')) {
        $ip_address = getenv('HTTP_X_FORWARDED_FOR');
        if ($first_ip_in_list = stristr($ip_address, ',', true))
            $ip_address = $first_ip_in_list;
        }
        elseif (getenv('HTTP_X_REAL_IP')) {
            $ip_address = getenv('HTTP_X_REAL_IP');
        }
        else {
            $ip_address = $_SERVER['REMOTE_ADDR'] ?? '127.0.0.1';
        }
        // $ip_address = '103.246.242.18';
        $user_id="";
        if(Auth::guard('web')->check()){
            $user_id=Auth::guard('web')->user()->id;
        }
        $cart_count=DB::table('cart')->where('ip_address',$ip_address)->where('user_id',$user_id)->get();
        $wishlist_count=DB::table('wishlists')->where('ip_address',$ip_address)->where('user_id',$user_id)->get();
        return view('shipping-policy',compact('parent_cat','sub_cat','social_media','slider','advertise','shop_detail',
        'testimonial','all_product','best_seller','new_arrival','aboutus','cart_count','wishlist_count'));
    }

    public function price_weight(Request $request){
        $res_price=DB::table('product_variants')->where('id',$request->id)->first();
        return response()->json(['price'=>$res_price->cost,'id'=>$res_price->id]);
    }
    public function all_price_weight(Request $request){
        $res_price=DB::table('product_variants')->where('id',$request->id)->first();
        return response()->json(['price'=>$res_price->cost,'id'=>$res_price->id]);
    }
    public function related_product_weights(Request $request){
        $res_price=DB::table('product_variants')->where('id',$request->id)->first();
        return response()->json(['price'=>$res_price->cost,'id'=>$res_price->id]);
    }
    public function product_detail_weight(Request $request){
        $res_price=DB::table('product_variants')->where('id',$request->id)->first();
        return response()->json(['price'=>$res_price->cost,'id'=>$res_price->id]);
    }
    public function category_product_weights(Request $request){
        $res_price=DB::table('product_variants')->where('id',$request->id)->first();
        return response()->json(['price'=>$res_price->cost,'id'=>$res_price->id]);
    }
    public function select_address_type(Request $request){
        $res_price=DB::table('user_address')->where('id',$request->id)->first();
        return response()->json(['address'=>$res_price->address,'zipcode'=>$res_price->zipcode]);
    }
    
    
    
    public function add_product(Request $request){
        // dd($request);

        if (getenv('HTTP_X_FORWARDED_FOR')) {
        $ip_address = getenv('HTTP_X_FORWARDED_FOR');
        if ($first_ip_in_list = stristr($ip_address, ',', true))
            $ip_address = $first_ip_in_list;
        }
        elseif (getenv('HTTP_X_REAL_IP')) {
            $ip_address = getenv('HTTP_X_REAL_IP');
        }
        else {
            $ip_address = $_SERVER['REMOTE_ADDR'] ?? '127.0.0.1';
        }
        // $ip_address = '103.246.242.18';
        $user_id=NULL;
        if(Auth::guard('web')->check()){
            $user_id=Auth::guard('web')->user()->id;
        }
        
        $prod_detail=DB::table('product_variants')->where('id',$request->variant_id)->first();
        $product_id=$request->product_id;
        if(isset($request->qtyy)){
            $product_quantity=$request->qtyy;
        }else{
            $product_quantity=1;
        }
        
        $check_data=DB::table('cart')->where('ip_address',$ip_address)->where('cost_variant_id',$prod_detail->id)->get();
        if($check_data->count()!=0){
            $get_data=DB::table('cart')->where('ip_address',$ip_address)->where('cost_variant_id',$prod_detail->id)->first();
            $db_quantity=$get_data->quantity+1;
            $total_price=$prod_detail->cost*$db_quantity;
            $update_count=array('quantity'=>$db_quantity,'total_price'=>$total_price);
             DB::table('cart')->where('ip_address',$ip_address)->where('cost_variant_id',$prod_detail->id)
                                ->update($update_count);
        }else{
            $total_price=$prod_detail->cost*$product_quantity;
        $value=array('ip_address'=>$ip_address,'user_id'=>$user_id,'quantity'=>$product_quantity,'price'=>$prod_detail->cost,'product_id'=>$product_id,
        'weight'=>$prod_detail->weight,'weight_unit'=>$prod_detail->weight_unit,'total_price'=>$total_price,'cost_variant_id'=>$prod_detail->id,
        'size_category'=>$prod_detail->size_category,'packed_size'=>$prod_detail->packed_size);
        DB::table('cart')->insert($value);
        return true;
        }
    }

    public function add_wishlist_product(Request $request){
        if (getenv('HTTP_X_FORWARDED_FOR')) {
        $ip_address = getenv('HTTP_X_FORWARDED_FOR');
        if ($first_ip_in_list = stristr($ip_address, ',', true))
            $ip_address = $first_ip_in_list;
        }
        elseif (getenv('HTTP_X_REAL_IP')) {
            $ip_address = getenv('HTTP_X_REAL_IP');
        }
        else {
            $ip_address = $_SERVER['REMOTE_ADDR'] ?? '127.0.0.1';
        }
        // $ip_address = '103.246.242.18';
        $user_id=NULL;
        if(Auth::guard('web')->check()){
            $user_id=Auth::guard('web')->user()->id;
        }
        $prod_detail=DB::table('product_variants')->where('id',$request->variant_id)->first();
        $product_id=$request->product_id;
        if(isset($request->qtyy)){
            $product_quantity=$request->qtyy;
        }else{
            $product_quantity=1;
        }
        
        $check_data=DB::table('cart')->where('ip_address',$ip_address)->where('cost_variant_id',$prod_detail->id)->get();
        if($check_data->count()!=0){
            $get_data=DB::table('cart')->where('ip_address',$ip_address)->where('cost_variant_id',$prod_detail->id)->first();
            $db_quantity=$get_data->quantity+1;
            $total_price=$prod_detail->cost*$db_quantity;
            $update_count=array('quantity'=>$db_quantity,'total_price'=>$total_price);
            $status=DB::table('cart')->where('ip_address',$ip_address)->where('cost_variant_id',$prod_detail->id)->update($update_count);
            if($status){
            DB::table('wishlists')->where('id',$request->p_id)->delete();
            return true;
        }
        }else{
            $total_price=$prod_detail->cost*$product_quantity;
        $value=array('ip_address'=>$ip_address,'user_id'=>$user_id,'quantity'=>$product_quantity,'price'=>$prod_detail->cost,'product_id'=>$product_id,
        'weight'=>$prod_detail->weight,'weight_unit'=>$prod_detail->weight_unit,'total_price'=>$total_price,'cost_variant_id'=>$prod_detail->id,
        'size_category'=>$prod_detail->size_category,'packed_size'=>$prod_detail->packed_size);
        $state=DB::table('cart')->insert($value);
        if($state){
            DB::table('wishlists')->where('id',$request->p_id)->delete();
            return true;
        }else{
            return false;
        }
        
        }
    }

    public function view_cart(Request $request){
        $parent_cat=DB::table('parent_category')->where('status',1)->get();
        $sub_cat=DB::table('product_sub_category')->where('status',1)->get();
        $social_media=DB::table('social_media')->where('status',1)->get();
        $shop_detail=DB::table('shop_details')->where('id',1)->first();
        $aboutus=DB::table('abouts')->where('id',1)->first();
        if (getenv('HTTP_X_FORWARDED_FOR')) {
        $ip_address = getenv('HTTP_X_FORWARDED_FOR');
        if ($first_ip_in_list = stristr($ip_address, ',', true))
            $ip_address = $first_ip_in_list;
        }
        elseif (getenv('HTTP_X_REAL_IP')) {
            $ip_address = getenv('HTTP_X_REAL_IP');
        }
        else {
            $ip_address = $_SERVER['REMOTE_ADDR'] ?? '127.0.0.1';
        }
        // $ip_address = '103.246.242.18';
        $user_id="";
        if(Auth::guard('web')->check()){
            $user_id=Auth::guard('web')->user()->id;
            
            $ip = DB::table('cart')
    ->where('ip_address', $ip_address)
    ->whereNull('user_id')
    ->update(['user_id' => Auth::user()->id]);
        }
        
        $cart_count=DB::table('cart')->where('ip_address',$ip_address)->Where('user_id',$user_id)->get();
        $cart_product=DB::table('cart')->where('ip_address',$ip_address)->Where('user_id',$user_id)->get();
        $wishlist_count=DB::table('wishlists')->where('ip_address',$ip_address)->Where('user_id',$user_id)->get();
        return view('cart',compact('parent_cat','sub_cat','social_media','shop_detail',
        'aboutus','cart_count','cart_product','wishlist_count'));
    }

    public function remove_product(Request $request){
        DB::table('cart')->where('id',$request->id)->delete();
        return true;
    }
    public function minus_product(Request $request){
        $detail=DB::table('product_variants')->where('product_id',$request->prod_id)->where('weight',$request->weight)->where('cost',$request->cost)->first();
        $cart_detail=DB::table('cart')->where('id',$request->id)->first();
        
        if($cart_detail->quantity==1){
            $quantity=1;
            $t_price=$cart_detail->total_price;
        }else{
            $t_price=$cart_detail->total_price-$cart_detail->price;
            $quantity=$cart_detail->quantity-1;
        }
        $data=array('quantity'=>$quantity,'total_price'=>$t_price);
        DB::table('cart')->where('id',$request->id)->update($data);
        return true;
    }
    public function plus_product(Request $request){
        $detail=DB::table('product_variants')->where('product_id',$request->prod_id)->where('weight',$request->weight)->where('cost',$request->cost)->first();
        $cart_detail=DB::table('cart')->where('id',$request->id)->first();
        if($cart_detail->quantity==10){
            $quantity=10;
            $t_price=$cart_detail->total_price;
        }else{
            $t_price=$cart_detail->total_price+$cart_detail->price;
            $quantity=$cart_detail->quantity+1;
        }
        $data=array('quantity'=>$quantity,'total_price'=>$t_price);
        DB::table('cart')->where('id',$request->id)->update($data);
        return true;
    }

    public function remove_wishlist_product(Request $request){
        DB::table('wishlists')->where('id',$request->id)->delete();
        return true;
    }

    public function save_review(Request $request){
        $this->validate($request,[
            'review'=>'required',
        ]);
        $slug=$request->input('slug');
        $data=array('product_id'=>$request->input('product_id'),'user_id'=>$request->input('user_id'),'name'=>$request->input('name'),'email'=>$request->input('email'),
        'review'=>$request->input('review'));
        DB::table('reviews')->insert($data);
        return redirect()->route('product_detail',$slug)->with('success','Review added Successfully !!');
    }

    public function user_dashboard(Request $request){
        $parent_cat=DB::table('parent_category')->where('status',1)->get();
        $sub_cat=DB::table('product_sub_category')->where('status',1)->get();
        $social_media=DB::table('social_media')->where('status',1)->get();
        $shop_detail=DB::table('shop_details')->where('id',1)->first();
        $aboutus=DB::table('abouts')->where('id',1)->first();
        if (getenv('HTTP_X_FORWARDED_FOR')) {
        $ip_address = getenv('HTTP_X_FORWARDED_FOR');
        if ($first_ip_in_list = stristr($ip_address, ',', true))
            $ip_address = $first_ip_in_list;
        }
        elseif (getenv('HTTP_X_REAL_IP')) {
            $ip_address = getenv('HTTP_X_REAL_IP');
        }
        else {
            $ip_address = $_SERVER['REMOTE_ADDR'] ?? '127.0.0.1';
        }
        // $ip_address = '103.246.242.18';
        $user_id="";
        if(Auth::guard('web')->check()){
            $user_id=Auth::guard('web')->user()->id;
            $address=DB::table('user_address')->where('user_id',$user_id)->get();
            $user_detail=DB::table('users')->where('id',$user_id)->first();
            $cart_count=DB::table('cart')->where('ip_address',$ip_address)->where('user_id',$user_id)->get();
            $wishlist_count=DB::table('wishlists')->where('ip_address',$ip_address)->where('user_id',$user_id)->get();
            $parent_table_order=DB::table('parent_order_table')->where('user_id',$user_id)->get();
            return view('user-dashboard',compact('parent_cat','sub_cat','social_media','shop_detail','aboutus','cart_count','wishlist_count','user_detail','parent_table_order','address'));
        }else{
            return redirect()->route('index');
        }
        
    }
    
    public function edit_user_address($id){
        $parent_cat=DB::table('parent_category')->where('status',1)->get();
        $sub_cat=DB::table('product_sub_category')->where('status',1)->get();
        $social_media=DB::table('social_media')->where('status',1)->get();
        $shop_detail=DB::table('shop_details')->where('id',1)->first();
        $aboutus=DB::table('abouts')->where('id',1)->first();
        if (getenv('HTTP_X_FORWARDED_FOR')) {
        $ip_address = getenv('HTTP_X_FORWARDED_FOR');
        if ($first_ip_in_list = stristr($ip_address, ',', true))
            $ip_address = $first_ip_in_list;
        }
        elseif (getenv('HTTP_X_REAL_IP')) {
            $ip_address = getenv('HTTP_X_REAL_IP');
        }
        else {
            $ip_address = $_SERVER['REMOTE_ADDR'] ?? '127.0.0.1';
        }
        // $ip_address = '103.246.242.18';
        $user_id="";
        if(Auth::guard('web')->check()){
            $user_id=Auth::guard('web')->user()->id;
            $address=DB::table('user_address')->where('id',$id)->first();
            $user_detail=DB::table('users')->where('id',$user_id)->first();
            $cart_count=DB::table('cart')->where('ip_address',$ip_address)->where('user_id',$user_id)->get();
            $wishlist_count=DB::table('wishlists')->where('ip_address',$ip_address)->where('user_id',$user_id)->get();
            $parent_table_order=DB::table('parent_order_table')->where('user_id',$user_id)->get();
            return view('user-address-edit',compact('parent_cat','sub_cat','social_media','shop_detail','aboutus','cart_count','wishlist_count','user_detail','parent_table_order','address'));
        }else{
            return redirect()->route('index');
        }
        
    }

    public function update_user_address(Request $request){
        $this->validate($request,[
            'address' => 'required',
            'zipcode' => 'required',
            'title' => 'required',
        ]);
        $data=array('title'=>$request->input('title'),'user_id'=>$request->input('user_id'),'address'=>$request->input('address'),'city'=>$request->input('city'),'state'=>$request->input('state'),'region'=>$request->input('country'),'zipcode'=>$request->input('zipcode'));
        DB::table('user_address')->where('id',$request->id)->update($data);
        return redirect()->route('user_dashboard')->with('success','Address Updated Successfully !!');
    }
    
    public function save_changed_password(Request $request){
        $password = Hash::make($request->confirmpwd);
        if(Hash::check($request->old_pwd,$request->db_pwd)){
        $data=array('password'=>$password);
        DB::table('users')->where('id',$request->user_id)->where('email',$request->email)->update($data);
        return redirect()->route('user_dashboard')->with('success','Password Updated Successfully !!');
        }else{
        return redirect()->route('user_dashboard')->with('success','Old password not matched !!');
        }
    }

    public function save_changed_new_password(Request $request){
        $password = Hash::make($request->confirmpwd);
        $data=array('password'=>$password);
        DB::table('users')->where('id',$request->user_id)->where('email',$request->email)->update($data);
        return redirect()->route('user_dashboard')->with('success','Password Updated Successfully !!');
    }
    public function update_user_detail(Request $request){
        $this->validate($request,[
            'first_name' => 'required',
            'last_name' => 'required',
            'contact' => 'required',
        ]);
        $data=array('first_name'=>$request->input('first_name'),'last_name'=>$request->input('last_name'),
        'contact'=>$request->input('contact'),'address'=>$request->input('address'),'city'=>$request->input('city'),
        'state'=>$request->input('state'),'country'=>$request->input('country'),'zipcode'=>$request->input('zipcode'));
        DB::table('users')->where('id',$request->user_id)->where('email',$request->email)->update($data);
        return redirect()->route('user_dashboard')->with('success','Detail Updated Successfully !!');
    }

    public function add_user_address(Request $request){
        $this->validate($request,[
            'address' => 'required',
            'zipcode' => 'required',
            'title' => 'required',
        ]);
        $data=array('title'=>$request->input('title'),'user_id'=>$request->input('user_id'),'address'=>$request->input('address'),'city'=>$request->input('city'),'state'=>$request->input('state'),'region'=>$request->input('country'),'zipcode'=>$request->input('zipcode'));
        DB::table('user_address')->insert($data);
        return redirect()->route('user_dashboard')->with('success','Added Successfully !!');
    }
    
    public function filter_product_data(Request $request){
        $output='';
        $data_array[]='';
        $output.='<div class="product-listings">';
        $prod_variant_id=DB::table('product_variants')->whereBetween('cost', [$request->minimum_price, $request->maximum_price])->get();
        foreach($prod_variant_id as $prod_variant_ids){
            $data_array[]=$prod_variant_ids->product_id;
        }
        if(sizeof($data_array)<1){
            echo "No Product found !!";
        }else{
            $all_product=DB::table('products')->where('status',1)->whereIn('id',$data_array)->get();
        }
        foreach($all_product as $key=>$all_products){
            $all_prod_variant=DB::table('product_variants')->where('status',1)->where('product_id',$all_products->id)->whereBetween('cost', [$request->minimum_price, $request->maximum_price])->orderBy('weight','desc')->orderBy('packed_size','desc')->orderBy('size_category','asc')->first(); 
            $all_prod_cost=DB::table('product_variants')->where('status',1)->where('product_id',$all_products->id)->first();
            // $variant_prod_id=DB::table('product_variants')->where('status',1)->where('product_id',$all_products->id)->where('cost',$all_prod_cost)->first();
            $output.='<div class="col-md-4 col-sm-6 col-xs-12 ">
                    <div class="single-product thumb_swap ">';
                    if($all_products->best_seller==1){
                    $output.='<div class="product-tag2">Best Seller</div>';
                    }elseif($all_products->new_arrival==1){
                    $output.='<div class="product-tag1">New</div>';
                    }
            $output.='<div class="product-img">
                    <a href="'. url('product-detail').'/'.$all_products->slug.'">
                    <img src="public/frontend/images/product/'.$all_products->image.'" alt="Product Image" class="w-100">
                    </a>
                    <a href="'. url('product-detail').'/'.$all_products->slug.'">
                    <img src="public/frontend/images/product/'.$all_products->image.'" alt="Product Image" class="w-100 img_swap">
                    </a>
                    </div>
                    <div class="product-content">
                      <div class="actions-btn">';
                    //   if(isset($variant_prod_id)){
                    //    $output.='<a class="add_to_wishlist" data-id="'.$all_products->id.'" data-variant="'.$variant_prod_id->id.'"><img src="public/frontend/images/svg/heart-black.svg"></a>';
                    //   }
                    $output.='</div>';
                    $output.='<h4 class="product-title"><a href="'. url('product-detail').'/'.$all_products->slug.'">'.$all_products->product_name.'</a></h4>';
                    
                    $output.='<span class="price"><strong>£ <span class="allproductPrice-'.$key.'">'.$all_prod_variant->cost.'</span></strong></span>';
                    
                    $output.='<span class="price">
                      <select name="allprice_weight" class="allprice_weight" data-id="-'.$key.'">';
                      
                        if($all_prod_variant->weight!=''){
                            $res_unit = $all_prod_variant->weight.' '.$all_prod_variant->weight_unit;
                        }elseif($all_prod_variant->size_category!=''){
                            $res_unit = $all_prod_variant->size_category;
                        }else{
                            $res_unit = $all_prod_variant->packed_size;
                        }
                      $output.='<option value="'.$all_prod_variant->id.'">'.$res_unit.'</option>';
                      $output.=' </select>
                  </span>
                  <hr>';
                  if($all_products->available==1){
                      $output.='<div class="product-title">
                      <a href="'. url('product-detail').'/'.$all_products->slug.'"><button class="default-btn1 ">View detail</button></a>';
                    //   if(isset($variant_prod_id)){ 
                    //     $output.='<button class="default-btn1 product_price-'.$key.' add_product" data-id="'.$all_products->id.'" data-variant="'.$variant_prod_id->id.'">Add to cart</button>';
                    //    } 
                  $output.='</div>';
                  }else{
                    $output.='<span class="btn-default ">Out of Stock</span>';
                  }
            $output.='</div>';
            $output.='</div></div>';
        }
        $output.='</div>';
        echo $output;
    }
    public function category_filter_product_data(Request $request){
        $output='';
        $data_array[]='';
        $output.='<div class="product-listings">';
        $prod_variant_id=DB::table('product_variants')->whereBetween('cost', [$request->minimum_price, $request->maximum_price])->get();
        foreach($prod_variant_id as $prod_variant_ids){
            $data_array[]=$prod_variant_ids->product_id;
        }
        if(sizeof($data_array)<1){
            echo "No Product found !!";
        }else{
            $all_product=DB::table('products')->where('status',1)->whereIn('id',$data_array)->get();
        }
        foreach($all_product as $key=>$all_products){
            $all_prod_variant=DB::table('product_variants')->where('status',1)->where('product_id',$all_products->id)->whereBetween('cost', [$request->minimum_price, $request->maximum_price])->orderBy('weight','desc')->orderBy('packed_size','desc')->orderBy('size_category','asc')->first(); 
            $all_prod_cost=DB::table('product_variants')->where('status',1)->where('product_id',$all_products->id)->first();
            // $variant_prod_id=DB::table('product_variants')->where('status',1)->where('product_id',$all_products->id)->where('cost',$all_prod_cost)->first();
            $output.='<div class="col-md-4 col-sm-6 col-xs-12 ">
                    <div class="single-product thumb_swap ">';
                    if($all_products->best_seller==1){
                    $output.='<div class="product-tag2">Best Seller</div>';
                    }elseif($all_products->new_arrival==1){
                    $output.='<div class="product-tag1">New</div>';
                    }
            $output.='<div class="product-img">
                    <a href="'. url('product-detail').'/'.$all_products->slug.'">
                    <img src="../public/frontend/images/product/'.$all_products->image.'" alt="Product Image" class="w-100">
                    </a>
                    <a href="'. url('product-detail').'/'.$all_products->slug.'">
                    <img src="../public/frontend/images/product/'.$all_products->image.'" alt="Product Image" class="w-100 img_swap">
                    </a>
                    </div>
                    <div class="product-content">
                      <div class="actions-btn">';
                    //   if(isset($variant_prod_id)){
                    //    $output.='<a class="add_to_wishlist" data-id="'.$all_products->id.'" data-variant="'.$variant_prod_id->id.'"><img src="public/frontend/images/svg/heart-black.svg"></a>';
                    //   }
                    $output.='</div>';
                    $output.='<h4 class="product-title"><a href="'. url('product-detail').'/'.$all_products->slug.'">'.$all_products->product_name.'</a></h4>';
                    
                    $output.='<span class="price"><strong>£ <span class="allproductPrice-'.$key.'">'.$all_prod_variant->cost.'</span></strong></span>';
                    
                    $output.='<span class="price">
                      <select name="allprice_weight" class="allprice_weight" data-id="-'.$key.'">';
                      
                        if($all_prod_variant->weight!=''){
                            $res_unit = $all_prod_variant->weight.' '.$all_prod_variant->weight_unit;
                        }elseif($all_prod_variant->size_category!=''){
                            $res_unit = $all_prod_variant->size_category;
                        }else{
                            $res_unit = $all_prod_variant->packed_size;
                        }
                      $output.='<option value="'.$all_prod_variant->id.'">'.$res_unit.'</option>';
                      $output.=' </select>
                  </span>
                  <hr>';
                  if($all_products->available==1){
                      $output.='<div class="product-title">
                      <a href="'. url('product-detail').'/'.$all_products->slug.'"><button class="default-btn1 ">View detail</button></a>';
                    //   if(isset($variant_prod_id)){ 
                    //     $output.='<button class="default-btn1 product_price-'.$key.' add_product" data-id="'.$all_products->id.'" data-variant="'.$variant_prod_id->id.'">Add to cart</button>';
                    //    } 
                  $output.='</div>';
                  }else{
                    $output.='<span class="btn-default ">Out of Stock</span>';
                  }
            $output.='</div>';
            $output.='</div></div>';
        }
        $output.='</div>';
        echo $output;
    }

    public function user_enquiry(Request $request){
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required',
            'contact' => 'required',
            'message' => 'required',
        ]);
        $data=array('name'=>$request->input('name'),'email'=>$request->input('email'),'contact'=>$request->input('contact'),
        'message'=>$request->input('message'));

        $mail_data=array('name'=>$request->input('name'),'email'=>$request->input('email'),'contact'=>$request->input('contact'),
        'msg'=>$request->input('message'));
        
        DB::table('enquiry_submission')->insert($data);
        $email_id=$request->input('email');
        Mail::send('enquiry-mail', $mail_data, function($message) use ($email_id) {
            $message->to('sachin@matrixbricks.com', 'User Enquiry')->subject
            ('User Enquiry');
            $message->from($email_id);
        });
        return redirect()->route('thank_you');
    }

    public function user_order_description($id){
        if (getenv('HTTP_X_FORWARDED_FOR')) {
        $ip_address = getenv('HTTP_X_FORWARDED_FOR');
        if ($first_ip_in_list = stristr($ip_address, ',', true))
            $ip_address = $first_ip_in_list;
        }
        elseif (getenv('HTTP_X_REAL_IP')) {
            $ip_address = getenv('HTTP_X_REAL_IP');
        }
        else {
            $ip_address = $_SERVER['REMOTE_ADDR'] ?? '127.0.0.1';
        }
        // $ip_address = '103.246.242.18';
        $user_id="";
        if(Auth::guard('web')->check()){
            $user_id=Auth::guard('web')->user()->id;
        }
        $cart_count=DB::table('cart')->where('ip_address',$ip_address)->where('user_id',$user_id)->get();
        $wishlist_count=DB::table('wishlists')->where('ip_address',$ip_address)->where('user_id',$user_id)->get();
        $parent_cats=DB::table('parent_order_table')->where('invoice_no',$id)->first();
        return view('user-order-description',compact('parent_cats','ip_address','user_id','cart_count','wishlist_count'))->with('i',1);
    }

    public function thank_you(){
        $parent_cat=DB::table('parent_category')->where('status',1)->get();
        $sub_cat=DB::table('product_sub_category')->where('status',1)->get();
        $social_media=DB::table('social_media')->where('status',1)->get();
        $slider=DB::table('sliders')->where('status',1)->get();
        $shop_detail=DB::table('shop_details')->where('id',1)->first();
        if (getenv('HTTP_X_FORWARDED_FOR')) {
        $ip_address = getenv('HTTP_X_FORWARDED_FOR');
        if ($first_ip_in_list = stristr($ip_address, ',', true))
            $ip_address = $first_ip_in_list;
        }
        elseif (getenv('HTTP_X_REAL_IP')) {
            $ip_address = getenv('HTTP_X_REAL_IP');
        }
        else {
            $ip_address = $_SERVER['REMOTE_ADDR'] ?? '127.0.0.1';
        }
        // $ip_address = '103.246.242.18';
        $user_id="";
        if(Auth::guard('web')->check()){
            $user_id=Auth::guard('web')->user()->id;
        }
        $cart_count=DB::table('cart')->where('ip_address',$ip_address)->where('user_id',$user_id)->get();
        $wishlist_count=DB::table('wishlists')->where('ip_address',$ip_address)->where('user_id',$user_id)->get();
        return view('thankyou',compact('parent_cat','sub_cat','social_media','slider','shop_detail',
        'cart_count','wishlist_count'));
    }

    public function payment_thankyou(){
        $parent_cat=DB::table('parent_category')->where('status',1)->get();
        $sub_cat=DB::table('product_sub_category')->where('status',1)->get();
        $social_media=DB::table('social_media')->where('status',1)->get();
        $slider=DB::table('sliders')->where('status',1)->get();
        $shop_detail=DB::table('shop_details')->where('id',1)->first();
        if (getenv('HTTP_X_FORWARDED_FOR')) {
        $ip_address = getenv('HTTP_X_FORWARDED_FOR');
        if ($first_ip_in_list = stristr($ip_address, ',', true))
            $ip_address = $first_ip_in_list;
        }
        elseif (getenv('HTTP_X_REAL_IP')) {
            $ip_address = getenv('HTTP_X_REAL_IP');
        }
        else {
            $ip_address = $_SERVER['REMOTE_ADDR'] ?? '127.0.0.1';
        }
        // $ip_address = '103.246.242.18';
        $user_id="";
        if(Auth::guard('web')->check()){
            $user_id=Auth::guard('web')->user()->id;
        }
        $cart_count=DB::table('cart')->where('ip_address',$ip_address)->where('user_id',$user_id)->get();
        $wishlist_count=DB::table('wishlists')->where('ip_address',$ip_address)->where('user_id',$user_id)->get();
        return view('payment-thankyou',compact('parent_cat','sub_cat','social_media','slider','shop_detail','ip_address','user_id',
        'cart_count','wishlist_count'));
    }

    public function search_product(Request $request){
        if(!empty($request->keyword)) {
            $query=DB::select("SELECT * FROM `products` WHERE `product_name` like '%".$request->keyword."%' ORDER BY `product_name`");
            if(!empty($query)){
            ?>
            <ul id="product-list">
            <?php
            foreach($query as $result){
            ?>
            <li onClick="selectProduct('<?php echo $result->product_name; ?>','<?php echo $result->id; ?>');"><?php echo $result->product_name; ?></li>
            <?php
            }
            ?>
            </ul>
            <?php
            }
        }
    }

    public function cod_mail(){
       $parent_cat=DB::table('parent_category')->where('status',1)->get();
        $sub_cat=DB::table('product_sub_category')->where('status',1)->get();
        $social_media=DB::table('social_media')->where('status',1)->get();
        $slider=DB::table('sliders')->where('status',1)->get();
        $shop_detail=DB::table('shop_details')->where('id',1)->first();
        if (getenv('HTTP_X_FORWARDED_FOR')) {
        $ip_address = getenv('HTTP_X_FORWARDED_FOR');
        if ($first_ip_in_list = stristr($ip_address, ',', true)){
            $ip_address = $first_ip_in_list;
        }
        elseif (getenv('HTTP_X_REAL_IP')) {
            $ip_address = getenv('HTTP_X_REAL_IP');
        }
        else {
            $ip_address = $_SERVER['REMOTE_ADDR'] ?? '127.0.0.1';
        }
        // $ip_address = '103.246.242.18';
        $user_id="";
        if(Auth::guard('web')->check()){
            $user_id=Auth::guard('web')->user()->id;
        }
        $cart_count=DB::table('cart')->where('ip_address',$ip_address)->where('user_id',$user_id)->get();
        $wishlist_count=DB::table('wishlists')->where('ip_address',$ip_address)->where('user_id',$user_id)->get();
        return view('cod-mail',compact('parent_cat','sub_cat','social_media','slider','shop_detail','ip_address','user_id',
        'cart_count','wishlist_count')); 
    }
}
}
