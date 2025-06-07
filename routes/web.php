<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/','innerController@index')->name('index');
Route::get('/product-detail/{id?}','innerController@product_detail')->name('product_detail');
Route::get('/product-list/{id?}','innerController@product_list')->name('product_list');
Route::get('/all-product-list/{id?}','innerController@all_product_list')->name('all_product_list');
Route::get('/search-product-list','innerController@search_product_list')->name('search_product_list');
Route::get('/products-list/{id?}','innerController@category_product_list')->name('category_product_list');
Route::get('/subcategory-products-list/{id?}','innerController@sub_category_product_list')->name('sub_category_product_list');
Route::get('/Cart','innerController@view_cart')->name('view_cart');
Route::get('/Wishlist','innerController@view_wishlist')->name('view_wishlist');
Route::get('/Contact-Us','innerController@contact_us')->name('contact_us');
Route::get('/About-Us','innerController@about_us')->name('about_us');
Route::get('/Refund-policy','innerController@refund_policy')->name('refund_policy');
Route::get('/Privacy-policy','innerController@privacy_policy')->name('privacy_policy');
Route::get('/Terms-of-Service','innerController@terms_service')->name('terms_service');
Route::get('/Faq','innerController@faq')->name('faq');
Route::get('/Shipping-policy','innerController@shipping_policy')->name('shipping_policy');
Route::get('/Thank-you','innerController@thank_you')->name('thank_you');
Route::get('/Thank-You','innerController@payment_thankyou')->name('payment_thankyou');

Route::get('/cod-mail','innerController@cod_mail')->name('cod_mail');

// Checkout Route
Route::get('/Checkout','CheckoutController@checkout_view')->name('checkout_view');
Route::post('save-temp-detail','CheckoutController@save_temp_detail')->name('save_temp_detail');

Route::get('remove-product','innerController@remove_product')->name('remove_product');
Route::get('minus-product','innerController@minus_product')->name('minus_product');
Route::get('plus-product','innerController@plus_product')->name('plus_product');
Route::get('remove-wishlist-product','innerController@remove_wishlist_product')->name('remove_wishlist_product');
Route::post('save-review','innerController@save_review')->name('save_review');
Route::get('Dashboard','innerController@user_dashboard')->name('user_dashboard');
Route::post('Save-changed-password','innerController@save_changed_password')->name('save_changed_password');
Route::post('Save-changed-new-password','innerController@save_changed_new_password')->name('save_changed_new_password');
Route::post('Update-user-detail','innerController@update_user_detail')->name('update_user_detail');
Route::post('Add-user-Address','innerController@add_user_address')->name('add_user_address');
Route::get('Edit-Address/{id?}','innerController@edit_user_address')->name('edit_user_address');
Route::post('Update-Address','innerController@update_user_address')->name('update_user_address');

Route::get('stripe', 'StripePaymentController@stripe')->name('stripe');
Route::post('stripe', 'StripePaymentController@stripePost')->name('stripe.post');

Route::post('/shiprocket/{order}','CheckoutController@shiprocket')->name('shiprocket');


Route::get('Order-Description/{id?}','innerController@user_order_description')->name('user_order_description');

Route::get('/filter/price','innerController@filterPrice')->name('price.filter');

Route::get('our-story', 'innerController@our_story')->name('our_story');

Auth::routes();

Route::get('auth/google', 'Auth\GoogleController@redirectToGoogle');
Route::get('auth/google/callback', 'Auth\GoogleController@handleGoogleCallback');

Route::get('login/facebook', 'Auth\FacebookController@redirectToFacebook');
Route::get('login/facebook/callback', 'Auth\FacebookController@handleFacebookCallback');

Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm')->name('admin_login');
Route::get('/login/staffmember', 'Auth\LoginController@showStaffmemberLoginForm')->name('staffmember_login');
Route::get('/register/admin', 'Auth\RegisterController@showAdminRegisterForm');
Route::get('/register/staffmember', 'Auth\RegisterController@showStaffmemberRegisterForm');

Route::post('/login/admin', 'Auth\LoginController@adminLogin');
Route::post('/login/staffmember', 'Auth\LoginController@staffmemberLogin');
Route::post('/register/admin', 'Auth\RegisterController@createAdmin');
Route::post('/register/staffmember', 'Auth\RegisterController@createStaffmember');

