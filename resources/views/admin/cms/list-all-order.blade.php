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
					<h4 class="box-title">Order List</h4>
					<!-- /.box-title -->

					<!-- /.dropdown js__dropdown -->
					<table id="example" class="table table-striped table-bordered display" style="width:100%">
						<thead>
							<tr>
								<th>Sr no.</th>
								<th>User Name</th>
								<th>Email</th>
								<th>Total Amount</th>
								<th>Payment Mode</th>
								<th>Transcation Id</th>
								<th>Date</th>
								<th>Order Status</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
                            @foreach($parent_order_detail as $parent_order_details)
                            <?php
                            $child_order_detail=DB::table('child_order_table')->where('parent_id',$parent_order_details->id)->first();
                            ?>
							<tr>
								<td>{{$i++}}</td>
								<td>{{$child_order_detail->firstname}} {{$child_order_detail->lastname}}</td>
								<td>{{$child_order_detail->email}}</td>
								<td>{{$parent_order_details->total_amount}}</td>
								<td>{{$child_order_detail->payment_option}}</td>
                                <td>{{$parent_order_details->trans_id}}</td>
								<td>{{$parent_order_details->created_at}}</td>
								<td>
									<form action="{{route('admin.update_order_status')}}" method="post">
										<input type="hidden" name="order_id" value="{{$parent_order_details->id}}">
									<?php if($parent_order_details->order_status=="cancel" OR $parent_order_details->order_status=="confirm"){ ?>
										<select name="order_status" disabled="disabled">
											<option value="process" {{$parent_order_details->order_status == "process"  ? 'selected' : ''}}>Process</option>
											<option value="confirm" {{$parent_order_details->order_status == "confirm"  ? 'selected' : ''}}>Confirm</option>
											<option value="delivered" {{$parent_order_details->order_status == "delivered"  ? 'selected' : ''}}>Delivered</option>
											<option value="cancel" {{$parent_order_details->order_status == "cancel"  ? 'selected' : ''}}>Cancel</option>
										</select>
										{{csrf_field()}}
											<input type="submit" class="btn btn-info btn-xs" name="submit" value="update" disabled>
									<?php }else{ ?>
                                    <select name="order_status" >
                                        <option value="process" {{$parent_order_details->order_status == "process"  ? 'selected' : ''}}>Process</option>
                                        <option value="confirm" {{$parent_order_details->order_status == "confirm"  ? 'selected' : ''}}>Confirm</option>
                                        <option value="delivered" {{$parent_order_details->order_status == "delivered"  ? 'selected' : ''}}>Delivered</option>
                                        <option value="cancel" {{$parent_order_details->order_status == "cancel"  ? 'selected' : ''}}>Cancel</option>
                                    </select>
									{{csrf_field()}}
										<input type="submit" class="btn btn-info btn-xs" name="submit" value="update">
									<?php } ?>
									</form>
                                </td>
								<td><a href="{{route('admin.order_description')}}/{{$parent_order_details->invoice_no}}"><button class="btn btn-success btn-xs">View</button></a></td>
                                <td>
                                <form action="{{ route('shiprocket', $parent_order_details->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-success btn-xs">Shiprocket</button>
                                </form>
                                </td>
                            </tr>
                            @endforeach
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
