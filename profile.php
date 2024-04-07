<?php
include 'config.php';
error_reporting(0);

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

      <!-- instructor-portfolio-area -->
      <section class="instructor-portfolio pt-120 pb-80 wow fadeInUp" data-wow-duration=".8s" data-wow-delay=".2s">
         <div class="container">
            <div class="row">
                <?php
                $sql_user = $conn->prepare("SELECT COUNT(m_mykursus.id), m_user.nama, m_user.email, m_user.hp, m_user.uang, m_user.level_id FROM m_user INNER JOIN m_mykursus ON m_user.id = m_mykursus.id_user WHERE m_user.id=:id_user");
                $sql_user->execute([":id_user" => $_SESSION['user_id']]);
                $data_user = $sql_user->fetch();
                ?>

               <div class="col-xl-4 col-lg-5">
                  <div class="instruc-sidebar mb-40">
                     <div class="isntruc-side-thumb mb-30">
                        <img src="web_assets/img/avatar.png" alt="instructor-thumb">
                     </div>
                     <div class="instructor-sidebar-widget">
                        <div class="isntruc-side-content text-center">
                           <h4 class="side-instructor-title mb-15"><?php echo $data_user['nama']; ?></h4>
                           <p><?php echo ($data_user['level_id'] == 3) ? "Student" : ''; ?></p>
                        </div>
                        <div class="cd-information instruc-profile-info mb-35">
                           <ul>
                              <li><i class="fi fi-rr-envelope"></i> <label>Email</label> <span><?php echo $data_user['email']; ?></span></li>
                               <li><i class="fi fi-rr-phone-call"></i> <label>Nomor Wa</label> <span><?php echo $data_user['hp']; ?></span></li>
                              <li><i class="far fa-money-bill-wave"></i> <label>Uang</label> <span><?php echo "Rp. " . number_format($data_user['uang'], 0, null, '.').",-" ?></span></li>
                              <li><i class="fa-sharp fa-light fa-scroll"></i> <label>Enrolled</label> <span><?php echo $data_user['COUNT(m_mykursus.id)']; ?></span></li>
                           </ul>
                        </div>
                        <div class="c-details-social" hidden>
                           <h5 class="cd-social-title mb-25">Follow More:</h5>
                           <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                           <a href="#"><i class="fa-brands fa-twitter"></i></a>
                           <a href="#"><i class="fa-brands fa-instagram"></i></a>
                           <a href="#"><i class="fa-brands fa-youtube"></i></a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- instructor-portfolio-area-end -->

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