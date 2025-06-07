@extends('layouts.admin-header')

@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>

<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Empannelled Insurance</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Empannelled Insurance Description List</li>
								<li class="breadcrumb-item"><a href="{{route('empannelled_insurance.add_empannelled_insurance_description')}}"><i class="lni lni-circle-plus"></i>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Add Empannelled Insurance Description</li></a>
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
										<th>Header Title</th>
										<th>Header Sub-Title</th>
										<th>Header Description</th>
										<th>Footer Description</th>
										<th>Status</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
                                    @foreach($data as $value)
									<tr>
										<td>{{$value->header_title}}</td>
										<td>{{$value->header_sub_title}}</td>
										<td>{!!$value->header_description!!}</td>
										<td>{!!$value->footer_description!!}</td>
                                        @if($value->status == 1)
                                        <td>
                                        <div class="form-check form-switch form-check-warning">
                                        <input class="form-check-input" type="checkbox" data-id="{{$value->id}}" onclick="status_check_empannelled_insurance_description(this)" checked>
                                        </div>
                                        </td>
                                        @else
                                        <td>
                                        <div class="form-check form-switch form-check-warning">
                                        <input class="form-check-input" type="checkbox" data-id="{{$value->id}}" onclick="status_check_empannelled_insurance_description(this)">
                                        </div>
                                        </td>
                                        @endif
                                        <td>
                                            <a href="{{route('empannelled_insurance.edit_empannelled_insurance_description')}}/{{$value->id}}" class="btn btn-info">edit</a>
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

        @endsection