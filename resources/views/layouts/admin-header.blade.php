<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<link rel="icon" href="{{asset('assets/images/favicon-32x32.png')}}" type="image/png"/>
	<!--plugins-->
	<link href="{{asset('assets/plugins/vectormap/jquery-jvectormap-2.0.2.css')}}" rel="stylesheet"/>
	<link href="{{asset('assets/plugins/simplebar/css/simplebar.css')}}" rel="stylesheet" />
	<link href="{{asset('assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet" />
	<link href="{{asset('assets/plugins/metismenu/css/metisMenu.min.css')}}" rel="stylesheet"/>
	<link href="{{asset('assets/plugins/datatable/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet" />
	<!-- loader-->
	<link href="{{asset('assets/css/pace.min.css')}}" rel="stylesheet"/>
	<script src="{{asset('assets/js/pace.min.js')}}"></script>
	<!-- Bootstrap CSS -->
	<link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
	<link href="{{asset('assets/css/bootstrap-extended.css')}}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
	<link href="{{asset('assets/css/app.css')}}" rel="stylesheet">
	<link href="{{asset('assets/css/icons.css')}}" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" rel="stylesheet" />
    <link href='https://cdn.jsdelivr.net/npm/froala-editor@latest/css/froala_editor.pkgd.min.css' rel='stylesheet' type='text/css' />
	<link rel="stylesheet" href="{{asset('assets/plugin/timepicker/bootstrap-timepicker.min.css')}} ">

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
	<!-- Theme Style CSS -->
	<link rel="stylesheet" href="{{asset('assets/css/dark-theme.css')}}"/>
	<link rel="stylesheet" href="{{asset('assets/css/semi-dark.css')}}"/>
	<link rel="stylesheet" href="{{asset('assets/css/header-colors.css')}}"/>
	<script src="//cdn.gaic.com/cdn/ui-bootstrap/0.58.0/js/lib/ckeditor/ckeditor.js"></script>
  <script src="//cdn.gaic.com/cdn/ui-bootstrap/0.58.0/js/lib/jquery.min.js"></script>
  <script src='http://ckeditor.com/cke4/addon/wordcount.js'></script> 
	<title>IIBS - Admin Dashboard</title>
</head>

<body>
	<!--wrapper-->
@if(Auth::check() && Auth::user()->role == 1)
	<div class="wrapper">
		<!--sidebar wrapper -->
		<div class="sidebar-wrapper" data-simplebar="true">
			<div class="sidebar-header">
				<div>
					<img src="{{asset('assets/images/logo-icon.png')}}" class="logo-icon" alt="logo icon">
				</div>
				<div>
					<h4 class="logo-text">IIBS</h4>
				</div>
				<div class="toggle-icon ms-auto"><i class='bx bx-arrow-back'></i>
				</div>
			 </div>
			<!--navigation-->
			<ul class="metismenu" id="menu">
				<li>
				<a href="{{route('admin.login.dashboard')}}" class="">
				<div class="parent-icon"><i class='bx bx-home-alt'></i>
				</div>
				<div class="menu-title">Dashboard</div>
				</a>
				</li>
			  <li>
				<a href="javascript:;" class="has-arrow">
				 <div class="parent-icon"><i class="bx bx-category"></i></div>
				<div class="menu-title">Member</div>
				</a>
				<ul>

				<li>
				<a href="{{ route('member.member_list') }}">
				<i class='bx bx-radio-circle'></i>Member List
				</a>
				</li>
				</ul>
				</li>
			
				<li>
				<a href="javascript:;" class="has-arrow">
				<div class="parent-icon"><i class="bx bx-category"></i></div>
				<div class="menu-title">Home</div>
				</a>
				<ul>
				<li>
				<a href="{{ route('banner.list_banner') }}">
				<i class='bx bx-radio-circle'></i>Banner
				</a>
				</li>
				<li>
				<a href="{{ route('about.list_about') }}">
				<i class='bx bx-radio-circle'></i>About Short Description
				</a>
				</li>
				<li>
				<a href="{{ route('testimonial.testimonial_list') }}">
				<i class='bx bx-radio-circle'></i>Testimonial
				</a>
				</li>
				</ul>
				</li>

                <li>
				<a href="javascript:;" class="has-arrow">
				 <div class="parent-icon"><i class="bx bx-category"></i></div>
				<div class="menu-title">about</div>
				</a>
				<ul>
				<li>
				<a href="{{ route('about.list_about_detail') }}">
				<i class='bx bx-radio-circle'></i>About Details 
				</a>
				<ul>
				<li>
				<a href="{{ route('about.list_about_count_detail') }}">
				<i class='bx bx-radio-circle'></i>About Count 
				</a>
				</li>
				<li>
				<a href="{{ route('about.list_about_info') }}">
				<i class='bx bx-radio-circle'></i>About Info 
				</a>
				</li>
