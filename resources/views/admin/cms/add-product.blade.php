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

                    <form data-toggle="validator" action="{{route('admin.save_product')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <h3>Add Product</h3>
                        <div class="form-group">
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <td><label for="inputName" class="control-label">Product Name</label>
                                    <input type="text" class="form-control" id="product_name" name="product_name" value="{{old('product_name')}}" placeholder="Product Name" >
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group col-sm-6">
                                    <td><label for="inputName" class="control-label">Slug</label>
                                    <input type="text" class="form-control" id="product_slug" name="product_slug" readonly="">
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
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <td><label for="inputName" class="control-label">Select Parent Category</label>
                                    <select class="form-control ckeditor" name="parent_cat">
                                    <option value="">Choose Parent Category</option>
                                    @foreach($parent_cat as $parent_cats)
                                    <option value="{{$parent_cats->id}}">{{$parent_cats->category_name}}</option>
                                    @endforeach
                                    </select>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <!--<div class="form-group col-sm-6">-->
                                <!--    <td><label for="inputName" class="control-label">Select Sub Category</label>-->
                                <!--    <select class="form-control ckeditor" id="sub_cat" name="sub_cat">-->
                                <!--    <option value="">Choose Sub Category</option>-->
                                    
                                <!--    </select>-->
                                <!--    <div class="help-block with-errors"></div>-->
                                <!--</div>-->
                            </div>
                            <!-- <div class="row">
                                <div class="form-group col-sm-6">
                                    <td><label for="inputName" class="control-label">Main Price</label>
                                    <input type="number" class="form-control" id="main_price" name="main_price" value="{{old('main_price')}}" placeholder="Product Main Price" >
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group col-sm-6">
                                    <td><label for="inputName" class="control-label">Selling Price</label>
                                    <input type="number" class="form-control" id="selling_price" name="selling_price" value="{{old('selling_price')}}" placeholder="Product Selling Price" >
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div> -->
                            <div class="row">
                                <div class="form-group col-sm-3">
                                    <input type="checkbox" id="new_arrival" name="new_arrival" value="1">
                                    <label for="inputName" class="control-label">New Arrival</label>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group col-sm-3">
                                    <input type="checkbox" id="best_seller" name="best_seller" value="1">
                                    <label for="inputName" class="control-label">Best Seller</label>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-12">
                                    <td><label for="inputName" class="control-label">Description</label>
                                    <textarea type="text" class="form-control ckeditor" id="description" name="description"></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            
                        </div>
						<div class="form-group">
                            <button type="submit" name="submit" class="btn btn-primary waves-effect waves-light">Submit</button>&nbsp;
                            <a class="btn btn-default" href="{{route('admin.list_product')}}">Cancel</a>
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