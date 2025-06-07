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
					<h4 class="box-title">All Social Media</h4>
					<!-- /.box-title -->
					<div class="dropdown js__drop_down">
						

						<!-- /.sub-menu -->
					</div>
					<!-- /.dropdown js__dropdown -->
					<table id="example" class="table table-striped table-bordered display" style="width:100%">
						<thead>
							<tr>
                                <th>Sr No.</th>
								<th>Name</th>
                                <th>URL</th>
                                <th>Icon</th>
                                <th>Status</th>
								<th>::</th>
							</tr>
						</thead>
						<tbody>
                            @foreach($social_media as $social)
							<tr>
                                <td>{{$i++}}</td>
								<td>{{$social->name}}</td>
                                <td>{{$social->url}}</td>
                                <td>{{$social->logo}}</td>

                                <td>
                                    <input data-id="{{$social->id}}" class="toggle-class socialMediaToggle" data-size="mini" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $social->status ? 'checked' : '' }}>
                                </td>
								<td>
                                    <a href="{{route('admin.edit_socialmedia',$social->id)}}"><button class="btn btn-info btn-xs"><i class="fa fa-edit"></i></button></a>
                                    <!-- <a onclick="return confirm('Are you sure Want to Delete?')" href="#"><button class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button></a> -->
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