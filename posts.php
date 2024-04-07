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

$sql_post_all = $conn->prepare("SELECT * FROM m_post ORDER BY id DESC");
if($_GET['search']){
    $sql_post_all = $conn->prepare("SELECT * FROM m_post WHERE nama LIKE :nama ORDER BY id DESC");
    $sql_post_all->bindValue(":nama", "%".$_GET['search']."%", PDO::PARAM_STR);
}

$sql_post_all->execute();
$total_post = $sql_post_all->rowCount();

$total_paging = ceil($total_post / 6);
?>

<?php
include 'head.php';
include 'navbar.php';
?>

<!-- Pagination Start -->
<div class="postbox__area pt-120 pb-120 wow fadeInUp" data-wow-duration=".8s" data-wow-delay=".2s" style="visibility: visible; animation-duration: 0.8s; animation-delay: 0.2s; animation-name: fadeInUp;">
    <?php
    $sql_post = $conn->prepare("SELECT * FROM m_post ORDER BY id DESC LIMIT :left_limit,:right_limit");

    if ($_GET['search']) {
        $sql_post = $conn->prepare("SELECT * FROM m_post WHERE nama LIKE :search ORDER BY id DESC LIMIT :left_limit,:right_limit");
        $sql_post->bindValue(":search", "%" . $_GET['search'] . "%", PDO::PARAM_STR);
    }

    $sql_post->bindValue(":left_limit", $left_limit, PDO::PARAM_INT);
    $sql_post->bindValue(":right_limit", 6, PDO::PARAM_INT);
    $sql_post->execute();

    ?>
    <div class="container">
        <div class="row">
            <div class="col-xxl-8 col-xl-8 col-lg-7 col-md-12">
                <div class="postbox__wrapper pr-20">
                    <?php
                    while($data_post = $sql_post->fetch()){
                    $gambar = $data_post['gambar'];

                    if(empty($data_post['gambar'])){
                        $gambar = "tidak_ada_gambar.png";
                    }

                    if(!file_exists("images/".$data_post['gambar'])){
                        $gambar = "tidak_ada_di_image.png";
                    }
                    ?>
                    <article class="postbox__item format-image mb-60 transition-3">
                        <div class="postbox__thumb w-img mb-30">
                            <a href="post?p=<?php echo $data_post['id']; ?>">
                                <img src="images/<?php echo $gambar; ?>" width="50%" height="50%" alt="">
                            </a>
                        </div>
                        <div class="postbox__content">
                            <div class="postbox__meta">
                                <span><i class="fi fi-rr-calendar"></i> <?php echo date("d M Y", strtotime($data_post["created_at"])); ?> </span>
                                <span><a href="#"><i class="fi fi-rr-user"></i> <?php echo $data_post['penulis']; ?></a></span>
                                <span><a href="#"><i class="fi fi-rr-comments"></i> -</a></span>
                            </div>
                            <h3 class="postbox__title">
                                <a href="post?p=<?php echo $data_post['id']; ?>"><?php echo $data_post['nama']; ?></a>
                            </h3>
                            <div class="postbox__text">
                                <p><?php echo $data_post['sdes']; ?></p>
                            </div>
                            <div class="postbox__read-more">
                                <a href="post?p=<?php echo $data_post['id']; ?>" class="tp-btn">read more</a>
                            </div>
                        </div>
                    </article>
                    <?php } ?>
                    <div class="basic-pagination">
                        <nav>
                            <ul>
                                <?php if($paging > 1){ ?>
                                <li>
                                    <a href="posts?p=<?php echo ($_GET['search']) ? $previous . "&search=" . $_GET['search'] : $previous; ?>">
                                        <i class="far fa-angle-left"></i>
                                    </a>
                                </li>
                                <?php } ?>
                                <?php if($paging < $total_paging && $total_post > 6){?>
                                <li>
                                    <a href="posts?p=<?php echo ($_GET['search']) ? $next . "&search=" . $_GET['search'] : $next; ?>">
                                        <i class="far fa-angle-right"></i>
                                    </a>
                                </li>
                                <?php } ?>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <?php
            include 'sidebar.php';
            ?>
        </div>
    </div>
</div>
<!-- Pagination End -->

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
