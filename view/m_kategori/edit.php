<?php
include '../../config.php';
include 'get.php';
error_reporting(0);

/* Halaman ini tidak dapat diakses jika belum ada yang login(masuk) */
if(isset($_SESSION['email'])== 0) {
	header('Location: index.php');
}

$data = getid($_GET['id']);

$master = "Kategori";
$dba = "kategori";
$ket = "";
$ketnama = "Silahkan mengisi nama";

?>

<h1>Edit </h1>
<form action="../../controller/<?php echo $dba; ?>_controller.php?op=edit" method="post">
    <table>
        <input type="hidden" name="id" value='<?php echo $_GET["id"]; ?>' />
        <tr>
            <td>Nama</td>
            <td><input type="text" name="nama" value='<?php echo $data["nama"]; ?>' /></td>
        </tr>
        <tr>
            <td>Deskripsi</td>
            <td><input type="text" name="des" value='<?php echo $data["des"]; ?>' /></td>
        </tr>
        <tr>
            <td>
                <input type="submit" value="Edit" />
            </td>
        </tr>
    </table>
</form>