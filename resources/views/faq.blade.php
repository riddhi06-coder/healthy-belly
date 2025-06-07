@extends('layouts.header')
@section('content')
<section class="inner-banner-about">
    <div class="black-layer">
    <div class="container">
        <div class="inner-banner-title">
        <h2>FAQ's</h2>
        </div>
        <div class="breadcrumb-wrap">
        <ul>
            <li><a href="{{route('index')}}">Home</a></li>
            <li class="active"><a href="#">FAQ's</a></li>
        </ul>
        </div>
    </div>
    </div>
</section>
<section class="faq-sec pattern-bg">
    <div class="container">
    <div class="row">
        <div class="heading text-center">
        <h4>FAQ's</h4>
        <h3>Frequently Asked Question</h3>
        </div>
        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingOne">
                        <h4 class="panel-title">
                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                When will I receive my order?

                            </a>
                        </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                        <div class="panel-body">
                            <p>We have updated our delivery terms please click on DELIVERY INFORMATION on the homepage. If you order before 12pm in UK then you will receive your order next working day by courier between 8am and 6pm. A signature is required on delivery. If you think you may not be in to receive delivery, please specify any special instructions to the courier in the comments/message section of your order i.e. leave with a neighbour. If no one is available to accept delivery, or if goods become unsuitable as a result of non-delivery we cannot accept liability. The courier will leave a "calling card" at the recipient address and it then becomes the recipient's responsibility to contact the courier company to re-arrange a suitable re-delivery time and date. Although next delivery is available as an option, we strongly recommend placing your order as soon as possible and selecting your preferred delivery date, especially during the festive periods such as Ramadan, Eid, Diwali and Christmas where it is not always possible to offer this service. If you know your recipient is not at home during working hours, we do recommend that we deliver to a business address. Orders placed after 12pm are dispatched the next day for customers to receive the day after. Orders placed before 12pm on a Friday will be delivered the following Monday between 8am and 6pm. If you require a Saturday delivery please select the Saturday Delivery option in your shopping cart. Orders placed after 1pm on a Friday will be delivered on the following Tuesday. Please be aware that during the Christmas period, Valentines and Easter, courier companies will not always be able to deliver items for the next day, so we recommend selecting a delivery date one day before the goods are required to avoid disappointment. </p>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingTwo">
                        <h4 class="panel-title">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                How can you guarantee I will receive fresh sweets in good condition?

                            </a>
                        </h4>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                        <div class="panel-body">
                            <p>We only use freshly made sweets that have been carefully prepared and packaged at our factory for online orders. The contents of each order is then placed in bubble-wrapped double-layered cartons to ensure your sweets reach you in optimum condition.

</p>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingThree">
                        <h4 class="panel-title">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                What are the delivery charges?

                            </a>
                        </h4>
                    </div>
                    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                        <div class="panel-body">
                            <p>We offer a next working day door to door courier service in the UK. Charges for orders weighing up to 10kg (inc packaging) in England, Wales and most parts of Scotland begin from £5.50, Northern Ireland is £14.99. We also offer an excellent service to mainland Europe using DPD Global Express Parcel service.

</p>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="heading4">
                        <h4 class="panel-title">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse4" aria-expanded="false" aria-controls="collapse4">
                                Do you use artificial sweeteners in your sweets?


                            </a>
                        </h4>
                    </div>
                    <div id="collapse4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading4">
                        <div class="panel-body">
                            <p>All of The Mithai Box's sweets are completely free from any artificial sweeteners. We only use premium quality, pure ingredients to ensure the unique taste for which The Mithai Box is world famous.



</p>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="heading5">
                        <h4 class="panel-title">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse5" aria-expanded="false" aria-controls="collapse5">
                                Are your products suitable for vegetarians?


                            </a>
                        </h4>
                    </div>
                    <div id="collapse5" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading6">
                        <div class="panel-body">
                            <p>Yes they are. All of The Mithai Box's products on this website and in our own stores are completely free from any Animal fats.



</p>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="heading6">
                        <h4 class="panel-title">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse6" aria-expanded="false" aria-controls="collapse6">
                                What type of oil do you use in your savouries?


                            </a>
                        </h4>
                    </div>
                    <div id="collapse6" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading6">
                        <div class="panel-body">
                            <p>We use 100% pure groundnut oil* which contains essential vitamins and minerals. *except nimki which is cooked in pure corn oil.



</p>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="heading7">
                        <h4 class="panel-title">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse7" aria-expanded="false" aria-controls="collapse6">
                                What is your cancellation policy?



                            </a>
                        </h4>
                    </div>
                    <div id="collapse7" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading7">
                        <div class="panel-body">
                            <p>If you wish to cancel your order please contact customer services on +44 1753 823308 or info@mithaibox.net. Please note we require 72 hours notice before the date of delivery. No cancellation is available for our 24 hour delivery options once the order has been placed.





