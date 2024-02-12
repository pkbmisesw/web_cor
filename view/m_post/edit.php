<?php
include '../../config.php';
include 'components.php';
error_reporting(0);

/* Halaman ini tidak dapat diakses jika belum ada yang login(masuk) */
if (isset($_SESSION['email']) == 0) {
    header('Location: index.php');
}

$template = "post";

$pageData = getPostById($_GET['id']);

?>

<h1>Edit Post</h1>
<form action="../../controller/<?php echo $template; ?>_controller.php?op=edit" enctype="multipart/form-data" method="post">
    <table>
        <input type="hidden" name="id" value='<?php echo $_GET["id"]; ?>' />
        <tr>
            <td>Title</td>
            <td><input type="text" name="title" value="<?= $pageData['nama']; ?>">
        </tr>
        <tr>
            <td>Gambar</td>
            <td><input type="file" name="gambar" value="<?= $pageData['gambar']; ?>"></td>
        </tr>
        <tr>
            <td>Penulis</td>
            <td><input type="text" name="penulis" value="<?= $pageData['penulis']; ?>"></td>
        </tr>
        <tr>
            <td>Tanggal</td>
            <td><input type="text" name="tanggal" value="<?= $pageData['tgl']; ?>"></td>
        </tr>
        <tr>
            <td>Status</td>
            <td><input type="number" name="status" value="<?= $pageData['stat']; ?>"></td>
        </tr>
        <tr>
            <td>No. Urut</td>
            <td><input type="number" name="no_urut" value="<?= $pageData['no_urut']; ?>"></td>
        </tr>
        <tr>
            <td>
                <input type="submit" value="Edit" />
            </td>
        </tr>
    </table>
</form>