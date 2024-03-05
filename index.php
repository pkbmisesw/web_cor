<?php
error_reporting(0);
include 'config.php';


$sql_setting = "SELECT * FROM setting ORDER BY id DESC";
$stmt = $conn->prepare($sql_setting);
$stmt->execute();
$row_setting = $stmt->fetch();

?>

<?php 
  include 'head.php'; 
  include 'nav.php'; 
?>

<div class="body-overlay"></div>

<main>

    <?php
    $sql_post = "SELECT * FROM m_post WHERE stat=2 ORDER BY ID DESC";
    $stmt = $conn->prepare($sql_post);
    $stmt->execute();
    $sql_post = $stmt->fetch();
    ?>

    <!-- banner-area -->
    <section class="banner-area fix p-relative">
        <div class="banner-bg banner-bg-rainbow" data-background="web_assets/img/banner/banner-bg-2.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-8">
                        <div class="hero-content hero-content-black">
                            <h2 class="hero-title-black mb-45"><?php echo $sql_post['nama']; ?></h2>
                            <div class="hero-btn">
                                <a href="post?p=<?php echo $sql_post['id']; ?>" class="tp-btn">Read Me</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <div class="banner-shape d-none d-md-block">
                            <img src="images/<?php echo $sql_post['gambar']; ?>" alt="banner-shape" class="b-shape-3">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- banner-area-end -->

    <!-- feature-area -->
    <section class="feature-area pt-115 pb-90 wow fadeInUp" data-wow-duration=".8s" data-wow-delay=".3s">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title mb-70">
                        <span class="tp-bline-stitle mb-15">What We Offer</span>
                        <h2 class="tp-section-title">For Your Future Learning.</h2>
                    </div>
                </div>
            </div>
            <div class="tp-feature-cn">
                <div class="row">
                    <div class="col-xl-3 col-lg-6 col-md-6">
                        <div class="tpfea tp-feature-item text-center mb-30 wow fadeInUp" data-wow-duration=".8s" data-wow-delay=".4s">
                            <div class="tpfea__icon mb-25">
                                <i class="fi fi-rr-paper-plane"></i>
                            </div>
                            <div class="tpfea__text">
                                <h5 class="tpfea__title mb-5">Online Courses</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6">
                        <div class="tpfea tp-feature-item text-center mb-30 wow fadeInUp" data-wow-duration=".8s" data-wow-delay=".6s">
                            <div class="tpfea__icon mb-25">
                                <i class="fi fi-rr-user"></i>
                            </div>
                            <div class="tpfea__text">
                                <h5 class="tpfea__title mb-5">Expert Trainer</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6">
                        <div class="tpfea tp-feature-item text-center mb-30 wow fadeInUp" data-wow-duration=".8s" data-wow-delay=".8s">
                            <div class="tpfea__icon mb-25">
                                <i class="fi fi-rr-document"></i>
                            </div>
                            <div class="tpfea__text">
                                <h5 class="tpfea__title mb-5">Get Certificate</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6">
                        <div class="tpfea tp-feature-item text-center mb-30 wow fadeInUp" data-wow-duration=".8s" data-wow-delay="1s">
                            <div class="tpfea__icon mb-25">
                                <i class="fi fi-rr-calendar"></i>
                            </div>
                            <div class="tpfea__text">
                                <h5 class="tpfea__title mb-5">Life Time Access</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- feature-area-end -->

    <!-- course-area -->
    <section class="course-area pt-115 pb-100 wow fadeInUp" data-wow-duration=".8s" data-wow-delay=".3s">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title text-center mb-65">
                        <span class="tp-bline-stitle mb-15">Our Courses</span>
                        <h2 class="tp-section-title mb-20">Explore Popular Courses</h2>
                    </div>
                </div>
            </div>
            <!-- course-nav-tab-start -->
            <div class="tp-course-nav-tabs">
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-all" role="tabpanel" aria-labelledby="nav-all-tab">
                        <div class="row">
                            <?php
                            $sql_kursus = $conn->prepare("SELECT * FROM m_kursus ORDER BY id DESC LIMIT 4");
                            $sql_kursus->execute();
                            while($data_kursus = $sql_kursus->fetch()){
                                $gambar = $data_kursus['pic'];

                                if(empty($data_kursus['pic'])){
                                    $gambar = "tidak_ada_gambar.png";
                                }

                                if(!file_exists("images/".$data_kursus['pic'])){
                                    $gambar = "tidak_ada_di_image.png";
                                }
                            ?>

                            <div class="col-xl-3 col-lg-6 col-md-6">
                                <div class="tpcourse mb-40">
                                    <div class="tpcourse__thumb p-relative w-img fix">
                                        <a href="course_details?p=<?php echo $data_kursus['id']; ?>"><img src="images/<?php echo $gambar; ?>" alt="course-thumb"></a>
                                        <div class="tpcourse__tag">
                                            <a href="course_details?p=<?php echo $data_kursus['id']; ?>"><i class="fi fi-rr-heart"></i></a>
                                        </div>
                                    </div>
                                    <div class="tpcourse__content-2">
                                        <div class="tpcourse__ava-title mb-15">
                                            <h4 class="tpcourse__title tp-cours-title-color"><a href="course_details?p=<?php echo $data_kursus['id']; ?>"><?php echo $data_kursus['nama']; ?></a></h4>
                                        </div>
                                        <div class="tpcourse__meta tpcourse__meta-gap pb-15 mb-15">
                                            <ul class="d-flex align-items-center">
                                                <li><img src="web_assets/img/icon/c-meta-01.png" alt="meta-icon"><a href="<?php echo $data_kursus['yt']; ?>"><span>Lihat</span></a></li>
                                                <li><img src="web_assets/img/icon/c-meta-02.png" alt="meta-icon"><a href="<?php echo $data_kursus['url_pengajar']; ?>"><span><?php echo $data_kursus['pengajar']; ?></span></a></li>
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
                                                <p>(-)</p>
                                            </div>
                                            <div class="tpcourse__pricing">
                                                <h5 class="price-title"><?php echo "Rp. " . number_format($data_kursus['harga'], 0, null, '.').",-" ?></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-design" role="tabpanel" aria-labelledby="nav-design-tab">
                        <div class="row">
                            <div class="col-xl-3 col-lg-6 col-md-6">
                                <div class="tpcourse mb-40">
                                    <div class="tpcourse__thumb p-relative w-img fix">
                                        <a href="course-details.php"><img src="web_assets/img/course/course-thumb-04.jpg" alt="course-thumb"></a>
                                        <div class="tpcourse__tag">
                                            <a href="course-details.php"><i class="fi fi-rr-heart"></i></a>
                                        </div>
                                        <div class="tpcourse__img-icon">
                                            <img src="web_assets/img/icon/course-avata-04.png" alt="course-avata">
                                        </div>
                                    </div>
                                    <div class="tpcourse__content-2">
                                        <div class="tpcourse__category mb-10">
                                            <ul class="tpcourse__price-list d-flex align-items-center">
                                                <li><a class="c-color-green" href="course-details.php">Design</a></li>
                                                <li><a class="c-color-yellow" href="course-details.php">Development</a></li>
                                            </ul>
                                        </div>
                                        <div class="tpcourse__avatar d-flex align-items-center mb-15">
                                            <h4 class="tpcourse__title tp-cours-title-color"><a href="course-details.php">WordPress 2022: The Complete WordPress Website Course</a></h4>
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
                                <div class="tpcourse mb-40">
                                    <div class="tpcourse__thumb p-relative w-img fix">
                                        <a href="course-details.php"><img src="web_assets/img/course/course-thumb-05.jpg" alt="course-thumb"></a>
                                        <div class="tpcourse__tag">
                                            <a href="course-details.php"><i class="fi fi-rr-heart"></i></a>
                                        </div>
                                        <div class="tpcourse__img-icon">
                                            <img src="web_assets/img/icon/course-avata-05.png" alt="course-avata">
                                        </div>
                                    </div>
                                    <div class="tpcourse__content-2">
                                        <div class="tpcourse__category mb-10">
                                            <ul class="tpcourse__price-list d-flex align-items-center">
                                                <li><a class="c-color-purple" href="course-details.php">SEO</a></li>
                                                <li><a class="c-color-red" href="course-details.php">Data</a></li>
                                            </ul>
                                        </div>
                                        <div class="tpcourse__avatar d-flex align-items-center mb-15">
                                            <h4 class="tpcourse__title tp-cours-title-color"><a href="course-details.php">SEO: Structured Data & Schema Markup for Webmasters</a></h4>
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
                                <div class="tpcourse mb-40">
                                    <div class="tpcourse__thumb p-relative w-img fix">
                                        <a href="course-details.php"><img src="web_assets/img/course/course-thumb-06.jpg" alt="course-thumb"></a>
                                        <div class="tpcourse__tag">
                                            <a href="course-details.php"><i class="fi fi-rr-heart"></i></a>
                                        </div>
                                        <div class="tpcourse__img-icon">
                                            <img src="web_assets/img/icon/course-avata-06.png" alt="course-avata">
                                        </div>
                                    </div>
                                    <div class="tpcourse__content-2">
                                        <div class="tpcourse__category mb-10">
                                            <ul class="tpcourse__price-list d-flex align-items-center">
                                                <li><a class="c-color-blue" href="course-details.php">Webflow</a></li>
                                                <li><a class="c-color-purple" href="course-details.php">UX/UI</a></li>
                                            </ul>
                                        </div>
                                        <div class="tpcourse__avatar d-flex align-items-center mb-15">
                                            <h4 class="tpcourse__title tp-cours-title-color"><a href="course-details.php">Complete Web Design from Figma to Webflow to Freelancing</a></h4>
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
                                <div class="tpcourse mb-40">
                                    <div class="tpcourse__thumb p-relative w-img fix">
                                        <a href="course-details.php"><img src="web_assets/img/course/course-thumb-01.jpg" alt="course-thumb"></a>
                                        <div class="tpcourse__tag">
                                            <a href="course-details.php"><i class="fi fi-rr-heart"></i></a>
                                        </div>
                                        <div class="tpcourse__img-icon">
                                            <img src="web_assets/img/icon/course-3-avata-1.png" alt="course-avata">
                                        </div>
                                    </div>
                                    <div class="tpcourse__content-2">
                                        <div class="tpcourse__category mb-10">
                                            <ul class="tpcourse__price-list d-flex align-items-center">
                                                <li><a class="c-color-yellow" href="course-details.php">Design</a></li>
                                                <li><a class="c-color-red" href="course-details.php">Development</a></li>
                                            </ul>
                                        </div>
                                        <div class="tpcourse__ava-title mb-15">
                                            <h4 class="tpcourse__title tp-cours-title-color"><a href="course-details.php">Master Web Design in Adobe XD: Complete UI/UX Masterclass</a></h4>
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
                                <div class="tpcourse mb-40">
                                    <div class="tpcourse__thumb p-relative w-img fix">
                                        <a href="course-details.php"><img src="web_assets/img/course/course-thumb-02.jpg" alt="course-thumb"></a>
                                        <div class="tpcourse__tag">
                                            <a href="course-details.php"><i class="fi fi-rr-heart"></i></a>
                                        </div>
                                        <div class="tpcourse__img-icon">
                                            <img src="web_assets/img/icon/course-avata-02.png" alt="course-avata">
                                        </div>
                                    </div>
                                    <div class="tpcourse__content-2">
                                        <div class="tpcourse__category mb-10">
                                            <ul class="tpcourse__price-list d-flex align-items-center">
                                                <li><a class="c-color-green" href="course-details.php">Write</a></li>
                                                <li><a class="c-color-blue" href="course-details.php">Content</a></li>
                                            </ul>
                                        </div>
                                        <div class="tpcourse__avatar mb-15">
                                            <h4 class="tpcourse__title tp-cours-title-color"><a href="course-details.php">How to Write Great Web Content - Better Search Rankings!</a></h4>
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
                                <div class="tpcourse mb-40">
                                    <div class="tpcourse__thumb p-relative w-img fix">
                                        <a href="course-details.php"><img src="web_assets/img/course/course-thumb-03.jpg" alt="course-thumb"></a>
                                        <div class="tpcourse__tag">
                                            <a href="course-details.php"><i class="fi fi-rr-heart"></i></a>
                                        </div>
                                        <div class="tpcourse__img-icon">
                                            <img src="web_assets/img/icon/course-avata-03.png" alt="course-avata">
                                        </div>
                                    </div>
                                    <div class="tpcourse__content-2">
                                        <div class="tpcourse__category mb-10">
                                            <ul class="tpcourse__price-list d-flex align-items-center">
                                                <li><a class="c-color-purple" href="course-details.php">Coding</a></li>
                                                <li><a class="c-color-red" href="course-details.php">Development</a></li>
                                            </ul>
                                        </div>
                                        <div class="tpcourse__avatar d-flex align-items-center mb-15">
                                            <h4 class="tpcourse__title tp-cours-title-color"><a href="course-details.php">Dreamweaver - Coding your first website using Dreamweaver</a></h4>
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
                    <div class="tab-pane fade" id="nav-develop" role="tabpanel" aria-labelledby="nav-develop-tab">
                        <div class="row">
                            <div class="col-xl-4 col-lg-6 col-md-6">
                                <div class="tpcourse mb-40">
                                    <div class="tpcourse__thumb p-relative w-img fix">
                                        <a href="course-details.php"><img src="web_assets/img/course/course-thumb-01.jpg" alt="course-thumb"></a>
                                        <div class="tpcourse__tag">
                                            <a href="course-details.php"><i class="fi fi-rr-heart"></i></a>
                                        </div>
                                        <div class="tpcourse__img-icon">
                                            <img src="web_assets/img/icon/course-3-avata-1.png" alt="course-avata">
                                        </div>
                                    </div>
                                    <div class="tpcourse__content-2">
                                        <div class="tpcourse__category mb-10">
                                            <ul class="tpcourse__price-list d-flex align-items-center">
                                                <li><a class="c-color-yellow" href="course-details.php">Design</a></li>
                                                <li><a class="c-color-red" href="course-details.php">Development</a></li>
                                            </ul>
                                        </div>
                                        <div class="tpcourse__ava-title mb-15">
                                            <h4 class="tpcourse__title tp-cours-title-color"><a href="course-details.php">Master Web Design in Adobe XD: Complete UI/UX Masterclass</a></h4>
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
                                <div class="tpcourse mb-40">
                                    <div class="tpcourse__thumb p-relative w-img fix">
                                        <a href="course-details.php"><img src="web_assets/img/course/course-thumb-02.jpg" alt="course-thumb"></a>
                                        <div class="tpcourse__tag">
                                            <a href="course-details.php"><i class="fi fi-rr-heart"></i></a>
                                        </div>
                                        <div class="tpcourse__img-icon">
                                            <img src="web_assets/img/icon/course-avata-02.png" alt="course-avata">
                                        </div>
                                    </div>
                                    <div class="tpcourse__content-2">
                                        <div class="tpcourse__category mb-10">
                                            <ul class="tpcourse__price-list d-flex align-items-center">
                                                <li><a class="c-color-green" href="course-details.php">Write</a></li>
                                                <li><a class="c-color-blue" href="course-details.php">Content</a></li>
                                            </ul>
                                        </div>
                                        <div class="tpcourse__avatar mb-15">
                                            <h4 class="tpcourse__title tp-cours-title-color"><a href="course-details.php">How to Write Great Web Content - Better Search Rankings!</a></h4>
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
                                <div class="tpcourse mb-40">
                                    <div class="tpcourse__thumb p-relative w-img fix">
                                        <a href="course-details.php"><img src="web_assets/img/course/course-thumb-03.jpg" alt="course-thumb"></a>
                                        <div class="tpcourse__tag">
                                            <a href="course-details.php"><i class="fi fi-rr-heart"></i></a>
                                        </div>
                                        <div class="tpcourse__img-icon">
                                            <img src="web_assets/img/icon/course-avata-03.png" alt="course-avata">
                                        </div>
                                    </div>
                                    <div class="tpcourse__content-2">
                                        <div class="tpcourse__category mb-10">
                                            <ul class="tpcourse__price-list d-flex align-items-center">
                                                <li><a class="c-color-purple" href="course-details.php">Coding</a></li>
                                                <li><a class="c-color-red" href="course-details.php">Development</a></li>
                                            </ul>
                                        </div>
                                        <div class="tpcourse__avatar d-flex align-items-center mb-15">
                                            <h4 class="tpcourse__title tp-cours-title-color"><a href="course-details.php">Dreamweaver - Coding your first website using Dreamweaver</a></h4>
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
                                <div class="tpcourse mb-40">
                                    <div class="tpcourse__thumb p-relative w-img fix">
                                        <a href="course-details.php"><img src="web_assets/img/course/course-thumb-04.jpg" alt="course-thumb"></a>
                                        <div class="tpcourse__tag">
                                            <a href="course-details.php"><i class="fi fi-rr-heart"></i></a>
                                        </div>
                                        <div class="tpcourse__img-icon">
                                            <img src="web_assets/img/icon/course-avata-04.png" alt="course-avata">
                                        </div>
                                    </div>
                                    <div class="tpcourse__content-2">
                                        <div class="tpcourse__category mb-10">
                                            <ul class="tpcourse__price-list d-flex align-items-center">
                                                <li><a class="c-color-green" href="course-details.php">Design</a></li>
                                                <li><a class="c-color-yellow" href="course-details.php">Development</a></li>
                                            </ul>
                                        </div>
                                        <div class="tpcourse__avatar d-flex align-items-center mb-15">
                                            <h4 class="tpcourse__title tp-cours-title-color"><a href="course-details.php">WordPress 2022: The Complete WordPress Website Course</a></h4>
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
                                <div class="tpcourse mb-40">
                                    <div class="tpcourse__thumb p-relative w-img fix">
                                        <a href="course-details.php"><img src="web_assets/img/course/course-thumb-05.jpg" alt="course-thumb"></a>
                                        <div class="tpcourse__tag">
                                            <a href="course-details.php"><i class="fi fi-rr-heart"></i></a>
                                        </div>
                                        <div class="tpcourse__img-icon">
                                            <img src="web_assets/img/icon/course-avata-05.png" alt="course-avata">
                                        </div>
                                    </div>
                                    <div class="tpcourse__content-2">
                                        <div class="tpcourse__category mb-10">
                                            <ul class="tpcourse__price-list d-flex align-items-center">
                                                <li><a class="c-color-purple" href="course-details.php">SEO</a></li>
                                                <li><a class="c-color-red" href="course-details.php">Data</a></li>
                                            </ul>
                                        </div>
                                        <div class="tpcourse__avatar d-flex align-items-center mb-15">
                                            <h4 class="tpcourse__title tp-cours-title-color"><a href="course-details.php">SEO: Structured Data & Schema Markup for Webmasters</a></h4>
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
                                <div class="tpcourse mb-40">
                                    <div class="tpcourse__thumb p-relative w-img fix">
                                        <a href="course-details.php"><img src="web_assets/img/course/course-thumb-06.jpg" alt="course-thumb"></a>
                                        <div class="tpcourse__tag">
                                            <a href="course-details.php"><i class="fi fi-rr-heart"></i></a>
                                        </div>
                                        <div class="tpcourse__img-icon">
                                            <img src="web_assets/img/icon/course-avata-06.png" alt="course-avata">
                                        </div>
                                    </div>
                                    <div class="tpcourse__content-2">
                                        <div class="tpcourse__category mb-10">
                                            <ul class="tpcourse__price-list d-flex align-items-center">
                                                <li><a class="c-color-blue" href="course-details.php">Webflow</a></li>
                                                <li><a class="c-color-purple" href="course-details.php">UX/UI</a></li>
                                            </ul>
                                        </div>
                                        <div class="tpcourse__avatar d-flex align-items-center mb-15">
                                            <h4 class="tpcourse__title tp-cours-title-color"><a href="course-details.php">Complete Web Design from Figma to Webflow to Freelancing</a></h4>
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
                    <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                        <div class="row">
                            <div class="col-xl-4 col-lg-6 col-md-6">
                                <div class="tpcourse mb-40">
                                    <div class="tpcourse__thumb p-relative w-img fix">
                                        <a href="course-details.php"><img src="web_assets/img/course/course-thumb-06.jpg" alt="course-thumb"></a>
                                        <div class="tpcourse__tag">
                                            <a href="course-details.php"><i class="fi fi-rr-heart"></i></a>
                                        </div>
                                        <div class="tpcourse__img-icon">
                                            <img src="web_assets/img/icon/course-avata-06.png" alt="course-avata">
                                        </div>
                                    </div>
                                    <div class="tpcourse__content-2">
                                        <div class="tpcourse__category mb-10">
                                            <ul class="tpcourse__price-list d-flex align-items-center">
                                                <li><a class="c-color-blue" href="course-details.php">Webflow</a></li>
                                                <li><a class="c-color-purple" href="course-details.php">UX/UI</a></li>
                                            </ul>
                                        </div>
                                        <div class="tpcourse__avatar d-flex align-items-center mb-15">
                                            <h4 class="tpcourse__title tp-cours-title-color"><a href="course-details.php">Complete Web Design from Figma to Webflow to Freelancing</a></h4>
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
                                <div class="tpcourse mb-40">
                                    <div class="tpcourse__thumb p-relative w-img fix">
                                        <a href="course-details.php"><img src="web_assets/img/course/course-thumb-01.jpg" alt="course-thumb"></a>
                                        <div class="tpcourse__tag">
                                            <a href="course-details.php"><i class="fi fi-rr-heart"></i></a>
                                        </div>
                                        <div class="tpcourse__img-icon">
                                            <img src="web_assets/img/icon/course-3-avata-1.png" alt="course-avata">
                                        </div>
                                    </div>
                                    <div class="tpcourse__content-2">
                                        <div class="tpcourse__category mb-10">
                                            <ul class="tpcourse__price-list d-flex align-items-center">
                                                <li><a class="c-color-yellow" href="course-details.php">Design</a></li>
                                                <li><a class="c-color-red" href="course-details.php">Development</a></li>
                                            </ul>
                                        </div>
                                        <div class="tpcourse__ava-title mb-15">
                                            <h4 class="tpcourse__title tp-cours-title-color"><a href="course-details.php">Master Web Design in Adobe XD: Complete UI/UX Masterclass</a></h4>
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
                                <div class="tpcourse mb-40">
                                    <div class="tpcourse__thumb p-relative w-img fix">
                                        <a href="course-details.php"><img src="web_assets/img/course/course-thumb-05.jpg" alt="course-thumb"></a>
                                        <div class="tpcourse__tag">
                                            <a href="course-details.php"><i class="fi fi-rr-heart"></i></a>
                                        </div>
                                        <div class="tpcourse__img-icon">
                                            <img src="web_assets/img/icon/course-avata-05.png" alt="course-avata">
                                        </div>
                                    </div>
                                    <div class="tpcourse__content-2">
                                        <div class="tpcourse__category mb-10">
                                            <ul class="tpcourse__price-list d-flex align-items-center">
                                                <li><a class="c-color-purple" href="course-details.php">SEO</a></li>
                                                <li><a class="c-color-red" href="course-details.php">Data</a></li>
                                            </ul>
                                        </div>
                                        <div class="tpcourse__avatar d-flex align-items-center mb-15">
                                            <h4 class="tpcourse__title tp-cours-title-color"><a href="course-details.php">SEO: Structured Data & Schema Markup for Webmasters</a></h4>
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
                                <div class="tpcourse mb-40">
                                    <div class="tpcourse__thumb p-relative w-img fix">
                                        <a href="course-details.php"><img src="web_assets/img/course/course-thumb-02.jpg" alt="course-thumb"></a>
                                        <div class="tpcourse__tag">
                                            <a href="course-details.php"><i class="fi fi-rr-heart"></i></a>
                                        </div>
                                        <div class="tpcourse__img-icon">
                                            <img src="web_assets/img/icon/course-avata-02.png" alt="course-avata">
                                        </div>
                                    </div>
                                    <div class="tpcourse__content-2">
                                        <div class="tpcourse__category mb-10">
                                            <ul class="tpcourse__price-list d-flex align-items-center">
                                                <li><a class="c-color-green" href="course-details.php">Write</a></li>
                                                <li><a class="c-color-blue" href="course-details.php">Content</a></li>
                                            </ul>
                                        </div>
                                        <div class="tpcourse__avatar mb-15">
                                            <h4 class="tpcourse__title tp-cours-title-color"><a href="course-details.php">How to Write Great Web Content - Better Search Rankings!</a></h4>
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
                                <div class="tpcourse mb-40">
                                    <div class="tpcourse__thumb p-relative w-img fix">
                                        <a href="course-details.php"><img src="web_assets/img/course/course-thumb-04.jpg" alt="course-thumb"></a>
                                        <div class="tpcourse__tag">
                                            <a href="course-details.php"><i class="fi fi-rr-heart"></i></a>
                                        </div>
                                        <div class="tpcourse__img-icon">
                                            <img src="web_assets/img/icon/course-avata-04.png" alt="course-avata">
                                        </div>
                                    </div>
                                    <div class="tpcourse__content-2">
                                        <div class="tpcourse__category mb-10">
                                            <ul class="tpcourse__price-list d-flex align-items-center">
                                                <li><a class="c-color-green" href="course-details.php">Design</a></li>
                                                <li><a class="c-color-yellow" href="course-details.php">Development</a></li>
                                            </ul>
                                        </div>
                                        <div class="tpcourse__avatar d-flex align-items-center mb-15">
                                            <h4 class="tpcourse__title tp-cours-title-color"><a href="course-details.php">WordPress 2022: The Complete WordPress Website Course</a></h4>
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
                                <div class="tpcourse mb-40">
                                    <div class="tpcourse__thumb p-relative w-img fix">
                                        <a href="course-details.php"><img src="web_assets/img/course/course-thumb-03.jpg" alt="course-thumb"></a>
                                        <div class="tpcourse__tag">
                                            <a href="course-details.php"><i class="fi fi-rr-heart"></i></a>
                                        </div>
                                        <div class="tpcourse__img-icon">
                                            <img src="web_assets/img/icon/course-avata-03.png" alt="course-avata">
                                        </div>
                                    </div>
                                    <div class="tpcourse__content-2">
                                        <div class="tpcourse__category mb-10">
                                            <ul class="tpcourse__price-list d-flex align-items-center">
                                                <li><a class="c-color-purple" href="course-details.php">Coding</a></li>
                                                <li><a class="c-color-red" href="course-details.php">Development</a></li>
                                            </ul>
                                        </div>
                                        <div class="tpcourse__avatar d-flex align-items-center mb-15">
                                            <h4 class="tpcourse__title tp-cours-title-color"><a href="course-details.php">Dreamweaver - Coding your first website using Dreamweaver</a></h4>
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
                    <div class="tab-pane fade" id="nav-search" role="tabpanel" aria-labelledby="nav-search-tab">
                        <div class="row">
                            <div class="col-xl-4 col-lg-6 col-md-6">
                                <div class="tpcourse mb-40">
                                    <div class="tpcourse__thumb p-relative w-img fix">
                                        <a href="course-details.php"><img src="web_assets/img/course/course-thumb-03.jpg" alt="course-thumb"></a>
                                        <div class="tpcourse__tag">
                                            <a href="course-details.php"><i class="fi fi-rr-heart"></i></a>
                                        </div>
                                        <div class="tpcourse__img-icon">
                                            <img src="web_assets/img/icon/course-avata-03.png" alt="course-avata">
                                        </div>
                                    </div>
                                    <div class="tpcourse__content-2">
                                        <div class="tpcourse__category mb-10">
                                            <ul class="tpcourse__price-list d-flex align-items-center">
                                                <li><a class="c-color-purple" href="course-details.php">Coding</a></li>
                                                <li><a class="c-color-red" href="course-details.php">Development</a></li>
                                            </ul>
                                        </div>
                                        <div class="tpcourse__avatar d-flex align-items-center mb-15">
                                            <h4 class="tpcourse__title tp-cours-title-color"><a href="course-details.php">Dreamweaver - Coding your first website using Dreamweaver</a></h4>
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
                                <div class="tpcourse mb-40">
                                    <div class="tpcourse__thumb p-relative w-img fix">
                                        <a href="course-details.php"><img src="web_assets/img/course/course-thumb-04.jpg" alt="course-thumb"></a>
                                        <div class="tpcourse__tag">
                                            <a href="course-details.php"><i class="fi fi-rr-heart"></i></a>
                                        </div>
                                        <div class="tpcourse__img-icon">
                                            <img src="web_assets/img/icon/course-avata-04.png" alt="course-avata">
                                        </div>
                                    </div>
                                    <div class="tpcourse__content-2">
                                        <div class="tpcourse__category mb-10">
                                            <ul class="tpcourse__price-list d-flex align-items-center">
                                                <li><a class="c-color-green" href="course-details.php">Design</a></li>
                                                <li><a class="c-color-yellow" href="course-details.php">Development</a></li>
                                            </ul>
                                        </div>
                                        <div class="tpcourse__avatar d-flex align-items-center mb-15">
                                            <h4 class="tpcourse__title tp-cours-title-color"><a href="course-details.php">WordPress 2022: The Complete WordPress Website Course</a></h4>
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
                                <div class="tpcourse mb-40">
                                    <div class="tpcourse__thumb p-relative w-img fix">
                                        <a href="course-details.php"><img src="web_assets/img/course/course-thumb-02.jpg" alt="course-thumb"></a>
                                        <div class="tpcourse__tag">
                                            <a href="course-details.php"><i class="fi fi-rr-heart"></i></a>
                                        </div>
                                        <div class="tpcourse__img-icon">
                                            <img src="web_assets/img/icon/course-avata-02.png" alt="course-avata">
                                        </div>
                                    </div>
                                    <div class="tpcourse__content-2">
                                        <div class="tpcourse__category mb-10">
                                            <ul class="tpcourse__price-list d-flex align-items-center">
                                                <li><a class="c-color-green" href="course-details.php">Write</a></li>
                                                <li><a class="c-color-blue" href="course-details.php">Content</a></li>
                                            </ul>
                                        </div>
                                        <div class="tpcourse__avatar mb-15">
                                            <h4 class="tpcourse__title tp-cours-title-color"><a href="course-details.php">How to Write Great Web Content - Better Search Rankings!</a></h4>
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
                                <div class="tpcourse mb-40">
                                    <div class="tpcourse__thumb p-relative w-img fix">
                                        <a href="course-details.php"><img src="web_assets/img/course/course-thumb-05.jpg" alt="course-thumb"></a>
                                        <div class="tpcourse__tag">
                                            <a href="course-details.php"><i class="fi fi-rr-heart"></i></a>
                                        </div>
                                        <div class="tpcourse__img-icon">
                                            <img src="web_assets/img/icon/course-avata-05.png" alt="course-avata">
                                        </div>
                                    </div>
                                    <div class="tpcourse__content-2">
                                        <div class="tpcourse__category mb-10">
                                            <ul class="tpcourse__price-list d-flex align-items-center">
                                                <li><a class="c-color-purple" href="course-details.php">SEO</a></li>
                                                <li><a class="c-color-red" href="course-details.php">Data</a></li>
                                            </ul>
                                        </div>
                                        <div class="tpcourse__avatar d-flex align-items-center mb-15">
                                            <h4 class="tpcourse__title tp-cours-title-color"><a href="course-details.php">SEO: Structured Data & Schema Markup for Webmasters</a></h4>
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
                                <div class="tpcourse mb-40">
                                    <div class="tpcourse__thumb p-relative w-img fix">
                                        <a href="course-details.php"><img src="web_assets/img/course/course-thumb-06.jpg" alt="course-thumb"></a>
                                        <div class="tpcourse__tag">
                                            <a href="course-details.php"><i class="fi fi-rr-heart"></i></a>
                                        </div>
                                        <div class="tpcourse__img-icon">
                                            <img src="web_assets/img/icon/course-avata-06.png" alt="course-avata">
                                        </div>
                                    </div>
                                    <div class="tpcourse__content-2">
                                        <div class="tpcourse__category mb-10">
                                            <ul class="tpcourse__price-list d-flex align-items-center">
                                                <li><a class="c-color-blue" href="course-details.php">Webflow</a></li>
                                                <li><a class="c-color-purple" href="course-details.php">UX/UI</a></li>
                                            </ul>
                                        </div>
                                        <div class="tpcourse__avatar d-flex align-items-center mb-15">
                                            <h4 class="tpcourse__title tp-cours-title-color"><a href="course-details.php">Complete Web Design from Figma to Webflow to Freelancing</a></h4>
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
                                <div class="tpcourse mb-40">
                                    <div class="tpcourse__thumb p-relative w-img fix">
                                        <a href="course-details.php"><img src="web_assets/img/course/course-thumb-01.jpg" alt="course-thumb"></a>
                                        <div class="tpcourse__tag">
                                            <a href="course-details.php"><i class="fi fi-rr-heart"></i></a>
                                        </div>
                                        <div class="tpcourse__img-icon">
                                            <img src="web_assets/img/icon/course-3-avata-1.png" alt="course-avata">
                                        </div>
                                    </div>
                                    <div class="tpcourse__content-2">
                                        <div class="tpcourse__category mb-10">
                                            <ul class="tpcourse__price-list d-flex align-items-center">
                                                <li><a class="c-color-yellow" href="course-details.php">Design</a></li>
                                                <li><a class="c-color-red" href="course-details.php">Development</a></li>
                                            </ul>
                                        </div>
                                        <div class="tpcourse__ava-title mb-15">
                                            <h4 class="tpcourse__title tp-cours-title-color"><a href="course-details.php">Master Web Design in Adobe XD: Complete UI/UX Masterclass</a></h4>
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
                    <div class="tab-pane fade" id="nav-marketing" role="tabpanel" aria-labelledby="nav-marketing-tab">
                        <div class="row">
                            <div class="col-xl-4 col-lg-6 col-md-6">
                                <div class="tpcourse mb-40">
                                    <div class="tpcourse__thumb p-relative w-img fix">
                                        <a href="course-details.php"><img src="web_assets/img/course/course-thumb-06.jpg" alt="course-thumb"></a>
                                        <div class="tpcourse__tag">
                                            <a href="course-details.php"><i class="fi fi-rr-heart"></i></a>
                                        </div>
                                        <div class="tpcourse__img-icon">
                                            <img src="web_assets/img/icon/course-avata-06.png" alt="course-avata">
                                        </div>
                                    </div>
                                    <div class="tpcourse__content-2">
                                        <div class="tpcourse__category mb-10">
                                            <ul class="tpcourse__price-list d-flex align-items-center">
                                                <li><a class="c-color-blue" href="course-details.php">Webflow</a></li>
                                                <li><a class="c-color-purple" href="course-details.php">UX/UI</a></li>
                                            </ul>
                                        </div>
                                        <div class="tpcourse__avatar d-flex align-items-center mb-15">
                                            <h4 class="tpcourse__title tp-cours-title-color"><a href="course-details.php">Complete Web Design from Figma to Webflow to Freelancing</a></h4>
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
                                <div class="tpcourse mb-40">
                                    <div class="tpcourse__thumb p-relative w-img fix">
                                        <a href="course-details.php"><img src="web_assets/img/course/course-thumb-05.jpg" alt="course-thumb"></a>
                                        <div class="tpcourse__tag">
                                            <a href="course-details.php"><i class="fi fi-rr-heart"></i></a>
                                        </div>
                                        <div class="tpcourse__img-icon">
                                            <img src="web_assets/img/icon/course-avata-05.png" alt="course-avata">
                                        </div>
                                    </div>
                                    <div class="tpcourse__content-2">
                                        <div class="tpcourse__category mb-10">
                                            <ul class="tpcourse__price-list d-flex align-items-center">
                                                <li><a class="c-color-purple" href="course-details.php">SEO</a></li>
                                                <li><a class="c-color-red" href="course-details.php">Data</a></li>
                                            </ul>
                                        </div>
                                        <div class="tpcourse__avatar d-flex align-items-center mb-15">
                                            <h4 class="tpcourse__title tp-cours-title-color"><a href="course-details.php">SEO: Structured Data & Schema Markup for Webmasters</a></h4>
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
                                <div class="tpcourse mb-40">
                                    <div class="tpcourse__thumb p-relative w-img fix">
                                        <a href="course-details.php"><img src="web_assets/img/course/course-thumb-01.jpg" alt="course-thumb"></a>
                                        <div class="tpcourse__tag">
                                            <a href="course-details.php"><i class="fi fi-rr-heart"></i></a>
                                        </div>
                                        <div class="tpcourse__img-icon">
                                            <img src="web_assets/img/icon/course-3-avata-1.png" alt="course-avata">
                                        </div>
                                    </div>
                                    <div class="tpcourse__content-2">
                                        <div class="tpcourse__category mb-10">
                                            <ul class="tpcourse__price-list d-flex align-items-center">
                                                <li><a class="c-color-yellow" href="course-details.php">Design</a></li>
                                                <li><a class="c-color-red" href="course-details.php">Development</a></li>
                                            </ul>
                                        </div>
                                        <div class="tpcourse__ava-title mb-15">
                                            <h4 class="tpcourse__title tp-cours-title-color"><a href="course-details.php">Master Web Design in Adobe XD: Complete UI/UX Masterclass</a></h4>
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
                                <div class="tpcourse mb-40">
                                    <div class="tpcourse__thumb p-relative w-img fix">
                                        <a href="course-details.php"><img src="web_assets/img/course/course-thumb-02.jpg" alt="course-thumb"></a>
                                        <div class="tpcourse__tag">
                                            <a href="course-details.php"><i class="fi fi-rr-heart"></i></a>
                                        </div>
                                        <div class="tpcourse__img-icon">
                                            <img src="web_assets/img/icon/course-avata-02.png" alt="course-avata">
                                        </div>
                                    </div>
                                    <div class="tpcourse__content-2">
                                        <div class="tpcourse__category mb-10">
                                            <ul class="tpcourse__price-list d-flex align-items-center">
                                                <li><a class="c-color-green" href="course-details.php">Write</a></li>
                                                <li><a class="c-color-blue" href="course-details.php">Content</a></li>
                                            </ul>
                                        </div>
                                        <div class="tpcourse__avatar mb-15">
                                            <h4 class="tpcourse__title tp-cours-title-color"><a href="course-details.php">How to Write Great Web Content - Better Search Rankings!</a></h4>
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
                                <div class="tpcourse mb-40">
                                    <div class="tpcourse__thumb p-relative w-img fix">
                                        <a href="course-details.php"><img src="web_assets/img/course/course-thumb-03.jpg" alt="course-thumb"></a>
                                        <div class="tpcourse__tag">
                                            <a href="course-details.php"><i class="fi fi-rr-heart"></i></a>
                                        </div>
                                        <div class="tpcourse__img-icon">
                                            <img src="web_assets/img/icon/course-avata-03.png" alt="course-avata">
                                        </div>
                                    </div>
                                    <div class="tpcourse__content-2">
                                        <div class="tpcourse__category mb-10">
                                            <ul class="tpcourse__price-list d-flex align-items-center">
                                                <li><a class="c-color-purple" href="course-details.php">Coding</a></li>
                                                <li><a class="c-color-red" href="course-details.php">Development</a></li>
                                            </ul>
                                        </div>
                                        <div class="tpcourse__avatar d-flex align-items-center mb-15">
                                            <h4 class="tpcourse__title tp-cours-title-color"><a href="course-details.php">Dreamweaver - Coding your first website using Dreamweaver</a></h4>
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
                                <div class="tpcourse mb-40">
                                    <div class="tpcourse__thumb p-relative w-img fix">
                                        <a href="course-details.php"><img src="web_assets/img/course/course-thumb-04.jpg" alt="course-thumb"></a>
                                        <div class="tpcourse__tag">
                                            <a href="course-details.php"><i class="fi fi-rr-heart"></i></a>
                                        </div>
                                        <div class="tpcourse__img-icon">
                                            <img src="web_assets/img/icon/course-avata-04.png" alt="course-avata">
                                        </div>
                                    </div>
                                    <div class="tpcourse__content-2">
                                        <div class="tpcourse__category mb-10">
                                            <ul class="tpcourse__price-list d-flex align-items-center">
                                                <li><a class="c-color-green" href="course-details.php">Design</a></li>
                                                <li><a class="c-color-yellow" href="course-details.php">Development</a></li>
                                            </ul>
                                        </div>
                                        <div class="tpcourse__avatar d-flex align-items-center mb-15">
                                            <h4 class="tpcourse__title tp-cours-title-color"><a href="course-details.php">WordPress 2022: The Complete WordPress Website Course</a></h4>
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
                </div>
            </div>
            <!-- course-nav-tab-end -->
            <div class="row text-center">
                <div class="col-lg-12">
                    <div class="course-btn mt-20"><a class="tp-btn" href="courses">Browse All Courses</a></div>
                </div>
            </div>
        </div>
    </section>
    <!-- course-area-end -->


    <!-- blog-area -->
    <section class="blog-area pt-115 pb-110 wow fadeInUp" data-wow-duration=".8s" data-wow-delay=".3s">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title text-center mb-65">
                        <span class="tp-bline-stitle mb-15">Latest Blogs</span>
                        <h2 class="tp-section-title mb-20">Latest Blogs & News</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php
                $sql_pages = $conn->prepare("SELECT * FROM m_post WHERE stat=1 ORDER BY id DESC LIMIT 3");
                $sql_pages->execute();
                while($row_pages = $sql_pages->fetch()){
                    $nama_pages = $row_pages['nama'];
                    if(strlen($nama_pages) >= 45){
                        $nama_pages = substr($nama_pages, 0, 44);
                        $nama_pages = $nama_pages . "....";
                    }

                    $gambar = $row_pages['gambar'];
                    if(empty($row_pages['gambar'])){
                        $gambar = "tidak_ada_gambar.png";
                    }

                    if(!file_exists("images/".$row_pages['gambar'])){
                        $gambar = "tidak_ada_di_image.png";
                    }
                ?>
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="tp-blog tp-blog-parent mb-60">
                        <div class="tp-blog__thumb">
                            <div class="fix blog-round">
                                <a href="post?p=<?php echo $row_pages['id']; ?>"><img src="images/<?php echo $gambar; ?>" alt="blog-img"></a>
                            </div>
                        </div>
                        <div class="tp-blog__content blog-edu p-relative">
                            <div class="tp-blog__meta-list mb-10">
                                <span><a href="post?p=<?php echo $row_pages['id']; ?>"><i class="fi fi-ss-calendar"></i><?php echo date("d M Y", strtotime($row_pages["created_at"])); ?></a></span>
                            </div>
                            <h3 class="tp-blog__title mb-15"><a href="post?p=<?php echo $row_pages['id']; ?>"><?php echo $nama_pages; ?></a></h3>
                            <span><a href="#"><i class="fi fi-sr-user"></i><?php echo $row_pages['penulis']; ?></a></span>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="blog-btn text-center">
                        <a href="posts" class="tp-btn">All Blog</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- blog-area-end -->


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
<script src="web_assets/js/floating.js"></script>

<script>
    $(".floating-button").on("click", () => {
        let nomor = "<?php echo urlencode($row_setting['wa']); ?>";
        let text = "<?php echo urlencode($row_setting['kata_wa']); ?>";

        window.location.href="https://wa.me/"+nomor+"?text="+text
    });
</script>

</body>

</html>