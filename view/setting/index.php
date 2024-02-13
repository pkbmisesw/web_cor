<?php
include '../../config.php';
include 'get.php';
error_reporting(0);

/* Halaman ini tidak dapat diakses jika belum ada yang login(masuk) */
if(isset($_SESSION['email'])== 0) {
	header('Location: index.php');
}

$data = get();

$master = "Setting";
$dba = "setting";
$ket = "";
$ketnama = "Silahkan mengisi nama";

?>

<h1>Edit Setting</h1>
<form action="../../controller/<?php echo $dba; ?>_controller.php?op=edit" enctype="multipart/form-data" method="post">
    <table>
        <tr>
            <td>Upload</td>
            <td><input type="file" name="gambar" /></td>
        </tr>
        <tr>
            <td>Nama</td>
            <td><input type="text" name="nama" value='<?php echo $data["nama"]; ?>' /></td>
        </tr>
        <tr>
            <td>Description</td>
            <td><input type="text" name="des" value='<?php echo $data["des"]; ?>' /></td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td><input type="text" name="alamat" value='<?php echo $data["alamat"]; ?>' /></td>
        </tr>
        <tr>
            <td>Running Text</td>
            <td><input type="text" name="run_text" value='<?php echo $data["run_text"]; ?>' /></td>
        </tr>
        <tr>
            <td>Nomor WA</td>
            <td><input type="text" name="wa" value='<?php echo $data["wa"]; ?>' /></td>
        </tr>
        <tr>
            <td>Kalimat WA</td>
            <td><input type="text" name="kata_wa" value='<?php echo $data["kata_wa"]; ?>' /></td>
        </tr>
        <tr>
            <td>SEO</td>
            <td><input type="text" name="seo" value='<?php echo $data["seo"]; ?>' /></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type="text" name="email" value='<?php echo $data["email"]; ?>' /></td>
        </tr>
        <tr>
            <td>Youtube Link</td>
            <td><input type="text" name="yt" value='<?php echo $data["yt"]; ?>' /></td>
        </tr>
        <tr>
            <td>
                <input type="submit" value="Edit" />
            </td>
        </tr>
    </table>
</form>