Route::view('/home', 'home')->middleware('auth');
Route::get('/admin', 'AdminController@admin_dashboard')->name('admin_dashboard');
Route::get('/staffmember', 'StaffController@staffmember_dashboard')->name('staffmember_dashboard');
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// admin routes
Route::group(['middleware'=>['protectedPage']],function(){ 
  Route::group(['prefix'=>'admin','as'=>'admin.'],function(){
      // shop details routes
      Route::get('shop-details','Admin\CmsController@shop_details')->name('shop_details');
      Route::post('shop-details','Admin\CmsController@update_shop_details')->name('update_shop_details');

      // Home page banner routes
      Route::get('list-banners','Admin\CmsController@list_banner')->name('list_banner');
      Route::get('add-banners','Admin\CmsController@add_banner')->name('add_banner');
      Route::post('save-banners','Admin\CmsController@save_banner')->name('save_banner');
      Route::get('edit-banners/{id?}','Admin\CmsController@edit_banner')->name('edit_banner');
      Route::post('update-banners/{id?}','Admin\CmsController@update_banner')->name('update_banner');
      Route::get('delete-banners/{id?}','Admin\CmsController@delete_banner')->name('delete_banner');
      Route::get('banners-status','Admin\CmsController@banner_status')->name('banner_status');

      //Social Media routes
      Route::get('list-socialMedia','Admin\CmsController@list_socialmedia')->name('list_socialmedia');
      Route::get('edit-socialMedia/{id?}','Admin\CmsController@edit_socialmedia')->name('edit_socialmedia');
      Route::post('update-socialMedia/{id?}','Admin\CmsController@update_socialmedia')->name('update_socialmedia');
      Route::get('delete-socialMedia/{id?}','Admin\CmsController@delete_socialmedia')->name('delete_socialmedia');
      Route::get('socialMedia-status','Admin\CmsController@socialmedia_status')->name('socialmedia_status');

      // Parent category routes
      Route::get('list-parent-category','Admin\ProductController@list_parent_category')->name('list_parent_category');
      Route::get('add-parent-category','Admin\ProductController@add_parent_category')->name('add_parent_category');
      Route::post('save-parent-category','Admin\ProductController@save_parent_category')->name('save_parent_category');
      Route::get('edit-parent-category/{id?}','Admin\ProductController@edit_parent_category')->name('edit_parent_category');
      Route::post('update-parent-category','Admin\ProductController@update_parent_category')->name('update_parent_category');
      Route::get('delete-parent-category/{id?}','Admin\ProductController@delete_parent_category')->name('delete_parent_category');
      Route::get('parent-category-status','Admin\ProductController@parent_category_status')->name('parent_category_status');

      // Sub category routes
      Route::get('list-sub-category','Admin\ProductController@list_sub_category')->name('list_sub_category');
      Route::get('add-sub-category','Admin\ProductController@add_sub_category')->name('add_sub_category');
      Route::post('save-sub-category','Admin\ProductController@save_sub_category')->name('save_sub_category');
      Route::get('edit-sub-category/{id?}','Admin\ProductController@edit_sub_category')->name('edit_sub_category');
      Route::post('update-sub-category','Admin\ProductController@update_sub_category')->name('update_sub_category');
      Route::get('delete-sub-category/{id?}','Admin\ProductController@delete_sub_category')->name('delete_sub_category');
      Route::get('sub-category-status','Admin\ProductController@sub_category_status')->name('sub_category_status');

      // products routes
      Route::get('list-product','Admin\ProductController@list_product')->name('list_product');
      Route::get('add-product','Admin\ProductController@add_product')->name('add_product');
      Route::post('save-product','Admin\ProductController@save_product')->name('save_product');
      Route::get('edit-product/{id?}','Admin\ProductController@edit_product')->name('edit_product');
      Route::post('update-product','Admin\ProductController@update_product')->name('update_product');
      Route::get('delete-product/{id?}','Admin\ProductController@delete_product')->name('delete_product');
      Route::get('product-status','Admin\ProductController@product_status')->name('product_status');
      Route::get('product-bestseller-status','Admin\ProductController@product_bestseller_status')->name('product_bestseller_status');
      Route::get('product-newarrival-status','Admin\ProductController@product_newarrival_status')->name('product_newarrival_status');
      Route::get('product-available-status','Admin\ProductController@product_available_status')->name('product_available_status');

      Route::get('get-product-sub-category/{id?}','Admin\ProductController@get_product_sub_category')->name('get_product_sub_category');

      // Home Advertisement routes
      Route::get('list-advertisement','Admin\CmsController@list_advertisement')->name('list_advertisement');
      Route::get('add-advertisement','Admin\CmsController@add_advertisement')->name('add_advertisement');
      Route::post('save-advertisement','Admin\CmsController@save_advertisement')->name('save_advertisement');
      Route::get('edit-advertisement/{id?}','Admin\CmsController@edit_advertisement')->name('edit_advertisement');
      Route::post('update-advertisement','Admin\CmsController@update_advertisement')->name('update_advertisement');
      Route::get('delete-advertisement/{id?}','Admin\CmsController@delete_advertisement')->name('delete_advertisement');
      Route::get('advertisement-status','Admin\CmsController@advertisement_status')->name('advertisement_status');

      //Testimonial routes
      Route::get('list-Testimonial','Admin\CmsController@list_testimonial')->name('list_testimonial');
      Route::get('add-Testimonial','Admin\CmsController@add_testimonial')->name('add_testimonial');
      Route::post('Save-Testimonial','Admin\CmsController@save_testimonial')->name('save_testimonial');
      Route::get('delete-Testimonial/{id?}','Admin\CmsController@delete_testimonial')->name('delete_testimonial');

      //Product Image routes
      Route::get('list-Product-Image','Admin\ProductController@list_product_image')->name('list_product_image');
      Route::get('add-Product-Image','Admin\ProductController@add_product_image')->name('add_product_image');
      Route::post('Save-Product-Image','Admin\ProductController@save_product_image')->name('save_product_image');
      Route::get('delete-Product-Image/{id?}','Admin\ProductController@delete_product_image')->name('delete_product_image');
      Route::get('product-image-status','Admin\ProductController@product_image_status')->name('product_image_status');

      // About us Routes
      Route::get('About-Us','Admin\CmsController@about_us')->name('about_us');
      Route::post('Update-About-Us','Admin\CmsController@update_about_us')->name('update_about_us');

      //Product Variant routes
      Route::get('list-Product-Variant','Admin\ProductController@list_product_variant')->name('list_product_variant');
      Route::get('add-Product-Variant','Admin\ProductController@add_product_variant')->name('add_product_variant');
      Route::post('Save-Product-Variant','Admin\ProductController@save_product_variant')->name('save_product_variant');
      Route::get('Edit-Product-Variant/{id?}','Admin\ProductController@edit_product_variant')->name('edit_product_variant');
      Route::post('Update-Product-Variant','Admin\ProductController@update_product_variant')->name('update_product_variant');
      Route::get('Delete-Product-Variant/{id?}','Admin\ProductController@delete_product_variant')->name('delete_product_variant');
      Route::get('product-variant-status','Admin\ProductController@product_variant_status')->name('product_variant_status');

      //Chefs Routes
      Route::get('List-Best-chefs','Admin\CmsController@list_best_chef')->name('list_best_chef');
      Route::get('Add-Best-chefs','Admin\CmsController@add_best_chef')->name('add_best_chef');
      Route::post('save-Best-chefs','Admin\CmsController@save_best_chef')->name('save_best_chef');
      Route::get('chef-status','Admin\CmsController@chef_status')->name('chef_status');
      Route::get('Chef-Delete/{id?}','Admin\CmsController@delete_chef')->name('delete_chef');

      //Review Routes
      Route::get('All-Reviews','Admin\CmsController@all_review')->name('all_review');
      Route::get('Review-status','Admin\CmsController@review_status')->name('review_status');
      Route::get('delete-reviews/{id?}','Admin\CmsController@delete_review')->name('delete_review');

      Route::get('User-Enquiry','Admin\CmsController@user_enquiry')->name('user_enquiry');

      //Order Management
      Route::get('list-all-order','Admin\CmsController@list_all_order')->name('list_all_order');
      Route::post('update-order-status','Admin\CmsController@update_order_status')->name('update_order_status');
      Route::get('order-description/{id?}','Admin\CmsController@order_description')->name('order_description');
  });
});

