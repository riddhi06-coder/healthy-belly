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
                    <form data-toggle="validator" action="{{route('admin.update_banner')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <h3>Add Banner</h3>
                        <div class="form-group">
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label for="inputName" class="control-label">Title</label>
                                    <input type="text" class="form-control" id="image_title" name="image_title" value="{{$banner_detail->title}}" placeholder="Image Title" >
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label for="inputContact" class="control-label">Upload Image</label>
                                    <input type="hidden" name="old_image" value="{{$banner_detail->image}}">
                                    <input type="file" class="form-control" id="image" name="image" placeholder="Upload Picture">
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="inputContact" class="control-label">Current Image</label>
                                    <img id="doctorimg" src="{{asset('frontend/images/banner')}}/{{$banner_detail->image}}" >
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label for="inputContact" class="control-label">Upload Xs-Image</label>
                                    <input type="hidden" name="old_xsimage" value="{{$banner_detail->xs_image}}">
                                    <input type="file" class="form-control" id="xs_image" name="xs_image">
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="inputContact" class="control-label">Current Xs-Image</label>
                                    <img id="doctorimg" src="{{asset('frontend/images/xsbanner')}}/{{$banner_detail->xs_image}}" >
                                </div>
                            </div>
                        </div>

                        <input type="hidden" name="id" value="{{$banner_detail->id}}">
						<div class="form-group">
                            <button type="submit" class="btn btn-primary waves-effect waves-light">Update</button>&nbsp;
                            <a class="btn btn-default" href="{{route('admin.list_banner')}}">Cancel</a>
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