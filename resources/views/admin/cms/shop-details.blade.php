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
                    <form data-toggle="validator" action="{{ route('admin.update_shop_details')}}" method="post" enctype="multipart/form-data">
                        @csrf
						<div class="form-group">
							<label for="inputName" class="control-label">Shop Name</label>
							<input type="text" class="form-control" id="shop_name" name="shop_name" value="{{$fetch_details->shop_name}}" placeholder="Enter Shop Name">
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label for="inputName" class="control-label">Logo</label>
                                    <input type="file" class="form-control" id="shop_logo" name="shop_logo" placeholder="Select Logo">
                                    <input type="hidden" id="old_logo" name="old_logo" value="{{$fetch_details->shop_logo}}">
                                </div>
                                <div class="form-group col-sm-6">
                                    <img id="logo" src="{{asset('public/frontend/images/logo').'/'.$fetch_details->shop_logo}}">
                                </div>
                            </div>
						</div>

						<div class="form-group">
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label for="inputEmail" class="control-label">Email 1</label>
                                    <input type="email" class="form-control" id="email1" name="email1" value="{{$fetch_details->email1}}" placeholder="Email 1" data-error="Bruh, that email address is invalid">
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="inputEmail" class="control-label">Email 2</label>
                                    <input type="email" class="form-control" id="email2" name="email2" value="{{$fetch_details->email2}}" placeholder="Email 2" data-error="Bruh, that email address is invalid">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label for="inputEmail" class="control-label">Contact 1</label>
                                    <input type="text" class="form-control" id="contact1" name="contact1" value="{{$fetch_details->contact1}}" placeholder="Contact 1" data-error="Bruh, that email address is invalid">
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="inputEmail" class="control-label">Contact 2</label>
                                    <input type="text" class="form-control" id="contact2" name="contact2" value="{{$fetch_details->contact2}}" placeholder="Contact 2" data-error="Bruh, that email address is invalid">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
						</div>
						<div class="form-group">
                            <div class="row">
                                <div class="form-group col-sm-4">
                                <label for="inputName" class="control-label">Address Line 1</label>
                                <input type="text" class="form-control" id="address1" name="address1" value="{{$fetch_details->address1}}" placeholder="Address Line 1">
                                </div>
                                <div class="form-group col-sm-4">
                                    <label for="inputName" class="control-label">Address Line 2</label>
                                    <input type="text" class="form-control" id="address2" name="address2" value="{{$fetch_details->address2}}" placeholder="Address Line 2" >
                                </div>
                                <div class="form-group col-sm-4">
                                    <label for="inputName" class="control-label">Address Line 3</label>
                                    <input type="text" class="form-control" id="address3" name="address3" value="{{$fetch_details->address3}}" placeholder="Address Line 3">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputName" class="control-label">Company Description</label>
                            <div class="dropdown js__drop_down">
                                <a href="#" class="dropdown-icon glyphicon glyphicon-option-vertical js__drop_down_button"></a>

                                <!-- /.sub-menu -->
                            </div>
                            <textarea class="form-control ckeditor" name="companydesc"> {{$fetch_details->description}}</textarea>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="form-group col-sm-6">
                                <label for="inputName" class="control-label">Meta Title</label>
                                <textarea class="form-control ckeditor" id="metatitle" name="metatitle" placeholder="Meta Title">{{$fetch_details->meta_title}}</textarea>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="inputName" class="control-label">Meta Keywords</label>
                                    <textarea class="form-control ckeditor" id="metakeyword" name="metakeyword" placeholder="Meta Keywords">{{$fetch_details->meta_keyword}}</textarea>
                                </div>

                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label for="inputName" class="control-label ">Meta Description</label>
                                    <textarea class="form-control ckeditor" id="metadesc" name="metadesc" placeholder="Meta Description">{{$fetch_details->meta_description}}</textarea>
                                </div>
                            </div>
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