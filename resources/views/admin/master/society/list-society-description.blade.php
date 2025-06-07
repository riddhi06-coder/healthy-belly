@extends('layouts.admin-header')

@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>

<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Profile History</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<!-- <li class="breadcrumb-item active" aria-current="page">Profile History List</li>
								<li class="breadcrumb-item"><a href="{{route('profile_history.add_profile_history')}}"><i class="lni lni-circle-plus"></i>
								</li> -->
								<li class="breadcrumb-item active" aria-current="page">List Society Description</li></a>
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
										<th>Short Description</th>
										<th>First Title</th>
										<th>First Description</th>
										<th>Second Title</th>
										<th>Second Description</th>
										<th>Third Title</th>
										<th>Third Description</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
                                    @foreach($data as $value)
									<tr>
										<td>{{$value->short_description}}</td>
										<td>{{$value->first_title}}</td>
										<td>{{$value->first_description}}</td>
										<td>{{$value->second_title}}</td>
										<td>{{$value->second_description}}</td>
										<td>{{$value->third_description}}</td>
										<td>{{$value->third_description}}</td>
                                      
                                        <td>
                                            <a href="{{route('society.edit_society_description')}}/{{$value->id}}" class="btn btn-info">edit</a>
                                            <!-- <a href="{{route('profile_history.delete_profile_history')}}/{{$value->id}}" class="btn btn-danger">delete</a> -->
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