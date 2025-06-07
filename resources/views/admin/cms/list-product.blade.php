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
					<h4 class="box-title">List Products</h4>
					<!-- /.box-title -->
					<div class="dropdown js__drop_down">
						<a href="{{route('admin.add_product')}}"><input type="submit" name="" value="Add Product" class="btn btn-success btn-sm"></a>

						<!-- /.sub-menu -->
					</div>
					<!-- /.dropdown js__dropdown -->
					<table id="listProduct" class="table table-striped table-bordered display" style="width:100%">
						<thead>
							<tr>
                                <th>Sr No.</th>
								<th style="width:15%;">Product Name</th>
                                <th style="width:10%;">Main Category</th>
                                <th style="width:10%;">Sub Category</th>
                                <th style="width:10%;">Slug</th>
                                <th>Best Seller</th>
                                <th>New Arrival</th>
								<th>Available</th>
                                <th>Status</th>
								<th>::</th>
							</tr>
						</thead>
						<tbody>
                            @foreach($product_detail as $product_details)
                            <tr>
                                <td>{{$i++}}</td>
                                
                                <td>{{$product_details->product_name}} <img id="doctorimg" src="{{asset('frontend/images/product')}}/{{$product_details->image}}"></td>
                                
                                <td>
                                <?php $m_cat=DB::table('parent_category')->where('id',$product_details->parent_cat)->first(); ?>
                                {{$m_cat->category_name}}
                                </td>
                                
                                <td>
                                <?php 
                                $s_cat=DB::table('product_sub_category')->where('id',$product_details->sub_cat)->first(); 
                                ?>
                                @if(!empty($s_cat))
                                {{$s_cat->name}}
                                @endif
                                </td>
                                
                                <td>{{$product_details->slug}}</td>
                                
                                <td>
                                <input data-id="{{$product_details->id}}" class="toggle-class productBestSellerToggle" data-size="mini" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Yes" data-off="No" {{ $product_details->best_seller ? 'checked' : '' }}>
                                </td>
                                
                                <td>
                                <input data-id="{{$product_details->id}}" class="toggle-class productNewArrivalToggle" data-size="mini" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Yes" data-off="No" {{ $product_details->new_arrival ? 'checked' : '' }}>
                                </td>
                                
                                <td>
                                <input data-id="{{$product_details->id}}" class="toggle-class productAvailableToggle" data-size="mini" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Yes" data-off="No" {{ $product_details->available ? 'checked' : '' }}>
                                </td>
                                
                                <td>
                                <input data-id="{{$product_details->id}}" class="toggle-class productToggle" data-size="mini" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $product_details->status ? 'checked' : '' }}>
                                </td>
                                
                                <td>
                                <a href="{{route('admin.edit_product',$product_details->id)}}" ><button class="btn btn-info btn-xs"><i class="fa fa-edit"></i></button></a>
                                <a onclick="return confirm('Are you sure Want to Delete?')" href="{{route('admin.delete_product',$product_details->id)}}"><button class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button></a>
                                </td>
                            </tr>
                            @endforeach
						</tbody>
					</table>
					{{$product_detail->links()}}
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