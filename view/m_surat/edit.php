<?php
include '../../config.php';
include 'get.php';
error_reporting(0);

/* Halaman ini tidak dapat diakses jika belum ada yang login(masuk) */
if(isset($_SESSION['email'])== 0) {
    header('Location: index.php');
}

$master = "Surat";
$dba = "surat";
$ket = "";
$ketnama = "Silahkan mengisi nama";

$data = getid($_GET['id']);

?>

<h1>Edit Surat</h1>
<form action="../../controller/<?php echo $dba; ?>_controller.php?op=edit" method="post" enctype="multipart/form-data">
    <table>
        <input type="hidden" name="id" value='<?php echo $_GET["id"]; ?>' />
        <tr>
            <td>Nama</td>
            <td><input type="text" name="nama" value='<?php echo $data["nama"]; ?>' /></td>
        </tr>
        <tr>
            <td>Tanggal</td>
            <td><input type="text" name="tgl" value='<?php echo $data["tgl"]; ?>' /></td>
        </tr>
        <tr>
            <td>Gambar</td>
            <td><input type="file" name="gambar" id="gambar" /></td>
        </tr>
        <tr>
            <td>Status</td>
            <td><input type="text" name="status" value='<?php echo $data["stat"]; ?>' /></td>
        </tr>
        <tr>
            <td>
                <input type="submit" value="Edit" />
            </td>
        </tr>
    </table>
</form>