</ul>
				</li>

				<li>

				<a href="{{ route('profile_history.list_profile_history') }}">
				<i class='bx bx-radio-circle'></i>profile history
				</a>
				</li>

				<li>
				<a href="javascript:;" class="has-arrow">
				<div class="menu-title">vision mission motto</div>
				</a>
				<ul>
				<li>
				<a href="{{ route('vision_mission_motto.list_vision_mission_motto') }}">
				<i class='bx bx-radio-circle'></i>vision mission 
				</a>
				</li>
				<li>
				<a href="{{ route('our_values.list_our_values') }}">
				<i class='bx bx-radio-circle'></i>Our Values
				</a>
				</li>
				</ul>
				</li>

				<li>
				<a href="javascript:;" class="has-arrow">
				<div class="menu-title">ursuline sisters</div>
				</a>
				<ul>
				<li>
				<a href="{{ route('ursuline_sisters.list_ursuline_sisters') }}">
				<i class='bx bx-radio-circle'></i>about ursuline sisters 
				</a>
				</li>
				<li>
				<a href="{{ route('hospital_multi_specialty.list_hospital_multi_specialty') }}">
				<i class='bx bx-radio-circle'></i>hospital multi specialty 
				</a>
				</li>
				<li>
				<a href="{{ route('hospital_multi_specialty.list_general_hospital') }}">
				<i class='bx bx-radio-circle'></i>general hospital
				</a>
				</li>
				<li>
				<a href="{{ route('hospital_multi_specialty.list_health_centers_services') }}">
				<i class='bx bx-radio-circle'></i>health centers services
				</a>
				</li>
				</ul>
				</li>

				<li>
				<a href="javascript:;" class="has-arrow">
				<div class="menu-title">society</div>
				</a>
				<ul>
				<li>
				<a href="{{ route('society.list_society_description') }}">
				<i class='bx bx-radio-circle'></i>society description
				</a>
				</li>
				<li>
				<a href="{{ route('society.list_society_details') }}">
				<i class='bx bx-radio-circle'></i>society details
				</a>
				</li>				
				</ul>
				</li>
				<li>
				<a href="{{ route('management_committee.list_management_committee') }}">
				<i class='bx bx-radio-circle'></i>management
				</a>
				</li>

				<li>
				<a href="javascript:;" class="has-arrow">
				<div class="menu-title">Committee</div>
				</a>
				<ul>
				<li>
				<a href="{{ route('committee.list_committee') }}">
				<i class='bx bx-radio-circle'></i>Committee
				</a>
				</li>
				<li>
				<a href="{{ route('committee.list_sub_committee') }}">
				<i class='bx bx-radio-circle'></i>Sub Committee
				</a>
				</li>				
				<li>
				<a href="{{ route('committee.list_committee_description') }}">
				<i class='bx bx-radio-circle'></i>Committee Description
				</a>
				</li>				
				</ul>
				</li>

				<li>
				<a href="javascript:;" class="has-arrow">
				<div class="menu-title">Accreditation Awards</div>
				</a>
				<ul>
				<li>
				<a href="{{ route('accreditation.list_accreditation_description') }}">
				<i class='bx bx-radio-circle'></i>Accreditation Description
				</a>
				</li>
				
				<li>
				<a href="{{ route('accreditation_awards.list_accreditation_awards') }}">
				<i class='bx bx-radio-circle'></i>Accreditation Awards
				</a>
				</li>				
						
				</ul>
				</li>

				</ul>
				</li>

				<li>
				<a href="javascript:;" class="has-arrow">
				 <div class="parent-icon"><i class="bx bx-category"></i></div>
				<div class="menu-title">Specialties</div>
				</a>
				<ul>

				<li>
				<a href="{{ route('specialties.list_specialties_category') }}">
				<i class='bx bx-radio-circle'></i>Specialties Category List
				</a>
				</li>
				<li>
				<a href="{{ route('specialties.list_specialties_department') }}">
				<i class='bx bx-radio-circle'></i>Specialties Department List
				</a>
				</li>
				<li>
				<a href="{{ route('specialties.list_specialties_department_category') }}">
				<i class='bx bx-radio-circle'></i>Specialties Department Category List
				</a>
				</li>
				</ul>
				</li>

				<li>
				<a href="javascript:;" class="has-arrow">
				<div class="parent-icon"><i class="bx bx-category"></i></div>
				<div class="menu-title">Services</div>
				</a>
				<ul>
				<li>
				<a href="{{ route('services.list_about_other_services') }}">
				<i class='bx bx-radio-circle'></i>About Other Services
				</a>
				</li>
				<li>
				<a href="{{ route('services.list_library_services') }}">
				<i class='bx bx-radio-circle'></i>Library Services
				</a>
				</li>
				<li>
				<a href="{{ route('services.list_library_service_description') }}">
				<i class='bx bx-radio-circle'></i>Library Services Description
				</a>
				</li>
				<li>
				<a href="{{ route('services.list_books_periodicals') }}">
				<i class='bx bx-radio-circle'></i>Books Periodicals List
				</a>
				</li>
				<li>
				<a href="{{ route('services.list_infrastructure') }}">
				<i class='bx bx-radio-circle'></i>Infrastructure List
				</a>
				</li>
				<li>
				<a href="{{ route('services.list_services') }}">
				<i class='bx bx-radio-circle'></i>services List
				</a>
				</li>
				<li>
				<a href="{{ route('services.list_about_newsletter') }}">
				<i class='bx bx-radio-circle'></i>About News Letter List
				</a>
				</li>
				<li>
				<a href="{{ route('services.list_newsletter') }}">
				<i class='bx bx-radio-circle'></i>NewsLetter List
				</a>
				</li>
				</ul>
				</li>

				<li>
				<a href="javascript:;" class="has-arrow">
				<div class="parent-icon"><i class="bx bx-category"></i></div>
				<div class="menu-title">Patient</div>
				</a>
				<ul>
				<li>
				<a href="{{ route('accommodation.list_accommodation_description') }}">
				<i class='bx bx-radio-circle'></i>Accommodation Description
				</a>
				</li>
				<li>
				<a href="{{ route('accommodation.list_accommodation_slider') }}">
				<i class='bx bx-radio-circle'></i>Accommodation Slider
				</a>
				</li>
				<li>
				<a href="{{ route('accommodation.list_type_of_accommodation') }}">
				<i class='bx bx-radio-circle'></i>Type Of Accommodation
				</a>
				</li>
				<li>
				<a href="{{ route('empannelled_insurance.list_empannelled_insurance_description') }}">
				<i class='bx bx-radio-circle'></i>Empannelled Insurance Description
				</a>
				</li>
				<li>
				<a href="{{ route('empannelled_insurance.list_empannelled_insurance') }}">
				<i class='bx bx-radio-circle'></i>Empannelled Insurance
				</a>
				</li>
				<li>
				<a href="{{ route('rights_responsibilities.list_rights_responsibilities_description') }}">
				<i class='bx bx-radio-circle'></i>Rights Responsibilities
				</a>
				</li>
				<li>
				<a href="{{ route('rights_responsibilities.list_rights') }}">
				<i class='bx bx-radio-circle'></i>Rights List
				</a>
				</li>
				<li>
				<a href="{{ route('rights_responsibilities.list_responsibilities') }}">
				<i class='bx bx-radio-circle'></i>Responsibilities List
				</a>
				</li>
				<li>
				<a href="{{ route('opd_schedule.list_opd_schedule') }}">
				<i class='bx bx-radio-circle'></i>opd schedule List
				</a>
				</li>
				<li>
				<a href="{{ route('write_to_us.list_write_to_us') }}">
				<i class='bx bx-radio-circle'></i>opd schedule List
				</a>
				</li>
				<li>
				<a href="{{ route('medical_records.list_medical_contact_details') }}">
				<i class='bx bx-radio-circle'></i>medical contact details List
				</a>
				</li>
				<li>
				<a href="{{ route('medical_records.list_medical_contact_description') }}">
				<i class='bx bx-radio-circle'></i>medical contact description List
				</a>
				</li>
				<li>
				<a href="{{ route('medical_records.list_about_medical_records') }}">
				<i class='bx bx-radio-circle'></i>About Medical Records List
				</a>
				</li>
				<li>
				<a href="{{ route('medical_records.list_about_medical_services') }}">
				<i class='bx bx-radio-circle'></i>About Medical Services List
				</a>
				</li>				
				</ul>
				</li>



				<li>
				<a href="javascript:;" class="has-arrow">
				<div class="parent-icon"><i class="bx bx-category"></i></div>
				<div class="menu-title">Research Academics</div>
				</a>
				<ul>
				<li>
				<a href="{{ route('research_academics.list_research_academics_overview') }}">
				<i class='bx bx-radio-circle'></i>Research Academics Overview
				</a>
				</li>
				<li>
				<a href="{{ route('research_academics.list_research_academics_about_dnb') }}">
				<i class='bx bx-radio-circle'></i>Research Academics About DNB
				</a>
				</li>
				<li>
				<a href="{{ route('research_academics.list_research_academics_dnb_about_admission') }}">
				<i class='bx bx-radio-circle'></i>Research Academics DNB About Admission
				</a>
				</li>
				<li>
				<a href="{{ route('research_academics.list_research_academics_dnb_admission') }}">
				<i class='bx bx-radio-circle'></i> DNB Admission
				</a>
				</li>
				<li>
				<a href="{{ route('research_academics.list_research_academics_cps') }}">
				<i class='bx bx-radio-circle'></i>Research Academics CPS List
				</a>
				</li>
				<li>
				<a href="{{ route('research_academics.list_research_academics_nursing_institute') }}">
				<i class='bx bx-radio-circle'></i>Research Academics Nursing Institute
				</a>
				</li>
				<li>
				<a href="{{ route('research_academics.list_research_academics_isccm') }}">
				<i class='bx bx-radio-circle'></i>list Research Academics Isccm 
				</a>
				</li>
				
				</ul>
				</li>

			</ul>
			<!--end navigation-->
		</div>

		
		<!--end sidebar wrapper -->
		<!--start header -->
		<header>

			<div class="topbar d-flex align-items-center">
				<nav class="navbar navbar-expand gap-3">
					<div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
					</div>

					  <div class="search-bar d-lg-block d-none" data-bs-toggle="modal" data-bs-target="#SearchModal">
					     <a href="avascript:;" class="btn d-flex align-items-center"><i class="bx bx-search"></i>Search</a>
					  </div>

					  <div class="top-menu ms-auto">
						<ul class="navbar-nav align-items-center gap-1">
							<li class="nav-item mobile-search-icon d-flex d-lg-none" data-bs-toggle="modal" data-bs-target="#SearchModal">
								<a class="nav-link" href="avascript:;"><i class='bx bx-search'></i>
								</a>
							</li>
						
							<li class="nav-item dark-mode d-none d-sm-flex">
								<a class="nav-link dark-mode-icon" href="javascript:;"><i class='bx bx-moon'></i>
								</a>
							</li>

							<li class="nav-item dropdown dropdown-app">
							
								<div class="dropdown-menu dropdown-menu-end p-0">
									<div class="app-container p-2 my-2">
									  <div class="row gx-0 gy-2 row-cols-3 justify-content-center p-2">
										 <div class="col">
										  <a href="javascript:;">
											<div class="app-box text-center">
											  <div class="app-icon">
												  <img src="{{asset('assets/images/app/slack.png')}}" width="30" alt="">
											  </div>
											  <div class="app-name">
												  <p class="mb-0 mt-1">Slack</p>
											  </div>
											  </div>
											</a>
										 </div>
										 <div class="col">
										  <a href="javascript:;">
											<div class="app-box text-center">
											  <div class="app-icon">
												  <img src="{{asset('assets/images/app/behance.png')}}" width="30" alt="">
											  </div>
											  <div class="app-name">
												  <p class="mb-0 mt-1">Behance</p>
											  </div>
											  </div>
										  </a>
										 </div>
										 <div class="col">
										  <a href="javascript:;">
											<div class="app-box text-center">
											  <div class="app-icon">
												<img src="{{asset('assets/images/app/google-drive.png')}}" width="30" alt="">
											  </div>
											  <div class="app-name">
												  <p class="mb-0 mt-1">Dribble</p>
											  </div>
											  </div>
											</a>
										 </div>
										 <div class="col">
										  <a href="javascript:;">
											<div class="app-box text-center">
											  <div class="app-icon">
												  <img src="{{asset('assets/images/app/outlook.png')}}" width="30" alt="">
											  </div>
											  <div class="app-name">
												  <p class="mb-0 mt-1">Outlook</p>
											  </div>
											  </div>
											</a>
										 </div>
										 <div class="col">
										  <a href="javascript:;">
											<div class="app-box text-center">
											  <div class="app-icon">
												  <img src="{{asset('assets/images/app/github.png')}}" width="30" alt="">
											  </div>
											  <div class="app-name">
												  <p class="mb-0 mt-1">GitHub</p>
											  </div>
											  </div>
											</a>
										 </div>
										 <div class="col">
										  <a href="javascript:;">
											<div class="app-box text-center">
											  <div class="app-icon">
												  <img src="{{asset('assets/images/app/stack-overflow.png')}}" width="30" alt="">
											  </div>
											  <div class="app-name">
												  <p class="mb-0 mt-1">Stack</p>
											  </div>
											  </div>
											</a>
										 </div>
										 <div class="col">
										  <a href="javascript:;">
											<div class="app-box text-center">
											  <div class="app-icon">
												  <img src="{{asset('assets/images/app/figma.png')}}" width="30" alt="">
											  </div>
											  <div class="app-name">
												  <p class="mb-0 mt-1">Stack</p>
											  </div>
											  </div>
											</a>
										 </div>
										 <div class="col">
										  <a href="javascript:;">
											<div class="app-box text-center">
											  <div class="app-icon">
												  <img src="{{asset('assets/images/app/twitter.png')}}" width="30" alt="">
											  </div>
											  <div class="app-name">
												  <p class="mb-0 mt-1">Twitter</p>
											  </div>
											  </div>
											</a>
										 </div>
										 <div class="col">
										  <a href="javascript:;">
											<div class="app-box text-center">
											  <div class="app-icon">
												  <img src="{{asset('assets/images/app/google-calendar.png')}}" width="30" alt="">
											  </div>
											  <div class="app-name">
												  <p class="mb-0 mt-1">Calendar</p>
											  </div>
											  </div>
											</a>
										 </div>
										 <div class="col">
										  <a href="javascript:;">
											<div class="app-box text-center">
											  <div class="app-icon">
												  <img src="{{asset('assets/images/app/spotify.png')}}" width="30" alt="">
											  </div>
											  <div class="app-name">
												  <p class="mb-0 mt-1">Spotify</p>
											  </div>
											  </div>
											</a>
										 </div>
										 <div class="col">
										  <a href="javascript:;">
											<div class="app-box text-center">
											  <div class="app-icon">
												  <img src="{{asset('assets/images/app/google-photos.png')}}" width="30" alt="">
											  </div>
											  <div class="app-name">
												  <p class="mb-0 mt-1">Photos</p>
											  </div>
											  </div>
											</a>
										 </div>
										 <div class="col">
										  <a href="javascript:;">
											<div class="app-box text-center">
											  <div class="app-icon">
												  <img src="{{asset('assets/images/app/pinterest.png')}}" width="30" alt="">
											  </div>
											  <div class="app-name">
												  <p class="mb-0 mt-1">Photos</p>
											  </div>
											  </div>
											</a>
										 </div>
										 <div class="col">
										  <a href="javascript:;">
											<div class="app-box text-center">
											  <div class="app-icon">
												  <img src="{{asset('assets/images/app/linkedin.png')}}" width="30" alt="">
											  </div>
											  <div class="app-name">
												  <p class="mb-0 mt-1">linkedin</p>
											  </div>
											  </div>
											</a>
										 </div>
										 <div class="col">
										  <a href="javascript:;">
											<div class="app-box text-center">
											  <div class="app-icon">
												  <img src="{{asset('assets/images/app/dribble.png')}}" width="30" alt="">
											  </div>
											  <div class="app-name">
												  <p class="mb-0 mt-1">Dribble</p>
											  </div>
											  </div>
											</a>
										 </div>
										 <div class="col">
										  <a href="javascript:;">
											<div class="app-box text-center">
											  <div class="app-icon">
												  <img src="{{asset('assets/images/app/youtube.png')}}" width="30" alt="">
											  </div>
											  <div class="app-name">
												  <p class="mb-0 mt-1">YouTube</p>
											  </div>
											  </div>
											</a>
										 </div>
										 <div class="col">
										  <a href="javascript:;">
											<div class="app-box text-center">
											  <div class="app-icon">
												  <img src="{{asset('assets/images/app/google.png')}}" width="30" alt="">
											  </div>
											  <div class="app-name">
												  <p class="mb-0 mt-1">News</p>
											  </div>
											  </div>
											</a>
										 </div>
										 <div class="col">
										  <a href="javascript:;">
											<div class="app-box text-center">
											  <div class="app-icon">
												  <img src="{{asset('assets/images/app/envato.png')}}" width="30" alt="">
											  </div>
											  <div class="app-name">
												  <p class="mb-0 mt-1">Envato</p>
											  </div>
											  </div>
											</a>
										 </div>
										 <div class="col">
										  <a href="javascript:;">
											<div class="app-box text-center">
											  <div class="app-icon">
												  <img src="{{asset('assets/images/app/safari.png')}}" width="30" alt="">
											  </div>
											  <div class="app-name">
												  <p class="mb-0 mt-1">Safari</p>
											  </div>
											  </div>
											</a>
										 </div>
				
									  </div><!--end row-->
				
									</div>
								</div>
							</li>

							<li class="nav-item dropdown dropdown-large">
							
								<div class="dropdown-menu dropdown-menu-end">
									<a href="javascript:;">
										<div class="msg-header">
											<p class="msg-header-title">Notifications</p>
											<p class="msg-header-badge">8 New</p>
										</div>
									</a>
									<div class="header-notifications-list">
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
													<img src="{{asset('assets/images/avatars/avatar-1.png')}}" class="msg-avatar" alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Daisy Anderson<span class="msg-time float-end">5 sec
												ago</span></h6>
													<p class="msg-info">The standard chunk of lorem</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify bg-light-danger text-danger">dc
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">New Orders <span class="msg-time float-end">2 min
												ago</span></h6>
													<p class="msg-info">You have recived new orders</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
													<img src="{{asset('assets/images/avatars/avatar-2.png')}}" class="msg-avatar" alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Althea Cabardo <span class="msg-time float-end">14
												sec ago</span></h6>
													<p class="msg-info">Many desktop publishing packages</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify bg-light-success text-success">
													<img src="{{asset('assets/images/app/outlook.png')}}" width="25" alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Account Created<span class="msg-time float-end">28 min
												ago</span></h6>
													<p class="msg-info">Successfully created new email</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify bg-light-info text-info">Ss
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">New Product Approved <span
												class="msg-time float-end">2 hrs ago</span></h6>
													<p class="msg-info">Your new product has approved</p>
												</div>
											</div>
										</a>

										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
													<img src="{{asset('assets/images/avatars/avatar-4.png')}}" class="msg-avatar" alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Katherine Pechon <span class="msg-time float-end">15
												min ago</span></h6>
													<p class="msg-info">Making this the first true generator</p>
												</div>
											</div>
										</a>

										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify bg-light-success text-success"><i class='bx bx-check-square'></i>
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Your item is shipped <span class="msg-time float-end">5 hrs
												ago</span></h6>
													<p class="msg-info">Successfully shipped your item</p>
												</div>
											</div>
										</a>
										
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify bg-light-primary">
													<img src="{{asset('assets/images/app/github.png')}}" width="25" alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">New 24 authors<span class="msg-time float-end">1 day
												ago</span></h6>
													<p class="msg-info">24 new authors joined last week</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
													<img src="{{asset('assets/images/avatars/avatar-8.png')}}" class="msg-avatar" alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Peter Costanzo <span class="msg-time float-end">6 hrs
												ago</span></h6>
													<p class="msg-info">It was popularised in the 1960s</p>
												</div>
											</div>
										</a>
									</div>
									<a href="javascript:;">
										<div class="text-center msg-footer">
											<button class="btn btn-primary w-100">View All Notifications</button>
										</div>
									</a>
								</div>
							</li>
							<li class="nav-item dropdown dropdown-large">
							
								<div class="dropdown-menu dropdown-menu-end">
									<a href="javascript:;">
										<div class="msg-header">
											<p class="msg-header-title">My Cart</p>
											<p class="msg-header-badge">10 Items</p>
										</div>
									</a>
									<div class="header-message-list">
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center gap-3">
												<div class="position-relative">
													<div class="cart-product rounded-circle bg-light">
														<img src="{{asset('assets/images/products/11.png')}}" class="" alt="product image">
													</div>
												</div>
												<div class="flex-grow-1">
													<h6 class="cart-product-title mb-0">Men White T-Shirt</h6>
													<p class="cart-product-price mb-0">1 X $29.00</p>
												</div>
												<div class="">
													<p class="cart-price mb-0">$250</p>
												</div>
												<div class="cart-product-cancel"><i class="bx bx-x"></i>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center gap-3">
												<div class="position-relative">
													<div class="cart-product rounded-circle bg-light">
														<img src="{{asset('assets/images/products/02.png')}}" class="" alt="product image">
													</div>
												</div>
												<div class="flex-grow-1">
													<h6 class="cart-product-title mb-0">Men White T-Shirt</h6>
													<p class="cart-product-price mb-0">1 X $29.00</p>
												</div>
												<div class="">
													<p class="cart-price mb-0">$250</p>
												</div>
												<div class="cart-product-cancel"><i class="bx bx-x"></i>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center gap-3">
												<div class="position-relative">
													<div class="cart-product rounded-circle bg-light">
														<img src="{{asset('assets/images/products/03.png')}}" class="" alt="product image">
													</div>
												</div>
												<div class="flex-grow-1">
													<h6 class="cart-product-title mb-0">Men White T-Shirt</h6>
													<p class="cart-product-price mb-0">1 X $29.00</p>
												</div>
												<div class="">
													<p class="cart-price mb-0">$250</p>
												</div>
												<div class="cart-product-cancel"><i class="bx bx-x"></i>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center gap-3">
												<div class="position-relative">
													<div class="cart-product rounded-circle bg-light">
														<img src="{{asset('assets/images/products/04.png')}}" class="" alt="product image">
													</div>
												</div>
												<div class="flex-grow-1">
													<h6 class="cart-product-title mb-0">Men White T-Shirt</h6>
													<p class="cart-product-price mb-0">1 X $29.00</p>
												</div>
												<div class="">
													<p class="cart-price mb-0">$250</p>
												</div>
												<div class="cart-product-cancel"><i class="bx bx-x"></i>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center gap-3">
												<div class="position-relative">
													<div class="cart-product rounded-circle bg-light">
														<img src="{{asset('assets/images/products/05.png')}}" class="" alt="product image">
													</div>
												</div>
												<div class="flex-grow-1">
													<h6 class="cart-product-title mb-0">Men White T-Shirt</h6>
													<p class="cart-product-price mb-0">1 X $29.00</p>
												</div>
												<div class="">
													<p class="cart-price mb-0">$250</p>
												</div>
												<div class="cart-product-cancel"><i class="bx bx-x"></i>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center gap-3">
												<div class="position-relative">
													<div class="cart-product rounded-circle bg-light">
														<img src="{{asset('assets/images/products/06.png')}}" class="" alt="product image">
													</div>
												</div>
												<div class="flex-grow-1">
													<h6 class="cart-product-title mb-0">Men White T-Shirt</h6>
													<p class="cart-product-price mb-0">1 X $29.00</p>
												</div>
												<div class="">
													<p class="cart-price mb-0">$250</p>
												</div>
												<div class="cart-product-cancel"><i class="bx bx-x"></i>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center gap-3">
												<div class="position-relative">
													<div class="cart-product rounded-circle bg-light">
														<img src="{{asset('assets/images/products/07.png')}}" class="" alt="product image">
													</div>
												</div>
												<div class="flex-grow-1">
													<h6 class="cart-product-title mb-0">Men White T-Shirt</h6>
													<p class="cart-product-price mb-0">1 X $29.00</p>
												</div>
												<div class="">
													<p class="cart-price mb-0">$250</p>
												</div>
												<div class="cart-product-cancel"><i class="bx bx-x"></i>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center gap-3">
												<div class="position-relative">
													<div class="cart-product rounded-circle bg-light">
														<img src="{{asset('assets/images/products/08.png')}}" class="" alt="product image">
													</div>
												</div>
												<div class="flex-grow-1">
													<h6 class="cart-product-title mb-0">Men White T-Shirt</h6>
													<p class="cart-product-price mb-0">1 X $29.00</p>
												</div>
												<div class="">
													<p class="cart-price mb-0">$250</p>
												</div>
												<div class="cart-product-cancel"><i class="bx bx-x"></i>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center gap-3">
												<div class="position-relative">
													<div class="cart-product rounded-circle bg-light">
														<img src="{{asset('assets/images/products/09.png')}}" class="" alt="product image">
													</div>
												</div>
												<div class="flex-grow-1">
													<h6 class="cart-product-title mb-0">Men White T-Shirt</h6>
													<p class="cart-product-price mb-0">1 X $29.00</p>
												</div>
												<div class="">
													<p class="cart-price mb-0">$250</p>
												</div>
												<div class="cart-product-cancel"><i class="bx bx-x"></i>
												</div>
											</div>
										</a>
									</div>
									<a href="javascript:;">
										<div class="text-center msg-footer">
											<div class="d-flex align-items-center justify-content-between mb-3">
												<h5 class="mb-0">Total</h5>
												<h5 class="mb-0 ms-auto">$489.00</h5>
											</div>
											<button class="btn btn-primary w-100">Checkout</button>
										</div>
									</a>
								</div>
							</li>
						</ul>
					</div>
					<div class="user-box dropdown px-3">
						<a class="d-flex align-items-center nav-link dropdown-toggle gap-3 dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							<img src="{{asset('assets/images/avatars/avatar-2.png')}}" class="user-img" alt="user avatar">
							<div class="user-info">
								<p class="user-name mb-0">{{Auth::user()->name}}</p>
								<!-- <p class="designattion mb-0">{{Auth::user()->name}}</p> -->
							</div>
						</a>
						<ul class="dropdown-menu dropdown-menu-end">
							<li><a class="dropdown-item d-flex align-items-center" href="{{route('admin.admin_profile')}}"><i class="bx bx-user fs-5"></i><span>Profile</span></a>
							</li>
							<li><a class="dropdown-item d-flex align-items-center" href="{{route('admin.admin_password_change')}}"><i class="bx bx-home-circle fs-5"></i><span>Change Password</span></a>
							</li>
							<!-- <li><a class="dropdown-item d-flex align-items-center" href="javascript:;"><i class="bx bx-dollar-circle fs-5"></i><span>Earnings</span></a>
							</li>
							<li><a class="dropdown-item d-flex align-items-center" href="javascript:;"><i class="bx bx-download fs-5"></i><span>Downloads</span></a>
							</li> -->
							<li>
								<div class="dropdown-divider mb-0"></div>
							</li>
							
							<li><a class="dropdown-item d-flex align-items-center"  href="{{ route('logout') }}" onclick="event.preventDefault(); 
							document.getElementById('logout-form').submit();">
							<i class="bx bx-log-out-circle"></i><span>Logout</span></a>
							<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
							</li>
						</ul>
					</div>
				</nav>
			</div>

			
		</header>
		<!--end header -->
		<!--start page wrapper -->
		
		
		@yield('content')
		<!--end page wrapper -->
		<!--start overlay-->
		 <div class="overlay toggle-icon"></div>
		<!--end overlay-->
		<!--Start Back To Top Button-->
		  <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		<!--End Back To Top Button-->
		<footer class="page-footer">
			<p class="mb-0">Copyright © 2023. All right reserved.</p>
		</footer>
	</div>
	@endif

