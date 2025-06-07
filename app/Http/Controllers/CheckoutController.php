<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

use DB;
use Mail;
use Session;
use Auth;

class CheckoutController extends Controller
{
    public function checkout_view(){
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
        $address=DB::table('user_address')->where('user_id',$user_id)->get();
        $user_detail=DB::table('users')->where('id',$user_id)->first();
        $cart_count=DB::table('cart')->where('ip_address',$ip_address)->where('user_id',$user_id)->get();
        $cart_product=DB::table('cart')->where('ip_address',$ip_address)->where('user_id',$user_id)->get();
        $wishlist_count=DB::table('wishlists')->where('ip_address',$ip_address)->where('user_id',$user_id)->get();
        return view('checkout',compact('parent_cat','sub_cat','social_media','slider','shop_detail',
        'cart_count','cart_product','wishlist_count','user_detail','address'));
    }

    public function save_temp_detail(Request $request){

        $this->validate($request,[
    		'first_name'=>'required',
            'last_name'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'address'=>'required',
            'country'=>'required',
            'state'=>'required',
            'city'=>'required',
            'pincode'=>'required',
    	]);
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
        $user_id=$request->user_id;
        $amount=$request->total_amt;
        $cart_product=DB::table('cart')->where('ip_address',$ip_address)->where('user_id',$user_id)->get();
        foreach($cart_product as $cart_products){
            $data=array('firstname'=>$request->first_name,'lastname'=>$request->last_name,'email'=>$request->email,
	        'phone'=>$request->phone,'address'=>$request->address,'country'=>$request->country,'state'=>$request->state,
	        'city'=>$request->city,'zip'=>$request->pincode,'order_notes'=>$request->note,'total_price'=>$request->total_amt,
	        'ip_address'=>$ip_address,'price'=>$cart_products->price,'shipping_charge'=>$request->shipping_charge,'product_id'=>$cart_products->product_id,
	        'quantity'=>$cart_products->quantity,'user_id'=>$request->user_id,'payment_option'=>$request->paymentMethod,'weight'=>$cart_products->weight,'weight_unit'=>$cart_products->weight_unit,'size_category'=>$cart_products->size_category,'packed_size'=>$cart_products->packed_size);
            
            $last_id=DB::table('temp_orderinfo_table')->insertGetId($data);
            
          
        }
        $payment_method=DB::table('temp_orderinfo_table')->where('id',$last_id)->first();
        if($payment_method->payment_option=='Online'){
        return view('razorpay',compact('ip_address','amount','user_id'));
        }else{
            $invoice_no="M-".rand();
            $parent_data=array('ip_address'=>$ip_address,'user_id'=>$user_id,'total_amount'=>$amount,'order_status'=>'process','invoice_no'=>$invoice_no);
            $p_id=DB::table('parent_order_table')->insertGetId($parent_data);

            // child table update
            $raw=DB::table('temp_orderinfo_table')->where('user_id',$user_id)->get();
            foreach($raw as $raw_data){
                $data=array('firstname'=>$raw_data->firstname,'lastname'=>$raw_data->lastname,'email'=>$raw_data->email,
                'phone'=>$raw_data->phone,'address'=>$raw_data->address,'country'=>$raw_data->country,'state'=>$raw_data->state,
                'city'=>$raw_data->city,'zip'=>$raw_data->zip,'order_notes'=>$raw_data->order_notes,'total_price'=>$raw_data->total_price,
                'ip_address'=>$raw_data->ip_address,'price'=>$raw_data->price,'product_id'=>$raw_data->product_id,'total_price'=>$raw_data->total_price,
                'quantity'=>$raw_data->quantity,'user_id'=>$raw_data->user_id,'parent_id'=>$p_id,'weight'=>$raw_data->weight,'weight_unit'=>$raw_data->weight_unit,'size_category'=>$raw_data->size_category,'packed_size'=>$raw_data->packed_size,'payment_option'=>$raw_data->payment_option,'shipping_charge'=>$raw_data->shipping_charge);
                DB::table('child_order_table')->insert($data);
            }


            // send Mail
            // $user_detail=DB::table('users')->where('id',$user_id)->first();
            $user_detail=DB::table('temp_orderinfo_table')->where('user_id',$user_id)->first();
            $email_id=$user_detail->email;
            $mail_data=array('product_detail'=>$raw,'invoice_no'=>$invoice_no,'payment_method'=>'Cash On Delivery','order_status'=>'process','total_amount'=>$amount,'firstname'=>$user_detail->firstname,'lastname'=>$user_detail->lastname,'email'=>$user_detail->email,'address'=>$user_detail->address,'country'=>$user_detail->country,'state'=>$user_detail->state,'city'=>$user_detail->city,'zip'=>$user_detail->zip,'contact'=>$user_detail->phone);
            Mail::send('cod-mail', $mail_data, function($message) use ($email_id) {
                $message->to($email_id, 'Healthy Belly - Order Confirm')->subject
                ('Healthy Belly - Order Confirm');
                $message->from($email_id);
            });

            //delete cart and temp_detail
            DB::table('cart')->where('ip_address',$ip_address)->delete();
            DB::table('temp_orderinfo_table')->where('user_id',$user_id)->delete();

            $transaction="Cash On delivery";
            return redirect()->route('payment_thankyou');
        }
    }
        
