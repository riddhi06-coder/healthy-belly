<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Stripe;
use DB;
use Mail;
use Auth;

class StripePaymentController extends Controller
{
    
    public function filterPrice(Request $request)
    {
    $minPrice = $request->input('min_price');
    $maxPrice = $request->input('max_price');
    
    $products = DB::table('products')
    ->where('price', '>=', $minPrice)
    ->where('price', '<=', $maxPrice)
    ->get();
    
    
    
    
    return view('your-view', compact('products', 'minPrice', 'maxPrice'));
    }

    public function stripe()
    {
    	$parent_cat=DB::table('parent_category')->where('status',1)->get();
        $sub_cat=DB::table('product_sub_category')->where('status',1)->get();
        $social_media=DB::table('social_media')->where('status',1)->get();
        $slider=DB::table('sliders')->where('status',1)->get();
        $advertise=DB::table('advertisements')->where('status',1)->where('section','Main')->get();
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
        return view('stripe',compact('parent_cat','sub_cat','social_media','slider','advertise','shop_detail',
        'cart_count','wishlist_count'));
    }

    public function stripePost(Request $request)
    {
        $success=0;
        try{
    // 	$amount=$request->input('total_amt');
    //     $currency=$request->input('currency');
    //     $ip_address=$request->input('ip_address');
    //     $user_id=$request->input('user_id');
    //     Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    //     $charge=Stripe\Charge::create ([
    //             "amount" => $amount * 100,
    //             "currency" => "INR",
    //             "source" => $request->stripeToken,
    //             "description" => "shikha@matrixbricks.com" 
    //     ]);
  
    //     Session::flash('success', 'Payment successful!');
    //     $success = 1;
    //     // parent table update
        $invoice_no="M-".rand();
        
       
        $parent_data=array('ip_address'=> $request->ip_address,'user_id'=>$request->user_id,'total_amount'=>$request->amount,'trans_id'=>$request->payment_id,'order_status'=>'process','invoice_no'=>$invoice_no);
        $p_id=DB::table('parent_order_table')->insertGetId($parent_data);
          
        // child table update
        $raw=DB::table('temp_orderinfo_table')->where('user_id',$request->user_id)->get();
        
        foreach($raw as $raw_data){
            $data=array('firstname'=>$raw_data->firstname,'lastname'=>$raw_data->lastname,'email'=>$raw_data->email,
            'phone'=>$raw_data->phone,'address'=>$raw_data->address,'country'=>$raw_data->country,'state'=>$raw_data->state,
            'city'=>$raw_data->city,'zip'=>$raw_data->zip,'order_notes'=>$raw_data->order_notes,'total_price'=>$raw_data->total_price,
            'ip_address'=>$raw_data->ip_address,'price'=>$raw_data->price,'product_id'=>$raw_data->product_id,'total_price'=>$raw_data->total_price,
            'quantity'=>$raw_data->quantity,'user_id'=>$raw_data->user_id,'parent_id'=>$p_id,'trans_id'=>$request->payment_id,'weight'=>$raw_data->weight,'weight_unit'=>$raw_data->weight_unit,'size_category'=>$raw_data->size_category,'packed_size'=>$raw_data->packed_size,'payment_option'=>$raw_data->payment_option,'shipping_charge'=>$raw_data->shipping_charge);
            DB::table('child_order_table')->insert($data);
        }

        
        // send Mail
        // $user_detail=DB::table('users')->where('id',$user_id)->first();
        $user_detail=DB::table('temp_orderinfo_table')->where('user_id',$request->user_id)->first();
        $email_id=$user_detail->email;
        $mail_data=array('product_detail'=>$raw,'invoice_no'=>$invoice_no,'transaction_id'=>$request->payment_id,'order_status'=>'process','total_amount'=>$request->amount,'firstname'=>$user_detail->firstname,'lastname'=>$user_detail->lastname,'email'=>$user_detail->email,'address'=>$user_detail->address,'country'=>$user_detail->country,'state'=>$user_detail->state,'city'=>$user_detail->city,'zip'=>$user_detail->zip,'contact'=>$user_detail->phone);
        Mail::send('payment-success-mail', $mail_data, function($message) use ($email_id) {
            $message->to($email_id, 'Healthy Belly - Order Confirm')->subject
            ('Healthy Belly - Order Confirm');
            $message->from($email_id);
        });

        //delete cart and temp_detail
        DB::table('cart')->where('ip_address',$request->ip_address)->delete();
        DB::table('temp_orderinfo_table')->where('user_id',$request->user_id)->delete();

        $transaction=$request->payment_id;
        return redirect()->route('payment_thankyou');
     }
     catch(Stripe_CardError $e) {
          $error1 = $e->getMessage();
        } catch (Stripe_InvalidRequestError $e) {
          // Invalid parameters were supplied to Stripe's API
          $error2 = $e->getMessage();
        } catch (Stripe_AuthenticationError $e) {
          // Authentication with Stripe's API failed
          $error3 = $e->getMessage();
        } catch (Stripe_ApiConnectionError $e) {
          // Network communication with Stripe failed
          $error4 = $e->getMessage();
        } catch (Stripe_Error $e) {
          // Display a very generic error to the user, and maybe send
          // yourself an email
          $error5 = $e->getMessage();
        } catch (Exception $e) {
          // Something else happened, completely unrelated to Stripe
          $error6 = $e->getMessage();
        }
        if ($success!=1)
        {
            $error= $error1.' '.$error2.' '.$error3.' '.$error4.' '.$error5.' '.$error6;
            
            return view('error',compact('error'));
        }
    }
}
