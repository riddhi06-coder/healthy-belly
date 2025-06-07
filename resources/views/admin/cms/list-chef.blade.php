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
					<h4 class="box-title">List Chefs</h4>
					<!-- /.box-title -->
					<div class="dropdown js__drop_down">
						<a href="{{route('admin.add_best_chef')}}"><input type="submit" name="" value="Add Chef" class="btn btn-success btn-sm"></a>

						<!-- /.sub-menu -->
					</div>
					<!-- /.dropdown js__dropdown -->
					<table id="listchef" class="table table-striped table-bordered display" style="width:100%">
						<thead>
							<tr>
                                <th>Sr No.</th>
								<th>Name</th>
                                <th>profession</th>
                                <th style="width:20%">Image</th>
                                <th>Status</th>
								<th>::</th>
							</tr>
						</thead>
						<tbody>
                            @foreach($chef_detail as $chef_details)
							<tr>
                                <td>{{$i++}}</td>
								<td>{{$chef_details->name}}</td>
                                <td>{{$chef_details->profession}}</td>
                                <td>
                                    <img id="doctorimg" src="{{asset('public/frontend/images/chef')}}/{{$chef_details->image}}">
                                </td>
                                <td>
                                    <input data-id="{{$chef_details->id}}" class="toggle-class chefToggle" data-size="mini" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $chef_details->status ? 'checked' : '' }}>
                                </td>
								<td>
                                    <a onclick="return confirm('Are you sure Want to Delete?')" href="{{route('admin.delete_chef',$chef_details->id)}}"><button class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button></a>
                                </td>
                            </tr>
                            @endforeach
						</tbody>
					</table>
					{{$chef_detail->links()}}
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