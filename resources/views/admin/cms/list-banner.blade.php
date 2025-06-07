@extends('layouts.header-admin')
@section('content')
<div id="wrapper">
	<div class="main-content">
		<div class="row small-spacing">
			<div class="col-xs-12">
				<div class="box-content">
					<h4 class="box-title">Banners List</h4>
					<!-- /.box-title -->
					<div class="dropdown js__drop_down">
						<a href="{{route('admin.add_banner')}}"><input type="submit" name="" value="Add Banner" class="btn btn-success btn-sm"></a>
						
						<!-- /.sub-menu -->
					</div>
					<!-- /.dropdown js__dropdown -->
					<table id="bannerexample" class="table table-striped table-bordered display" style="width:100%">
						<thead>
							<tr>
								<th>Sr.No.</th>
								<th>Title</th>
								<th style="width: 20%">Image</th>
								<th style="width: 20%">Xs-Image</th>
								<th>Status</th>
								<th>::</th>
							</tr>
						</thead>
						<tbody>

                            @foreach($fetch_banner_detail as $fetch_banner_details)
							<tr>
								<td>{{$i++}}</td>
								<td>{{$fetch_banner_details->title}}</td>
								<td><img id="doctorimg" src="{{asset('frontend/images/banner').'/'.$fetch_banner_details->image}}"></td>
								<td><img id="doctorimg" src="{{asset('frontend/images/xsbanner').'/'.$fetch_banner_details->xs_image}}"></td>
								<td>
									<input data-id="{{$fetch_banner_details->id}}" class="toggle-class bannerToggle" data-size="mini" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $fetch_banner_details->status ? 'checked' : '' }}>
								</td>
								<td>
									<a href="{{route('admin.edit_banner',$fetch_banner_details->id)}}"><button class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></button></a>
                                    <a onclick="return confirm('Are you sure Want to Delete?')" href="{{route('admin.delete_banner',$fetch_banner_details->id)}}"><button class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button></a>
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
