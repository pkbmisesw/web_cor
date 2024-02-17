<?php
include 'config.php';
// error_reporting(0);

$sql_setting = "SELECT * FROM setting ORDER BY id DESC";
$stmt = $conn->prepare($sql_setting);
$stmt->execute();
$row_setting = $stmt->fetch();

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

$sql_kategori = $conn->prepare("SELECT * FROM m_kategori WHERE id=:id_kat");
$sql_kategori->execute([":id_kat" => $data_course['id_kat']]);
$data_kategori = $sql_kategori->fetch();
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

      <!-- course-details-area -->
      <section class="c-details-area pt-120 pb-50 wow fadeInUp" data-wow-duration=".8s" data-wow-delay=".2s">
         <div class="container">
            <div class="row">
               <div class="col-lg-8 col-md-12">
                  <div class="c-details-wrapper mr-25">
                     <div class="c-details-thumb p-relative mb-40">
                        <img src="images/<?php echo $gambar; ?>" alt="details-bg">
                     </div>
                     <div class="course-details-content mb-45">
                        <div class="tpcourse__category mb-15">
                           <ul class="tpcourse__price-list d-flex align-items-center">
                              <li><a class="c-color-yellow" href="#"><?php echo $data_kategori['nama']; ?></a></li>
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
                               <li><img src="web_assets/img/icon/c-meta-01.png" alt="meta-icon"><a href="<?php echo $data_course['yt']; ?>"><span>Lihat</span></a></li>
                               <li><img src="web_assets/img/icon/c-meta-02.png" alt="meta-icon"><a href="<?php echo $data_course['url_pengajar']; ?>"><span><?php echo $data_course['pengajar']; ?></span></a></li>
                           </ul>
                        </div>
                     </div>
                     <div class="c-details-about mb-40">
                        <h5 class="tp-c-details-title mb-20">About This Course</h5>
                         <p><?php echo $data_course['des']; ?></p>
                     </div>
                      <div class="accordion" id="accordionPanelsStayOpenExample">
                          <?php
                          $i = 0;
                          $sql_materi = $conn->prepare("SELECT * FROM m_materi WHERE id_kursus=:id_kursus AND status=:status ORDER BY no_urut ASC");
                          $sql_materi->execute([":id_kursus" => $id_course, ":status" => 1]);
                          while($data_materi = $sql_materi->fetch()){
                              if($i == 0){
                          ?>
                              <div class="accordion-item">
                                  <h2 class="accordion-header" id="panelsStayOpen-heading<?php echo $data_materi['no_urut'] ?>">
                                      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse<?php echo $data_materi['no_urut'] ?>" aria-expanded="true" aria-controls="panelsStayOpen-collapse<?php echo $data_materi['no_urut'] ?>">
                                          <?php echo $data_materi['nama'] . " #" . $data_materi['no_urut']; ?>
                                      </button>
                                  </h2>
                                  <div id="panelsStayOpen-collapse<?php echo $data_materi['no_urut'] ?>" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-heading<?php echo $data_materi['no_urut'] ?>">
                                      <div class="accordion-body">
                                        <ul>
                                          <?php
                                              $sql_materi_list = $conn->prepare("SELECT * FROM m_materi_list WHERE id_materi=:id_materi AND status=:status ORDER BY no_urut ASC");
                                              $sql_materi_list->execute([":id_materi" => $data_materi['id'], ":status" => 1]);
                                              while($data_materi_list = $sql_materi_list->fetch()){ ?>
                                                  <li><a href="<?php echo $data_materi_list['url'] ?>"><i class="fa fa-airplay mr-10"></i><?php echo $data_materi_list['nama']; ?></a></li>
                                              <?php } ?>
                                        </ul>
                                      </div>
                                  </div>
                              </div>
                             <?php $i++;
                              } else {?>
                                  <div class="accordion-item">
                                      <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                                          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                                              <?php echo $data_materi['nama'] . " #" . $data_materi['no_urut']; ?>
                                          </button>
                                      </h2>
                                      <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
                                          <div class="accordion-body">
                                              <ul>
                                                  <?php
                                                  $sql_materi_list = $conn->prepare("SELECT * FROM m_materi_list WHERE id_materi=:id_materi AND status=:status ORDER BY no_urut ASC");
                                                  $sql_materi_list->execute([":id_materi" => $data_materi['id'], ":status" => 1]);
                                                  while($data_materi_list = $sql_materi_list->fetch()){ ?>
                                                      <li><a href="<?php echo $data_materi_list['url'] ?>"><i class="fa fa-airplay mr-10"></i><?php echo $data_materi_list['nama']; ?></a></li>
                                                  <?php } ?>
                                              </ul>
                                          </div>
                                      </div>
                                  </div>
                              <?php } ?>
                          <?php } ?>
                      </div>
                  </div>
               </div>
               <div class="col-lg-4 col-md-12">
                  <div class="c-details-sidebar">
                     <div class="c-video-thumb p-relative mb-25">
                        <img src="images/<?php echo $data_course['pic_yt']; ?>" alt="video-bg">
                        <div class="c-video-icon">
                           <a class="popup-video" href="<?php echo $data_course['yt'] ?>"><i class="fi fi-sr-play"></i></a>
                        </div>
                     </div>
                     <div class="course-details-widget">
                        <div class="cd-video-price">
                           <h3 class="pricing-video text-center mb-15"><?php echo "Rp. " . number_format($data_course['harga'], 0, null, '.').",-" ?></h3>
                           <div class="cd-pricing-btn text-center mb-30">
                              <a class="tp-vp-btn-green" href="#">Enroll Now</a>
                           </div>
                        </div>
                        <div class="cd-information mb-35">
                           <ul>
                               <?php
                               $sql_count_materi = $conn->prepare("SELECT COUNT(m_materi.id) FROM m_kursus INNER JOIN m_materi ON m_kursus.id = m_materi.id_kursus WHERE m_materi.status = 1 AND m_materi.id_kursus = :id_kursus");
                               $sql_count_materi->execute([":id_kursus" => $id_course]);
                               $data_count_materi = $sql_count_materi->fetch();
                               ?>
                              <li><i class="fa-light fa-address-book"></i> <label>Materi</label> <span><?php echo $data_count_materi['COUNT(m_materi.id)']; ?></span></li>
                              <li><i class="fa-light fa-clock-desk"></i> <label>Duration</label> <span><?php echo $data_course['durasi']; ?></span></li>
                              <li><i class="fi fi-sr-stats"></i> <label>Skill Level</label> <span><?php echo $data_course['skill_level']; ?></span></li>
                              <li><i class="fi fi-rs-diploma"></i> <label>Certificate</label> <span><?php echo ($data_course['sertifikat']) ? "Tersedia" : "Tidak Tersedia"; ?></span></li>
                               <li><i class="fi fi-br-user"></i> <label>Pengajar</label> <a href="<?php echo $data_course['url_pengajar'] ?>"><span><?php echo $data_course['pengajar']; ?></a></span></li>
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

   </main>

<?php
include 'footer.php';
?>




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