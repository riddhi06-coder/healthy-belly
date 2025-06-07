@extends('layouts.admin-header')

@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>

<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Research Academics</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<!-- <li class="breadcrumb-item active" aria-current="page">Add Academics Overview</li> -->
								<!-- <li class="breadcrumb-item"><a href="{{route('research_academics.add_research_academics_overview')}}"><i class="lni lni-circle-plus"></i>
								</li> -->
								<li class="breadcrumb-item active" aria-current="page">List Academics CPS</li></a>
							</ol>
						</nav>
					</div>
				</div>
				<!--end breadcrumb-->

			@if(session('success') || session('error'))
			<div class="alert alert-{{ session('success') ? 'success' : 'danger' }} alert-dismissable" id="notification">
			{{ session('success') ?: session('error') }}
			</div>
			<script>
			setTimeout(function(){
			document.getElementById('notification').style.display = 'none';
			}, 3000); // Adjust the time in milliseconds (e.g., 3000 for 3 seconds)
			</script>
			@endif
			
				<hr/>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example2" class="table table-striped table-bordered">
								<thead>
									<tr>
										<th>Sr No</th>
										<th>Title</th>
										<th>Description</th>
										<th>Status</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
                                    @foreach($data as $key=>$value)
									<tr>
										<td>{{$key+1}}</td>
										<td>{!!$value->title!!}</td>
										<td>{!!$value->description!!}</td>
                                        @if($value->status == 1)
                                        <td>
                                        <div class="form-check form-switch form-check-warning">
                                        <input class="form-check-input" type="checkbox" data-id="{{$value->id}}" onclick="status_check_research_academics_cps(this)" checked>
                                        </div>
                                        </td>
                                        @else
                                        <td>
                                        <div class="form-check form-switch form-check-warning">
                                        <input class="form-check-input" type="checkbox" data-id="{{$value->id}}" onclick="status_check_research_academics_cps(this)">
                                        </div>
                                        </td>
                                        @endif
                                        <td>
                                        <a href="{{route('research_academics.edit_research_academics_cps')}}/{{$value->id}}" class="btn btn-info">edit</a>
                                        </td>
									</tr>
                                    @endforeach
                                </tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
        <script>
function status_check_research_academics_cps(checkbox) {
    var id = checkbox.getAttribute("data-id");
    var status = checkbox.checked ? 1 : 0;

    // Construct the data object properly
    var data = {
        id: id,
        status: status
    };

    // Make the AJAX request
    $.ajax({
        url: '{{ route('research_academics.status_change_research_academics_cps') }}',
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        dataType: 'json',
        data: data,
        success: function(response) {
            if (response.success) {
                // Handle success
            } else {
                // Handle error
            }
        },
        error: function(xhr, status, error) {
            var errorMessage = "An error occurred during the request.";
            // Handle error
        }
    });
}
</script>
        @endsection