@extends('layouts.admin-header')

@section('content')
		<!--end header -->
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Edit Health Centers Services</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Edit Health Centers Services</li>
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
						<form action="{{route('hospital_multi_specialty.update_health_centers_services')}}" method="post" enctype="multipart/form-data">
							@csrf
                            <input type="hidden" id="id" name="id" value="{{$data->id}}">
						  <div id="test-l-1" role="tabpanel" class="bs-stepper-pane" aria-labelledby="stepper1trigger1">
							<h5 class="mb-1">Edit Health Centers Services</h5><br>
							<!-- <p class="mb-4">Enter your personal information to get closer to copanies</p> -->

							<div class="row g-3">
								
				
								<div class="col-12 col-lg-6">
									<label for="Sub-Title" name="Sub-Title" class="form-label">Short Description</label>
									<textarea class="form-control" name="short_description">{{$data->short_description}}</textarea>
									@error('short_description')
									<span style="color: red" role="alert">
									<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>

								<div class="col-12 col-lg-6">
									<label for="first_feature_title" name="first_feature_title" class="form-label">First Feature Title</label>
									<input class="form-control" type="text" id="first_feature_title" value="{{$data->first_feature_title}}" name="first_feature_title">
									@error('first_feature_title')
									<span style="color: red" role="alert">
									<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>

                                <div class="col-12 col-lg-6">
									<label for="Sub-Title" name="Sub-Title" class="form-label">First Feature Description</label>
									<textarea class="form-control" name="first_feature_description">{{$data->first_feature_description}}</textarea>
									@error('first_feature_description')
									<span style="color: red" role="alert">
									<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>

                                <div class="col-12 col-lg-6">
									<label for="Sub-Title" name="Sub-Title" class="form-label">First Icon</label>
									<input type="file" class="form-control" name="first_icon" id="first_icon">
									@error('first_icon')
									<span style="color: red" role="alert">
									<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>

                                <div class="col-12 col-lg-6">
								<label for="banner" name="banner" class="form-label">First Icon</label>
								<img height="100" width="200" src="{{asset('public/hospital/'.$data->first_icon)}}">
								</div>
                                
								<div class="col-12 col-lg-6">
									<label for="second_feature_title" name="second_feature_title" class="form-label">Second Feature Title</label>
									<input class="form-control" type="text" id="second_feature_title" value="{{$data->second_feature_title}}" name="second_feature_title">
									@error('second_feature_title')
									<span style="color: red" role="alert">
									<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>

                                <div class="col-12 col-lg-6">
									<label for="Sub-Title" name="Sub-Title" class="form-label">Second Feature Description</label>
									<textarea class="form-control" name="second_feature_description">{{$data->second_feature_description}}</textarea>
									@error('second_feature_description')
									<span style="color: red" role="alert">
									<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>

                                <div class="col-12 col-lg-6">
									<label for="Sub-Title" name="Sub-Title" class="form-label">Second Icon</label>
									<input type="file" class="form-control" name="second_icon" id="second_icon">
									@error('second_icon')
									<span style="color: red" role="alert">
									<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>

                                <div class="col-12 col-lg-6">
								<label for="banner" name="banner" class="form-label">Second Icon</label>
								<img height="100" width="200" src="{{asset('public/hospital/'.$data->second_icon)}}">
								</div>

								<div class="col-12 col-lg-6">
									<label for="third_feature_title" name="third_feature_title" class="form-label">Third Feature Title</label>
									<input class="form-control" type="text" id="third_feature_title" value="{{$data->third_feature_title}}" name="third_feature_title">
									@error('third_feature_title')
									<span style="color: red" role="alert">
									<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>

                                <div class="col-12 col-lg-6">
									<label for="Sub-Title" name="Sub-Title" class="form-label">Third Feature Description</label>
									<textarea class="form-control" name="third_feature_description">{{$data->third_feature_description}}</textarea>
									@error('third_feature_description')
									<span style="color: red" role="alert">
									<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>

                                <div class="col-12 col-lg-6">
									<label for="Sub-Title" name="Sub-Title" class="form-label">Third Icon</label>
									<input type="file" class="form-control" name="third_icon" id="third_icon">
									@error('third_icon')
									<span style="color: red" role="alert">
									<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>

                                <div class="col-12 col-lg-6">
								<label for="banner" name="banner" class="form-label">Third Icon</label>
								<img height="100" width="200" src="{{asset('public/hospital/'.$data->third_icon)}}">
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