                public function razorpay_order(Request $request)
        {
            $user_id = Auth::user()->id;
            $amount = Session::get('numberPrice');
            $order_id=Session::get('order_ids');  
             $order_details = DB::table('orders_dirrect')->where('status',0)->where('order_id',$order_id)->get();
             
             if(count($order_details))
              {

               DB::table('orders_dirrect')->where('status',0)->where('order_id',$order_id)->delete();

             }
               
             if($request->different=='on')
             {

             $orderdetails= array(
            'fk_user_id'=>Auth::user()->id,
            'order_id'=>$order_id,
            'full_name'=>$request->full_name,
            'number'=>$request->number,
            'whatapp_number'=>$request->whatapp_number,
            'pincode'=>$request->pincode,
            'house_no'=>$request->house_no,
            'street_colony'=>$request->street_colony,
            'locality_town'=>$request->locality_town,
            'landmark'=>$request->landmark,
            'gst_number'=>$request->gst_number,
            'pan_number'=>$request->pan_number,
            'status'=>0,
            'created_at'=>date('Y-m-d h:i:s'),
            'full_name_ship'=>$request->full_name_ship,
            'number_ship'=>$request->number_ship,
            'pincode_ship'=>$request->pincode_ship,
            'house_no_ship'=>$request->house_no_ship,
            'street_colony_ship'=>$request->street_colony_ship,
            'locality_town_ship'=>$request->locality_town_ship,
            'landmark_ship'=>$request->landmark_ship,
            'gst_number_ship'=>$request->gst_number_ship,
            'pan_number_ship'=>$request->pan_number_ship,
          );
           
        }else{

            $orderdetails= array(
                'fk_user_id'=>Auth::user()->id,
                'order_id'=>$order_id,
                'full_name'=>$request->full_name,
                'number'=>$request->number,
                'whatapp_number'=>$request->whatapp_number,
                'pincode'=>$request->pincode,
                'house_no'=>$request->house_no,
                'street_colony'=>$request->street_colony,
                'locality_town'=>$request->locality_town,
                'landmark'=>$request->landmark,
                'gst_number'=>$request->gst_number,
                'pan_number'=>$request->pan_number,
                'status'=>0,
                'created_at'=>date('Y-m-d h:i:s'),
                'full_name_ship'=>$request->full_name,
                'number_ship'=>$request->number,
                'pincode_ship'=>$request->pincode,
                'house_no_ship'=>$request->house_no,
                'street_colony_ship'=>$request->street_colony,
                'locality_town_ship'=>$request->locality_town,
                'landmark_ship'=>$request->landmark,
                'gst_number_ship'=>$request->gst_number,
                'pan_number_ship'=>$request->pan_number,
              );
    
        }
      
              DB::table('orders_dirrect')->insert($orderdetails);
      

            return view('razorpay-order', compact('user_id','amount'));
        }
        
