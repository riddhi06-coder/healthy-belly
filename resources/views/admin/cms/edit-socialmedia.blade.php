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

                    <form data-toggle="validator" action="{{route('admin.update_socialmedia')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <h3>Edit Social-Media Details</h3>
                        <div class="form-group">
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label for="inputName" class="control-label">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{$social_media->name}}" placeholder="User Name" >
                                    <input type="hidden" name="id" value="{{$social_media->id}}">
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="inputName" class="control-label">URL</label>
                                        <input type="text" class="form-control" id="url" name="url" value="{{$social_media->url}}" placeholder="Partner Email" >
                                        <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label for="inputName" class="control-label">Logo</label>
                                    <input type="text" class="form-control" id="logos" name="logo" value="{{$social_media->logo}}" >
                                    {{-- <input type="file" class="form-control" id="logos" name="logo" value="{{old('logo')}}" > --}}
                                    <div class="help-block with-errors"></div>
                                    {{-- <input type="hidden" name="old_logo" value="{{$social_media->logo}}"> --}}
                                </div>
                                <div class="form-group col-sm-6">
                                    {{-- <img id="doctorimg" src="{{asset('public/frontend/images/social-media').'/'.$social_media->logo}}"> --}}
                                </div>
                            </div>

						<div class="form-group">
                            <button type="submit" name="submit" class="btn btn-primary waves-effect waves-light">Update</button>&nbsp;
                            <a class="btn btn-default" href="{{route('admin.list_socialmedia')}}">Cancel</a>
						</div>
					</form>
                </div>

				<!-- /.box-content -->
			</div>
			<!-- /.col-xs-12 -->
		</div>
		<!-- /.row small-spacing -->
	</div>
	<!-- /.main-content -->

@endsection