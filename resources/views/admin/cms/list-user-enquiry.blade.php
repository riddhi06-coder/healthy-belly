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
					<h4 class="box-title">User Enquiry</h4>
					<!-- /.box-title -->
					<!-- /.dropdown js__dropdown -->
					<table id="listreview" class="table table-striped table-bordered display" style="width:100%">
						<thead>
							<tr>
                                <th>Sr No.</th>
								<th>Name</th>
                                <th>Email</th>
                                <th>Contact</th>
                                <th>Message</th>
							</tr>
						</thead>
						<tbody>
                            @foreach($all_enquiry as $all_enquiries)
							<tr>
                                <td>{{$i++}}</td>
								<td>{{$all_enquiries->name}}</td>
                                <td>{{$all_enquiries->email}}</td>
                                <td>{{$all_enquiries->contact}}</td>
                                <td>{{$all_enquiries->message}}</td>
                            </tr>
                            @endforeach
						</tbody>
					</table>
					{{$all_enquiry->links()}}
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