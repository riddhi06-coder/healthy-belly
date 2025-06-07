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

                    <form data-toggle="validator" action="{{route('admin.save_product_variant')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <h3>Add Product variant Cost</h3>
                        <div class="form-group">
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label for="inputName" class="control-label">Select Product Type</label>
                                    <select class="form-control" id="product_type" name="product_type">
                                        <option value="">Select Product Type</option>
                                        <option value="Not Packed">Not Packed</option>
                                        <option value="Packed">Packed</option>
                                        <option value="Packed with size variant">Packed with size variant</option>
                                        
                                    </select>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="inputName" class="control-label">Select Product</label>
                                    <select class="form-control" id="product_id" name="product_id">
                                        <option value="">Select Product</option>
                                        @foreach($product as $products)
                                        <option value="{{$products->id}}">{{$products->product_name}}</option>
                                        @endforeach
                                    </select>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="row" id="weight">
                                <div class="form-group col-sm-6">
                                    <label for="inputName" class="control-label">Weight</label>
                                    <input type="number" class="form-control" id="weight" name="weight" placeholder="Weight">
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="inputName" class="control-label">Weight Unit</label>
                                    <select class="form-control" id="weight_unit" name="weight_unit">
                                        <option value="">Select Weight Unit</option>
                                        <!-- <option value="Kg">Kg</option> -->
                                        <option value="gm">gm</option>
                                    </select>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="row " id="size">
                                <div class="form-group col-sm-6">
                                    <label for="inputName" class="control-label">Select Product Size</label>
                                    <select class="form-control" id="size_category" name="size_category">
                                    <option value="">Select Product Size</option>
                                        <option value="Small">Small</option>
                                        <option value="Medium">Medium</option>
                                        <option value="Large">Large</option>
                                        <option value="Extra Large">Extra Large</option>
                                    </select>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="row" id="pack_size">
                                <div class="form-group col-sm-6">
                                    <label for="inputName" class="control-label">Select Pack Size</label>
                                    <select class="form-control" id="pack_size" name="pack_size">
                                    <option value="">Select Pack Pcs</option>
                                    <?php for($i=1; $i<=30; $i++){ ?>
                                        <option value="{{$i}} Pcs">{{$i}} Pcs</option>
                                    <?php } ?>
                                    </select>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="row">
                            <div class="form-group col-sm-6">
                                    <label for="inputName" class="control-label">Cost</label>
                                    <input type="number" step=".01" class="form-control " id="cost" name="cost" placeholder="Cost">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            
                        </div>
						<div class="form-group">
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(function() { 
    $('#weight').hide();
    $('#size').hide();
    $('#pack_size').hide();
    $('#product_type').change(function(){
        if($('#product_type').val() == 'Not Packed') {
            $('#weight').show(); 
            $('#size').hide(); 
            $('#pack_size').hide();
        } else if($('#product_type').val() == 'Packed') {
            $('#size').show(); 
            $('#pack_size').hide();
            $('#weight').hide();
        } else if($('#product_type').val() == 'Packed with size variant'){
            $('#pack_size').show(); 
            $('#size').hide();
            $('#weight').hide();
        } else if($('#product_type').val() == ''){
            $('#weight').hide();
            $('#size').hide();
            $('#pack_size').hide();
        }
    });
});
</script>
@endsection