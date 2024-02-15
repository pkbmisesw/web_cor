<?php
include 'config.php';

$id_course = $_GET['p'];

$sql_course = $conn->prepare("SELECT * FROM m_kursus WHERE id=:id");
$sql_course->execute([":id" => $id_course]);
$data_course = $sql_course->fetch();
if(!$data_course){
    echo '<script>document.location.href="index.php"</script>';
}

$gambar = $data_course['pic'];
if(empty($data_course['pic'])){
    $gambar = "tidak_ada_gambar.png";
}

if(!file_exists("images/".$data_course['pic'])){
    $gambar = "tidak_ada_di_image.png";
}
?>

<?php
include 'head.php';
include 'navbar.php';
?>

   <div class="tp-sidebar-menu">
      <button class="sidebar-close"><i class="icon_close"></i></button>
      <div class="side-logo mb-30">
         <a href="index.html"><img src="web_assets/img/logo/logo-black.png" alt="logo"></a>
      </div>
      <div class="mobile-menu"></div>
      <div class="sidebar-info">
         <h4 class="mb-15">Contact Info</h4>
         <ul class="side_circle">
            <li>27 Division St, New York</li>
            <li><a href="tel:123456789">+1 800 123 456 78</a></li>
            <li><a href="mailto:epora@example.com">epora@example.com</a></li>
         </ul>
         <div class="side-social">
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-linkedin"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
         </div>
      </div>
   </div>
   <div class="body-overlay"></div>

   <main>

      <!-- breadcrumb-area -->
      <section class="breadcrumb__area include-bg pt-150 pb-150 breadcrumb__overlay" data-background="web_assets/img/breadcrumb/breadcrumb-bg-1.jpg">
         <div class="container">
            <div class="row">
               <div class="col-xxl-12">
                  <div class="breadcrumb__content p-relative z-index-1">
                     <h3 class="breadcrumb__title mb-20">Course Details</h3>
                     <div class="breadcrumb__list">
                        <span><a href="index.html">Home</a></span>
                        <span class="dvdr"><i class="fa-regular fa-angle-right"></i></span>
                        <span><a href="course-list.html">Courses</a></span>
                        <span class="dvdr"><i class="fa-regular fa-angle-right"></i></span>
                        <span class="sub-page-black">Course Details</span>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- breadcrumb-area-end -->

      <!-- course-details-area -->
      <section class="c-details-area pt-120 pb-50 wow fadeInUp" data-wow-duration=".8s" data-wow-delay=".2s">
         <div class="container">
            <div class="row">
               <div class="col-lg-8 col-md-12">
                  <div class="c-details-wrapper mr-25">
                     <div class="c-details-thumb p-relative mb-40">
                        <img src="images/<?php echo $gambar; ?>" alt="details-bg">
                        <div class="c-details-ava d-md-flex align-items-center">
                           <img src="web_assets/img/course/c-details-ava-01.png" alt="avata">
                           <span>By <a href="#">Emilia Jonas</a></span>
                        </div>
                     </div>
                     <div class="course-details-content mb-45">
                        <div class="tpcourse__category mb-15">
                           <ul class="tpcourse__price-list d-flex align-items-center">
                              <li><a class="c-color-green" href="#">-</a></li>
                              <li><a class="c-color-yellow" href="#">-</a></li>
                           </ul>
                        </div>
                        <div class="tpcourse__ava-title mb-25">
                           <h4 class="c-details-title"><a href="#"><?php echo $data_course['nama']; ?></a></h4>
                        </div>
                        <div class="tpcourse__meta course-details-list">
                           <ul class="d-flex align-items-center">
                              <li>
                                 <div class="rating-gold d-flex align-items-center">
                                    <p>4.7</p>
                                    <i class="fi fi-ss-star"></i>
                                    <i class="fi fi-ss-star"></i>
                                    <i class="fi fi-ss-star"></i>
                                    <i class="fi fi-ss-star"></i>
                                    <i class="fi fi-rs-star"></i>
                                    <span>(125)</span>
                                 </div>
                              </li>
                              <li><img src="web_assets/img/icon/c-meta-01.png" alt="meta-icon"> <span>- Classes</span></li>
                              <li><img src="web_assets/img/icon/c-meta-02.png" alt="meta-icon"> <span>- Students</span></li>
                           </ul>
                        </div>
                     </div>
                     <div class="c-details-about mb-40">
                        <h5 class="tp-c-details-title mb-20">About This Course</h5>
                         <p><?php echo $data_course['des']; ?></p>
                     </div>
                     <div class="cor-details-instructor mb-40">
                        <h4 class="tp-c-details-title mb-40">Instructor</h4>
                        <div class="course-instructor-details d-flex f-wrap align-items-center">
                           <div class="course-avata mr-30 mb-20">
                              <img src="web_assets/img/course/c-details-ava-thumb-01.jpg" alt="avata-thumb">
                           </div>
                           <div class="course-avatar-details mb-20">
                              <h5 class="c-avata-title mb-10">Hossain Mahmud</h5>
                              <p>Award Winning Chemical & User Interface Design Training</p>
                              <div class="c-details-list mb-5">
                                 <ul class="d-flex align-items-center">
                                    <li>
                                       <div class="rating-gold d-flex align-items-center">
                                          <p>4.7</p>
                                          <i class="fi fi-ss-star"></i>
                                          <i class="fi fi-ss-star"></i>
                                          <i class="fi fi-ss-star"></i>
                                          <i class="fi fi-ss-star"></i>
                                          <i class="fi fi-rs-star"></i>
                                          <span>(125)</span>
                                       </div>
                                    </li>
                                    <li><img src="web_assets/img/icon/c-details-01.png" alt="meta-icon"><span>35 Classes</span></li>
                                 </ul>
                              </div>
                              <div class="c-details-stu">
                                 <ul>
                                    <li class="d-flex align-items-center"><img src="web_assets/img/icon/c-details-02.png" alt="meta-icon"> <span>2,35,687 Students</span></li>
                                 </ul>
                              </div>
                           </div>
                        </div>
                        <p>Synergistically foster 24/7 leadership rather than scalable platforms. Conveniently visualize installed base products before interactive results. Collaboratively restore corporate experiences and open-source applications. Proactively mesh cooperative growth strategies.</p>
                     </div>
                     <div class="c-details-review pb-15">
                        <div class="c-review-title-wrapper">
                           <h5 class="c-review-title mb-40">Review</h5>
                        </div>
                        <div class="course-reviewer-item-wrapper">
                           <div class="course-reviewer-item d-flex mb-25">
                              <div class="course-review-ava">
                                 <img src="web_assets/img/icon/c-details-avata-01.png" alt="details-avata">
                              </div>
                              <div class="course-review-content p-relative">
                                 <h5 class="course-ava-title mb-15">Brooklyn Simmons</h5>
                                 <div class="tpcourse__rating-icon d-flex align-items-center mb-10">
                                    <i class="fi fi-ss-star"></i>
                                    <i class="fi fi-ss-star"></i>
                                    <i class="fi fi-ss-star"></i>
                                    <i class="fi fi-ss-star"></i>
                                    <i class="fi fi-rs-star"></i>
                                 </div>
                                 <p>Synergistically foster 24/7 leadership rather than scalable platforms. Conveniently visualize installed base products before interactive results. Collaboratively restore corporate experiences and open-source applications.</p>
                                 <div class="c-reviewer-time">
                                    <span>a week ago</span>
                                 </div>
                              </div>
                           </div>
                           <div class="course-reviewer-item-wrapper mb-25">
                              <div class="course-reviewer-item d-flex">
                                 <div class="course-review-ava">
                                    <img src="web_assets/img/icon/c-details-avata-02.png" alt="details-avata">
                                 </div>
                                 <div class="course-review-content p-relative">
                                    <h5 class="course-ava-title mb-15">Leslie Alexander</h5>
                                    <div class="tpcourse__rating-icon d-flex align-items-center mb-10">
                                       <i class="fi fi-ss-star"></i>
                                       <i class="fi fi-ss-star"></i>
                                       <i class="fi fi-ss-star"></i>
                                       <i class="fi fi-ss-star"></i>
                                       <i class="fi fi-rs-star"></i>
                                    </div>
                                    <p>Synergistically foster 24/7 leadership rather than scalable platforms. Conveniently visualize installed base products before interactive results. Collaboratively restore corporate experiences and open-source applications.</p>
                                    <div class="c-reviewer-time">
                                       <span>a week ago</span>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="course-reviewer-item-wrapper mb-25">
                              <div class="course-reviewer-item d-flex">
                                 <div class="course-review-ava">
                                    <img src="web_assets/img/icon/c-details-avata-03.png" alt="details-avata">
                                 </div>
                                 <div class="course-review-content p-relative">
                                    <h5 class="course-ava-title mb-15">Dianne Russell</h5>
                                    <div class="tpcourse__rating-icon d-flex align-items-center mb-10">
                                       <i class="fi fi-ss-star"></i>
                                       <i class="fi fi-ss-star"></i>
                                       <i class="fi fi-ss-star"></i>
                                       <i class="fi fi-ss-star"></i>
                                       <i class="fi fi-rs-star"></i>
                                    </div>
                                    <p>Synergistically foster 24/7 leadership rather than scalable platforms. Conveniently visualize installed base products before interactive results. Collaboratively restore corporate experiences and open-source applications.</p>
                                    <div class="c-reviewer-time">
                                       <span>a week ago</span>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-lg-4 col-md-12">
                  <div class="c-details-sidebar">
                     <div class="c-video-thumb p-relative mb-25">
                        <img src="web_assets/img/bg/c-details-video-bg.jpg" alt="video-bg">
                        <div class="c-video-icon">
                           <a class="popup-video" href="https://youtu.be/W-bgMEvrd2E"><i class="fi fi-sr-play"></i></a>
                        </div>
                     </div>
                     <div class="course-details-widget">
                        <div class="cd-video-price">
                           <h3 class="pricing-video text-center mb-15"><?php echo "Rp. " . number_format($data_course['harga'], null, null, '.').",-" ?></h3>
                           <div class="cd-pricing-btn text-center mb-30">
                              <a class="tp-vp-btn" href="#">Add To Cart</a>
                              <a class="tp-vp-btn-green" href="#">Enroll Now</a>
                           </div>
                        </div>
                        <div class="cd-information mb-35">
                           <ul>
                              <li><i class="fa-light fa-calendars"></i> <label>Lesson</label> <span>-</span></li>
                              <li><i class="fi fi-rr-chart-pie-alt"></i> <label>Quizess</label> <span>-</span></li>
                              <li><i class="fi fi-rr-user"></i> <label>Students</label> <span>-</span></li>
                              <li><i class="fa-light fa-clock-desk"></i> <label>Duration</label> <span>- Hours</span></li>
                              <li><i class="fi fi-sr-stats"></i> <label>Skill Level</label> <span>-</span></li>
                              <li><i class="fi fi-rr-comments"></i> <label>Language</label> <span>-</span></li>
                              <li><i class="fi fi-rs-diploma"></i> <label>Certificate</label> <span>-</span></li>
                           </ul>
                        </div>
                        <div class="c-details-social">
                           <h5 class="cd-social-title mb-25">Share Now:</h5>
                           <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                           <a href="#"><i class="fa-brands fa-twitter"></i></a>
                           <a href="#"><i class="fa-brands fa-instagram"></i></a>
                           <a href="#"><i class="fa-brands fa-youtube"></i></a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- course-details-area-end -->

      <!-- course-area -->
      <section class="course-area mb-80">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="section-title mb-65">
                     <h2 class="tp-section-title mb-20">Related Courses</h2>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-xl-4 col-lg-6 col-md-6">
                  <div class="tpcourse mb-40 wow fadeInUp" data-wow-duration=".8s" data-wow-delay=".3s">
                     <div class="tpcourse__thumb p-relative w-img fix">
                        <a href="course-details.html"><img src="web_assets/img/course/course-thumb-01.jpg" alt="course-thumb"></a>
                        <div class="tpcourse__tag">
                           <a href="course-details.html"><i class="fi fi-rr-heart"></i></a>
                        </div>
                        <div class="tpcourse__img-icon">
                           <img src="web_assets/img/icon/course-3-avata-1.png" alt="course-avata">
                        </div>
                     </div>
                     <div class="tpcourse__content-2">
                        <div class="tpcourse__category mb-10">
                           <ul class="tpcourse__price-list d-flex align-items-center">
                              <li><a class="c-color-yellow" href="#">-</a></li>
                              <li><a class="c-color-red" href="#">-</a></li>
                           </ul>
                        </div>
                        <div class="tpcourse__ava-title mb-15">
                           <h4 class="tpcourse__title tp-cours-title-color"><a href="course-details.html">Master Web Design in Adobe XD: Complete UI/UX Masterclass</a></h4>
                        </div>
                        <div class="tpcourse__meta tpcourse__meta-gap pb-15 mb-15">
                           <ul class="d-flex align-items-center">
                              <li><img src="web_assets/img/icon/c-meta-01.png" alt="meta-icon"> <span>35 Classes</span></li>
                              <li><img src="web_assets/img/icon/c-meta-02.png" alt="meta-icon"> <span>291 Students</span></li>
                           </ul>
                        </div>
                        <div class="tpcourse__rating d-flex align-items-center justify-content-between">
                           <div class="tpcourse__rating-icon">
                              <span>4.7</span>
                              <i class="fi fi-ss-star"></i>
                              <i class="fi fi-ss-star"></i>
                              <i class="fi fi-ss-star"></i>
                              <i class="fi fi-ss-star"></i>
                              <i class="fi fi-rs-star"></i>
                              <p>(125)</p>
                           </div>
                           <div class="tpcourse__pricing">
                              <h5 class="price-title">$29.99</h5>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-xl-4 col-lg-6 col-md-6">
                  <div class="tpcourse mb-40 wow fadeInUp" data-wow-duration=".8s" data-wow-delay=".5s">
                     <div class="tpcourse__thumb p-relative w-img fix">
                        <a href="#"><img src="web_assets/img/course/course-thumb-02.jpg" alt="course-thumb"></a>
                        <div class="tpcourse__tag">
                           <a href="course-details.html"><i class="fi fi-rr-heart"></i></a>
                        </div>
                        <div class="tpcourse__img-icon">
                           <img src="web_assets/img/icon/course-avata-02.png" alt="course-avata">
                        </div>
                     </div>
                     <div class="tpcourse__content-2">
                        <div class="tpcourse__category mb-10">
                           <ul class="tpcourse__price-list d-flex align-items-center">
                              <li><a class="c-color-green" href="course-details.html">Write</a></li>
                              <li><a class="c-color-blue" href="course-details.html">Content</a></li>
                           </ul>
                        </div>
                        <div class="tpcourse__avatar mb-15">
                           <h4 class="tpcourse__title tp-cours-title-color"><a href="course-details.html">How to Write Great Web Content - Better Search Rankings!</a></h4>
                        </div>
                        <div class="tpcourse__meta tpcourse__meta-gap pb-15 mb-15">
                           <ul class="d-flex align-items-center">
                              <li><img src="web_assets/img/icon/c-meta-01.png" alt="meta-icon"> <span>35 Classes</span></li>
                              <li><img src="web_assets/img/icon/c-meta-02.png" alt="meta-icon"> <span>291 Students</span></li>
                           </ul>
                        </div>
                        <div class="tpcourse__rating d-flex align-items-center justify-content-between">
                           <div class="tpcourse__rating-icon">
                              <span>4.7</span>
                              <i class="fi fi-ss-star"></i>
                              <i class="fi fi-ss-star"></i>
                              <i class="fi fi-ss-star"></i>
                              <i class="fi fi-ss-star"></i>
                              <i class="fi fi-rs-star"></i>
                              <p>(125)</p>
                           </div>
                           <div class="tpcourse__pricing">
                              <h5 class="price-title">$29.99</h5>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-xl-4 col-lg-6 col-md-6">
                  <div class="tpcourse mb-40 wow fadeInUp" data-wow-duration=".8s" data-wow-delay=".7s">
                     <div class="tpcourse__thumb p-relative w-img fix">
                        <a href="course-details.html"><img src="web_assets/img/course/course-thumb-03.jpg" alt="course-thumb"></a>
                        <div class="tpcourse__tag">
                           <a href="course-details.html"><i class="fi fi-rr-heart"></i></a>
                        </div>
                        <div class="tpcourse__img-icon">
                           <img src="web_assets/img/icon/course-avata-03.png" alt="course-avata">
                        </div>
                     </div>
                     <div class="tpcourse__content-2">
                        <div class="tpcourse__category mb-10">
                           <ul class="tpcourse__price-list d-flex align-items-center">
                              <li><a class="c-color-purple" href="course-details.html">Coding</a></li>
                              <li><a class="c-color-red" href="course-details.html">Development</a></li>
                           </ul>
                        </div>
                        <div class="tpcourse__avatar d-flex align-items-center mb-15">
                           <h4 class="tpcourse__title tp-cours-title-color"><a href="course-details.html">Dreamweaver - Coding your first website using Dreamweaver</a></h4>
                        </div>
                        <div class="tpcourse__meta tpcourse__meta-gap pb-15 mb-15">
                           <ul class="d-flex align-items-center">
                              <li><img src="web_assets/img/icon/c-meta-01.png" alt="meta-icon"> <span>35 Classes</span></li>
                              <li><img src="web_assets/img/icon/c-meta-02.png" alt="meta-icon"> <span>291 Students</span></li>
                           </ul>
                        </div>
                        <div class="tpcourse__rating d-flex align-items-center justify-content-between">
                           <div class="tpcourse__rating-icon">
                              <span>4.7</span>
                              <i class="fi fi-ss-star"></i>
                              <i class="fi fi-ss-star"></i>
                              <i class="fi fi-ss-star"></i>
                              <i class="fi fi-ss-star"></i>
                              <i class="fi fi-rs-star"></i>
                              <p>(125)</p>
                           </div>
                           <div class="tpcourse__pricing">
                              <h5 class="price-title">$29.99</h5>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- course-area-end -->

      <!-- counter-area -->
      <section class="tp-counter-area theme-bg pt-90 wow fadeInUp" data-wow-duration=".8s" data-wow-delay=".2s">
         <div class="counter-b-border">
            <div class="container">
               <div class="row">
                  <div class="col-xl-3 col-md-6">
                     <div class="counter-item mb-70">
                        <div class="counter-item__content counter-white-text">
                           <h4 class="counter-item__title counter-left-title"><span class="counter">276</span>K</h4>
                           <p>Worldwide Students</p>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-3 col-md-6">
                     <div class="counter-item mb-70">
                        <div class="counter-item__content counter-white-text">
                           <h4 class="counter-item__title counter-left-title"><span class="counter">23</span>+</h4>
                           <p>Years Experience</p>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-3 col-md-6">
                     <div class="counter-item mb-70">
                        <div class="counter-item__content counter-white-text">
                           <h4 class="counter-item__title counter-left-title"><span class="counter">735</span>+</h4>
                           <p>Professional Courses</p>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-3 col-md-6">
                     <div class="counter-item mb-70">
                        <div class="counter-item__content counter-white-text">
                           <h4 class="counter-item__title counter-left-title"><span class="counter">4.7</span>K+</h4>
                           <p>Beautiful Review</p>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- counter-area-end -->

   </main>

   <!-- footer-area -->
   <footer>
      <div class="footer-bg theme-bg bg-bottom" data-background="web_assets/img/bg/shape-bg-02.png">
         <div class="f-border pt-115 pb-70">
            <div class="container">
               <div class="row">
                  <div class="col-xl-2 col-md-4  col-6">
                     <div class="footer-widget footer-3-col-1 mb-50">
                        <div class="footer-widget__text mb-35">
                           <h3 class="footer-widget__title">About</h3>
                        </div>
                        <div class="footer-widget__link">
                           <ul>
                              <li><a href="#">About us</a></li>
                              <li><a href="#">Blog</a></li>
                              <li><a href="#">Careers</a></li>
                              <li><a href="#">Jobs</a></li>
                              <li><a href="#">In Press</a></li>
                           </ul>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-3 col-md-4 col-6">
                     <div class="footer-widget footer-3-col-2 mb-50">
                        <div class="footer-widget__text mb-35">
                           <h3 class="footer-widget__title">Quick Links</h3>
                        </div>
                        <div class="footer-widget__link">
                           <ul>
                              <li><a href="#">Refund Policy</a></li>
                              <li><a href="#">Documentation</a></li>
                              <li><a href="#">Chat online</a></li>
                              <li><a href="#">Order Cancel</a></li>
                              <li><a href="#">Privacy Policy</a></li>
                           </ul>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-3 col-md-4 col-6">
                     <div class="footer-widget footer-3-col-3 mb-50">
                        <div class="footer-widget__text mb-35">
                           <h3 class="footer-widget__title">Support</h3>
                        </div>
                        <div class="footer-widget__link">
                           <ul>
                              <li><a href="#">Contact us</a></li>
                              <li><a href="#">Online Chat</a></li>
                              <li><a href="#">Whatsapp</a></li>
                              <li><a href="#">Telegram</a></li>
                              <li><a href="#">Ticketing</a></li>
                           </ul>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-2 col-md-4 col-6">
                     <div class="footer-widget footer-3-col-4 mb-50">
                        <div class="footer-widget__text mb-35">
                           <h3 class="footer-widget__title">FAQ</h3>
                        </div>
                        <div class="footer-widget__link">
                           <ul>
                              <li><a href="#">Account</a></li>
                              <li><a href="#">Deliveries</a></li>
                              <li><a href="#">Orders</a></li>
                              <li><a href="#">Payments</a></li>
                              <li><a href="#">Return</a></li>
                           </ul>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-2 col-md-4 col-6">
                     <div class="footer-widget footer-3-col-5 mb-50">
                        <div class="footer-widget__text mb-35">
                           <h3 class="footer-widget__title">Products</h3>
                        </div>
                        <div class="footer-widget__link">
                           <ul>
                              <li><a href="#">Overview</a></li>
                              <li><a href="#">Business Account</a></li>
                              <li><a href="#">Credit Card</a></li>
                              <li><a href="#">Integrations</a></li>
                              <li><a href="#">Rewards</a></li>
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="f-copyright pt-60 pb-40">
            <div class="container">
               <div class="row text-center text-lg-start">
                  <div class="col-xl-3 col-lg-3">
                     <div class="f-copyright__logo mb-30">
                        <a href="#"><img src="web_assets/img/logo/logo.png" alt="logo"></a>
                     </div>
                  </div>
                  <div class="col-xl-6 col-lg-5">
                     <div class="f-copyright__text text-center mb-30">
                        <span>Uxaction© 2022, All Rights Reserved</span>
                     </div>
                  </div>
                  <div class="col-xl-3 col-lg-4">
                     <div class="f-copyright__social-area mb-20 text-lg-end">
                        <a href="#"><i class="fa-brands fa-facebook-square"></i></a>
                        <a href="#"><i class="fa-brands fa-youtube"></i></a>
                        <a href="#"><i class="fi fi-rr-basketball"></i></a>
                        <a href="#"><i class="fa-brands fa-whatsapp"></i></a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </footer>
   <!-- footer-area-end -->         




   <!-- JS here -->
   <script src="web_assets/js/vendor/jquery.js"></script>
   <script src="web_assets/js/vendor/waypoints.js"></script>
   <script src="web_assets/js/bootstrap-bundle.js"></script>
   <script src="web_assets/js/meanmenu.js"></script>
   <script src="web_assets/js/slick.js"></script>
   <script src="web_assets/js/magnific-popup.js"></script>
   <script src="web_assets/js/parallax.js"></script>
   <script src="web_assets/js/backtotop.js"></script>
   <script src="web_assets/js/nice-select.js"></script>
   <script src="web_assets/js/counterup.js"></script>
   <script src="web_assets/js/wow.js"></script>
   <script src="web_assets/js/isotope-pkgd.js"></script>
   <script src="web_assets/js/imagesloaded-pkgd.js"></script>
   <script src="web_assets/js/ajax-form.js"></script>
   <script src="web_assets/js/main.js"></script>
</body>

</html>