Route::get('price-weight','innerController@price_weight')->name('price_weight');
Route::get('all-price-weight','innerController@all_price_weight')->name('all_price_weight');
Route::post('related-product-weights','innerController@related_product_weights')->name('related_product_weights');
Route::post('product-detail-weights','innerController@product_detail_weight')->name('product_detail_weight');
Route::post('category-product-weights','innerController@category_product_weights')->name('category_product_weights');
Route::post('add-product','innerController@add_product')->name('add_product');
Route::post('add-to-wishlist','innerController@add_to_wishlist')->name('add_to_wishlist');
Route::post('add-wishlist-product','innerController@add_wishlist_product')->name('add_wishlist_product');
Route::post('filter-product-data','innerController@filter_product_data')->name('filter_product_data');
Route::post('category-filter-product-data','innerController@category_filter_product_data')->name('category_filter_product_data');
Route::post('search-product','innerController@search_product')->name('search_product');
Route::get('select-address-type','innerController@select_address_type')->name('select_address_type');

Route::post('User-enquiry','innerController@user_enquiry')->name('user_enquiry');

Route::get('/clear', function() {
 
  Artisan::call('cache:clear');
  Artisan::call('config:clear');
  Artisan::call('config:cache');
  Artisan::call('view:clear');
 
 
  return "Cleared!";
 
});
