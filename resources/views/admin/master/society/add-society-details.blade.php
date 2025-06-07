@extends('layouts.admin-header')

@section('content')
		<!--end header -->
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Add Society Details</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Add Society Details</li>
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
						<form action="{{route('society.insert_society_details')}}" method="post" enctype="multipart/form-data">
							@csrf
						  <div id="test-l-1" role="tabpanel" class="bs-stepper-pane" aria-labelledby="stepper1trigger1">
							<h5 class="mb-1">Add Society Description</h5><br>
							<!-- <p class="mb-4">Enter your personal information to get closer to copanies</p> -->

							<div class="row g-3">
								
								<div class="col-12 col-lg-6">
									<label for="Short-Description" name="Objective-Title" class="form-label">Objective Title</label>
									<input type="text" name="objectives_title" class="form-control" name="objectives_title">
									@error('objectives_title')
									<span style="color: red" role="alert">
									<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>

                                <div class="col-md-6">
								<div class="form-group">
								<button id="" type="button" class="add_field btn btn-primary">Add more</button> 
								<button id="remove" type="button" class="btn btn-warning">Remove last</button>
								</div>
								<div class="inputs-container">
								<div class="input-row" style="display: flex;">
                                <input type="text" style="flex: 1; margin-right: 10px;" class="input form-control" name="objectives_description[]" value="">
								</div>
								</div>
								@error('objective_description')
									<span style="color: red" role="alert">
									<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>		

								<div class="col-12 col-lg-6">
									<label for="Short-Description" name="Objective-Title" class="form-label">institutions Title</label>
									<input type="text" name="institutions_title" class="form-control" name="institutions_title">
									@error('institutions_title')
									<span style="color: red" role="alert">
									<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>

                                <div class="col-md-6">
                                <div class="form-group">
                                <button id="" type="button" class="add_field1 btn btn-primary">Add more</button> 
                                <button id="remove1" type="button" class="btn btn-warning">Remove last</button>
                                </div>
                                <div class="inputs-container1">
                                <div class="input-row1" style="display: flex;">
                                <input type="text" style="flex: 1; margin-right: 10px;" class="input1 form-control" name="institutions_description[]" value="">
                                </div>
                                </div>
                                @error('institutions_description')
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
	
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script type="text/javascript">

$(document).ready(function() {
$(document).on('click', '.add_field', function() {
let inputRow = $('<div style="display: flex;" class="input-row"></div>'); // Create a new input row
let input1 = $('<input type="text" style="flex: 1; margin-right: 10px;" class="input form-control" name="objective_description[]" value="">');
inputRow.append(input1); // Add the inputs to the input row
$('.inputs-container').append(inputRow); // Add the input row to the inputs container
});

$("#remove").on("click", function(e) {
e.preventDefault();
$(".input-row").last().remove();
});
});

$(document).ready(function() {
$(document).on('click', '.add_field1', function() {
let inputRow1 = $('<div style="display: flex;" class="input-row1"></div>'); // Create a new input row
let input11 = $('<input type="text" style="flex: 1; margin-right: 10px;" class="input1 form-control" name="institutions_description[]" value="">');
inputRow1.append(input11); // Add the inputs to the input row
$('.inputs-container1').append(inputRow1); // Add the input row to the inputs container
});

$("#remove1").on("click", function(e) {
e.preventDefault();
$(".input-row1").last().remove();
});
});
</script>
@endsection