@if(Auth::check() && Auth::user()->role == 3)
	<div class="wrapper">
		<!--sidebar wrapper -->
		<div class="sidebar-wrapper" data-simplebar="true">
			<div class="sidebar-header">
				<div>
					<img src="{{asset('assets/images/logo-icon.png')}}" class="logo-icon" alt="logo icon">
				</div>
				<div>
					<h4 class="logo-text">IIBS</h4>
				</div>
				<div class="toggle-icon ms-auto"><i class='bx bx-arrow-back'></i>
				</div>
			 </div>
			 
			 <?php
				$dd =DB::table('users')
				->where('id',Auth::user()->id)
				->first();
				// print_r($dd);
				// exit;
				if ($dd) {
					$accessValues = explode(',', $dd->access); // Convert comma-separated values to an array
					$hasAccess1 = in_array('1', $accessValues);					
					$hasAccess2 = in_array('2', $accessValues);					
					$hasAccess3 = in_array('3', $accessValues);					
					$hasAccess4 = in_array('4', $accessValues);					
					$hasAccess5 = in_array('5', $accessValues);					
					$hasAccess6 = in_array('6', $accessValues);					
					$hasAccess7 = in_array('7', $accessValues);					
					$hasAccess8 = in_array('8', $accessValues);					
					$hasAccess9 = in_array('9', $accessValues);					
					$hasAccess10 = in_array('10', $accessValues);					
					$hasAccess11 = in_array('11', $accessValues);					
				} else {
					$hasAccess1 = false; // Default to false if $dd is empty
					$hasAccess2 = false; // Default to false if $dd is empty
					$hasAccess3 = false; // Default to false if $dd is empty
					$hasAccess4 = false; // Default to false if $dd is empty
					$hasAccess5 = false; // Default to false if $dd is empty
					$hasAccess6 = false; // Default to false if $dd is empty
					$hasAccess7 = false; // Default to false if $dd is empty
					$hasAccess8 = false; // Default to false if $dd is empty
					$hasAccess9 = false; // Default to false if $dd is empty
					$hasAccess10 = false; // Default to false if $dd is empty
					$hasAccess11 = false; // Default to false if $dd is empty
				}
				?>
			<!--navigation-->
			<ul class="metismenu" id="menu">
				<li>
				<a href="{{route('member.login.dashboard')}}" class="">
				<div class="parent-icon"><i class='bx bx-home-alt'></i>
				</div>
				<div class="menu-title">Dashboard</div>
				</a>
				</li>
				@if(!empty($dd && $hasAccess1))
				<li>
    <a href="javascript:;" class="has-arrow">
        <div class="parent-icon"><i class="bx bx-category"></i></div>
        <div class="menu-title">Home</div>
    </a>
    <ul>
        <li>
            <a href="{{ route('application_info.application_info_list') }}">
                <i class='bx bx-radio-circle'></i>application info
            </a>
        </li>
        <li>
            <a href="{{ route('home.banner.list_banner') }}">
                <i class='bx bx-radio-circle'></i>Banner
            </a>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <i class='bx bx-radio-circle'></i>Program At IIBS
            </a>
            <ul>
                <li>
                    <a href="{{ route('home.program.list_program_at_iibs') }}">
                        <i class='bx bx-radio-circle'></i>Program Descrition
                    </a>
                </li>
                <li>
                    <a href="{{ route('home.program.list_program_details') }}">
                        <i class='bx bx-radio-circle'></i>Program At IIBS Details
                    </a>
                </li>
                <!-- Add more submenus here if needed -->
            </ul>
        </li>

		<li>
            <a href="{{ route('home.placement.list_placement_candidates') }}">
                <i class='bx bx-radio-circle'></i>Placements
            </a>
        </li>
		<li>
            <a href="{{ route('home.Premium_Recruiters.list_premium_recruiters') }}">
                <i class='bx bx-radio-circle'></i>Premium Recruiters
            </a>
        </li>
		<li>
            <a href="javascript:;" class="has-arrow">
                <i class='bx bx-radio-circle'></i>Why IIBS
            </a>
            <ul>

                <li>
                    <a href="{{ route('home.why_iibs.list_why_iibs') }}">
                        <i class='bx bx-radio-circle'></i>Why IIBS Descrition
                    </a>
                </li>

                <li>
                    <a href="{{ route('home.why_iibs.lists_why_iibs') }}">
                        <i class='bx bx-radio-circle'></i>Why IIBS Lists
                    </a>
                </li>

			</ul>
        </li>

		<li>
            <a href="{{ route('our_team_member.list_our_team_member') }}">
                <i class='bx bx-radio-circle'></i>Our Team Member
            </a>
        </li>

		<li>
            <a href="{{ route('post_item.list_post_item') }}">
                <i class='bx bx-radio-circle'></i>Post Items
            </a>
        </li>
		<li>
            <a href="{{ route('message.message_list') }}">
                <i class='bx bx-radio-circle'></i>Message
            </a>
        </li>
		<li>
            <a href="{{ route('board_advisor.board_advisor_list') }}">
                <i class='bx bx-radio-circle'></i>Board-Advisor
            </a>
        </li>
		<li>
            <a href="{{ route('faculties.list_faculties_description') }}">
                <i class='bx bx-radio-circle'></i>Faculties-Description
            </a>
        </li>
		<li>
            <a href="{{ route('manangement.manangement_list') }}">
                <i class='bx bx-radio-circle'></i>Management
            </a>
        </li>

    </ul>
