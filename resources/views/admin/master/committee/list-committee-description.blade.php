@extends('layouts.admin-header')

@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>

<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Committee Description</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Committee Description List</li>
								<!-- <li class="breadcrumb-item"><a href="{{route('committee.list_committee_description')}}"><i class="lni lni-circle-plus"></i>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Add Committee Description</li></a> -->
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
										<th>Highlight</th>
										<th>Description</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
                                    @foreach($data as $value)
									<tr>
										<td>{{$value->highlight}}</td>
										<td>{!! $value->description !!}</td>
                                      
                                        <td>
                                            <a href="{{route('committee.edit_committee_description')}}/{{$value->id}}" class="btn btn-info">edit</a>
                                            <a href="{{route('committee.delete_committee_description')}}/{{$value->id}}" class="btn btn-danger">delete</a>
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