$('#parent_cat').change(function(){
  var parentID = $(this).val();
  if(parentID){
    $.ajax({
      type:"GET",
      dataType: "json",
      url:"get-product-sub-category/"+parentID,
      success:function(res){
      if(res){
        $('select[name="sub_cat"]').empty();
        $('select[name="sub_cat"]').append('<option>Select Sub Category</option>');
        $.each(res,function(key,value){
          $('select[name="sub_cat"]').append('<option value="'+key+'">'+value+'</option>');
        });
      //alert(res);


      }else{
        $("#sub_cat").empty();
      }
      }
    });

  }else{
    $("#sub_cat").empty();
  }
  }); 

 // $('.doctorToggle').change(function() {
    $('#bannerexample').on("change" , ".bannerToggle" ,function() {
    var status = $(this).prop('checked') == true ? 1 : 0;
    var id = $(this).data('id');
     console.log(status);
    $.ajax({
        type: "GET",
        dataType: "json",
        url: 'banners-status',
        data: {'status': status, 'id': id},
        success: function(data){
          alert(data.success);
        }
    });
})

// $('.userToggle').change(function() {
  $('#listProductCategory').on("change" , ".parentCategoryToggle" ,function() {
  var status = $(this).prop('checked') == true ? 1 : 0;
  var id = $(this).data('id');
   console.log(status);
  $.ajax({
      type: "GET",
      dataType: "json",
      url: 'parent-category-status',
      data: {'status': status, 'id': id},
      success: function(data){
        alert(data.success);
      }
  });
})

// $('.userToggle').change(function() {
  $('#example').on("change" , ".productvariantToggle" ,function() {
    var status = $(this).prop('checked') == true ? 1 : 0;
    var id = $(this).data('id');
     console.log(status);
    $.ajax({
        type: "GET",
        dataType: "json",
        url: 'product-variant-status',
        data: {'status': status, 'id': id},
        success: function(data){
          alert(data.success);
        }
    });
  })

// $('.questionToggle').change(function() {
  $('#listProductSubCategory').on("change" , ".subCategoryToggle" ,function() {
  var status = $(this).prop('checked') == true ? 1 : 0;
  var id = $(this).data('id');
  $.ajax({
      type: "GET",
      dataType: "json",
      url: 'sub-category-status',
      data: {'status': status, 'id': id},
      success: function(data){
        alert(data.success);
      }
  });
})

$('#productTable').on("change" , ".ProductavailableToggle" ,function() {
  var status = $(this).prop('checked') == true ? 1 : 0;
  var product_id = $(this).data('id');
   console.log(status);
  $.ajax({
      type: "GET",
      dataType: "json",
      url: 'http://localhost/zestige/admin/product-available-status',
      data: {'status': status, 'product_id':product_id},
      success: function(data){
        alert(data.success);
      }
  });
})



$('#example').on("change" , ".socialMediaToggle" ,function(e) {
  var status = $(this).prop('checked') == true ? 1 : 0;
  var social_id = $(this).data('id');
  $.ajax({
      type: "GET",
      dataType: "json",
      url: 'socialMedia-status',
      data: {'status': status, 'social_id': social_id},
      success: function(data){
        alert(data.success);
      }
  });
});


$('#listProduct').on("change" , ".productToggle" ,function(e) {
    var status = $(this).prop('checked') == true ? 1 : 0;
    var id = $(this).data('id');
    $.ajax({
        type: "GET",
        dataType: "json",
        url: 'product-status',
        data: {'status': status, 'id': id},
        success: function(data){
          // alert(data.success);
        }
    });
});
$('#listProduct').on("change" , ".productBestSellerToggle" ,function(e) {
    var status = $(this).prop('checked') == true ? 1 : 0;
    var id = $(this).data('id');
    $.ajax({
        type: "GET",
        dataType: "json",
        url: 'product-bestseller-status',
        data: {'best_seller': status, 'id': id},
        success: function(data){
          // alert(data.success);
        }
    });
});
$('#listProduct').on("change" , ".productNewArrivalToggle" ,function(e) {
    var status = $(this).prop('checked') == true ? 1 : 0;
    var id = $(this).data('id');
    $.ajax({
        type: "GET",
        dataType: "json",
        url: 'product-newarrival-status',
        data: {'new_arrival': status, 'id': id},
        success: function(data){
          // alert(data.success);
        }
    });
});
$('#listProduct').on("change" , ".productAvailableToggle" ,function(e) {
  var status = $(this).prop('checked') == true ? 1 : 0;
  var id = $(this).data('id');
  $.ajax({
      type: "GET",
      dataType: "json",
      url: 'product-available-status',
      data: {'available': status, 'id': id},
      success: function(data){
        // alert(data.success);
      }
  });
});

$('#listadvertisement').on("change" , ".advertisementToggle" ,function(e) {
  var status = $(this).prop('checked') == true ? 1 : 0;
    var id = $(this).data('id');
    $.ajax({
        type: "GET",
        dataType: "json",
        url: 'advertisement-status',
        data: {'status': status, 'id': id},
        success: function(data){
          // alert(data.success);
        }
    });
});

$('#listProductImage').on("change" , ".productImageToggle" ,function(e) {
  var status = $(this).prop('checked') == true ? 1 : 0;
    var id = $(this).data('id');
    $.ajax({
        type: "GET",
        dataType: "json",
        url: 'product-image-status',
        data: {'status': status, 'id': id},
        success: function(data){
          // alert(data.success);
        }
    });
});

$('#listchef').on("change" , ".chefToggle" ,function(e) {
  var status = $(this).prop('checked') == true ? 1 : 0;
    var id = $(this).data('id');
    $.ajax({
        type: "GET",
        dataType: "json",
        url: 'chef-status',
        data: {'status': status, 'id': id},
        success: function(data){
          // alert(data.success);
        }
    });
});

$('#listreview').on("change" , ".reviewToggle" ,function(e) {
  var status = $(this).prop('checked') == true ? 1 : 0;
    var id = $(this).data('id');
    $.ajax({
        type: "GET",
        dataType: "json",
        url: 'Review-status',
        data: {'status': status, 'id': id},
        success: function(data){
          // alert(data.success);
        }
    });
});

$('#product_category_name').keyup(function(){
  var category_name=$(this).val()+"-"+Math.floor(1000 + Math.random() * 90000);
  var f_category_name=category_name.split(' ').join('-');
  $('#product_category_slug').val(f_category_name);
  if($('#product_category_name').val()==''){
    $('#product_category_slug').val(" ");
  }
});
$('#treatment_sub_category_name').keyup(function(){
  var category_name=$(this).val()+"-"+Math.floor(1000 + Math.random() * 90000);
  var f_category_name=category_name.split(' ').join('-');
  $('#treatment_sub_category_slug').val(f_category_name);
  if($('#treatment_sub_category_name').val()==''){
    $('#treatment_sub_category_slug').val(" ");
  }
});
$('#product_name').keyup(function(){
  var category_name=$(this).val()+"-"+Math.floor(1000 + Math.random() * 90000);
  var f_category_name=category_name.split(' ').join('-');
  $('#product_slug').val(f_category_name);
  if($('#product_name').val()==''){
    $('#product_slug').val(" ");
  }
});