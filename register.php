<?php
include 'config.php';

$sql_setting = "SELECT * FROM setting ORDER BY id DESC";
$stmt = $conn->prepare($sql_setting);
$stmt->execute();
$row_setting = $stmt->fetch();
$status = 0;

if(isset($_POST['register'])){
    $username    = $_POST['username'];
    $email    = $_POST['email'];
    $password = $_POST['password'];

    try{
        $sql = $conn->prepare("INSERT INTO m_user (nama, email, password, status_aktif, level_id) VALUES (:nama, :email, :password, 0, 3)");
        $result = $sql->execute([":nama" => $username, ":email" => $email, ":password" => password_hash($password, PASSWORD_BCRYPT)]);
        if($result){
            header("Location: logina");
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
                           <h3 class="text-center mb-60">Signup From Here</h3>
                           <form action="" method="POST">
                              <label for="name">Username <span>*</span></label>
                              <input id="name" name="username" type="text" placeholder="Enter username..." required />
                              <label for="email-id">Email Address <span>*</span></label>
                              <input id="email-id" name="email" type="email" placeholder="Enter email address..." required />
                              <label for="pass">Password <span>*</span></label>
                              <input id="pass" name="password" type="password" placeholder="Enter password..." required />
                              <div class="mt-10"></div>
                              <button name="register" type="submit" class="tp-btn w-100">Register Now</button>
                              <div class="or-divide"><span>or</span></div>
                              <a href="logina" class="tp-border-btn w-100">login Now</a>
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
</body>

</html>