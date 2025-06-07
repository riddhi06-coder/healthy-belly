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
                    <form data-toggle="validator" action="{{route('admin.save_testimonial')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <h3>Add Testimonial</h3>
                        <div class="form-group">
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label for="inputName" class="control-label">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" value="" placeholder="Name" >
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="inputName" class="control-label">Designation</label>
                                    <input type="text" class="form-control" id="designation" name="designation" value="" placeholder="Designation" >
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="row">
                            <div class="form-group col-sm-12">
                                    <label for="inputContact" class="control-label">Description</label>
                                    <textarea class="form-control" id="description" name="description"></textarea>
                                </div>
                            </div>
                        </div>


						<div class="form-group">
                            <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>&nbsp;
                            <a class="btn btn-default" href="{{route('admin.list_testimonial')}}">Cancel</a>
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