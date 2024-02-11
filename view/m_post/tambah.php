<?php
include '../../config.php'; // panggil perintah koneksi database
error_reporting(0);

/* Halaman ini tidak dapat diakses jika belum ada yang login(masuk) */
if (isset($_SESSION['email']) == 0) {
    header('Location: index.php');
}

$template = "subpages";


?>

<!-- DAFTAR -->
<h2>Tambah Data</h2>

<form action="../../controller/<?php echo $template; ?>_controller.php?op=tambah" method="post">
    <table>
        <tr>
            <td for="page">Pages</td>
            <td> <select name="page_id" id="page">
                    <?php foreach ($pages as $page) : ?>
                        <option value="<?= $page['id'] ?>"><?= htmlspecialchars($page['nama']) ?></option>
                    <?php endforeach; ?>
                </select></td>
        </tr>

        <tr>
            <td>Nama</td>
            <td><input type="text" name="nama"></td>
        </tr>
        <tr>
            <td>Description</td>
            <td><textarea name="des" cols="30" rows="10"></textarea></td>
        </tr>
        <tr>
            <td>
                <input type="submit" name="pages" value="Add">
            </td>
        </tr>
    </table>
</form>