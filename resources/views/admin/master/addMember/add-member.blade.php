@extends('layouts.admin-header')

@section('content')
		<!--end header -->
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Add Member</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Add Member Details</li>
							</ol>
						</nav>
					</div>
				</div>
			  <!--end breadcrumb-->

			  <!--start stepper one--> 
			    <hr>
				<div id="stepper1" class="bs-stepper">
				  <div class="card">
					

				    <div class="card-body">
					
					  <div class="bs-stepper-content">
						<form action="{{route('member.insert_member')}}" method="post" enctype="multipart/form-data">
							@csrf
						  <div id="test-l-1" role="tabpanel" class="bs-stepper-pane" aria-labelledby="stepper1trigger1">
							<h5 class="mb-1">Add Member Details</h5><br>
							<!-- <p class="mb-4">Enter your personal information to get closer to copanies</p> -->

							<div class="row g-3">
								<div class="col-12 col-lg-6">
									<label for="member_name" class="form-label">Member Name</label>
									<input type="text" class="form-control" name="name" id="name" placeholder="Member Name">
									@error('member_name')
									<span style="color: red" role="alert">
									<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>

								<div class="col-12 col-lg-6">
									<label for="member_email" name="member_email" class="form-label">Member Email</label>
									<input type="email" class="form-control" name="email" placeholder="Member Email">
									@error('member_email')
									<span style="color: red" role="alert">
									<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>

								<div class="col-12 col-lg-6">
									<label for="blog_date" name="access[]" class="form-label">Access</label>
									<select class="form-select" id="multiple-select-clear-field" name="access[]"  data-placeholder="Select Access" multiple>
									
									<option value="1">Home</option>
									<option value="2">About</option>
									<option value="3">Testimonial</option>
									<option value="4">Articles</option>
									<option value="5">Media</option>
									<option value="6">Contact Us</option>
									</select>
									@error('access')
									<span style="color: red" role="alert">
									<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>

								

								<center>
								<div class="col-12 col-lg-6">
									<button class="btn btn-primary px-4" >Submit</button>
								</div>
							</center>
							</div><!---end row-->
							
						  </div>
						 
						</form>
					  </div>
					   
					</div>
				   </div>
				 </div>
				
			</div>
		</div>
	
	
@endsection