        public function payment_success_order($user_id, $payment_id)
        {

            if(isset($payment_id))
            {
                $order_id=Session::get('order_ids');   


                    $datas = array(
                        'status'=>1,

                    );
                    $result=DB::table('orders_details_dirrects')
                    ->where(['fk_order_id'=>$order_id])
                    ->update($datas);

         

                    $checkExectiveID= DB::table('orders_details_dirrects')
                    ->select('*')
                    ->where('fk_order_id',$order_id)->where('status',1)
                    ->get()
                    ->toArray();

                    
                    if($checkExectiveID[0]->exective_id!="")
                    {
                       
                        $exectieID=$checkExectiveID[0]->exective_id;

                    }else{ 
                       
                        $exectieID="";
                       
                    }


                    $data = array(
                        'status'=>1,
                        'exective_id'=>$exectieID,
                        // 'country_symbol'=>Session::get('curreny'),    
                        'payment_id_rozarpay'=>$payment_id,
                        'final_price'=>Session::get('numberPrice'),
                        'coupon_discount'=>Session::get('discountCoupons')
                    );
                    $result=DB::table('orders_dirrect')
                    ->where(['order_id'=>$order_id])
                    ->update($data);
                

                    $checkCoupon= DB::table('orders_details_dirrects')
                    ->select('*')
                    ->where('fk_order_id',$order_id)->where('status',1)
                    ->get()
                    ->toArray();
               
                    foreach($checkCoupon as $checkCoupon)
                    {
                    
                    $product= DB::table('products_api')
                    ->select('*')
                    ->where('SLNO',$checkCoupon->product_id)->where('status',1)
                    ->get();

                     $finalStock=$product[0]->PCS-$checkCoupon->product_quanlity;
                    
                    $data = array(
                        'PCS'=>$finalStock,
                    );

                    DB::table('products_api')
                    ->where('SLNO',$checkCoupon->product_id)->where('status',1)
                    ->limit(1)
                    ->update($data);

                    }
$order = DB::table('orders_dirrect')
    ->where('order_id', $order_id)
    ->first();

$orderDetails = DB::table('orders_details_dirrects')
    ->where('fk_order_id', $order_id)
    ->get();

$products = [];
$price = [];


foreach ($orderDetails as $detail) {
    
    $price[] = $detail->price; // Assuming ITEM is the field you need
    
    $product = DB::table('products_api')
        ->where('SLNO', '=', $detail->product_id)
        ->first();
    
    if ($product) {
        $products[] = $product->ITEM; // Assuming ITEM is the field you need
        
    }
}

Mail::to(Auth::user()->email)->send(new PaymentMail($order, $products,$price));



    $api_key = '4627CAF7EE6E5B'; 
    $contacts = $order->number;
    $from = 'CJMART';
    $sms_text = urlencode('Dear '  .Auth::user()->name.', we confirmed receiving your order ' .$order_id. ' of Rs. '.$order->final_price.' on challani portal. We will advice you soon on the shipment - CJMART.');
    $template_id= "1007165872498725859";
    
    //Submit to server
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL, "http://pro.icubesms.com/app/smsapi/index.php");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, "key=".$api_key."&routeid=3&type=text&contacts=".$contacts."&senderid=".$from."&msg=".$sms_text."&template_id=".$template_id);
    $response = curl_exec($ch);
    
    curl_close($ch);

                    session()->forget('order_ids');
                    session()->forget('numberPrice');
                    session()->forget('discountCoupons');
                 
                    return redirect('/profile')->with('successPayment','Payment success');
        }
            else
            {
                return redirect()->back()->with('Error','Payment failed');
            }   
            
            
        }

        public function payment_success($user_id, $payment_id)
        {
            $transaction_id = $payment_id;

            $fetch_user_details = DB::table('users')
						        ->where('id','=',$user_id)
                                ->first();
                                
            $success = true;

            $error = "Payment Failed";

            

            if (isset($transaction_id))
            {
                $check_already_active_scheme= DB::table('scheme_buy_user')
                ->select('*')
                ->where('user_id',Auth::user()->id)->where('scheme_id',session('id'))
                ->get();
    
                if(count($check_already_active_scheme))
                {
   
                    $last_id=$check_already_active_scheme[0]->id;
                  
                    $scheme_record= array(
                        'scheme_buy_user_id'=>$last_id,
                        'payment_id'=>$transaction_id,
                        'created_at'=>date('Y-m-d h:i:s'),
                        'updated_at'=>date('Y-m-d h:i:s'),
                    );
                  
                    DB::table('scheme_buy_user_payment')->insert($scheme_record);

                }else{

                    $scheme= array(
                        'user_id'=>Auth::user()->id,
                        'scheme_id'=>session('id'),
                        'created_at'=>date('Y-m-d h:i:s'),
                        'updated_at'=>date('Y-m-d h:i:s'),
                    );
                  
                    $last_id=DB::table('scheme_buy_user')->insertGetId($scheme);

                        $scheme_record= array(
                            'scheme_buy_user_id'=>$last_id,
                            'payment_id'=>$transaction_id,
                            'created_at'=>date('Y-m-d h:i:s'),
                            'updated_at'=>date('Y-m-d h:i:s'),
                        );
                    
                        DB::table('scheme_buy_user_payment')->insert($scheme_record);
                        
                    
                }
    
                
                return view('payment-success');
                
            }
            else
            {
                return redirect()->back()->with('Error','Payment failed');
            }
        }

        public function payment_fail($user_id)
        {
            $fetch_user_details = DB::table('users')
						        ->where('id','=',$user_id)
                                ->first();
                                
            $fetch_basic_details    = DB::table('basic_details')
						            ->where('id','=','1')
                                    ->first();
                                    
            if($fetch_user_details->role == 2)
            {
                $amount = $fetch_basic_details->service_provider_amount;
            }
            else if($fetch_user_details->role == 3)
            {
                $amount = $fetch_basic_details->service_seeker_amount;
            }

            //  Insert User Transaction History
            $insert_values=array('user_id'=>$user_id,'amount'=>$amount,'remark'=>'Payment Failed');

            $insert_query   = DB::table('user_transaction_history')
                            ->insert($insert_values);

            return view('payment-failed');
        }
        
        
