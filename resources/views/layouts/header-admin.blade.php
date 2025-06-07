<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Home - Healthy-Belly</title>

	<!-- Main Styles -->
	<link rel="stylesheet" href="{{asset('admin/styles/style.min.css')}}">

	<link rel="stylesheet" href="{{asset('admin/styles/custom.css')}}">

	<!-- Material Design Icon -->
	<link rel="stylesheet" href="{{asset('admin/fonts/material-design/css/materialdesignicons.css')}}">

	<!-- mCustomScrollbar -->
	<link rel="stylesheet" href="{{asset('admin/plugin/mCustomScrollbar/jquery.mCustomScrollbar.min.css')}}">

	<!-- Waves Effect -->
	<link rel="stylesheet" href="{{asset('admin/plugin/waves/waves.min.css')}}">

	<!-- Sweet Alert -->
	<link rel="stylesheet" href="{{asset('admin/plugin/sweet-alert/sweetalert.css')}}">

	<!-- Percent Circle -->
	<link rel="stylesheet" href="{{asset('admin/plugin/percircle/css/percircle.css')}}">

	<!-- Chartist Chart -->
	<link rel="stylesheet" href="{{asset('admin/plugin/chart/chartist/chartist.min.css')}}">

	<!-- FullCalendar -->
	<link rel="stylesheet" href="{{asset('admin/plugin/fullcalendar/fullcalendar.min.css')}}">
	<link rel="stylesheet" href="{{asset('admin/plugin/fullcalendar/fullcalendar.print.css')}}" media='print'>

	<!-- Color Picker -->
    <link rel="stylesheet" href="{{asset('admin/color-switcher/color-switcher.min.css')}}">
    <script src="{{asset('admin/plugin/tinymce/tinymce.min.js')}}"></script>

</head>

