<?php
include '../../config.php';
error_reporting(0);

/* Halaman ini tidak dapat diakses jika belum ada yang login(masuk) */
if(isset($_SESSION['email'])== 0) {
	header('Location: ../../index.php');
}
?>
hi : <?php echo $_SESSION['email']; ?> - 
<a href="../../logout">Logout</a>
<?php
include ("../sidebar.php");
?>

<h5>Selamat Datang di Dashboard</h5>




