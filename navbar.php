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
                                <a href="index.php">
                                    <img src="images/<?php echo $row_setting['logo']; ?>" alt="logo">
                                </a>
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
                                $sqlpages = $conn->prepare("SELECT * FROM m_pages ORDER BY urut ASC");
                                $sqlpages->execute();
                                while($datapages = $sqlpages->fetch()){
                                    if($datapages['stat'] == 0){ ?>
                                        <li><a href='<?php echo $datapages['url']; ?><?php echo $datapages['id']; ?>'><?php echo $datapages['nama']; ?></a></li>
                                    <?php } else if($datapages['stat'] == 1) { ?>
                                        <li class="has-dropdown">
                                            <a href="#"><?php echo $datapages['nama']; ?></a>
                                            <ul class="submenu">
                                                <?php
                                                $sqlsubpages = $conn->prepare("SELECT * FROM m_subpages WHERE pages_id=:pages_id ORDER BY id ASC");
                                                $sqlsubpages->execute([":pages_id" => $datapages['id']]);
                                                while($dataSubpages = $sqlsubpages->fetch()){
                                                    ?>
                                                    <li><a href='<?php echo $dataSubpages['url']; ?><?php echo $dataSubpages['id']; ?>'><?php echo $dataSubpages['nama']; ?></a></li>
                                                <?php } ?>
                                            </ul>
                                        </li>
                                    <?php } else if($datapages['stat'] == 2){ ?>
                                        <li class="has-dropdown">
                                            <a href="<?php echo $datapages['url']; ?>"><?php echo $datapages['nama']; ?></a>
                                            <ul class="submenu">
                                                <?php
                                                $sqlsubpages = $conn->prepare("SELECT * FROM m_subpages WHERE pages_id=:pages_id ORDER BY id ASC");
                                                $sqlsubpages->execute([":pages_id" => $datapages['id']]);
                                                while($dataSubpages = $sqlsubpages->fetch()){
                                                    ?>
                                                    <li><a href='<?php echo $dataSubpages['url']; ?>'><?php echo $dataSubpages['nama']; ?></a></li>
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
                            <li><a href="login"><i class="fi fi-rr-user"></i></a></li>
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
        <h4 class="mb-15">Test</h4>
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