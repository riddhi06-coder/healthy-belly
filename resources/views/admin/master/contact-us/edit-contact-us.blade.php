@extends('layouts.admin-header')

@section('content')
<script src="//cdn.gaic.com/cdn/ui-bootstrap/0.58.0/js/lib/ckeditor/ckeditor.js"></script>
  <script src="//cdn.gaic.com/cdn/ui-bootstrap/0.58.0/js/lib/jquery.min.js"></script>
  <script src='http://ckeditor.com/cke4/addon/wordcount.js'></script>
		<!--end header -->
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Edit  Contact Us</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Edit Contact Us</li>
							</ol>
						</nav>
					</div>
				</div>
			  <!--end breadcrumb-->

			  <!--start stepper one--> 
			    <hr>
				<div id="stepper1" class="bs-stepper">
				  <div class="card">
					

				    <div class="card-body">
					
					  <div class="bs-stepper-content">
						<form action="{{route('contact_us.update_contact_us')}}" method="post" enctype="multipart/form-data">
							@csrf
                            <input class="form-control" type="hidden" value="{{$data->id}}" name="id">

						  <div id="test-l-1" role="tabpanel" class="bs-stepper-pane" aria-labelledby="stepper1trigger1">
							<h5 class="mb-1">Add Contact Us</h5><br>
							<!-- <p class="mb-4">Enter your personal information to get closer to copanies</p> -->

							<div class="row g-3">
								
								<div class="col-12 col-lg-6">
									<label for="Header Title" name="Header Title" class="form-label">Contact Number</label>
									<input class="form-control" type="text" value="{{$data->contact_number}}" name="contact_number">
									@error('contact_number')
									<span style="color: red" role="alert">
									<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>

								<div class="col-12 col-lg-6">
									<label for="Header Sub-Title" name="Header Sub-Title" class="form-label">Email</label>
									<input class="form-control" type="text" value="{{$data->email}}" name="email">
									@error('email')
									<span style="color: red" role="alert">
									<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>
                                
								<div class="col-12 col-lg-6">
									<label for="Header Sub-Title" name="Header Sub-Title" class="form-label">Location</label>
									<textarea class="form-control editor" name="location">{{$data->location}}</textarea>
									@error('location')
									<span style="color: red" role="alert">
									<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>

								
							
								<center>
								<div class="col-12 col-lg-6">
									<button class="btn btn-primary px-4" >Submit</button>
								</div>
							</center>
							</div><!---end row-->
							
						  </div>
						 
						</form>
					  </div>
					   
					</div>
				   </div>
				 </div>
				
			</div>
		</div>
	
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
$(() => {
  CKEDITOR.config.toolbar = [
    { name: 'clipboard', groups: [ 'clipboard', 'undo' ], items: [ 'Undo', 'Redo' ] },
    { name: 'links', items: [ 'Link', 'Unlink'] },
    { name: 'insert', items: [ 'Image', 'Table' ] },
    { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold', 'Italic', 'Underline'] },
    { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ], items: [ 'NumberedList', 'BulletedList', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock'] },
    { name: 'styles', items: [ 'FontSize' ] },
    { name: 'colors', items: [ 'TextColor' ] },
    { name: 'others', items: [ '-' ] },
    { name: 'document', items : [ 'Source'] },
  ];  
  CKEDITOR.on( 'dialogDefinition', function( ev ) {
    // Take the dialog name and its definition from the event data.
    var dialogName = ev.data.name;
    var dialogDefinition = ev.data.definition;
    if ( dialogName == 'link' ) {
        // Get a reference to the "Link Info" tab.
        var targetTab = dialogDefinition.getContents( 'target' );
        // Set the default value for the URL field.
//         var urlField = infoTab.get( 'url' );
//         urlField[ 'default' ] = 'www.example.com';
      
//         var linkTpyeField = infoTab.get('linkType');
//         linkTpyeField['items'] = [["URL", 'url']];
      // 重写target 效果
        var targetField = targetTab.elements[0].children[0];
        
        targetField['items'] = [["New Window (_blank)", "_blank"]];
        targetField['default'] = '_blank';
      // 隐藏advance
      var advancedtab = dialogDefinition.getContents( "advanced" );
      advancedtab['hidden'] = true;
      //
      //
      //
     
    } else  if(dialogName === 'image'){
      var imageInfo = dialogDefinition.getContents('info');
      console.log('ccc', imageInfo)
    }
});
  document.querySelectorAll('.editor').forEach((element) => {
  CKEDITOR.replace(element);
});
});


            </script>	
@endsection