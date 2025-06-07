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
					<h4 class="box-title">List Product Variant</h4>
					<!-- /.box-title -->
					<div class="dropdown js__drop_down">
						<a href="{{route('admin.add_product_variant')}}"><input type="submit" name="" value="Add Variant Cost" class="btn btn-success btn-sm"></a>

						<!-- /.sub-menu -->
					</div>
					<!-- /.dropdown js__dropdown -->
					<table id="example11" class="table table-striped table-bordered display" style="width:100%">
						<thead>
							<tr>
                                <th>Sr No.</th>
								<th>Product Name</th>
                                <th>Weight</th>
                                <th>Weight Unit</th>
								<th>Size Category</th>
								<th>Packed Size</th>
                                <th>Cost</th>
                                <th>Status</th>
								<th>::</th>
							</tr>
						</thead>
						<tbody>
                            @foreach($variant_detail as $variant_details)
							<tr>
                                <td>{{$i++}}</td>
								<td>
                                <?php
                                $prod_name=DB::table('products')->where('id',$variant_details->product_id)->first();
                                ?>
                                {{$prod_name->product_name}}
                                </td>
                                <td>{{$variant_details->weight}}</td>
                                <td>{{$variant_details->weight_unit}}</td>
								<td>{{$variant_details->size_category}}</td>
								<td>{{$variant_details->packed_size}}</td>
                                <td>{{$variant_details->cost}}</td>
                                <td>
                                    <input data-id="{{$variant_details->id}}" class="toggle-class productvariantToggle" data-size="mini" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $variant_details->status ? 'checked' : '' }}>
                                </td>
								<td>
                                    <a href="{{route('admin.edit_product_variant',$variant_details->id)}}"><button class="btn btn-info btn-xs"><i class="fa fa-edit"></i></button></a>
                                    <a onclick="return confirm('Are you sure Want to Delete?')" href="{{route('admin.delete_product_variant',$variant_details->id)}}"><button class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button></a>
                                </td>
                            </tr>
                            @endforeach
						</tbody>
					</table>
					{{$variant_detail->links()}}
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