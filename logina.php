<?php
error_reporting(0);
include 'config.php';

$sql_setting = "SELECT * FROM setting ORDER BY id DESC";
$stmt = $conn->prepare($sql_setting);
$stmt->execute();
$row_setting = $stmt->fetch();
$status = 0;

if(isset($_POST['login'])){
    $email    = $_POST['email'];
    $password = $_POST['pass'];

    try {
        $sql = "SELECT * FROM m_user WHERE email = :email";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        $row = $stmt->fetch();
        if ($row && password_verify($password, $row['password'])) {
            $_SESSION['email'] = $email;
            $_SESSION['nama'] = $row['nama'];
            $_SESSION['password'] = $row['password'];
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['level_id'] = $row['level_id'];
            $_SESSION['status_aktif'] = $row['status_aktif'];
            header("Location: index.php");
            exit;
        } else {
            $status = 1;
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
?>

<?php
include 'head.php';
include 'navbar.php';
?>


   <main>

      <!-- login-area-strat -->
      <section class="login-area pt-100 pb-100 wow fadeInUp" data-wow-duration=".8s" data-wow-delay=".5s">
         <div class="container">
               <div class="row">
                  <div class="col-lg-8 offset-lg-2">
                     <div class="basic-login">
                           <h3 class="text-center mb-60">Login From Here</h3>
                         <?php if($status == 1){?>
                             <div class="alert alert-danger mb-35" role="alert">
                                 Incorrect email or password.
                             </div>
                         <?php } ?>
                           <form action="" method="post">
                              <label for="name">Email <span>*</span></label>
                              <input id="email" name="email" type="text" placeholder="Enter email..." required />
                              <label for="pass">Password <span>*</span></label>
                              <input id="pass" name="pass" type="password" placeholder="Enter password..." required />
                              <div class="mt-10"></div>
                              <button name="login" type="submit" class="tp-btn w-100">login Now</button>
                              <div class="or-divide"><span>or</span></div>
							  <a href="register" class="tp-border-btn w-100">Register Now</a>
                           </form>
                     </div>
                  </div>
               </div>
         </div>
      </section>
      <!-- login-area-strat-end -->               
           

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