<?php 
include '../../config.php'; // panggil perintah koneksi database
error_reporting(0);

/* Halaman ini tidak dapat diakses jika belum ada yang login(masuk) */
if(isset($_SESSION['email'])== 0) {
    header('Location: index.php');
}

$master = "Kategori";
$dba = "kategori";
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
            <td>Deskripsi</td>
            <td><input type="text" name="des"></td>
        </tr>
        <tr>
            <td>
                <input type="submit" name="register" value="Add">
            </td>
        </tr>
    </table>
</form>