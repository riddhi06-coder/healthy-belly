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
					<h4 class="box-title">List Advertisement</h4>
					<!-- /.box-title -->
					<div class="dropdown js__drop_down">
						<a href="{{route('admin.add_advertisement')}}"><input type="submit" name="" value="Add Advertisement" class="btn btn-success btn-sm"></a>

						<!-- /.sub-menu -->
					</div>
					<!-- /.dropdown js__dropdown -->
					<table id="listadvertisement" class="table table-striped table-bordered display" style="width:100%">
						<thead>
							<tr>
                                <th>Sr No.</th>
								<th>title</th>
                                <th style="width:20%">Image</th>
                                <th>Status</th>
								<th>::</th>
							</tr>
						</thead>
						<tbody>
                            @foreach($ad_detail as $ad_details)
							<tr>
                                <td>{{$i++}}</td>
								<td>{!!$ad_details->title!!}</td>
                                <td>
                                    <img id="doctorimg" src="{{asset('public/frontend/images/advertisement')}}/{{$ad_details->image}}">
                                </td>
                                <td>
                                    <input data-id="{{$ad_details->id}}" class="toggle-class advertisementToggle" data-size="mini" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $ad_details->status ? 'checked' : '' }}>
                                </td>
								<td>
                                    <a href="{{route('admin.edit_advertisement',$ad_details->id)}}"><button class="btn btn-info btn-xs"><i class="fa fa-edit"></i></button></a>
                                    <a onclick="return confirm('Are you sure Want to Delete?')" href="{{route('admin.delete_advertisement',$ad_details->id)}}"><button class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button></a>
                                </td>
                            </tr>
                            @endforeach
						</tbody>
					</table>
					{{$ad_detail->links()}}
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