public function shiprocket($orderId)
{
    $response = Http::withHeaders([
        'Content-Type' => 'application/json'
    ])->post('https://apiv2.shiprocket.in/v1/external/auth/login', [
        'email' => 'shikha@matrixbricks.com',
        'password' => 'Shikha@123',
    ]);

    if ($response->failed()) {
        throw new \Exception('Failed to authenticate with Shiprocket: ' . $response->body());
    }

    $authData = $response->json();
    if (!isset($authData['token'])) {
        throw new \Exception('Failed to get Shiprocket token: ' . $authData['message']);
    }

    $token = $authData['token'];
    $expiresIn = $authData['expires_in'] ?? 3600;

    // Store token and expiration time in session
    Session::put('shiprocket_token', $token);
    Session::put('shiprocket_token_expiry', now()->addSeconds($expiresIn));

    // Call createShiprocketOrder with the obtained token
    return $this->createShiprocketOrder($orderId);
}

public function createShiprocketOrder($orderId)
{

    $token = Session::get('shiprocket_token');
    $expiresIn = Session::get('shiprocket_token_expiry');

    if (!$token || now()->greaterThan($expiresIn)) {
        $token = $this->shiprocket($orderId);
    }
    
      $order = DB::table('parent_order_table')->where('id', $orderId)->first();


    if (!$order) {
        return back()->with('error', 'Order not found.');
    }


    $orderItems = DB::table('child_order_table')->where('parent_id', $orderId)->get();
    $orderItems1 = DB::table('child_order_table')->where('parent_id', $orderId)->first();

    if (!$orderItems1) {
        return back()->with('error', 'Order items not found.');
    }

    // Assuming order data is fetched from the database using $orderId
     $orderData = [
        "order_id" => $order->id,
        "order_date" => date('Y-m-d', strtotime($order->created_at)), // Ensure correct format
        "pickup_location" => "Primary",  // Static value, adjust if needed
        "channel_id" => "",  // Static value, adjust if needed
        "comment" => $orderItems1->order_notes,
        "billing_customer_name" => $orderItems1->firstname,
        "billing_last_name" => $orderItems1->lastname,
        "billing_address" => $orderItems1->address,
        "billing_address_2" => $orderItems1->address,
        "billing_city" => $orderItems1->city,
        "billing_pincode" => $orderItems1->zip,
        "billing_state" => $orderItems1->state,
        "billing_country" => $orderItems1->country,
        "billing_email" => $orderItems1->email,
        "billing_phone" => $orderItems1->phone,
        "shipping_is_billing" => true,
        "order_items" => $orderItems->map(function ($item) {
            return [
                "name" => "Product Name", // Placeholder, replace with actual product name
                "sku" => "sku_code", // Placeholder, replace with actual SKU
                "units" => $item->quantity,
                "selling_price" => $item->price,
                "discount" => "",
                "tax" => "",
                "hsn" => "1234" // Placeholder, replace with actual HSN code
            ];
        })->toArray(),
        "payment_method" => $orderItems1->payment_option == 'Online' ? 'Prepaid' : 'COD',
        "shipping_charges" => $orderItems1->shipping_charge,
        "giftwrap_charges" => 0,
        "transaction_charges" => 0,
        "total_discount" => 0,
        "sub_total" => $orderItems1->total_price,
        "length" => 10, // Placeholder, replace with actual length
        "breadth" => 10, // Placeholder, replace with actual breadth
        "height" => 10, // Placeholder, replace with actual height
        "weight" => $orderItems1->weight, // Ensure you fetch this value from the database
    ];


    $response = Http::withHeaders([
        'Content-Type' => 'application/json',
        'Authorization' => 'Bearer ' . $token,
    ])->post('https://apiv2.shiprocket.in/v1/external/orders/create/adhoc', $orderData);

    if ($response->failed()) {
        throw new \Exception('Failed to create Shiprocket order: ' . $response->body());
    }

    return $response->json();
}


}