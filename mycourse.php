<?php
include 'config.php';
error_reporting(0);

if(empty($_SESSION['email']) || $_SESSION['level_id'] < 3 || $_SESSION['status_aktif'] != 1){
    header("Location: index.php");
}

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

   <main>

      
      <!-- cart area -->
      <section class="cart-area pt-125 pb-200 wow fadeInUp" data-wow-duration=".8s" data-wow-delay=".2s">
         <div class="container">
         <div class="row">
            <div class="col-12">
                  <form action="#">
                     <div class="table-content table-responsive">
                        <table id="course-table" class="table">
                              <thead>
                                 <tr>
                                    <th class="course-product-name">Nama Course</th>
                                    <th class="course-product-materi">Materi</th>
                                    <th class="course-product-duration">Durasi</th>
                                    <th class="course-product-instruktur">Instruktur</th>
                                 </tr>
                              </thead>
                              <tbody>
                                <?php
                                $sql_kursus_list = $conn->prepare("SELECT m_kursus.id, m_kursus.durasi, m_kursus.nama, m_kursus.pengajar FROM m_mykursus INNER JOIN m_kursus ON m_mykursus.id_kursus = m_kursus.id WHERE m_mykursus.id_user = :id_user");
                                $sql_kursus_list->execute([':id_user' => $_SESSION['user_id']]);
                                while($data_kursus_list = $sql_kursus_list->fetch()){
                                ?>

                                <?php
                                    $sql_count_materi = $conn->prepare("SELECT COUNT(m_materi.id) FROM m_kursus INNER JOIN m_materi ON m_kursus.id = m_materi.id_kursus WHERE m_materi.status = 1 AND m_materi.id_kursus = :id_kursus");
                                    $sql_count_materi->execute([":id_kursus" => $data_kursus_list['id']]);
                                    $data_count_materi = $sql_count_materi->fetch();
                                    ?>
                                 <tr>
                                    <td class="product-name"><a href="course_details?p=<?php echo $data_kursus_list['id'] ?>"><?php echo $data_kursus_list['nama']; ?></a></td>
                                    <td class="product-materi"><span class="amount"><?php echo $data_count_materi['COUNT(m_materi.id)']; ?></span></td>
                                    <td class="product-duration"><span class="amount"><?php echo $data_kursus_list['durasi']; ?></span></td>
                                    <td class="product-instruktur"><span class="amount"><?php echo $data_kursus_list['pengajar']; ?></span></td>
                                 </tr>
                                <?php } ?>
                              </tbody>
                        </table>
                     </div>
                  </form>
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