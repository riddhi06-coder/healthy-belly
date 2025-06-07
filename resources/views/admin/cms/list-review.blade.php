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
					<h4 class="box-title">List Reviews</h4>
					<!-- /.box-title -->
					<!-- /.dropdown js__dropdown -->
					<table id="listreview" class="table table-striped table-bordered display" style="width:100%">
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
                            @foreach($all_review as $all_reviews)
							<tr>
                                <td>{{$i++}}</td>
								<td>{{$all_reviews->name}}</td>
                                <td>{{$all_reviews->email}}</td>
                                <td>{{$all_reviews->review}}</td>
                                <td>
                                    <input data-id="{{$all_reviews->id}}" class="toggle-class reviewToggle" data-size="mini" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Approve" data-off="Pending" {{ $all_reviews->status ? 'checked' : '' }}>
                                </td>
								<td>
                                    <a onclick="return confirm('Are you sure Want to Delete?')" href="{{route('admin.delete_review',$all_reviews->id)}}"><button class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button></a>
                                </td>
                            </tr>
                            @endforeach
						</tbody>
					</table>
					{{$all_review->links()}}
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