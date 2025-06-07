@extends('layouts.front-header')

@section('content')
<?php
$mst_specialties_department_category_details =DB::table('mst_specialties_department_category_details')
->where('slug',$slug)
->first();
$department_category =DB::table('mst_specialties_department_category')
->where('slug',$slug)
->first();
?>
  <section class="breadcrum-sec" style="background-image:url(images/speciality/clinical-departments/cardiology/cardiology-bg.jpg)">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="breadcrum-content">
            <h1>{{$department_category->department_category}}</h1>
            <ul>
              <li><a href="index.html"><i class="fa fa-home"></i></a></li>
              <li>Speciality</li>
              <li>{{$department_category->department_category}}</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
  <div id="sticky-anchor"></div>
  <section class="fixed_wrap" id="sticky">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div>
            <ul class="fixed_tabs">
              <li><a href="#overview" class="scroll">Overview</a></li>
              <li><a href="#services" class="scroll">Services</a></li>
              <li><a href="#doctors" class="scroll">Our Doctors</a></li>
              <!-- <li><a href="#feedback" class="scroll">Patients Feedback</a></li> -->
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="speciality-overview" id="overview">
    <div class="overview-shape"><img src="images/bg/speciality-shape.webp"></div>
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="overview-text wow fadeInLeft animated" data-wow-delay="400ms" data-wow-duration="400ms">
            <div class="section-heading">
              <h2>{{$mst_specialties_department_category_details->title}}</h2>
            </div>
            {!!$mst_specialties_department_category_details->description!!}
          </div>
        </div>
        <div class="col-md-6">
          <div class="overview-img wow fadeInRight animated" data-wow-delay="400ms" data-wow-duration="400ms">
            <img src="{{ asset('public/specialtie/'.$mst_specialties_department_category_details->image)}}" class="img-responsive">
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="speciality-services" id="services">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-heading-center wow fadeInUp animated" data-wow-delay="400ms" data-wow-duration="400ms">
            <h2>Cardiology Services</h2>
          </div>
        </div>
        <div class="col-md-12">
          <div class="owl-carousel owl-theme chooseus-block" id="speciality-services-slider">
            <div clas="item">
              <article class="pbmit-service-style-3">
                <div class="pbminfotech-post-item">
                  <div class="pbminfotech-box-content">
                    <div class="pbmit-service-icon-wrapper">
                      01
                    </div>
                    <div class="pbminfotech-box-content-inner">
                      <h3 class="pbmit-service-title">
                        <a href="#">Hybrid Cath Lab</a>
                      </h3>
                      <div class="pbmit-service-btn">
                        <a class="pbmit-service-btn-a" href="service-details.html"><span>Read More</span></a>
                      </div>
                    </div>
                  </div>
                </div>
              </article>
            </div>
            <!-- End item -->
            <div clas="item">
              <article class="pbmit-service-style-3">
                <div class="pbminfotech-post-item">
                  <div class="pbminfotech-box-content">
                    <div class="pbmit-service-icon-wrapper">
                      02
                    </div>
                    <div class="pbminfotech-box-content-inner">
                      <h3 class="pbmit-service-title">
                        <a href="#">Angiography & Angioplasty</a>
                      </h3>
                      <div class="pbmit-service-btn">
                        <a class="pbmit-service-btn-a" href="service-details.html"><span>Read More</span></a>
                      </div>
                    </div>
                  </div>
                </div>
              </article>
            </div>
            <!-- End item -->
            <div clas="item">
              <article class="pbmit-service-style-3">
                <div class="pbminfotech-post-item">
                  <div class="pbminfotech-box-content">
                    <div class="pbmit-service-icon-wrapper">
                      03
                    </div>
                    <div class="pbminfotech-box-content-inner">
                      <h3 class="pbmit-service-title">
                        <a href="#">Permanent Pace Makers and ICD</a>
                      </h3>
                      <div class="pbmit-service-btn">
                        <a class="pbmit-service-btn-a" href="service-details.html"><span>Read More</span></a>
                      </div>
                    </div>
                  </div>
                </div>
              </article>
            </div>
            <!-- End item -->
           <div clas="item">
              <article class="pbmit-service-style-3">
                <div class="pbminfotech-post-item">
                  <div class="pbminfotech-box-content">
                    <div class="pbmit-service-icon-wrapper">
                      04
                    </div>
                    <div class="pbminfotech-box-content-inner">
                      <h3 class="pbmit-service-title">
                        <a href="#">Peripheral Interventions</a>
                      </h3>
                      <div class="pbmit-service-btn">
                        <a class="pbmit-service-btn-a" href="service-details.html"><span>Read More</span></a>
                      </div>
                    </div>
                  </div>
                </div>
              </article>
            </div>
            <!-- End item -->
            <div clas="item">
              <article class="pbmit-service-style-3">
                <div class="pbminfotech-post-item">
                  <div class="pbminfotech-box-content">
                    <div class="pbmit-service-icon-wrapper">
                      05
                    </div>
                    <div class="pbminfotech-box-content-inner">
                      <h3 class="pbmit-service-title">
                        <a href="#">Paediatric Cardiology</a>
                      </h3>
                      <div class="pbmit-service-btn">
                        <a class="pbmit-service-btn-a" href="service-details.html"><span>Read More</span></a>
                      </div>
                    </div>
                  </div>
                </div>
              </article>
            </div>
            <!-- End item -->
            <div clas="item">
              <article class="pbmit-service-style-3">
                <div class="pbminfotech-post-item">
                  <div class="pbminfotech-box-content">
                    <div class="pbmit-service-icon-wrapper">
                      06
                    </div>
                    <div class="pbminfotech-box-content-inner">
                      <h3 class="pbmit-service-title">
                        <a href="#">Cardiac Surgery</a>
                      </h3>
                      <div class="pbmit-service-btn">
                        <a class="pbmit-service-btn-a" href="service-details.html"><span>Read More</span></a>
                      </div>
                    </div>
                  </div>
                </div>
              </article>
            </div>
            <!-- End item -->
            <div clas="item">
              <article class="pbmit-service-style-3">
                <div class="pbminfotech-post-item">
                  <div class="pbminfotech-box-content">
                    <div class="pbmit-service-icon-wrapper">
                      07
                    </div>
                    <div class="pbminfotech-box-content-inner">
                      <h3 class="pbmit-service-title">
                        <a href="#">Interventional Neuro and Radiology</a>
                      </h3>
                      <div class="pbmit-service-btn">
                        <a class="pbmit-service-btn-a" href="service-details.html"><span>Read More</span></a>
                      </div>
                    </div>
                  </div>
                </div>
              </article>
            </div>
            <!-- End item -->
            <div clas="item">
              <article class="pbmit-service-style-3">
                <div class="pbminfotech-post-item">
                  <div class="pbminfotech-box-content">
                    <div class="pbmit-service-icon-wrapper">
                      08
                    </div>
                    <div class="pbminfotech-box-content-inner">
                      <h3 class="pbmit-service-title">
                        <a href="#">Electrophysiology</a>
                      </h3>
                      <div class="pbmit-service-btn">
                        <a class="pbmit-service-btn-a" href="service-details.html"><span>Read More</span></a>
                      </div>
                    </div>
                  </div>
                </div>
              </article>
            </div>
            <!-- End item -->
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="speciality-doctors" id="doctors">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-heading-center wow fadeInUp animated" data-wow-delay="400ms" data-wow-duration="400ms">
            <h2>Our Doctors</h2>
          </div>
        </div>
        <div class="col-md-12">
          <div class="owl-carousel owl-theme chooseus-block" id="speciality-doctor-slider">
            <div class="item">
              <div class="main-doctors-item hover-style wow fadeInUp animated" data-wow-delay="200ms" data-wow-duration="200ms">
                <div class="inner-border">
                  <div class="doctor-img">
                    <img src="images/speciality/clinical-departments/cardiology/doctors/dr_brian_pinto.jpg" alt="Image">
                    <a href="#">View Profile</a>
                  </div>
                  <div class="doctor-text">
                    <h3>Dr. Brian Pinto</h3>
                  <span>MD, DM (Cardiology), FACC (sp.Cardiology)</span>
                  <a href="#" data-toggle="modal" data-target="#myModal" class="doctor-more-btn">Book Appointment</a>
                  </div>
                </div>
              </div>
            </div>
            <!-- End item -->
            <div class="item">
              <div class="main-doctors-item hover-style wow fadeInUp animated" data-wow-delay="200ms" data-wow-duration="200ms">
                <div class="inner-border">
                  <div class="doctor-img">
                    <img src="images/speciality/clinical-departments/cardiology/doctors/dr_robin_pinto.jpg" alt="Image">
                    <a href="#">View Profile</a>
                  </div>
                  <div class="doctor-text">
                  <h3>Dr. Robin Pinto</h3>
                  <span>MD, DM (Cardiology) (sp.Cardiology)</span>
                  <a href="#" data-toggle="modal" data-target="#myModal" class="doctor-more-btn">Book Appointment</a>
                </div>
                </div>
              </div>
            </div>
            <!-- End item -->
            <div class="item">
              <div class="main-doctors-item hover-style wow fadeInUp animated" data-wow-delay="200ms" data-wow-duration="200ms">
                <div class="inner-border">
                  <div class="doctor-img">
                    <img src="images/speciality/clinical-departments/cardiology/doctors/dr_jadwani.jpg" alt="Image">
                    <a href="#">View Profile</a>
                  </div>
                  <div class="doctor-text">
                  <h3>Dr. Jaipal P Jadwani</h3>
                  <span>MD (sp.Cardiologist)</span>
                  <a href="#" data-toggle="modal" data-target="#myModal" class="doctor-more-btn">Book Appointment</a>
                </div>
                </div>
              </div>
            </div>
            <!-- End item -->
            <div class="item">
              <div class="main-doctors-item hover-style wow fadeInUp animated" data-wow-delay="200ms" data-wow-duration="200ms">
                <div class="inner-border">
                  <div class="doctor-img">
                    <img src="images/speciality/clinical-departments/cardiology/doctors/dr_anand_rao.jpg" alt="Image">
                    <a href="#">View Profile</a>
                  </div>
                  <div class="doctor-text">
                  <h3>Dr. Anand Rao</h3>
                  <span>MD, DM, FSCAI (Sp.Interventional cardiologist)</span>
                  <a href="#" data-toggle="modal" data-target="#myModal" class="doctor-more-btn">Book Appointment</a>
                </div>
                </div>
              </div>
            </div>
            <!-- End item -->
            <div class="item">
              <div class="main-doctors-item hover-style wow fadeInUp animated" data-wow-delay="200ms" data-wow-duration="200ms">
                <div class="inner-border">
                  <div class="doctor-img">
                    <img src="images/speciality/clinical-departments/cardiology/doctors/dr_ankeet_dedhia.jpg" alt="Image">
                    <a href="#">View Profile</a>
                  </div>
                  <div class="doctor-text">
                  <h3>Dr. Ankeet Dedhia</h3>
                  <span>DNB (Cardiology), DNB (Medicine)</span>
                  <a href="#" data-toggle="modal" data-target="#myModal" class="doctor-more-btn">Book Appointment</a>
                </div>
                </div>
              </div>
            </div>
            <!-- End item -->
            <div class="item">
              <div class="main-doctors-item hover-style wow fadeInUp animated" data-wow-delay="200ms" data-wow-duration="200ms">
                <div class="inner-border">
                  <div class="doctor-img">
                    <img src="images/speciality/clinical-departments/cardiology/doctors/dr_nitin_gokhale.jpg" alt="Image">
                    <a href="#">View Profile</a>
                  </div>
                  <div class="doctor-text">
                  <h3>Dr Nitin Gokhale</h3>
                  <span>MD (Medicine), DM (Card.)</span>
                  <a href="#" data-toggle="modal" data-target="#myModal" class="doctor-more-btn">Book Appointment</a>
                </div>
                </div>
              </div>
            </div>
            <!-- End item -->
            <div class="item">
              <div class="main-doctors-item hover-style wow fadeInUp animated" data-wow-delay="200ms" data-wow-duration="200ms">
                <div class="inner-border">
                  <div class="doctor-img">
                    <img src="images/speciality/clinical-departments/cardiology/doctors/dr_kunal_sinkar.jpg" alt="Image">
                    <a href="#">View Profile</a>
                  </div>
                  <div class="doctor-text">
                  <h3>Dr. Kunal Praful Sinkar</h3>
                  <span>MBBS, DNB(Medicine), MNAMS, DNB (Cardiology)</span>
                  <a href="#" data-toggle="modal" data-target="#myModal" class="doctor-more-btn">Book Appointment</a>
                </div>
                </div>
              </div>
            </div>
            <!-- End item -->
            <div class="item">
              <div class="main-doctors-item hover-style wow fadeInUp animated" data-wow-delay="200ms" data-wow-duration="200ms">
                <div class="inner-border">
                  <div class="doctor-img">
                    <img src="images/speciality/clinical-departments/cardiology/doctors/dr-pradeep.jpg" alt="Image">
                    <a href="#">View Profile</a>
                  </div>
                  <div class="doctor-text">
                  <h3>Dr. Pradeep K. Hasija</h3>
                  <span>(MD, DM (Cardiology), AIIMS)</span>
                  <a href="#" data-toggle="modal" data-target="#myModal" class="doctor-more-btn">Book Appointment</a>
                </div>
                </div>
              </div>
            </div>
            <!-- End item -->
          </div>
        </div>
      </div>
    </div>
  </section>
 <!--  <section class="speciality-feedback" id="feedback">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-heading-center wow fadeInUp animated" data-wow-delay="400ms" data-wow-duration="400ms">
            <h2>What Our Patient Say</h2>
          </div>
        </div>
        <div class="col-md-5"></div>
        <div class="col-md-7">
          <div class="owl-carousel owl-theme chooseus-block" id="speciality-feedback-slider">
            <div class="item">
              <div class="testimonial-block-one">
                <div class="inner-box">
                  <div class="icon-box"><i class="icon-17"></i></div>
                  <ul class="rating">
                    <li><i class="fa fa-star"></i></li>
                    <li><i class="fa fa-star"></i></li>
                    <li><i class="fa fa-star"></i></li>
                    <li><i class="fa fa-star"></i></li>
                    <li><i class="fa fa-star"></i></li>
                  </ul>
                  <h4>“Best Eye Care Experience”</h4>
                  <p>Enim amet id maecenas congue sedis sedet tincidunt sit donec. Ac cum atde elit purus varius isti facilia.</p>
                  <div class="author-box">
                    <figure class="thumb-box"><img src="images/testimonials/user.png" alt=""></figure>
                    <h5>Sandy Thosmson</h5>
                    <span class="designation">Eye Pain Patient</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="testimonial-block-one">
                <div class="inner-box">
                  <div class="icon-box"><i class="icon-17"></i></div>
                  <ul class="rating">
                    <li><i class="fa fa-star"></i></li>
                    <li><i class="fa fa-star"></i></li>
                    <li><i class="fa fa-star"></i></li>
                    <li><i class="fa fa-star"></i></li>
                    <li><i class="fa fa-star"></i></li>
                  </ul>
                  <h4>“Best Eye Care Experience”</h4>
                  <p>Enim amet id maecenas congue sedis sedet tincidunt sit donec. Ac cum atde elit purus varius isti facilia.</p>
                  <div class="author-box">
                    <figure class="thumb-box"><img src="images/testimonials/user.png" alt=""></figure>
                    <h5>Sandy Thosmson</h5>
                    <span class="designation">Eye Pain Patient</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="book-appo-sec">
    <div class="appointment-shape">
      <img src="images/bg/appointment-bg-shape.png" class="float-bob">
    </div>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-5 no-padding">
          <div class="book-appo-btn">
            <img src="images/bg/appointment-bg.jpg" class="img-responsive">
          </div>
        </div>
        <div class="col-md-7 no-padding">
          <div class="book-appo-title wow fadeInUp animated" data-wow-delay="400ms" data-wow-duration="400ms">
            <h2>Book Your Appointment Today!</h2>
            <h3>Call anytime <a href="tel912262670370">+91 22-62670 370</a></h3>
            <a href="#" class="button appoint-btn"><span class="button-content">Book Appointment</span></a>
          </div>
        </div>
      </div>
    </div>
  </section> -->
  @endsection