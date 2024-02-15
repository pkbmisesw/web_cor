<?php
include 'config.php';
error_reporting(0);

$sql_setting = "SELECT * FROM setting ORDER BY id DESC";
$stmt = $conn->prepare($sql_setting);
$stmt->execute();
$row_setting = $stmt->fetch();

$paging = (isset($_GET['p'])) ? $_GET['p'] : 1;
$left_limit = ($paging>1) ? ($paging * 6) - 6 : 0;

$next = $paging + 1;
$previous = $paging - 1;

$sql_kursus_all = $conn->prepare("SELECT * FROM m_kursus ORDER BY id DESC");
if($_GET['search']){
    $sql_kursus_all = $conn->prepare("SELECT * FROM m_kursus WHERE nama LIKE :nama ORDER BY id DESC");
    $sql_kursus_all->bindValue(":nama", "%".$_GET['search']."%", PDO::PARAM_STR);
}

$sql_kursus_all->execute();
$total_kursus = $sql_kursus_all->rowCount();

$total_paging = ceil($total_kursus / 6);
?>

<?php
include 'head.php';
include 'navbar.php';
?>

<!-- Pagination Start -->
<div class="pt-105 pb-120">
    <?php
    $sql_kursus = $conn->prepare("SELECT * FROM m_kursus ORDER BY id DESC LIMIT :left_limit,:right_limit");

    if ($_GET['search']) {
        $sql_kursus = $conn->prepare("SELECT * FROM m_kursus WHERE nama LIKE :search ORDER BY id DESC LIMIT :left_limit,:right_limit");
        $sql_kursus->bindValue(":search", "%" . $_GET['search'] . "%", PDO::PARAM_STR);
    }

    $sql_kursus->bindValue(":left_limit", $left_limit, PDO::PARAM_INT);
    $sql_kursus->bindValue(":right_limit", 6, PDO::PARAM_INT);
    $sql_kursus->execute();

    ?>
    <div class="container">
        <div class="d-flex justify-content-between">
            <h4 class="tp-suit__title"><span>Total Course:</span> <?php echo $total_kursus; ?> course.</h4>
            <div class="header-right header-right-box">
                <div class="header-search-box">
                    <form action="" method="GET">
                        <div class="search-input">
                            <input type="text" name="search" placeholder="What you want to learn?">
                            <button class="header-search-btn"><i class="fi fi-rs-search mr-5"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="pt-50">
            <nav>
                <div class="nav d-flex justify-content-center mb-50" id="nav-tab" role="tablist">
                    <?php
                    $sql_kategori = $conn->prepare("SELECT * FROM m_kategori ORDER BY id DESC");
                    $sql_kategori->execute();
                    while($data_kategori = $sql_kategori->fetch()){
                    ?>
                    <button class="tp-course-tab" id="nav-design-tab" data-bs-toggle="tab" data-bs-target="#nav-design" type="button" role="tab" aria-controls="nav-design-tab" aria-selected="true"><?php echo $data_kategori["nama"];  ?></button>
                    <?php } ?>
                </div>
            </nav>
        </div>
        <div class="row pt-20">
            <?php
            while($data_kursus = $sql_kursus->fetch()){
                $gambar = $data_kursus['pic'];

                if(empty($data_kursus['pic'])){
                    $gambar = "tidak_ada_gambar.png";
                }

                if(!file_exists("images/".$data_kursus['pic'])){
                    $gambar = "tidak_ada_di_image.png";
                }
                ?>

                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="tpcourse mb-40">
                        <div class="tpcourse__thumb p-relative w-img fix">
                            <a href="course_details?p=<?php echo $data_kursus['id']; ?>"><img src="images/<?php echo $gambar; ?>" alt="course-thumb"></a>
                            <div class="tpcourse__tag">
                                <a href="course_details?p=<?php echo $data_kursus['id']; ?>"><i class="fi fi-rr-heart"></i></a>
                            </div>
                            <div class="tpcourse__img-icon">
                                <img src="web_assets/img/icon/course-3-avata-1.png" alt="course-avata">
                            </div>
                        </div>
                        <div class="tpcourse__content-2">
                            <div class="tpcourse__ava-title mb-15">
                                <h4 class="tpcourse__title tp-cours-title-color"><a href="course_details?p=<?php echo $data_kursus['id']; ?>"><?php echo $data_kursus['nama']; ?></a></h4>
                            </div>
                            <div class="tpcourse__meta tpcourse__meta-gap pb-15 mb-15">
                                <ul class="d-flex align-items-center">
                                    <li><img src="web_assets/img/icon/c-meta-01.png" alt="meta-icon"> <span>-</span></li>
                                    <li><img src="web_assets/img/icon/c-meta-02.png" alt="meta-icon"> <span>-</span></li>
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
                                    <h5 class="price-title"><?php echo "Rp. " . number_format($data_kursus['harga'], null, null, '.').",-" ?></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<!-- Pagination End -->

<div class="pb-120">
    <div class="container">
        <div class="d-flex justify-content-center">
            <?php if($paging > 1){ ?>
            <a href="courses?p=<?php echo ($_GET['search']) ? $previous . "&search=" . $_GET['search'] : $previous; ?>" class="tp-border-btn mr-30"><<</a>
            <?php } ?>
            <?php if($paging < $total_paging && $total_kursus > 6){?>
            <a href="courses?p=<?php echo ($_GET['search']) ? $next . "&search=" . $_GET['search'] : $next; ?>" class="tp-border-btn">>></a>
            <?php } ?>
        </div>
    </div>
</div>

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