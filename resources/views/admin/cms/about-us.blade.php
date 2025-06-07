@extends('layouts.header-admin')
@section('content')
<div id="wrapper">
	<div class="main-content">
		<div class="row small-spacing">
			<div class="col-xs-12">
				<div class="box-content">
                    @if (count($errors) > 0)
                        <div class = "alert alert-danger">
                            <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                            </ul>
                        </div>
                    @endif
                    @if(Session()->has('success'))
                        <div class="alert alert-success">
                            {{session()->get('success')}}
                        </div>
                    @endif
                    <form data-toggle="validator" action="{{ route('admin.update_about_us')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
							<label for="inputName" class="control-label">Title</label>
							<input type="text" class="form-control ckeditor" id="title" name="title" value="{{$about_detail->title}}" placeholder="Enter Title">
                        </div>
						<div class="form-group">
							<label for="inputName" class="control-label">About Us</label>
							<textarea class="form-control ckeditor" id="about_us" name="about_us" placeholder="Enter Shop Name">{{$about_detail->about_us}}</textarea>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label for="inputName" class="control-label">Image</label>
                                    <input type="file" class="form-control" id="image" name="image" placeholder="Select Image">
                                    <input type="hidden" id="old_image" name="old_image" value="{{$about_detail->image}}">
                                </div>
                                <div class="form-group col-sm-6">
                                    <img id="doctorimg" src="{{asset('/frontend/images/aboutus').'/'.$about_detail->image}}">
                                </div>
                            </div>
						</div>

                        <div class="form-group">
							<label for="inputName" class="control-label">Our Approch</label>
							<textarea class="form-control ckeditor" id="our_approch" name="our_approch" placeholder="Our Approch">{{$about_detail->our_approch}}</textarea>
                        </div>

                        <div class="form-group">
							<label for="inputName" class="control-label">Our Mission</label>
							<textarea class="form-control ckeditor" id="our_mission" name="our_mission" placeholder="Our Mission">{{$about_detail->our_mission}}</textarea>
                        </div>

                        <div class="form-group">
							<label for="inputName" class="control-label">Our Chef</label>
							<textarea class="form-control ckeditor" id="our_chef" name="our_chef" placeholder="Our Chef">{{$about_detail->our_chef}}</textarea>
                        </div>

						<div class="form-group">
							<button type="submit" name="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
						</div>
					</form>
				</div>
				<!-- /.box-content -->
			</div>
			<!-- /.col-xs-12 -->
		</div>
		<!-- /.row small-spacing -->
		<footer class="footer">
			<ul class="list-inline">
				<li>2021 ©MatrixBricks</li>
				<li><a href="#">Privacy</a></li>
				<li><a href="#">Terms</a></li>
				<li><a href="#">Help</a></li>
			</ul>
		</footer>
	</div>
	<!-- /.main-content -->
@endsection