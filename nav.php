
<body>

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
<header class="header__transparent">
    <div class="header__area">
        <div class="main-header third-header header-xy-spacing" id="header-sticky">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-xxl-3 col-xl-3 col-lg-5 col-md-6 col-6">
                        <div class="logo-area d-flex align-items-center">
                            <div class="logo">
                                <a href="index.html">
                                    <img src="web_assets/img/logo/logo-black.png" alt="logo">
                                </a>
                            </div>
                            <div class="header-cat-menu ml-40 d-none d-md-block">
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
                    <div class="col-xxl-9 col-xl-9 col-lg-7 col-md-6 col-6 d-flex align-items-center justify-content-end">
                        <div class="main-menu main-menu-black d-flex justify-content-end">
                            <nav id="mobile-menu">
                                <ul>
                                    <?php
                                    $sqlPages = $conn->prepare("SELECT * FROM m_pages ORDER BY urut ASC");
                                    $sqlPages->execute();
                                    while($dataPages = $sqlPages->fetch()){
                                        if($dataPages['stat'] == 0){ ?>
                                            <li><a href='<?php echo $dataPages['url']; ?>'><?php echo $dataPages['nama']; ?></a></li>
                                        <?php } else if($dataPages['stat'] == 1) { ?>
                                            <li class="has-dropdown">
                                                <a href="#"><?php echo $dataPages['nama']; ?></a>
                                                <ul class="submenu">
                                                    <?php
                                                    $sqlSubpages = $conn->prepare("SELECT * FROM m_subpages WHERE pages_id=:pages_id ORDER BY id ASC");
                                                    $sqlSubpages->execute([":pages_id" => $dataPages['id']]);
                                                    while($dataSubpages = $sqlSubpages->fetch()){
                                                        ?>
                                                        <li><a href='<?php echo $dataSubpages['url']; ?><?php echo $dataSubpages['id']; ?>'><?php echo $dataSubpages['nama']; ?></a></li>
                                                    <?php } ?>
                                                </ul>
                                            </li>
                                        <?php } else if($dataPages['stat'] == 2){ ?>
                                            <li class="has-dropdown">
                                                <a href="<?php echo $dataPages['url']; ?>"><?php echo $dataPages['nama']; ?></a>
                                                <ul class="submenu">
                                                    <?php
                                                    $sqlSubpages = $conn->prepare("SELECT * FROM m_subpages WHERE pages_id=:pages_id ORDER BY id ASC");
                                                    $sqlSubpages->execute([":pages_id" => $dataPages['id']]);
                                                    while($dataSubpages = $sqlSubpages->fetch()){
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
                        <div class="header-right d-flex align-items-center">
                            <div class="header-meta header-meta-white">
                                <ul>
                                    <li><a href="sign-in.html" class="d-none d-md-block"><i class="fi fi-rr-user"></i></a></li>
                                    <li><a href="cart.html" class="d-none d-md-block"><i class="	 fi fi-rr-shopping-bag"></i></a></li>
                                    <li><a href="#" class="tp-menu-toggle d-xl-none"><i class="icon_ul"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- header area end -->