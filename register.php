<?php
include 'config.php';
error_reporting(0);

$sql_setting = "SELECT * FROM setting ORDER BY id DESC";
$stmt = $conn->prepare($sql_setting);
$stmt->execute();
$row_setting = $stmt->fetch();
$status = 0;

if(isset($_POST['register'])){
    $nama    = $_POST['nama'];
    $hp = $_POST['hp'];
    $email    = $_POST['email'];
    $password = $_POST['password'];

    try{
        $sql = $conn->prepare("INSERT INTO m_user (nama, email, hp, password, status_aktif, level_id) VALUES (:nama, :email, :hp, :password, 0, 3)");
        $result = $sql->execute([":nama" => $nama, ":email" => $email, ":password" => password_hash($password, PASSWORD_BCRYPT), ":hp" => $hp]);
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
                           <h3 class="text-center mb-60">Daftar Akun Disini</h3>
                           <form action="" method="POST">
                              <label for="name">Nama Lengkap <span>*</span></label>
                              <input id="name" name="nama" type="text" placeholder="Masukkan nama lengkap..." required />
                               <label for="name">Nomor WA <span>*</span></label>
                               <input id="hp" name="hp" type="text" placeholder="Masukkan nomor wa..." required />
                              <label for="email-id">Alamat Email <span>*</span></label>
                              <input id="email-id" name="email" type="email" placeholder="Masukkan alamat email..." required />
                              <label for="pass">Password <span>*</span></label>
                              <input id="pass" name="password" type="password" placeholder="Masukkan password..." required />
                              <div class="mt-10"></div>
                              <button name="register" type="submit" class="tp-btn w-100">Daftar Sekarang</button>
                              <div class="or-divide"><span>atau</span></div>
                              <a href="logina" class="tp-border-btn w-100">login</a>
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