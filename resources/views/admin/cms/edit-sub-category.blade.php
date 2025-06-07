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

                    <form data-toggle="validator" action="{{route('admin.update_sub_category')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <h3>Edit Sub Category</h3>
                        <div class="form-group">
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <td><label for="inputName" class="control-label">Product Category Name</label>
                                    <input type="text" class="form-control" id="product_category_name" name="product_category_name" value="{{$cat_detail->name}}" placeholder="Product Category Name" >
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group col-sm-6">
                                    <td><label for="inputName" class="control-label">Slug</label>
                                    <input type="text" class="form-control" id="product_category_slug" name="product_category_slug" value="{{$cat_detail->slug}}" readonly="">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <td><label for="inputName" class="control-label">Image</label>
                                    <input type="file" class="form-control" id="image" name="image" value="{{old('image')}}" placeholder="Product Category Name" >
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group col-sm-6">
                                    <td><label for="inputName" class="control-label">Current Image : </label>
                                    <input type="hidden" name="old_image" value="{{$cat_detail->image}}" >
                                    <input type="hidden" name="id" value="{{$cat_detail->id}}" >
                                    <img id="doctorimg" src="{{asset('public/frontend/images/subCategory')}}/{{$cat_detail->image}}">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <td><label for="inputName" class="control-label">Select Parent Category</label>
                                    <select class="form-control ckeditor" id="parent_cat" name="parent_cat">
                                    @foreach($parent_cat as $parent_cats)
                                    <option value="{{$parent_cats->id}}" {{$parent_cats->id == $cat_detail->parent_cat_id  ? 'selected' : ''}}>{{$parent_cats->category_name}}</option>
                                    @endforeach
                                    </select>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group col-sm-12">
                                    <td><label for="inputName" class="control-label">Description</label>
                                    <textarea type="text" class="form-control ckeditor" id="description" name="description">{{$cat_detail->description}}</textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            
                        </div>
						<div class="form-group">
                            <button type="submit" name="submit" class="btn btn-primary waves-effect waves-light">Update</button>&nbsp;
                            <a class="btn btn-default" href="{{route('admin.list_sub_category')}}">Cancel</a>
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