<?php
include 'config.php';

$idPages = $_GET['p'];

$sqlPages = $conn->prepare("SELECT * FROM m_pages WHERE id=:id");
$sqlPages->execute([":id" => $idPages]);
$dataPages = $sqlPages->fetch();
if(!$dataPages){
    echo '<script>document.location.href="index.php"</script>';
}
?>

<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Epora - Online Courses & Education HTML Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="web_assets/img/favicon.png">

    <!-- CSS here -->
    <link rel="stylesheet" href="web_assets/css/bootstrap.css">
    <link rel="stylesheet" href="web_assets/css/meanmenu.css">
    <link rel="stylesheet" href="web_assets/css/animate.css">
    <link rel="stylesheet" href="web_assets/css/slick.css">
    <link rel="stylesheet" href="web_assets/css/backtotop.css">
    <link rel="stylesheet" href="web_assets/css/magnific-popup.css">
    <link rel="stylesheet" href="web_assets/css/nice-select.css">
    <link rel="stylesheet" href="web_assets/css/ui-icon.css">
    <link rel="stylesheet" href="web_assets/css/elegentfonts.css">
    <link rel="stylesheet" href="web_assets/css/font-awesome-pro.css">
    <link rel="stylesheet" href="web_assets/css/spacing.css">
    <link rel="stylesheet" href="web_assets/css/style.css">
</head>

<body>
<!--[if lte IE 9]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
<![endif]-->


<!-- pre loader area start -->
<div id="loading">
    <div id="loading-center">
        <div id="loading-center-absolute">
            <!-- loading content here -->
        </div>
    </div>
</div>
<!-- pre loader area end -->

<!-- back to top start -->
<div class="progress-wrap">
    <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
    </svg>
</div>
<!-- back to top end -->

