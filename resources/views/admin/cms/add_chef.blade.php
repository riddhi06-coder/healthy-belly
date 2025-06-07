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

                    <form data-toggle="validator" action="{{route('admin.save_best_chef')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <h3>Add Chef</h3>
                        <div class="form-group">
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <td><label for="inputName" class="control-label">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}" placeholder="Name" >
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group col-sm-6">
                                <td><label for="inputName" class="control-label">Profession</label>
                                    <input type="text" class="form-control" id="profession" name="profession" value="{{old('profession')}}" placeholder="Profession" >
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <td><label for="inputName" class="control-label">Image</label>
                                    <input type="file" class="form-control" id="image" name="image" value="{{old('image')}}" placeholder="Product Category Name" >
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            
                        </div>
						<div class="form-group">
                            <button type="submit" name="submit" class="btn btn-primary waves-effect waves-light">Submit</button>&nbsp;
                            <a class="btn btn-default" href="{{route('admin.list_best_chef')}}">Cancel</a>
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