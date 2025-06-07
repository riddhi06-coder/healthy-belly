@extends('layouts.header-admin')
@section('content')
<div id="wrapper">
	<div class="main-content">
		<div class="row small-spacing">
			<div class="col-xs-12">
				<div class="box-content">
                    @if(Session()->has('success'))
                        <div class="alert alert-success">
                            {{session()->get('success')}}
                        </div>
                    @endif
					<h4 class="box-title">Order Description</h4>
					<!-- /.box-title -->
					<a href="{{route('admin.list_all_order')}}" style="float:right;"><button class="box-title btn btn-primary btn-sm"><< Back</button></a>
					@php

					$user_detail=DB::table('child_order_table')->where('parent_id',$parent_cat->id)->first();
					$user_parent_detail=DB::table('parent_order_table')->where('id',$parent_cat->id)->first();

					@endphp
					<!-- /.dropdown js__dropdown -->
					<table class="table table-striped table-bordered display" style="width:100%">
						<thead>
							<tr>
								<th>
									<label>Name : </label><b>{{$user_detail->firstname}} {{$user_detail->lastname}}</b><br>
									<label>Email : </label><b>{{$user_detail->email}} </b><br>
									<label>Phone : </label><b>{{$user_detail->phone}} </b><br>
									<label>Address : </label><b>{{$user_detail->address}}, {{$user_detail->country}}, {{$user_detail->state}}, {{$user_detail->city}}, {{$user_detail->zip}}</b><br>
								</th>
								<th>
									<label>Invoice :</label><b>{{$user_parent_detail->invoice_no}}</b><br>
									<?php if($user_parent_detail->trans_id!=''){ ?>
									<label>Payment Method :</label><b>Online</b><br>
									<label>Transcation Id :</label><b>{{$user_parent_detail->trans_id}}</b><br>
									<?php }else{ ?>
									<label>Payment Method :</label><b> COD</b><br>
									<?php } ?>
									<label>Date :</label><b>{{$user_parent_detail->created_at}}</b><br>
									<label>Final Amount :</label><b>£{{$user_parent_detail->total_amount}}</b><br>
								</th>
							</tr>
						</thead>
					</table>
					<table id="example" class="table table-striped table-bordered display" style="width:100%">

						<thead>
							<tr>
								<th>Sr no.</th>
								<th>product Name</th>
								<th>Price</th>
								<th>Quantity</th>
								<th>Total Amount</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$order_detail=DB::table('child_order_table')->where('parent_id',$parent_cat->id)->get();
							?>
							@foreach($order_detail as $order_details)
							<?php
							$product_detail=DB::table('products')->where('id',$order_details->product_id)->first();
							?>
							<tr>
								<td>{{$i++}}</td>
								<td>{{$product_detail->product_name}} -{{$order_details->weight}} {{$order_details->weight_unit}} {{$order_details->size_category}} {{$order_details->packed_size}}</td>
								<td> £{{$order_details->price}}</td>
								<td>{{$order_details->quantity}}</td>
								<td> £{{$order_details->price*$order_details->quantity}}</td>
							</tr>
							<?php $ship_charge=$order_details->shipping_charge; ?>
							@endforeach
							<tr>
								<td colspan="4"><b>Shipping Charge</b></td>
								<td><b> £{{$ship_charge}}</b></td>
							</tr>
							<tr>
								<td colspan="4"><b>Final Amount</b></td>
								<td><b> £{{$user_parent_detail->total_amount}}</b></td>
							</tr>
						</tbody>
					</table>
				</div>
				<!-- /.box-content -->
			</div>
			<!-- /.col-xs-12 -->
		</div>
		<!-- /.row small-spacing -->
	</div>
	<!-- /.main-content -->
</div>
@endsection
