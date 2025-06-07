@extends('layouts.admin-header')

@section('content')
		<!--end header -->
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Add Vision Mission Motto</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Add Vision Mission Motto</li>
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
						<form action="{{route('vision_mission_motto.update_vision_mission_motto')}}" method="post" enctype="multipart/form-data">
							@csrf
							<input type="hidden" class="form-control" name="id" value="{{$data->id}}" name="id">

						  <div id="test-l-1" role="tabpanel" class="bs-stepper-pane" aria-labelledby="stepper1trigger1">
							<h5 class="mb-1">Add Vision Mission Motto</h5><br>
							<!-- <p class="mb-4">Enter your personal information to get closer to copanies</p> -->

							<div class="row g-3">
								
								<div class="col-12 col-lg-6">
									<label for="short_description" name="short_description" class="form-label">Short Description</label>
									<textarea type="text" class="form-control" name="short_description">{{$data->short_description}}</textarea>
									@error('short_description')
									<span style="color: red" role="alert">
									<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>

                                <div class="col-12 col-lg-6">
									<label for="First Title" name="First_Title" class="form-label">First Title</label>
									<input type="text" class="form-control" value="{{$data->first_title}}" name="first_title">
									@error('first_title')
									<span style="color: red" role="alert">
									<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>

								<div class="col-12 col-lg-6">
									<label for="First-Description" name="First-Description" class="form-label">First Description</label>
									<textarea type="text" class="form-control" name="first_description">{{$data->first_description}}</textarea>
									@error('first_description')
									<span style="color: red" role="alert">
									<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>	

                                <div class="col-12 col-lg-6">
									<label for="Second Title" name="Second_Title" class="form-label">Second Title</label>
									<input type="text" class="form-control" value="{{$data->second_title}}" name="second_title">
									@error('second_title')
									<span style="color: red" role="alert">
									<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>

								<div class="col-12 col-lg-6">
									<label for="Second-Description" name="Second-Description" class="form-label">Second Description</label>
									<textarea type="text" class="form-control" name="second_description">{{$data->second_description}}</textarea>
									@error('second_description')
									<span style="color: red" role="alert">
									<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>		
                                						
                                <div class="col-12 col-lg-6">
									<label for="Third Title" name="third_title" class="form-label">Third Title</label>
									<input type="text" class="form-control" name="third_title" value="{{$data->third_title}}" >
									@error('third_title')
									<span style="color: red" role="alert">
									<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>

								<div class="col-12 col-lg-6">
									<label for="Third-Description" name="Third-Description" class="form-label">Third Description</label>
									<textarea type="text" class="form-control" name="third_description">{{$data->third_description}}</textarea>
									@error('third_description')
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