</li>
                 @endif
				
				@if(!empty($dd && $hasAccess2))
				<li>
				<a href="javascript:;" class="has-arrow">
				<div class="parent-icon"><i class="bx bx-category"></i></div>
				<div class="menu-title">About</div>
				</a>
				<ul>
				<li>
				<a href="{{ route('about.about_list') }}">
				<i class='bx bx-radio-circle'></i>About Description
				</a>
				</li>
				<li>
				<a href="{{ route('about.about_faq_list') }}">
				<i class='bx bx-radio-circle'></i>About Faq
				</a>
				</li>
				</ul>
				</li>
				 @endif
				 
				 @if(!empty($dd && $hasAccess3))
				<li>
				<a href="{{route('home.testimonial.testimonial_list')}}" class="">
				<div class="parent-icon"><i class='fadeIn animated bx bx-notepad'></i>
				</div>
				<div class="menu-title">Testimonial List</div>
				</a>
				</li>
				@endif
				
				 @if(!empty($dd && $hasAccess4))
				<li>
				<a href="{{route('articles.articles_list')}}" class="">
				<div class="parent-icon"><i class='fadeIn animated bx bx-notepad'></i>
				</div>
				<div class="menu-title">Articles</div>
				</a>
				</li>
				@endif
				
				@if(!empty($dd && $hasAccess5))
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-category"></i>
						</div>
						<div class="menu-title">Media</div>
					</a>
					<ul>
						<li> <a href="{{route('media.media_gallery_list')}}"><i class='bx bx-radio-circle'></i>Media Category List</a>
						</li>
						<!-- <li> <a href="{{route('media.media_gallery_list')}}"><i class='bx bx-radio-circle'></i>Media Gallery List</a>
						</li> -->
						
					</ul>
				</li>
				@endif
				
				@if(!empty($dd && $hasAccess6))
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-category"></i>
						</div>
						<div class="menu-title">Contact Us</div>
					</a>
					<ul>
						<li> <a href="{{route('contact.contact_list')}}"><i class='bx bx-radio-circle'></i>Contact</a>
						</li>
						<!-- <li> <a href="{{route('media.media_gallery_list')}}"><i class='bx bx-radio-circle'></i>Media Gallery List</a>
						</li> -->
						
					</ul>
				</li>
				@endif

			</ul>
			<!--end navigation-->
		</div>

		
		<!--end sidebar wrapper -->
		<!--start header -->
		<header>

			<div class="topbar d-flex align-items-center">
				<nav class="navbar navbar-expand gap-3">
					<div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
					</div>

					  <div class="search-bar d-lg-block d-none" data-bs-toggle="modal" data-bs-target="#SearchModal">
					     <a href="avascript:;" class="btn d-flex align-items-center"><i class="bx bx-search"></i>Search</a>
					  </div>

					  <div class="top-menu ms-auto">
						<ul class="navbar-nav align-items-center gap-1">
							<li class="nav-item mobile-search-icon d-flex d-lg-none" data-bs-toggle="modal" data-bs-target="#SearchModal">
								<a class="nav-link" href="avascript:;"><i class='bx bx-search'></i>
								</a>
							</li>
						
							<li class="nav-item dark-mode d-none d-sm-flex">
								<a class="nav-link dark-mode-icon" href="javascript:;"><i class='bx bx-moon'></i>
								</a>
							</li>

							<li class="nav-item dropdown dropdown-app">
							
								<div class="dropdown-menu dropdown-menu-end p-0">
									<div class="app-container p-2 my-2">
									  <div class="row gx-0 gy-2 row-cols-3 justify-content-center p-2">
										 <div class="col">
										  <a href="javascript:;">
											<div class="app-box text-center">
											  <div class="app-icon">
												  <img src="{{asset('assets/images/app/slack.png')}}" width="30" alt="">
											  </div>
											  <div class="app-name">
												  <p class="mb-0 mt-1">Slack</p>
											  </div>
											  </div>
											</a>
										 </div>
										 <div class="col">
										  <a href="javascript:;">
											<div class="app-box text-center">
											  <div class="app-icon">
												  <img src="{{asset('assets/images/app/behance.png')}}" width="30" alt="">
											  </div>
											  <div class="app-name">
												  <p class="mb-0 mt-1">Behance</p>
											  </div>
											  </div>
										  </a>
										 </div>
										 <div class="col">
										  <a href="javascript:;">
											<div class="app-box text-center">
											  <div class="app-icon">
												<img src="{{asset('assets/images/app/google-drive.png')}}" width="30" alt="">
											  </div>
											  <div class="app-name">
												  <p class="mb-0 mt-1">Dribble</p>
											  </div>
											  </div>
											</a>
										 </div>
										 <div class="col">
										  <a href="javascript:;">
											<div class="app-box text-center">
											  <div class="app-icon">
												  <img src="{{asset('assets/images/app/outlook.png')}}" width="30" alt="">
											  </div>
											  <div class="app-name">
												  <p class="mb-0 mt-1">Outlook</p>
											  </div>
											  </div>
											</a>
										 </div>
										 <div class="col">
										  <a href="javascript:;">
											<div class="app-box text-center">
											  <div class="app-icon">
												  <img src="{{asset('assets/images/app/github.png')}}" width="30" alt="">
											  </div>
											  <div class="app-name">
												  <p class="mb-0 mt-1">GitHub</p>
											  </div>
											  </div>
											</a>
										 </div>
										 <div class="col">
										  <a href="javascript:;">
											<div class="app-box text-center">
											  <div class="app-icon">
												  <img src="{{asset('assets/images/app/stack-overflow.png')}}" width="30" alt="">
											  </div>
											  <div class="app-name">
												  <p class="mb-0 mt-1">Stack</p>
											  </div>
											  </div>
											</a>
										 </div>
										 <div class="col">
										  <a href="javascript:;">
											<div class="app-box text-center">
											  <div class="app-icon">
												  <img src="{{asset('assets/images/app/figma.png')}}" width="30" alt="">
											  </div>
											  <div class="app-name">
												  <p class="mb-0 mt-1">Stack</p>
											  </div>
											  </div>
											</a>
										 </div>
										 <div class="col">
										  <a href="javascript:;">
											<div class="app-box text-center">
											  <div class="app-icon">
												  <img src="{{asset('assets/images/app/twitter.png')}}" width="30" alt="">
											  </div>
											  <div class="app-name">
												  <p class="mb-0 mt-1">Twitter</p>
											  </div>
											  </div>
											</a>
										 </div>
										 <div class="col">
										  <a href="javascript:;">
											<div class="app-box text-center">
											  <div class="app-icon">
												  <img src="{{asset('assets/images/app/google-calendar.png')}}" width="30" alt="">
											  </div>
											  <div class="app-name">
												  <p class="mb-0 mt-1">Calendar</p>
											  </div>
											  </div>
											</a>
										 </div>
										 <div class="col">
										  <a href="javascript:;">
											<div class="app-box text-center">
											  <div class="app-icon">
												  <img src="{{asset('assets/images/app/spotify.png')}}" width="30" alt="">
											  </div>
											  <div class="app-name">
												  <p class="mb-0 mt-1">Spotify</p>
											  </div>
											  </div>
											</a>
										 </div>
										 <div class="col">
										  <a href="javascript:;">
											<div class="app-box text-center">
											  <div class="app-icon">
												  <img src="{{asset('assets/images/app/google-photos.png')}}" width="30" alt="">
											  </div>
											  <div class="app-name">
												  <p class="mb-0 mt-1">Photos</p>
											  </div>
											  </div>
											</a>
										 </div>
										 <div class="col">
										  <a href="javascript:;">
											<div class="app-box text-center">
											  <div class="app-icon">
												  <img src="{{asset('assets/images/app/pinterest.png')}}" width="30" alt="">
											  </div>
											  <div class="app-name">
												  <p class="mb-0 mt-1">Photos</p>
											  </div>
											  </div>
											</a>
										 </div>
										 <div class="col">
										  <a href="javascript:;">
											<div class="app-box text-center">
											  <div class="app-icon">
												  <img src="{{asset('assets/images/app/linkedin.png')}}" width="30" alt="">
											  </div>
											  <div class="app-name">
												  <p class="mb-0 mt-1">linkedin</p>
											  </div>
											  </div>
											</a>
										 </div>
										 <div class="col">
										  <a href="javascript:;">
											<div class="app-box text-center">
											  <div class="app-icon">
												  <img src="{{asset('assets/images/app/dribble.png')}}" width="30" alt="">
											  </div>
											  <div class="app-name">
												  <p class="mb-0 mt-1">Dribble</p>
											  </div>
											  </div>
											</a>
										 </div>
										 <div class="col">
										  <a href="javascript:;">
											<div class="app-box text-center">
											  <div class="app-icon">
												  <img src="{{asset('assets/images/app/youtube.png')}}" width="30" alt="">
											  </div>
											  <div class="app-name">
												  <p class="mb-0 mt-1">YouTube</p>
											  </div>
											  </div>
											</a>
										 </div>
										 <div class="col">
										  <a href="javascript:;">
											<div class="app-box text-center">
											  <div class="app-icon">
												  <img src="{{asset('assets/images/app/google.png')}}" width="30" alt="">
											  </div>
											  <div class="app-name">
												  <p class="mb-0 mt-1">News</p>
											  </div>
											  </div>
											</a>
										 </div>
										 <div class="col">
										  <a href="javascript:;">
											<div class="app-box text-center">
											  <div class="app-icon">
												  <img src="{{asset('assets/images/app/envato.png')}}" width="30" alt="">
											  </div>
											  <div class="app-name">
												  <p class="mb-0 mt-1">Envato</p>
											  </div>
											  </div>
											</a>
										 </div>
										 <div class="col">
										  <a href="javascript:;">
											<div class="app-box text-center">
											  <div class="app-icon">
												  <img src="{{asset('assets/images/app/safari.png')}}" width="30" alt="">
											  </div>
											  <div class="app-name">
												  <p class="mb-0 mt-1">Safari</p>
											  </div>
											  </div>
											</a>
										 </div>
				
									  </div><!--end row-->
				
									</div>
								</div>
							</li>

							<li class="nav-item dropdown dropdown-large">
							
								<div class="dropdown-menu dropdown-menu-end">
									<a href="javascript:;">
										<div class="msg-header">
											<p class="msg-header-title">Notifications</p>
											<p class="msg-header-badge">8 New</p>
										</div>
									</a>
									<div class="header-notifications-list">
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
													<img src="{{asset('assets/images/avatars/avatar-1.png')}}" class="msg-avatar" alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Daisy Anderson<span class="msg-time float-end">5 sec
												ago</span></h6>
													<p class="msg-info">The standard chunk of lorem</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify bg-light-danger text-danger">dc
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">New Orders <span class="msg-time float-end">2 min
												ago</span></h6>
													<p class="msg-info">You have recived new orders</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
													<img src="{{asset('assets/images/avatars/avatar-2.png')}}" class="msg-avatar" alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Althea Cabardo <span class="msg-time float-end">14
												sec ago</span></h6>
													<p class="msg-info">Many desktop publishing packages</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify bg-light-success text-success">
													<img src="{{asset('assets/images/app/outlook.png')}}" width="25" alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Account Created<span class="msg-time float-end">28 min
												ago</span></h6>
													<p class="msg-info">Successfully created new email</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify bg-light-info text-info">Ss
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">New Product Approved <span
												class="msg-time float-end">2 hrs ago</span></h6>
													<p class="msg-info">Your new product has approved</p>
												</div>
											</div>
										</a>

										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
													<img src="{{asset('assets/images/avatars/avatar-4.png')}}" class="msg-avatar" alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Katherine Pechon <span class="msg-time float-end">15
												min ago</span></h6>
													<p class="msg-info">Making this the first true generator</p>
												</div>
											</div>
										</a>

										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify bg-light-success text-success"><i class='bx bx-check-square'></i>
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Your item is shipped <span class="msg-time float-end">5 hrs
												ago</span></h6>
													<p class="msg-info">Successfully shipped your item</p>
												</div>
											</div>
										</a>
										
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify bg-light-primary">
													<img src="{{asset('assets/images/app/github.png')}}" width="25" alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">New 24 authors<span class="msg-time float-end">1 day
												ago</span></h6>
													<p class="msg-info">24 new authors joined last week</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
													<img src="{{asset('assets/images/avatars/avatar-8.png')}}" class="msg-avatar" alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Peter Costanzo <span class="msg-time float-end">6 hrs
												ago</span></h6>
													<p class="msg-info">It was popularised in the 1960s</p>
												</div>
											</div>
										</a>
									</div>
									<a href="javascript:;">
										<div class="text-center msg-footer">
											<button class="btn btn-primary w-100">View All Notifications</button>
										</div>
									</a>
								</div>
							</li>
							<li class="nav-item dropdown dropdown-large">
							
								<div class="dropdown-menu dropdown-menu-end">
									<a href="javascript:;">
										<div class="msg-header">
											<p class="msg-header-title">My Cart</p>
											<p class="msg-header-badge">10 Items</p>
										</div>
									</a>
									<div class="header-message-list">
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center gap-3">
												<div class="position-relative">
													<div class="cart-product rounded-circle bg-light">
														<img src="{{asset('assets/images/products/11.png')}}" class="" alt="product image">
													</div>
												</div>
												<div class="flex-grow-1">
													<h6 class="cart-product-title mb-0">Men White T-Shirt</h6>
													<p class="cart-product-price mb-0">1 X $29.00</p>
												</div>
												<div class="">
													<p class="cart-price mb-0">$250</p>
												</div>
												<div class="cart-product-cancel"><i class="bx bx-x"></i>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center gap-3">
												<div class="position-relative">
													<div class="cart-product rounded-circle bg-light">
														<img src="{{asset('assets/images/products/02.png')}}" class="" alt="product image">
													</div>
												</div>
												<div class="flex-grow-1">
													<h6 class="cart-product-title mb-0">Men White T-Shirt</h6>
													<p class="cart-product-price mb-0">1 X $29.00</p>
												</div>
												<div class="">
													<p class="cart-price mb-0">$250</p>
												</div>
												<div class="cart-product-cancel"><i class="bx bx-x"></i>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center gap-3">
												<div class="position-relative">
													<div class="cart-product rounded-circle bg-light">
														<img src="{{asset('assets/images/products/03.png')}}" class="" alt="product image">
													</div>
												</div>
												<div class="flex-grow-1">
													<h6 class="cart-product-title mb-0">Men White T-Shirt</h6>
													<p class="cart-product-price mb-0">1 X $29.00</p>
												</div>
												<div class="">
													<p class="cart-price mb-0">$250</p>
												</div>
												<div class="cart-product-cancel"><i class="bx bx-x"></i>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center gap-3">
												<div class="position-relative">
													<div class="cart-product rounded-circle bg-light">
														<img src="{{asset('assets/images/products/04.png')}}" class="" alt="product image">
													</div>
												</div>
												<div class="flex-grow-1">
													<h6 class="cart-product-title mb-0">Men White T-Shirt</h6>
													<p class="cart-product-price mb-0">1 X $29.00</p>
												</div>
												<div class="">
													<p class="cart-price mb-0">$250</p>
												</div>
												<div class="cart-product-cancel"><i class="bx bx-x"></i>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center gap-3">
												<div class="position-relative">
													<div class="cart-product rounded-circle bg-light">
														<img src="{{asset('assets/images/products/05.png')}}" class="" alt="product image">
													</div>
												</div>
												<div class="flex-grow-1">
													<h6 class="cart-product-title mb-0">Men White T-Shirt</h6>
													<p class="cart-product-price mb-0">1 X $29.00</p>
												</div>
												<div class="">
													<p class="cart-price mb-0">$250</p>
												</div>
												<div class="cart-product-cancel"><i class="bx bx-x"></i>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center gap-3">
												<div class="position-relative">
													<div class="cart-product rounded-circle bg-light">
														<img src="{{asset('assets/images/products/06.png')}}" class="" alt="product image">
													</div>
												</div>
												<div class="flex-grow-1">
													<h6 class="cart-product-title mb-0">Men White T-Shirt</h6>
													<p class="cart-product-price mb-0">1 X $29.00</p>
												</div>
												<div class="">
													<p class="cart-price mb-0">$250</p>
												</div>
												<div class="cart-product-cancel"><i class="bx bx-x"></i>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center gap-3">
												<div class="position-relative">
													<div class="cart-product rounded-circle bg-light">
														<img src="{{asset('assets/images/products/07.png')}}" class="" alt="product image">
													</div>
												</div>
												<div class="flex-grow-1">
													<h6 class="cart-product-title mb-0">Men White T-Shirt</h6>
													<p class="cart-product-price mb-0">1 X $29.00</p>
												</div>
												<div class="">
													<p class="cart-price mb-0">$250</p>
												</div>
												<div class="cart-product-cancel"><i class="bx bx-x"></i>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center gap-3">
												<div class="position-relative">
													<div class="cart-product rounded-circle bg-light">
														<img src="{{asset('assets/images/products/08.png')}}" class="" alt="product image">
													</div>
												</div>
												<div class="flex-grow-1">
													<h6 class="cart-product-title mb-0">Men White T-Shirt</h6>
													<p class="cart-product-price mb-0">1 X $29.00</p>
												</div>
												<div class="">
													<p class="cart-price mb-0">$250</p>
												</div>
												<div class="cart-product-cancel"><i class="bx bx-x"></i>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center gap-3">
												<div class="position-relative">
													<div class="cart-product rounded-circle bg-light">
														<img src="{{asset('assets/images/products/09.png')}}" class="" alt="product image">
													</div>
												</div>
												<div class="flex-grow-1">
													<h6 class="cart-product-title mb-0">Men White T-Shirt</h6>
													<p class="cart-product-price mb-0">1 X $29.00</p>
												</div>
												<div class="">
													<p class="cart-price mb-0">$250</p>
												</div>
												<div class="cart-product-cancel"><i class="bx bx-x"></i>
												</div>
											</div>
										</a>
									</div>
									<a href="javascript:;">
										<div class="text-center msg-footer">
											<div class="d-flex align-items-center justify-content-between mb-3">
												<h5 class="mb-0">Total</h5>
												<h5 class="mb-0 ms-auto">$489.00</h5>
											</div>
											<button class="btn btn-primary w-100">Checkout</button>
										</div>
									</a>
								</div>
							</li>
						</ul>
					</div>
					<div class="user-box dropdown px-3">
						<a class="d-flex align-items-center nav-link dropdown-toggle gap-3 dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							<img src="{{asset('assets/images/avatars/avatar-2.png')}}" class="user-img" alt="user avatar">
							<div class="user-info">
								<p class="user-name mb-0">{{Auth::user()->name}}</p>
								<!-- <p class="designattion mb-0">{{Auth::user()->name}}</p> -->
							</div>
						</a>
						<ul class="dropdown-menu dropdown-menu-end">
							<li><a class="dropdown-item d-flex align-items-center" href="{{route('admin.admin_profile')}}"><i class="bx bx-user fs-5"></i><span>Profile</span></a>
							</li>
							<li><a class="dropdown-item d-flex align-items-center" href="{{route('admin.admin_password_change')}}"><i class="bx bx-home-circle fs-5"></i><span>Change Password</span></a>
							</li>
							<!-- <li><a class="dropdown-item d-flex align-items-center" href="javascript:;"><i class="bx bx-dollar-circle fs-5"></i><span>Earnings</span></a>
							</li>
							<li><a class="dropdown-item d-flex align-items-center" href="javascript:;"><i class="bx bx-download fs-5"></i><span>Downloads</span></a>
							</li> -->
							<li>
								<div class="dropdown-divider mb-0"></div>
							</li>
							
							<li><a class="dropdown-item d-flex align-items-center"  href="{{ route('logout') }}" onclick="event.preventDefault(); 
							document.getElementById('logout-form').submit();">
							<i class="bx bx-log-out-circle"></i><span>Logout</span></a>
							<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
							</li>
						</ul>
					</div>
				</nav>
			</div>

			
		</header>
		<!--end header -->
		<!--start page wrapper -->
		
		
		@yield('content')
		<!--end page wrapper -->
		<!--start overlay-->
		 <div class="overlay toggle-icon"></div>
		<!--end overlay-->
		<!--Start Back To Top Button-->
		  <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		<!--End Back To Top Button-->
		<footer class="page-footer">
			<p class="mb-0">Copyright © 2023. All right reserved.</p>
		</footer>
	</div>
