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
                                <li><a href='./'>Home</a></li>
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
                            <?php if(!empty($_SESSION['email'])){ ?>
                            <li><p class="mt-2"><?php echo $_SESSION['nama']; ?></p></li>
                                <li><a href="#" style="background-color: var(--tp-border-2);"><i class="fi fi-rr-user" style="color: #fff;"></i></a></li>
                            <?php }else{ ?>
                            <li><a href="logina"><i class="fi fi-rr-user"></i></a></li>
                            <?php } ?>
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
                    <a href="./">
                        <img src="images/<?php echo $row_setting['logo']; ?>" alt="logo">
                    </a>
                </div>
            </div>
            <div class="col-md-6 col-7 d-flex align-items-center justify-content-end">
                <div class="header-meta-green text-end">
                    <ul>
                        <li><a href="login"><i class="fi fi-rr-user"></i></a></li>
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
        <a href="./"><img src="images/<?php echo $row_setting['logo']; ?>" alt="logo"></a>
    </div>
    <div class="mobile-menu"></div>
    <div class="sidebar-info">
        <h4 class="mb-15">Contact Info</h4>
        <ul class="side_circle">
            <li><?php echo $row_setting['alamat']; ?></li>
            <li><a href="mailto:<?php echo $row_setting['email']; ?>"><?php echo $row_setting['email']; ?></a></li>
        </ul>
        <div class="side-social">
            <a href="https://wa.me/<?php echo $row_setting['wa'] ?>?text=<?php echo $row_setting['kata_wa']; ?>"><i class="fab fa-whatsapp mr-5"></i>Message Us</a>
        </div>
    </div>
</div>
<div class="body-overlay"></div>