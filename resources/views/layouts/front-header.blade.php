<html lang="en">
  <head>
    <title>Holy Hospital</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="shortcut icon" href="images/logo/fav.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/css/media.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/css/hover.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/css/effect.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/css/animate.css')}}">

  </head>
  <div class="main-header">
    <section class="topbar">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
            <div class="topbar-list">
              <ul>
                <li><img src="{{ asset('frontend/images/icons/24hrs.png') }}"> 24 Hrs</li>
                <li><img src="{{ asset('frontend/images/icons/phone-call.png') }}"> <a href="tel:912262670555">+91 22-62670 555</a></li>  
                <li><i class="fa fa-phone  trin-trin"></i> Emergency <a href="tel:912262670370">+91 22-62670 370</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-6">
            <div class="topbar-list right-list">
              <ul>
                <li><a href="https://maps.app.goo.gl/yYMYJMq6rxaC2JnR6" target="_blank"><img src="images/icons/location-pin.png"> Location</a></li>
                <li><a href="#" class="facebook-icon"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#" class="instagram-icon"><i class="fa fa-instagram"></i></a></li>
                <li><a href="#" class="linkedin-icon"><i class="fa fa-linkedin"></i></a></li>
                <li class="login-btn"><a href="#"><i class="fa fa-sign-in"></i> Login</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>
    <header class="header_area" id="header-sticky">
      <div class="main_header_area animated">
        <div class="container-fluid">
          <nav id="navigation1" class="navigation menu-1">
            <div class="nav-header">
              <a class="nav-brand" href="index.html"><img src="{{ asset('frontend/images/logo/logo.png') }}"></a>
              <div class="nav-toggle"></div>
            </div>
            <div class="nav-search">
              <div class="nav-search-button"><i class="fa fa-search"></i></div>
              <form>
                <div class="nav-search-inner">
                  <input type="search" name="search" placeholder="Search..."/>
                </div>
              </form>
            </div>
            <div class="nav-menus-wrapper">
              <ul class="nav-menu align-to-right">
                <li>
                  <a href="about.html">About Us</a>
                  <ul class="nav-dropdown">
                    <li><a href="profile-and-history.html">Profile & History</a></li>
                    <li><a href="vision-mission-motto.html">Vision / Mission / Motto</a></li>
                    <li><a href="ursuline-sisters.html">Ursuline Sisters</a></li>
                    <li><a href="society.html">Bandra HFH Society</a></li>
                    <li><a href="management-committee.html">Management Team</a></li>
                    <li><a href="committees.html">Committees</a></li>
                    <li><a href="accreditation.html">Accreditation & Awards</a></li>
                  </ul>
                </li>
                <li>
                  <a href="#">Specialties</a>
                  <div class="megamenu-panel scrollbar" id="style-3">
                    <div class="megamenu-lists">
                      <?php

                      $category =DB::table('mst_specialties_category')
                      ->where('status','=',1)
                      ->whereNull('deleted_dt')
                      ->get();
                      ?>
                      @foreach($category as $cat)
                      <ul class="megamenu-list list-col-5">
                        
                        <li class="megamenu-heading">
                          <h3>{{$cat->category}}</h3>
                        </li>
                        <?php
                              $department =DB::table('mst_specialties_department')
                              ->where('category_id','=',$cat->id)
                              ->where('status','=',1)
                              ->whereNull('deleted_dt')
                              ->get();
                        ?>
                        @foreach($department  as $dep)
                        <?php
                              $department_car =DB::table('mst_specialties_department_category')
                              ->where('department_id','=',$dep->id)
                              ->where('status','=',1)
                              ->whereNull('deleted_dt')
                              ->get();
                            ?>
                            @if(count($department_car)==0)
                            <li><a href="#">{{$dep->department}}</a></li>
                            @else
                        <li>
                          <button class="accordion">{{$dep->department}}</button>
                          <div class="panel">
                            
                            <ul class="megamenu-sublist">
                              @foreach($department_car as $dep_cat)
                              <li><a href="{{ route('specialties_details') }}/{{ $dep_cat->slug }}">{{$dep_cat->department_category}}</a></li>
                              @endforeach
                            </ul>
                          </div>
                        </li>
                        @endif
                        @endforeach
                       
                      </ul>
                      @endforeach
                    </div>
                  </div>
                </li>
                <li>
                  <a href="#">Patient</a>
                  <ul class="nav-dropdown">
                    <li><a href="accommodation.html">Accommodation</a></li>
                    <li><a href="empannelled-insurance.html">Empannelled Insurance Companies & TPA</a></li>
                    <li><a href="opd-schedule.html">OPD Scheduler</a></li>
                    <li><a href="inpatient.html">Inpatient</a></li>
                    <li><a href="rights-responsibilities.html">Rights & Responsibilities</a></li>
                    <li><a href="international-patients.html">International Patients</a></li>
                    <li><a href="patient-feedback.html">Write to Us</a></li>
                    <li><a href="medical-records.html">Medical Records</a></li>
                  </ul>
                </li>
                <li><a href="other-services.html">Services</a></li>
                <li>
                  <a href="#">Research & Academics</a>
                  <ul class="nav-dropdown">
                    <li><a href="academics-overview.html">Overview</a></li>
                    <li><a href="dnb.html">DNB</a></li>
                    <li><a href="cps.html">CPS</a></li>
                    <li><a href="cme.html">CME</a></li>
                    <li><a href="nursing-institute.html">Nursing Institute</a></li>
                    <li><a href="medical-research-institute.html">Medical Research Institute</a></li>
                    <li><a href="isccm.html">ISCCM</a></li>
                  </ul>
                </li>
                <li><a href="philanthrophy.html">Philanthrophy</a></li>
                <li><a href="blog.html">Blogs & Media</a></li>
                <li><a href="contact-us.html">Contact Us</a></li>
              </ul>
            </div>
          </nav>
        </div>
      </div>
    </header>
  </div>
 
  @yield('content')
  <footer>
    <div class="container-fluid">
      <div class class="row">
        <div class="col-md-3">
          <div class="footer-address">
            <!--   <div class="footer-logo">
              <img src="images/logo/logo.png">
              </div> -->
            <h4>Contact Us</h4>
            <ul>
              <li><i class="fa fa-map-marker"></i> St Andrew's Road, Bandra (West),<br> Mumbai-400 050. India.</li>
              <li><i class="fa fa-phone"></i> <a href="tel:02262670366">022-62670366</a></li>
              <li><i class="fa fa-envelope"></i> <a href="#">info@holyfamilyhospital.in</a></li>
            </ul>
          </div>
        </div>
        <div class="col-md-5">
          <div class="row">
            <div class="col-md-6">
              <div class="footer-link">
                <h4>Centres of Excellente</h4>
                <ul>
                  <li><a href="#">MRI</a></li>
                  <li><a href="#">Hybrid Cath Lab</a></li>
                  <li><a href="#">Obstetrics & Gynaecology</a></li>
                  <li><a href="#">Cardiology</a></li>
                  <li><a href="#">Orthopaedics</a></li>
                </ul>
                <div class="hour-text">
                  <h4>Hospital Hours</h4>
                  <p>Mon-Sun <br>8:00 - 20:00</p>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="footer-link">
                <h4>Affiliations</h4>
                <ul>
                  <li><a href="#">Institute of Nursing Education</a></li>
                  <li><a href="#">Medical Lab. Technology</a></li>
                  <li><a href="#">Medical Research Society</a></li>
                  <li><a href="#">Heart Institute</a></li>
                  <li><a href="#">Save Heart Foundations</a></li>
                </ul>
                <h4>Follow us on</h4>
                <div class="gradient-style">
                  <ul class="social-icons">
                    <li>
                      <a href="#" class="ic-facebook">
                      <i class="fa-brands fa fa-facebook"></i>
                      <span class="tooltip">Facebook</span>
                      </a>
                    </li>
                    <li>
                      <a href="#" class="ic-instagram">
                      <i class="fa fa-instagram"></i>
                      <span class="tooltip">Instagram</span>
                      </a>
                    </li>
                    <li>
                      <a href="#" class="ic-linkedin">
                      <i class="fa fa-linkedin"></i>
                      <span class="tooltip">Linkedin</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="row">
            <div class="col-md-7">
              <div class="footer-link">
                <h4>Special Clinics</h4>
                <ul>
                  <li><a href="#">Memory Disorders Clinic</a></li>
                  <li><a href="#">Cancer Detection Clinic</a></li>
                  <li><a href="#">Pain Clinic</a></li>
                  <li><a href="#">Retinal Clinic</a></li>
                  <li><a href="#">Child & Adolescent Guidance</a></li>
                </ul>
              </div>
            </div>
            <div class="col-md-5">
              <div class="footer-link">
                <h4>Facilities</h4>
                <ul>
                  <li><a href="#">Blood Bank</a></li>
                  <li><a href="#">Pathology</a></li>
                  <li><a href="#">Imaging</a></li>
                  <li><a href="#">Stress Tests</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="emergency-text">
            <h4>Emergency 24 hrs</h4>
            <p><a href="tel:02262670370">022-62670370</a></p>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <section class="copyright">
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <div class="copyright-text">
            <p>Copyright @2023 The Bandra Holy Family Hospital Society. All rights reserved</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="copyright-text copyright-right">
            <p>Designed by <a href="https://matrixbricks.com/" target="_blank">Matrix Bricks</a></p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- <a href="tel:912262670370" class="emer-sticky-btn" title="Emergency Call"><img src="images/icons/emergency-call.png"></a>
  <a href="#enquiry-id" class="sticky-btn"><i class="fa fa-whatsapp icon"></i></a> -->
  <a id="button"></a>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="{{ asset('frontend/js/owl.carousel.js')}}"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script src="{{ asset('frontend/js/wow.min.js')}}"></script>
  <script src="{{ asset('frontend/js/custom.js')}}"></script>
  <script src="{{ asset('frontend/js/menu.js')}}"></script>


  </body>
</html>
      
     
      <!-- footer -->
  