<?php
include 'config.php';
error_reporting(0);

$idSubpages = $_GET['p'];

$sql_setting = "SELECT * FROM setting ORDER BY id DESC";
$stmt = $conn->prepare($sql_setting);
$stmt->execute();
$row_setting = $stmt->fetch();
?>

<?php
include 'head.php';
include 'navbar.php';
?>

<main>

    <?php
    $sqlSubpages = $conn->prepare("SELECT * FROM m_subpages WHERE id=:id");
    $sqlSubpages->execute([":id" => $idSubpages]);
    $dataSubpages = $sqlSubpages->fetch();
    if(!$dataSubpages){
        echo '<script>document.location.href="index.php"</script>';
    }
    ?>

    <!-- postbox area start -->
    <div class="postbox__area pt-120 pb-120 wow fadeInUp" data-wow-duration=".8s" data-wow-delay=".2s">
        <div class="container">
            <div class="row">
                <div class="col-xxl-8 col-xl-8 col-lg-7 col-md-12">
                    <div class="postbox__wrapper pr-20">
                        <article class="postbox__item format-image mb-60 transition-3">
                            <div class="postbox__thumb w-img mb-30">
                                <a href="blog-details.html">
                                    <img src="web_assets/img/<?php echo $dataSubpages["gambar"]; ?>" alt="">
                                </a>
                            </div>
                            <div class="postbox__content">
                                <div class="postbox__meta">
                                    <span><i class="fi fi-rr-calendar"></i> <?php echo date("m-d-Y", strtotime($dataSubpages["created_at"])); ?></span>
                                    <span><a href="#"><i class="fi fi-rr-user"></i> <?php echo $dataSubpages['penulis']; ?></a></span>
                                </div>
                                <h3 class="postbox__title">
                                    <?php echo $dataSubpages['nama']; ?>
                                </h3>
                                <div class="postbox__text">
                                    <?php echo $dataSubpages['des']; ?>
                                </div>

                                <div class="postbox__tag tagcloud">
                                    <span>Post Tags :</span>
                                    <a href="#">Fresh</a>
                                    <a href="#">Home</a>
                                    <a href="#">Kitchen</a>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
                <?php
                include 'sidebar.php';
                ?>
            </div>
        </div>
    </div>
    <!-- postbox area end -->


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