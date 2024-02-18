<?php
include 'config.php';
error_reporting(0);

if(empty($_SESSION['email']) || $_SESSION['level_id'] < 3 || $_SESSION['status_aktif'] != 1){
    header("Location: index.php");
}

$id_course = isset($_GET['p']) ? $_GET['p'] : header("Location: mycourse.php");

$sql_setting = "SELECT * FROM setting ORDER BY id DESC";
$stmt = $conn->prepare($sql_setting);
$stmt->execute();
$row_setting = $stmt->fetch();
$status = 0;

?>

<?php
include 'head.php';
include 'navbar.php';
?>

<?php
$sql_kursus = $conn->prepare("SELECT * FROM m_kursus WHERE id=:id_kursus");
$sql_kursus->execute([':id_kursus' => $id_course]);
$data_kursus = $sql_kursus->fetch();
?>

   <main>

      
      <!-- cart area -->
      <section class="cart-area pt-125 pb-200 wow fadeInUp" data-wow-duration=".8s" data-wow-delay=".2s">
         <div class="container">
         <div class="row">
            <div class="col-8">
                <div class="mb-60">
                    <h2><?php echo $data_kursus['nama'] ?></h2>
                    <p><?php echo $data_kursus['des']; ?></p>
                    <span style="color: var(--tp-text-2)">Durasi - <?php echo $data_kursus['durasi'] ?> | Skill Level - <?php echo $data_kursus['skill_level'] ?>  | Pengajar - <a href='<?php echo $data_kursus['url_pengajar']; ?>'><?php echo $data_kursus['pengajar'] ?></a></span>
                </div>
                <div class="accordion" id="accordionPanelsStayOpenExample">
                    <?php
                    $i = 0;
                    $sql_materi = $conn->prepare("SELECT * FROM m_materi WHERE id_kursus=:id_kursus AND status=:status ORDER BY no_urut ASC");
                    $sql_materi->execute([":id_kursus" => $id_course, ":status" => 1]);

                    if($sql_materi->rowCount() == 0){
                        echo "<script>window.location.href='mycourse'</script>";
                    }

                    while($data_materi = $sql_materi->fetch()){
                        if($i == 0){
                            ?>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="panelsStayOpen-heading<?php echo $data_materi['no_urut'] ?>">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse<?php echo $data_materi['no_urut'] ?>" aria-expanded="true" aria-controls="panelsStayOpen-collapse<?php echo $data_materi['no_urut'] ?>">
                                        <?php echo $data_materi['nama'] . " - " . $data_materi['no_urut']; ?>
                                    </button>
                                </h2>
                                <div id="panelsStayOpen-collapse<?php echo $data_materi['no_urut'] ?>" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-heading<?php echo $data_materi['no_urut'] ?>">
                                    <div class="accordion-body">
                                        <ul>
                                            <?php
                                            $sql_materi_list = $conn->prepare("SELECT * FROM m_materi_list WHERE id_materi=:id_materi ORDER BY no_urut ASC");
                                            $sql_materi_list->execute([":id_materi" => $data_materi['id']]);
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
                                        <?php echo $data_materi['nama'] . " - " . $data_materi['no_urut']; ?>
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
         </div>
      </section>
      <!-- cart area end-->        

   </main>

<?php
include 'footer.php';
?>


   <!-- JS here -->
   <script src="web_assets/js/vendor/jquery.js"></script>
   <script src="//cdn.datatables.net/2.0.0/js/dataTables.min.js"></script>
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

<script>
    new DataTable('#course-table');
</script>
</body>

</html>