</p>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="heading8">
                        <h4 class="panel-title">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse8" aria-expanded="false" aria-controls="collapse8">
                                What ID should I have with me when collecting my parcel?



                            </a>
                        </h4>
                    </div>
                    <div id="collapse8" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading8">
                        <div class="panel-body">
                            <p>When you receive notification from The Mithai Boxfoods.com (by email and or Text) that your parcel has been delivered to store. You should ensure you have at least one of the following forms of ID, driving license, utility bill, mobile phone bill, wage slip, bank statement, credit/debit card, passport, cheque book. The ID must have the same first and surname as that used to make the order with the online retailer. If a friend or family member is collecting on your behalf they too will need a form of your ID and this should not be a photocopy, and they will also need you to send on the order number to them.





</p>
                        </div>
                    </div>
                </div>
            </div>
<!--        <p>When will I receive my order?<br>-->
<!--We have updated our delivery terms please click on DELIVERY INFORMATION on the homepage.-->
<!--If you order before 12pm in UK then you will receive your order next working day by courier between 8am and 6pm. A signature is required on delivery. If you think you may not be in to receive delivery, please specify any special instructions to the courier in the comments/message section of your order i.e. leave with a neighbour. If no one is available to accept delivery, or if goods become unsuitable as a result of non-delivery we cannot accept liability. The courier will leave a "calling card" at the recipient address and it then becomes the recipient's responsibility to contact the courier company to re-arrange a suitable re-delivery time and date.  Although next delivery is available as an option, we strongly recommend placing your order as soon as possible  and selecting your preferred delivery date, especially during the festive periods such as Ramadan, Eid, Diwali and Christmas where it is not always possible to offer this service.  -->

<!--If you know your recipient is not at home during working hours, we do recommend that we deliver to a business address. Orders placed after 12pm are dispatched the next day for customers to receive the day after. Orders placed before 12pm on a Friday will be delivered the following Monday between 8am and 6pm. If you require a Saturday delivery please select the Saturday Delivery option in your shopping cart. Orders placed after 1pm on a Friday will be delivered on the following Tuesday.-->

<!--Please be aware that during the Christmas period, Valentines and  Easter, courier companies will not always be able to deliver items for the next day, so we  recommend selecting a delivery date one day before  the goods are required to avoid disappointment. </p>-->

<!--<p>How can you guarantee I will receive fresh sweets in good condition?<br>-->
<!--We only use freshly made sweets that have been carefully prepared and packaged at our factory for online orders. The contents of each order is then placed in bubble-wrapped double-layered cartons to ensure your sweets reach you in optimum condition.</p>-->
<!--<p>What are the delivery charges?<br>We offer a next working day door to door courier service in the UK. Charges for orders weighing up to 10kg (inc packaging) in England, Wales and most parts of Scotland begin from £5.50, Northern Ireland is £14.99. We also offer an excellent service to mainland Europe using DPD Global Express Parcel service.</p>-->
<!--<p>Do you use artificial sweeteners in your sweets?<br>All of The Mithai Box's sweets are completely free from any artificial sweeteners. We only use premium quality, pure ingredients to ensure the unique taste for which The Mithai Box is world famous.</p>-->
<!--<p>Are your products suitable for vegetarians?<br>Yes they are. All of The Mithai Box's products on this website and in our own stores are completely free from any Animal fats.</p>-->
<!--<p>What type of oil do you use in your savouries?<br>We use 100% pure groundnut oil* which contains essential vitamins and minerals. *except nimki which is cooked in pure corn oil.</p>-->
<!--<p>What is your cancellation policy?<br>If you wish to cancel your order please contact customer services on +44 1753 823308 or info@mithaibox.net.  Please note we require 72 hours notice before the date of delivery. No cancellation is available for our 24 hour delivery options once the order has been placed.</p>-->
<!--<p>What ID should I have with me when collecting my parcel?<br>When you receive notification from The Mithai Boxfoods.com  (by email and or Text) that your parcel has been delivered to store.-->

<!--You should ensure you have at least one of the following forms of ID, driving license, utility bill, mobile phone bill, wage slip, bank statement, credit/debit card, passport, cheque book.-->

<!--The ID must have the same first and surname as that used to make the order with the online retailer.-->

<!--If a friend or family member is collecting on your behalf they too will need a form of your ID and this should not be a photocopy, and they will also need you to send on the order number to them.</p>-->
    </div>
</section>

@endsection