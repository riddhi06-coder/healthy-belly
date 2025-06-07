@extends('layouts.admin-header')

@section('content')
		<!--end header -->
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Edit Management Committee</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Edit Management Committee</li>
							
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
						<form action="{{route('management_committee.update_management_committee')}}" method="post" enctype="multipart/form-data">
							@csrf
                            <input type="hidden" id="id" name="id" value="{{$data->id}}">
						  <div id="test-l-1" role="tabpanel" class="bs-stepper-pane" aria-labelledby="stepper1trigger1">
							<h5 class="mb-1">Add Management Committee</h5><br>
							<!-- <p class="mb-4">Enter your personal information to get closer to copanies</p> -->

							<div class="row g-3">
								
				
								<div class="col-12 col-lg-6">
									<label for="Sub-Title" name="Sub-Title" class="form-label">Type</label>
									<select class="form-control" name="type" id="type">
                                        <option>Select Type</option>
                                        <option value="Dr.(Sr)"  {{ $data->type == "Dr.(Sr)" ? 'selected' : '' }}>Dr. (Sr)</option>
                                        <option value="Dr."  {{ $data->type == "Dr." ? 'selected' : '' }}>Dr</option>
                                        <option value="Sr."  {{ $data->type == "Sr." ? 'selected' : '' }}>Sr.</option>
                                        <option value="Mr."  {{ $data->type == "Mr." ? 'selected' : '' }}>Mr.</option>
                                    </select>
									@error('type')
									<span style="color: red" role="alert">
									<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>

								<div class="col-12 col-lg-6">
									<label for="name" name="name" class="form-label">Name</label>
									<input type="text" name="name" value="{{$data->name}}" class="form-control" >
									@error('name')
									<span style="color: red" role="alert">
									<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>
                                
								<div class="col-12 col-lg-6">
									<label for="designation" name="designation" class="form-label">Designation</label>
									<input type="text" name="designation" value="{{$data->designation}}" class="form-control" >
									@error('designation')
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