@endif
	<!--end wrapper-->


	<!-- search modal -->
    <div class="modal" id="SearchModal" tabindex="-1">
		<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-fullscreen-md-down">
		  <div class="modal-content">
			<div class="modal-header gap-2">
			  <div class="position-relative popup-search w-100">
				<input class="form-control form-control-lg ps-5 border border-3 border-primary" type="search" placeholder="Search">
				<span class="position-absolute top-50 search-show ms-3 translate-middle-y start-0 top-50 fs-4"><i class='bx bx-search'></i></span>
			  </div>
			  <button type="button" class="btn-close d-md-none" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="search-list">
				   <p class="mb-1">Html Templates</p>
				   <div class="list-group">
					  <a href="javascript:;" class="list-group-item list-group-item-action active align-items-center d-flex gap-2 py-1"><i class='bx bxl-angular fs-4'></i>Best Html Templates</a>
					  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-vuejs fs-4'></i>Html5 Templates</a>
					  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-magento fs-4'></i>Responsive Html5 Templates</a>
					  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-shopify fs-4'></i>eCommerce Html Templates</a>
				   </div>
				   <p class="mb-1 mt-3">Web Designe Company</p>
				   <div class="list-group">
					  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-windows fs-4'></i>Best Html Templates</a>
					  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-dropbox fs-4' ></i>Html5 Templates</a>
					  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-opera fs-4'></i>Responsive Html5 Templates</a>
					  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-wordpress fs-4'></i>eCommerce Html Templates</a>
				   </div>
				   <p class="mb-1 mt-3">Software Development</p>
				   <div class="list-group">
					  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-mailchimp fs-4'></i>Best Html Templates</a>
					  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-zoom fs-4'></i>Html5 Templates</a>
					  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-sass fs-4'></i>Responsive Html5 Templates</a>
					  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-vk fs-4'></i>eCommerce Html Templates</a>
				   </div>
				   <p class="mb-1 mt-3">Online Shoping Portals</p>
				   <div class="list-group">
					  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-slack fs-4'></i>Best Html Templates</a>
					  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-skype fs-4'></i>Html5 Templates</a>
					  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-twitter fs-4'></i>Responsive Html5 Templates</a>
					  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-vimeo fs-4'></i>eCommerce Html Templates</a>
				   </div>
				</div>
			</div>
		  </div>
		</div>
	  </div>
    <!-- end search modal -->




	<!--start switcher-->
	<!-- <div class="switcher-wrapper">
		<div class="switcher-btn"> <i class='bx bx-cog bx-spin'></i>
		</div>
		<div class="switcher-body">
			<div class="d-flex align-items-center">
				<h5 class="mb-0 text-uppercase">Theme Customizer</h5>
				<button type="button" class="btn-close ms-auto close-switcher" aria-label="Close"></button>
			</div>
			<hr/>
			<h6 class="mb-0">Theme Styles</h6>
			<hr/>
			<div class="d-flex align-items-center justify-content-between">
				<div class="form-check">
					<input class="form-check-input" type="radio" name="flexRadioDefault" id="lightmode" checked>
					<label class="form-check-label" for="lightmode">Light</label>
				</div>
				<div class="form-check">
					<input class="form-check-input" type="radio" name="flexRadioDefault" id="darkmode">
					<label class="form-check-label" for="darkmode">Dark</label>
				</div>
				<div class="form-check">
					<input class="form-check-input" type="radio" name="flexRadioDefault" id="semidark">
					<label class="form-check-label" for="semidark">Semi Dark</label>
				</div>
			</div>
			<hr/>
			<div class="form-check">
				<input class="form-check-input" type="radio" id="minimaltheme" name="flexRadioDefault">
				<label class="form-check-label" for="minimaltheme">Minimal Theme</label>
			</div>
			<hr/>
			<h6 class="mb-0">Header Colors</h6>
			<hr/>
			<div class="header-colors-indigators">
				<div class="row row-cols-auto g-3">
					<div class="col">
						<div class="indigator headercolor1" id="headercolor1"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor2" id="headercolor2"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor3" id="headercolor3"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor4" id="headercolor4"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor5" id="headercolor5"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor6" id="headercolor6"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor7" id="headercolor7"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor8" id="headercolor8"></div>
					</div>
				</div>
			</div>
			<hr/>
			<h6 class="mb-0">Sidebar Colors</h6>
			<hr/>
			<div class="header-colors-indigators">
				<div class="row row-cols-auto g-3">
					<div class="col">
						<div class="indigator sidebarcolor1" id="sidebarcolor1"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor2" id="sidebarcolor2"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor3" id="sidebarcolor3"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor4" id="sidebarcolor4"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor5" id="sidebarcolor5"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor6" id="sidebarcolor6"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor7" id="sidebarcolor7"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor8" id="sidebarcolor8"></div>
					</div>
				</div>
			</div>
		</div>
	</div> -->
	<!--end switcher-->
	<!-- Bootstrap JS -->
	<script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
	<!--plugins-->
	<script src="{{asset('assets/js/jquery.min.js')}}"></script>
	<script src="{{asset('assets/plugins/simplebar/js/simplebar.min.js')}}"></script>
	<script src="{{asset('assets/plugins/metismenu/js/metisMenu.min.js')}}"></script>
	<script src="{{asset('assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js')}}"></script>
	<script src="{{asset('assets/plugins/apexcharts-bundle/js/apexcharts.min.js')}}"></script>
	<script src="{{asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
	<script src="{{asset('assets/plugins/datatable/js/dataTables.bootstrap5.min.js')}}"></script>
	<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script type='text/javascript' src='https://cdn.jsdelivr.net/npm/froala-editor@latest/js/froala_editor.pkgd.min.js'></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
	<script src="{{asset('assets/plugins/select2/js/select2-custom.js')}}"></script>
	<script src="{{asset('assets/plugin/timepicker/bootstrap-timepicker.min.js')}}"></script>

	<script>
        // init Froala Editor
        new FroalaEditor('#editor');
    </script>
	<script>
		
		$(".datepicker").flatpickr();

		$(".time-picker").flatpickr({
				enableTime: true,
				noCalendar: true,
				dateFormat: "Y-m-d H:i",
			});

		$(".date-time").flatpickr({
				enableTime: true,
				dateFormat: "Y-m-d H:i",
		});

		$(".date-format").flatpickr({
			altInput: true,
			altFormat: "F j, Y",
			dateFormat: "Y-m-d",
		});

		$(".date-range").flatpickr({
			mode: "range",
			altInput: true,
			altFormat: "F j, Y",
			dateFormat: "Y-m-d",
		});

		$(".date-inline").flatpickr({
			inline: true,
			altInput: true,
			altFormat: "F j, Y",
			dateFormat: "Y-m-d",
		});

	</script>
<script>
		$(document).ready(function() {
			$('#example').DataTable();
		  } );
	</script>
	<script>
		$(document).ready(function() {
			var table = $('#example2').DataTable( {
				lengthChange: false,
				buttons: [ 'copy', 'excel', 'pdf', 'print']
			} );
		 
			table.buttons().container()
				.appendTo( '#example2_wrapper .col-md-6:eq(0)' );
		} );
	</script>
	
	
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
	<script src="{{asset('assets/js/index.js')}}"></script>
	<!--app JS-->
	<script src="{{asset('assets/js/app.js')}}"></script>
	

</body>

</html>