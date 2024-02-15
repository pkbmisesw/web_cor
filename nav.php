
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
                                <a href="#">
                                    <img src="images/<?php echo $row_setting['logo']; ?>" alt="logo">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-9 col-xl-9 col-lg-7 col-md-6 col-6 d-flex align-items-center justify-content-end">
                        <div class="main-menu main-menu-black d-flex justify-content-end">
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
                        <div class="header-right d-flex align-items-center">
                            <div class="header-meta header-meta-white">
                                <ul>
                                    <li><a href="login" class="d-none d-md-block"><i class="fi fi-rr-user"></i></a></li>
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