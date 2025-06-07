<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <meta name="x-apple-disable-message-reformatting">
  <title></title>
  <!--[if mso]>
  <noscript>
    <xml>
      <o:OfficeDocumentSettings>
        <o:PixelsPerInch>96</o:PixelsPerInch>
      </o:OfficeDocumentSettings>
    </xml>
  </noscript>
  <![endif]-->
  <style>
    table, td, div, h1, p {font-family: Arial, sans-serif;}
    #border {
      border: 1px solid #dddddd;
      padding: 8px;
      border-collapse:collapse;
    }
  </style>
</head>
<body style="margin:0;padding:0;">
  <table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;background:#ffffff;">
    <tr>
      <td align="center" style="padding:0;">
        <table role="presentation" style="width:602px;border-collapse:collapse;border:1px solid #cccccc;border-spacing:0;text-align:left;">
          <tr>
            <td align="center" style="padding:40px 0 30px 0;background:#462328;">
              <img src="{{asset('public/frontend/healthy_belly_top_logo.png')}}" alt="" width="300" style="height:auto;display:block;" />
            </td>
          </tr>
          <tr>
            <td style="padding:36px 30px 42px 30px;">
              <table role="presentation" style="width:100%;border-collapse:collapse;border:1;border-spacing:0;">
                <tr>
                  <td>
                    <p style="margin:0 0 12px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;">
                        <label><b>Name:</b> {{$firstname}} {{$lastname}} </label><br>
                        <label><b>Email:</b> {{$email}}</label><br>
                        <label><b>Contact:</b> {{$contact}}</label><br>
                        <label><b>Address :</b> {{$address}}</label><br>
                        <label><b>City :</b> {{$city}}</label><br>
                        <label><b>State :</b> {{$state}}</label><br>
                        <label><b>Country :</b> {{$country}}</label><br>
                        <label><b>Pin Code:</b> {{$zip}}</label><br>
                    </p>
                  </td>
                  <td>
                    <p style="margin:0 0 12px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;">
                      <label><b>Invoice no:</b> {{$invoice_no}}</label><br>
                      <label><b>Payment Method:</b> {{$payment_method}}</label><br>
                      <label><b>Total Amount:</b> ₹ {{$total_amount}}</label><br>
                      <label><b>Order Status:</b> {{$order_status}}</label>
                    </p>
                  </td>
                </tr>
                <tr>
                <td id="border"><b>Product Name</b> </td>
                <td id="border"><b>Quantity</b> </td>
                <td id="border"><b>Price</b> </td>
              </tr>
              @foreach($product_detail as $product_details)
              <?php $product=DB::table('products')->where('id',$product_details->product_id)->first(); ?>
              <tr>
                <td id="border">{{$product->product_name}} - {{$product_details->weight}} {{$product_details->weight_unit}} {{$product_details->size_category}} {{$product_details->packed_size}}</td>
                <td id="border">{{$product_details->quantity}} </td>
                <td id="border">₹ {{$product_details->price}} </td>
              </tr>
              <?php $ship_charge=$product_details->shipping_charge; ?>
              @endforeach
              <tr>
                <td id="border" colspan="2"><b>Shipping Charge</b></td>
                <td id="border"><b>₹ {{$ship_charge}}</b></td>
              </tr>
              <tr>
                <td id="border" colspan="2"><b>Total Amount</b></td>
                <td id="border"><b>₹ {{$total_amount}}</b></td>
              </tr>
              </table>
            </td>
          </tr>
          <tr>
            <td style="padding:30px;background:#462328;">
              <table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;font-size:9px;font-family:Arial,sans-serif;">
                <tr>
                  <td style="padding:0;width:50%;" align="left">
                    <p style="margin:0;font-size:14px;line-height:16px;font-family:Arial,sans-serif; color:#ffffff;;">
                      &reg; {{ date('Y') }} Healthy Belly. All rights reserved.<br/>
                    </p>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
</body>
</html>