<!-- header area start -->
<header class="header_white_area d-none d-xl-block">
    <div class="header__area pt-40 pb-5">
        <div class="main-header">
            <div class="container">
                <div class="row align-items-center justify-content-between">
                    <div class="col-xxl-7 col-xl-6 col-lg-6 col-md-5 col-6">
                        <div class="logo-area d-flex align-items-center">
                            <div class="logo">
                                <a href="index.html">
                                    <img src="web_assets/img/logo/logo-black.png" alt="logo">
                                </a>
                            </div>
                            <div class="header-cat-menu ml-40">
                                <nav>
                                    <ul>
                                        <li><a href="course-grid.html"> Categorie <span><i class="arrow_carrot-down"></i></span></a>
                                            <ul class="sub-menu">
                                                <li><a href="course-grid.html">Bangla Medium</a></li>
                                                <li><a href="course-grid.html">English Medium</a></li>
                                                <li><a href="course-grid.html">Video Edition</a></li>
                                                <li><a href="course-grid.html">Logo Design</a></li>
                                                <li><a href="course-grid.html">Francy Medium</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-5 col-lg-6 col-md-7">
                        <div class="header-right header-right-box">
                            <div class="header-search-box">
                                <form action="#">
                                    <div class="search-input">
                                        <input type="Email" placeholder="What you want to learn?">
                                        <button class="header-search-btn"><i class="fi fi-rs-search mr-5"></i> Search Now</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-menu-area" id="header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-xxl-9 col-xl-9 col-lg-6 text-start">
                    <div class="main-menu main-menu-white">
                        <nav id="mobile-menu">
                            <ul>
                                <?php
                                $sqlPagesAll = $conn->prepare("SELECT * FROM m_pages ORDER BY urut ASC");
                                $sqlPagesAll->execute();
                                while($dataPagesAll = $sqlPagesAll->fetch()){
                                    if($dataPagesAll['stat'] == 0){ ?>
                                        <li><a href='<?php echo $dataPagesAll['url']; ?>'><?php echo $dataPagesAll['nama']; ?></a></li>
                                    <?php } else if($dataPagesAll['stat'] == 1) { ?>
                                        <li class="has-dropdown">
                                            <a href="#"><?php echo $dataPagesAll['nama']; ?></a>
                                            <ul class="submenu">
                                                <?php
                                                $sqlSubpagesAll = $conn->prepare("SELECT * FROM m_subpages WHERE pages_id=:pages_id ORDER BY id ASC");
                                                $sqlSubpagesAll->execute([":pages_id" => $dataPages['id']]);
                                                while($dataSubpagesAll = $sqlSubpagesAll->fetch()){
                                                    ?>
                                                    <li><a href='<?php echo $dataSubpagesAll['url']; ?>'><?php echo $dataSubpagesAll['nama']; ?></a></li>
                                                <?php } ?>
                                            </ul>
                                        </li>
                                    <?php } else if($dataPagesAll['stat'] == 2){ ?>
                                        <li class="has-dropdown">
                                            <a href="<?php echo $dataPagesAll['url']; ?>"><?php echo $dataPagesAll['nama']; ?></a>
                                            <ul class="submenu">
                                                <?php
                                                $sqlSubpagesAll = $conn->prepare("SELECT * FROM m_subpages WHERE pages_id=:pages_id ORDER BY id ASC");
                                                $sqlSubpagesAll->execute([":pages_id" => $dataPages['id']]);
                                                while($dataSubpagesAll = $sqlSubpagesAll->fetch()){
                                                    ?>
                                                    <li><a href='<?php echo $dataSubpagesAll['url']; ?>'><?php echo $dataSubpagesAll['nama']; ?></a></li>
                                                <?php } ?>
                                            </ul>
                                        </li>
                                    <?php } ?>
                                <?php } ?>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-xxl-3 col-xl-3 col-lg-6 d-flex align-items-center justify-content-end">
                    <div class="header-meta-green">
                        <ul>
                            <li><a href="sign-in.html"><i class="fi fi-rr-user"></i></a></li>
                            <li><a href="cart.html"><i class="fi fi-rr-shopping-bag"></i></a></li>
                            <li><a href="#" class="tp-menu-toggle d-xl-none"><i class="icon_ul"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<div id="header-mob-sticky" class="mobile-header-area mob-white-sticky d-xl-none">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 col-5">
                <div class="logo">
                    <a href="index.html">
                        <img src="web_assets/img/logo/logo-black.png" alt="logo">
                    </a>
                </div>
            </div>
            <div class="col-md-6 col-7 d-flex align-items-center justify-content-end">
                <div class="header-meta-green text-end">
                    <ul>
                        <li><a href="sign-in.html"><i class="fi fi-rr-user"></i></a></li>
                        <li><a href="cart.html"><i class="fi fi-rr-shopping-bag"></i></a></li>
                        <li><a href="#" class="tp-menu-toggle d-xl-none"><i class="icon_ul"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- header area end -->
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
                        <h3 class="breadcrumb__title mb-20">Blog Details</h3>
                        <div class="breadcrumb__list">
                            <span><a href="index.html">Home</a></span>
                            <span class="dvdr"><i class="fa-regular fa-angle-right"></i></span>
                            <span><a href="blog.html">Blog</a></span>
                            <span class="dvdr"><i class="fa-regular fa-angle-right"></i></span>
                            <span class="sub-page-black">Blog Details</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb-area-end -->

    <!-- postbox area start -->
    <div class="postbox__area pt-120 pb-120 wow fadeInUp" data-wow-duration=".8s" data-wow-delay=".2s">
        <div class="container">
            <div class="row">
                <div class="col-xxl-8 col-xl-8 col-lg-7 col-md-12">
                    <div class="postbox__wrapper pr-20">
                        <article class="postbox__item format-image mb-60 transition-3">
                            <div class="postbox__thumb w-img mb-30">
                                <a href="blog-details.html">
                                    <img src="web_assets/img/<?php echo $dataPages["gambar"]; ?>" alt="">
                                </a>
                            </div>
                            <div class="postbox__content">
                                <div class="postbox__meta">
                                    <span><i class="fi fi-rr-calendar"></i> <?php echo date("m-d-Y", strtotime($dataPages["created_at"])); ?></span>
                                    <span><a href="#"><i class="fi fi-rr-user"></i> Shahnewaz</a></span>
                                    <span><a href="#"><i class="fi fi-rr-comments"></i> 02 Comments</a></span>
                                </div>
                                <h3 class="postbox__title">
                                    <?php echo $dataPages['nama']; ?>
                                </h3>
                                <div class="postbox__text">
                                    <?php echo $dataPages['des']; ?>
                                </div>

                                <div class="postbox__tag tagcloud">
                                    <span>Post Tags :</span>
                                    <a href="#">Fresh</a>
                                    <a href="#">Home</a>
                                    <a href="#">Kitchen</a>
                                </div>
                            </div>
                        </article>
                        <div class="postbox__comment mb-65">
                            <h3 class="postbox__comment-title">3 Comments</h3>
                            <ul>
                                <li>
                                    <div class="postbox__comment-box grey-bg">
                                        <div class="postbox__comment-info d-flex">
                                            <div class="postbox__comment-avater mr-20">
                                                <img src="web_assets/img/blog/comments/comment-1.jpg" alt="">
                                            </div>
                                            <div class="postbox__comment-name">
                                                <h5>Eleanor Fant</h5>
                                                <span class="post-meta"> July 14, 2022</span>
                                            </div>
                                        </div>
                                        <div class="postbox__comment-text ml-65">
                                            <p>So I said lurgy dropped a clanger Jeffrey bugger cuppa gosh David blatant have it, standard A bit of how's your father my lady absolutely.</p>
                                            <div class="postbox__comment-reply">
                                                <a href="#">Reply</a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="children">
                                    <div class="postbox__comment-box grey-bg">
                                        <div class="postbox__comment-info d-flex">
                                            <div class="postbox__comment-avater mr-20">
                                                <img src="web_assets/img/blog/comments/comment-2.jpg" alt="">
                                            </div>
                                            <div class="postbox__comment-name">
                                                <h5>Eleanor Fant</h5>
                                                <span class="post-meta"> July 14, 2022</span>
                                            </div>
                                        </div>
                                        <div class="postbox__comment-text ml-65">
                                            <p>So I said lurgy dropped a clanger Jeffrey bugger cuppa gosh David blatant have it, standard A bit of how's your father my lady absolutely.</p>
                                            <div class="postbox__comment-reply">
                                                <a href="#">Reply</a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="postbox__comment-box grey-bg">
                                        <div class="postbox__comment-info d-flex">
                                            <div class="postbox__comment-avater mr-20">
                                                <img src="web_assets/img/blog/comments/comment-3.jpg" alt="">
                                            </div>
                                            <div class="postbox__comment-name">
                                                <h5>Eleanor Fant</h5>
                                                <span class="post-meta"> July 14, 2022</span>
                                            </div>
                                        </div>
                                        <div class="postbox__comment-text ml-65">
                                            <p>So I said lurgy dropped a clanger Jeffrey bugger cuppa gosh David blatant have it, standard A bit of how's your father my lady absolutely.</p>
                                            <div class="postbox__comment-reply">
                                                <a href="#">Reply</a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="postbox__comment-form">
                            <h3 class="postbox__comment-form-title">Write a comment</h3>
                            <form action="#">
                                <div class="row">
                                    <div class="col-xxl-6 col-xl-6 col-lg-6">
                                        <div class="postbox__comment-input">
                                            <input type="text" placeholder="Your Name">
                                        </div>
                                    </div>
                                    <div class="col-xxl-6 col-xl-6 col-lg-6">
                                        <div class="postbox__comment-input">
                                            <input type="email" placeholder="Your Email">
                                        </div>
                                    </div>
                                    <div class="col-xxl-12">
                                        <div class="postbox__comment-input">
                                            <input type="text" placeholder="Website">
                                        </div>
                                    </div>
                                    <div class="col-xxl-12">
                                        <div class="postbox__comment-input">
                                            <textarea placeholder="Enter your comment ..."></textarea>
                                        </div>
                                    </div>
                                    <div class="col-xxl-12">
                                        <div class="postbox__comment-btn">
                                            <button type="submit" class="tp-btn">Post Comment</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-12">
                    <div class="sidebar__wrapper">
                        <div class="sidebar__widget mb-55">
                            <div class="sidebar__widget-content">
                                <h3 class="sidebar__widget-title mb-25">Search</h3>
                                <div class="sidebar__search">
                                    <form action="#">
                                        <div class="sidebar__search-input-2">
                                            <input type="text" placeholder="Search Anything">
                                            <button type="submit"><i class="far fa-search"></i></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="sidebar__widget mb-55">
                            <h3 class="sidebar__widget-title mb-25">Recent Post</h3>
                            <div class="sidebar__widget-content">
                                <div class="sidebar__post rc__post">
                                    <div class="rc__post mb-20 d-flex align-items-center">
                                        <div class="rc__post-thumb">
                                            <a href="blog-details.html"><img src="web_assets/img/blog/sidebar/blog-sm-1.jpg" alt="blog-sidebar"></a>
                                        </div>
                                        <div class="rc__post-content">
                                            <h3 class="rc__post-title">
                                                <a href="blog-details.html">Seamlessly monetize centa material bleeding.</a>
                                            </h3>
                                            <div class="rc__meta">
                                                <span>21 Jan 2022</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="rc__post mb-20 d-flex align-items-center">
                                        <div class="rc__post-thumb">
                                            <a href="blog-details.html"><img src="web_assets/img/blog/sidebar/blog-sm-2.jpg" alt="blog-sidebar"></a>
                                        </div>
                                        <div class="rc__post-content">
                                            <h3 class="rc__post-title">
                                                <a href="blog-details.html">How often should you schedule professional</a>
                                            </h3>
                                            <div class="rc__meta">
                                                <span>July 21, 2021</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="rc__post mb-20 d-flex align-items-center">
                                        <div class="rc__post-thumb">
                                            <a href="blog-details.html"><img src="web_assets/img/blog/sidebar/blog-sm-3.jpg" alt="blog-sidebar"></a>
                                        </div>
                                        <div class="rc__post-content">
                                            <h3 class="rc__post-title">
                                                <a href="blog-details.html">How to keep your institue and home Safe</a>
                                            </h3>
                                            <div class="rc__meta">
                                                <span>July 21, 2021</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="sidebar__widget mb-40">
                            <h3 class="sidebar__widget-title mb-10">Category</h3>
                            <div class="sidebar__widget-content">
                                <ul>
                                    <li><a href="blog.html">Business <span>(14)</span></a></li>
                                    <li><a href="blog.html">Cleaning <span>(19)</span></a></li>
                                    <li><a href="blog.html">Consultant <span>(21)</span></a></li>
                                    <li><a href="blog.html">Creative <span>(27)</span></a></li>
                                    <li><a href="blog.html">Technology <span>(35)</span></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="sidebar__widget mb-40">
                            <h3 class="sidebar__widget-title mb-30">Tags</h3>
                            <div class="sidebar__widget-content">
                                <div class="tagcloud tagcloud-d">
                                    <a href="#">IT Solution</a>
                                    <a href="#">Digital Marketing</a>
                                    <a href="#">Software Training</a>
                                    <a href="#">Art & Design</a>
                                    <a href="#">Photography</a>
                                    <a href="#">Music</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- postbox area end -->

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
                            <a href="#"><img src="web_assets/img/logo/Logo.png" alt="logo"></a>
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