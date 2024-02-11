<?php
include '../../config.php'; // panggil perintah koneksi database
error_reporting(0);

/* Halaman ini tidak dapat diakses jika belum ada yang login(masuk) */
if(isset($_SESSION['email'])== 0) {
    header('Location: index.php');
}

$master = "Surat";
$dba = "surat";
$ket = "";
$ketnama = "Silahkan mengisi nama";

?>

<!-- DAFTAR -->
<h2>Tambah Data</h2>

<form action="../../controller/<?php echo $dba; ?>_controller.php?op=tambah" method="post">
    <table>
        <tr>
            <td>Nama</td>
            <td><input type="text" name="nama"></td>
        </tr>
        <tr>
            <td>Tanggal</td>
            <td><input type="text" name="tgl"></td>
        </tr>
        <tr>
            <td>Status</td>
            <td><input type="text" name="status"></td>
        </tr>
    </table>
    <small>* 0 = Surat Masuk, 1 = Surat Keluar, 2 = Produk Hukum</small><br>
    <input type="submit" name="register" value="Add">
</form>