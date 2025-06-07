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
					<h4 class="box-title">List Product Images</h4>
					<!-- /.box-title -->
					<div class="dropdown js__drop_down">
						<a href="{{route('admin.add_product_image')}}"><input type="submit" name="" value="Add Image" class="btn btn-success btn-sm"></a>

						<!-- /.sub-menu -->
					</div>
					<!-- /.dropdown js__dropdown -->
					<table id="listProductImage" class="table table-striped table-bordered display" style="width:100%">
						<thead>
							<tr>
								<th>Product Name</th>
                                <th style="width:20%">Image</th>
                                <th>Status</th>
								<th>::</th>
							</tr>
						</thead>
						<tbody>
                            @foreach($image_detail as $image_details)
							<tr>
								<td>
                                <?php 
                                $product_name=DB::table('products')->where('id',$image_details->product_id)->first();
                                ?>
                                {{$product_name->product_name}}</td>
                                <td>
                                    <img id="doctorimg" src="{{asset('public/frontend/images/productImage')}}/{{$image_details->image}}">
                                </td>
                                <td>
                                    <input data-id="{{$image_details->id}}" class="toggle-class productImageToggle" data-size="mini" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $image_details->status ? 'checked' : '' }}>
                                </td>
								<td>
                                    <a onclick="return confirm('Are you sure Want to Delete?')" href="{{route('admin.delete_product_image',$image_details->id)}}"><button class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button></a>
                                </td>
                            </tr>
                            @endforeach
						</tbody>
					</table>
					{{$image_detail->links()}}
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