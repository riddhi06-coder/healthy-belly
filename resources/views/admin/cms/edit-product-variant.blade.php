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

                    <form data-toggle="validator" action="{{route('admin.update_product_variant')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <h3>Edit Product variant Cost</h3>
                        <div class="form-group">
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label for="inputName" class="control-label">Select Product</label>
                                    <select class="form-control" id="product_id" name="product_id">
                                        @foreach($product as $products)
                                        <option value="{{$products->id}}" {{$products->id == $variant_detail->product_id? 'selected' : ''}}>{{$products->product_name}}</option>
                                        @endforeach
                                    </select>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <?php if($variant_detail->weight !=''){ ?>
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label for="inputName" class="control-label">Weight</label>
                                    <input type="number" class="form-control" id="weight" name="weight" value="{{$variant_detail->weight}}" placeholder="Weight">
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="inputName" class="control-label">Weight Unit</label>
                                    <select class="form-control" id="weight_unit" name="weight_unit">
                                        <!-- <option value="Kg" {{$variant_detail->weight_unit=='Kg'?'selected' : ''}}>Kg</option> -->
                                        <option value="gm" {{$variant_detail->weight_unit=='gm'?'selected' : ''}}>gm</option>
                                    </select>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <?php }elseif($variant_detail->size_category !=''){ ?>
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label for="inputName" class="control-label">Weight Unit</label>
                                    <select class="form-control" id="size_category" name="size_category">
                                        <option value="Small" {{$variant_detail->size_category=='Small'?'selected' : ''}}>Small</option>
                                        <option value="Medium" {{$variant_detail->size_category=='Medium'?'selected' : ''}}>Medium</option>
                                        <option value="Large" {{$variant_detail->size_category=='Large'?'selected' : ''}}>Large</option>
                                        <option value="Extra Large" {{$variant_detail->size_category=='Extra Large'?'selected' : ''}}>Extra Large</option>
                                    </select>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <?php }elseif($variant_detail->packed !=''){ ?>
                                <div class="row">
                                <div class="form-group col-sm-6">
                                    <label for="inputName" class="control-label">Select Pack Size</label>
                                    <select class="form-control" id="pack_size" name="pack_size">
                                    <?php for($i=1; $i<=30; $i++){ ?>
                                        <option value="{{$i}} Pcs" {{$variant_detail->packed_size==$i?'selected' : ''}}>{{$i}} Pcs</option>
                                    <?php } ?>
                                    </select>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <?php } ?>
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label for="inputName" class="control-label">Cost</label>
                                    <input type="number" step=".01" class="form-control " id="cost" name="cost" value="{{$variant_detail->cost}}" placeholder="Cost">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            
                        </div>
						<div class="form-group">
                            <input type="hidden" name="id" id="id" value="{{$variant_detail->id}}">
                            <button type="submit" name="submit" class="btn btn-primary waves-effect waves-light">Submit</button>&nbsp;
                            <a class="btn btn-default" href="{{route('admin.list_product_variant')}}">Cancel</a>
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