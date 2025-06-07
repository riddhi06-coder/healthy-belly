@extends('layouts.admin-header')

@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Medical Records</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<!-- <li class="breadcrumb-item active" aria-current="page">Medical Records Contact Details List</li> -->
								<!-- <li class="breadcrumb-item"><a href="{{route('medical_records.add_medical_contact_details')}}"><i class="lni lni-circle-plus"></i>
								</li> -->
								<li class="breadcrumb-item active" aria-current="page">List Medical Records Contact Details</li></a>
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
										<th>Sno.</th>
										<th>Title</th>
										<th>Sub-Title</th>
										<th>Icon</th>
										<th>Status</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
                                    @foreach($data as $key=>$value)
									<tr>
										<td>{{$key+1}}</td>
										<td>{{$value->title}}</td>
										<td>{{$value->sub_title}}</td>
										<td>{!!$value->image!!}</td>
                                        @if($value->status == 1)
                                        <td>
                                        <div class="form-check form-switch form-check-warning">
                                        <input class="form-check-input" type="checkbox" data-id="{{$value->id}}" onclick="status_check_medical_contact_description(this)" checked>
                                        </div>
                                        </td>
                                        @else
                                        <td>
                                        <div class="form-check form-switch form-check-warning">
                                        <input class="form-check-input" type="checkbox" data-id="{{$value->id}}" onclick="status_check_medical_contact_description(this)">
                                        </div>
                                        </td>
                                        @endif
                                        <td>
                                            <a href="{{route('medical_records.edit_medical_contact_details')}}/{{$value->id}}" class="btn btn-info">edit</a>
                                            <!-- <a href="{{route('medical_records.delete_medical_contact_details')}}/{{$value->id}}" class="btn btn-danger">delete</a> -->
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
function status_check_medical_contact_description(checkbox) {
    var id = checkbox.getAttribute("data-id");
    var status = checkbox.checked ? 1 : 0;

    // Construct the data object properly
    var data = {
        id: id,
        status: status
    };

    // Make the AJAX request
    $.ajax({
        url: '{{ route('medical_records.status_change_medical_contact_details') }}',
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