<body>
<div class="main-menu">
	<header class="header">
		<a href="{{route('admin_dashboard')}}" class="logo">Healthy-Belly</a>
		<button type="button" class="button-close fa fa-times js__menu_close"></button>
	</header>
	<!-- /.header -->
	<div class="content">

		<div class="navigation">
			<ul class="menu js__accordion nav">
				<li class="{{ request()->is('admin') ? 'current' : '' }}">
					<a class="waves-effect" href="{{route('admin_dashboard')}}"><i class="menu-icon mdi mdi-view-dashboard"></i><span>Dashboard</span></a>
				</li>
				<li class="{{ request()->is('admin/shop-details') ? 'current' : '' }} {{ request()->is('admin/About-Us') ? 'current' : '' }} {{ request()->is('admin/list-banners') ? 'current' : '' }} {{ request()->is('admin/list-socialMedia') ? 'current' : '' }}">
					<a class="waves-effect parent-item js__control" href="#"><i class="menu-icon mdi mdi-flower"></i><span>CMS</span><span class="menu-arrow fa fa-angle-down"></span></a>
					<ul class="sub-menu js__content">
                    <li><a href="{{route('admin.shop_details')}}">Shop Details</a></li>
                        <li><a href="{{route('admin.about_us')}}">About Us</a></li>
						<!-- <li><a href="{{route('admin.list_best_chef')}}">About List Chef</a></li> -->
                        <li><a href="{{route('admin.list_banner')}}">Banners</a></li>
                        <li><a href="{{route('admin.list_socialmedia')}}">Social Media</a></li>
					</ul>
					<!-- /.sub-menu js__content -->
				</li>

				<li class="{{ request()->is('admin/list-parent-category') ? 'current' : '' }} {{ request()->is('admin/list-sub-category') ? 'current' : '' }} {{ request()->is('admin/list-product') ? 'current' : '' }} {{ request()->is('admin/list-Product-Variant') ? 'current' : '' }} {{ request()->is('admin/list-Product-Image') ? 'current' : '' }}">
					<a class="waves-effect parent-item js__control" href="#"><i class="menu-icon mdi mdi-briefcase"></i><span>Product</span><span class="menu-arrow fa fa-angle-down"></span></a>
					<ul class="sub-menu js__content">
						<li><a href="{{route('admin.list_parent_category')}}">Product Parent Category</a></li>
						<!--<li><a href="{{route('admin.list_sub_category')}}">Product Sub Category</a></li>-->
						<li><a href="{{route('admin.list_product')}}">All Products</a></li>
						<li><a href="{{route('admin.list_product_variant')}}">Product Cost & Variant</a></li>
						<li><a href="{{route('admin.list_product_image')}}">Product Detail Images</a></li>
					</ul>
				</li>
				
				<li class="{{ request()->is('admin/list-advertisement') ? 'current' : '' }}">
					<a class="waves-effect parent-item js__control" href="#"><i class="menu-icon mdi mdi-briefcase"></i><span>Advertisement</span><span class="menu-arrow fa fa-angle-down"></span></a>
					<ul class="sub-menu js__content">
						<li><a href="{{route('admin.list_advertisement')}}">Home Page Ads</a></li>
					</ul>
				</li>

				<li class="{{ request()->is('admin/list-Testimonial') ? 'current' : '' }}">
					<a class="waves-effect parent-item js__control" href="#"><i class="menu-icon mdi mdi-briefcase"></i><span>Testimonial</span><span class="menu-arrow fa fa-angle-down"></span></a>
					<ul class="sub-menu js__content">
						<li><a href="{{route('admin.list_testimonial')}}">All Testimonials</a></li>
					</ul>
				</li>
				
				<li class="{{ request()->is('admin/All-Reviews') ? 'current' : '' }}">
					<a class="waves-effect parent-item js__control" href="#"><i class="menu-icon mdi mdi-briefcase"></i><span>Review Section</span><span class="menu-arrow fa fa-angle-down"></span></a>
					<ul class="sub-menu js__content">
						<li><a href="{{route('admin.all_review')}}">All Reviews</a></li>
							
					</ul>
				</li>
				<li class="{{ request()->is('admin/list-all-order') ? 'current' : '' }}">
					<a class="waves-effect parent-item js__control" href="#"><i class="menu-icon mdi mdi-briefcase"></i><span>Order Management</span><span class="menu-arrow fa fa-angle-down"></span></a>
					<ul class="sub-menu js__content">
						<li><a href="{{route('admin.list_all_order')}}">All Orders</a></li>
							
					</ul>
				</li>
				<li class="{{ request()->is('admin/User-Enquiry') ? 'current' : '' }}">
					<a class="waves-effect parent-item js__control" href="#"><i class="menu-icon mdi mdi-briefcase"></i><span>Submissions</span><span class="menu-arrow fa fa-angle-down"></span></a>
					<ul class="sub-menu js__content">
						<li><a href="{{route('admin.user_enquiry')}}">User Enquiry</a></li>
							
					</ul>
				</li>
				
				<!-- <li>
					<a class="waves-effect parent-item js__control" href="#"><i class="menu-icon mdi mdi-briefcase"></i><span>Order Management</span><span class="menu-arrow fa fa-angle-down"></span></a>
					<ul class="sub-menu js__content">
						<li><a href="">All Orders</a></li>
							
					</ul>
				</li> -->
                <li>
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="menu-icon mdi mdi-logout"></i>
                    {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
                

			</ul>
			<!-- /.menu js__accordion -->
		</div>
		<!-- /.navigation -->
	</div>
	<!-- /.content -->
</div>
<!-- /.main-menu -->

<div class="fixed-navbar">
	<div class="pull-left">
		<button type="button" class="menu-mobile-button glyphicon glyphicon-menu-hamburger js__menu_mobile"></button>
		<h1 class="page-title">Home</h1>
		<!-- /.page-title -->
	</div>
	<!-- /.pull-left -->
	<div class="pull-right">
		<div class="ico-item">
			<a href="#" class="ico-item fa fa-search js__toggle_open" data-target="#searchform-header"></a>
			<form action="#" id="searchform-header" class="searchform js__toggle"><input type="search" placeholder="Search..." class="input-search"><button class="fa fa-search button-search" type="submit"></button></form>
			<!-- /.searchform -->
		</div>
		<!-- /.ico-item -->
		<div class="ico-item fa fa-arrows-alt js__full_screen"></div>
		<!-- /.ico-item fa fa-fa-arrows-alt -->
		<div class="ico-item toggle-hover js__drop_down ">
			<span class="fa fa-th js__drop_down_button"></span>
			<div class="toggle-content">
				<ul>
					<li><a href="#"><i class="fa fa-github"></i><span class="txt">Github</span></a></li>
					<li><a href="#"><i class="fa fa-bitbucket"></i><span class="txt">Bitbucket</span></a></li>
					<li><a href="#"><i class="fa fa-slack"></i><span class="txt">Slack</span></a></li>
					<li><a href="#"><i class="fa fa-dribbble"></i><span class="txt">Dribbble</span></a></li>
					<li><a href="#"><i class="fa fa-amazon"></i><span class="txt">Amazon</span></a></li>
					<li><a href="#"><i class="fa fa-dropbox"></i><span class="txt">Dropbox</span></a></li>
				</ul>
				<a href="#" class="read-more">More</a>
			</div>
			<!-- /.toggle-content -->
		</div>
		<!-- /.ico-item -->
		<a href="#" class="ico-item fa fa-envelope notice-alarm js__toggle_open" data-target="#message-popup"></a>
		<a href="#" class="ico-item pulse"><span class="ico-item fa fa-bell notice-alarm js__toggle_open" data-target="#notification-popup"></span></a>
		<div class="ico-item">
			<img src="http://placehold.it/80x80" alt="" class="ico-img">
			<ul class="sub-ico-item">
				<li><a href="#">Settings</a></li>
				<li><a href="#">Blog</a></li>
				<li>
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
			</ul>
			<!-- /.sub-ico-item -->
		</div>
		<!-- /.ico-item -->
	</div>
	<!-- /.pull-right -->
</div>
<!-- /.fixed-navbar -->
@yield('content')
		<!-- /.row -->

	</div>
	<!-- /.main-content -->
</div><!--/#wrapper -->
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="assets/script/html5shiv.min.js"></script>
		<script src="assets/script/respond.min.js"></script>
	<![endif]-->
	<!--
	================================================== -->
	<script src="{{asset('admin/scripts/jquery.min.js')}}"></script>
	<script src="{{asset('admin/scripts/modernizr.min.js')}}"></script>
	<script src="{{asset('admin/plugin/bootstrap/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('admin/plugin/mCustomScrollbar/jquery.mCustomScrollbar.concat.min.js')}}"></script>
	<script src="{{asset('admin/plugin/nprogress/nprogress.js')}}"></script>
	<script src="{{asset('admin/plugin/sweet-alert/sweetalert.min.js')}}"></script>
	<script src="{{asset('admin/plugin/waves/waves.min.js')}}"></script>
	<!-- Full Screen Plugin -->
	<script src="{{asset('admin/plugin/fullscreen/jquery.fullscreen-min.js')}}"></script>

	<!-- TinyMCE -->
	<!-- Plugin Files DON'T INCLUDES THESES FILES IF YOU USE IN THE HOST -->
	<link rel="stylesheet" href="{{asset('admin/plugin/tinymce/skins/lightgray/skin.min.css')}}">
	<script src="{{asset('admin/plugin/tinymce/plugins/advlist/plugin.min.js')}} "></script>
	<script src="{{asset('admin/plugin/tinymce/plugins/anchor/plugin.min.js')}} "></script>
	<script src="{{asset('admin/plugin/tinymce/plugins/autolink/plugin.min.js')}} "></script>
	<script src="{{asset('admin/plugin/tinymce/plugins/autoresize/plugin.min.js ')}}"></script>
	<script src="{{asset('admin/plugin/tinymce/plugins/autosave/plugin.min.js ')}}"></script>
	<script src="{{asset('admin/plugin/tinymce/plugins/bbcode/plugin.min.js')}} "></script>
	<script src="{{asset('admin/plugin/tinymce/plugins/charmap/plugin.min.js')}} "></script>
	<script src="{{asset('admin/plugin/tinymce/plugins/code/plugin.min.js')}} "></script>
	<script src="{{asset('admin/plugin/tinymce/plugins/codesample/plugin.min.js ')}}"></script>
	<script src="{{asset('admin/plugin/tinymce/plugins/colorpicker/plugin.min.js')}} "></script>
	<script src="{{asset('admin/plugin/tinymce/plugins/contextmenu/plugin.min.js')}} "></script>
	<script src="{{asset('admin/plugin/tinymce/plugins/directionality/plugin.min.js')}} "></script>
	<script src="{{asset('admin/plugin/tinymce/plugins/emoticons/plugin.min.js')}} "></script>
	<script src="{{asset('admin/plugin/tinymce/plugins/example/plugin.min.js ')}}"></script>
	<script src="{{asset('admin/plugin/tinymce/plugins/example_dependency/plugin.min.js')}} "></script>
	<script src="{{asset('admin/plugin/tinymce/plugins/fullpage/plugin.min.js')}} "></script>
	<script src="{{asset('admin/plugin/tinymce/plugins/fullscreen/plugin.min.js')}} "></script>
	<script src="{{asset('admin/plugin/tinymce/plugins/hr/plugin.min.js')}} "></script>
	<script src="{{asset('admin/plugin/tinymce/plugins/image/plugin.min.js')}} "></script>
	<script src="{{asset('admin/plugin/tinymce/plugins/imagetools/plugin.min.js ')}}"></script>
	<script src="{{asset('admin/plugin/tinymce/plugins/importcss/plugin.min.js')}} "></script>
	<script src="{{asset('admin/plugin/tinymce/plugins/insertdatetime/plugin.min.js')}} "></script>
	<script src="{{asset('admin/plugin/tinymce/plugins/layer/plugin.min.js')}} "></script>
	<script src="{{asset('admin/plugin/tinymce/plugins/legacyoutput/plugin.min.js')}} "></script>
	<script src="{{asset('admin/plugin/tinymce/plugins/link/plugin.min.js')}} "></script>
	<script src="{{asset('admin/plugin/tinymce/plugins/lists/plugin.min.js')}} "></script>
	<script src="{{asset('admin/plugin/tinymce/plugins/media/plugin.min.js ')}}"></script>
	<script src="{{asset('admin/plugin/tinymce/plugins/nonbreaking/plugin.min.js')}} "></script>
	<script src="{{asset('admin/plugin/tinymce/plugins/noneditable/plugin.min.js')}} "></script>
	<script src="{{asset('admin/plugin/tinymce/plugins/pagebreak/plugin.min.js')}} "></script>
	<script src="{{asset('admin/plugin/tinymce/plugins/paste/plugin.min.js')}} "></script>
	<script src="{{asset('admin/plugin/tinymce/plugins/preview/plugin.min.js')}} "></script>
	<script src="{{asset('admin/plugin/tinymce/plugins/print/plugin.min.js ')}}"></script>
	<script src="{{asset('admin/plugin/tinymce/plugins/save/plugin.min.js ')}}"></script>
	<script src="{{asset('admin/plugin/tinymce/plugins/searchreplace/plugin.min.js ')}}"></script>
	<script src="{{asset('admin/plugin/tinymce/plugins/spellchecker/plugin.min.js')}} "></script>
	<script src="{{asset('admin/plugin/tinymce/plugins/tabfocus/plugin.min.js')}} "></script>
	<script src="{{asset('admin/plugin/tinymce/plugins/table/plugin.min.js ')}}"></script>
	<script src="{{asset('admin/plugin/tinymce/plugins/template/plugin.min.js ')}}"></script>
	<script src="{{asset('admin/plugin/tinymce/plugins/textcolor/plugin.min.js')}} "></script>
	<script src="{{asset('admin/plugin/tinymce/plugins/textpattern/plugin.min.js')}} "></script>
	<script src="{{asset('admin/plugin/tinymce/plugins/visualblocks/plugin.min.js')}} "></script>
	<script src="{{asset('admin/plugin/tinymce/plugins/visualchars/plugin.min.js ')}}"></script>
	<script src="{{asset('admin/plugin/tinymce/plugins/wordcount/plugin.min.js')}} "></script>
	<script src="{{asset('admin/plugin/tinymce/themes/modern/theme.min.js')}}"></script>
	<!-- Plugin Files DON'T INCLUDES THESES FILES IF YOU USE IN THE HOST -->

	<script src="{{asset('admin/scripts/tinymce.init.min.js')}}"></script>

	<script src="{{asset('admin/scripts/main.min.js')}}"></script>
    <script src="{{asset('admin/color-switcher/color-switcher.min.js')}}"></script>

	<!-- Data Tables -->
	<script src="{{asset('admin/plugin/datatables/media/js/jquery.dataTables.min.js')}}"></script>
	<script src="{{asset('admin/plugin/datatables/media/js/dataTables.bootstrap.min.js')}}"></script>
	<script src="{{asset('admin/plugin/datatables/extensions/Responsive/js/dataTables.responsive.min.js')}}"></script>
	<script src="{{asset('admin/plugin/datatables/extensions/Responsive/js/responsive.bootstrap.min.js')}}"></script>
	<script src="{{asset('admin/scripts/datatables.demo.min.js')}}"></script>
	<script src="{{asset('admin/js/custom.js')}}"></script>

	{{-- Status active deactive --}}
	<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
       $('.ckeditor').ckeditor();
    });
    
</script>
</body>
</html>