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
					<h4 class="box-title">List Testimonial</h4>
					<!-- /.box-title -->
					<div class="dropdown js__drop_down">
						<a href="{{route('admin.add_testimonial')}}"><input type="submit" name="" value="Add Testimonial" class="btn btn-success btn-sm"></a>

						<!-- /.sub-menu -->
					</div>
					<!-- /.dropdown js__dropdown -->
					<table id="example" class="table table-striped table-bordered display" style="overflow-x:auto;">
						<thead>
							<tr>
                                <th>Sr No.</th>
								<th>Name</th>
                                <th>Designation</th>
                                <th>Description</th>
								<th>::</th>
							</tr>
						</thead>
						<tbody>
                            @foreach($testimonial_detail as $testimonial_details)
							<tr>
                                <td>{{$i++}}</td>
								<td>{{$testimonial_details->name}}</td>
                                <td>{{$testimonial_details->designation}}</td>
                                <td>
								<?php 
								echo substr($testimonial_details->description,0,25).'...'; ?>
								</td>
								<td>
                                    <a onclick="return confirm('Are you sure Want to Delete?')" href="{{route('admin.delete_testimonial',$testimonial_details->id)}}"><button class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button></a>
                                </td>
                            </tr>
                            @endforeach
						</tbody>
					</table>
					{{$testimonial_detail->links()}}
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