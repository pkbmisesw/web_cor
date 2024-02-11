<?php
include '../../config.php';
include 'get.php';
error_reporting(0);

/* Halaman ini tidak dapat diakses jika belum ada yang login(masuk) */
if(isset($_SESSION['email'])== 0) {
	header('Location: index.php');
}

$data = getid($_GET['id']);

$master = "Users";
$dba = "user";
$ket = "";
$ketnama = "Silahkan mengisi nama";

?>

<h1>Edit User</h1>
<form action="../../controller/<?php echo $dba; ?>_controller.php?op=edit" method="post">
    <table>
        <input type="hidden" name="id" value='<?php echo $_GET["id"]; ?>' />
        <tr>
            <td>Nama</td>
            <td><input type="text" name="nama" value='<?php echo $data["nama"]; ?>' /></td>
        </tr>
        <tr>
            <td>Level ID</td>
            <td><input type="text" name="level_id" value='<?php echo $data["level_id"]; ?>' /></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type="text" name="email" value='<?php echo $data["email"]; ?>' /></td>
        </tr>
        <tr>
            <td>Status Aktif</td>
            <td><input type="text" name="status_aktif" value='<?php echo $data["status_aktif"]; ?>' /></td>
        </tr>
        <tr>
            <td>HP</td>
            <td><input type="text" name="hp" value='<?php echo $data["hp"]; ?>' /></td>
        </tr>
        <tr>
            <td>
                <input type="submit" value="Edit" />
            </td>
        </tr>
    </table>
</form>