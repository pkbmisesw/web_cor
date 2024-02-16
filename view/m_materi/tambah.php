<?php
include '../../config.php'; // panggil perintah koneksi database
error_reporting(0);

/* Halaman ini tidak dapat diakses jika belum ada yang login(masuk) */
if(isset($_SESSION['email'])== 0) {
    header('Location: index.php');
}

$master = "Materi";
$dba = "materi";
$ket = "";
$ketnama = "Silahkan mengisi nama";

?>

<!-- DAFTAR -->
<h2>Tambah Data</h2>

<form action="../../controller/<?php echo $dba; ?>_controller.php?op=tambah" method="post">
    <table>
        <tr>
            <td>Kursus</td>
            <td><select name="id_kursus">
                    <?php
                    $sql = $conn->prepare("SELECT * FROM m_kursus ORDER BY id DESC");
                    $sql->execute();
                    while ($data = $sql->fetch()) {
                    ?>
                        <option value='<?php echo $data['id']; ?>'><?php echo $data['nama']; ?></option>
                    <?php
                    }
                    ?>
                </select></td>
        </tr>
        <tr>
            <td>No Urut</td>
            <td><input type="text" name="no_urut"></td>
        </tr>
        <tr>
            <td>Nama</td>
            <td><input type="text" name="nama"></td>
        </tr>
        <tr>
            <td>Deskripsi</td>
            <td><input type="text" name="des"></td>
        </tr>
        <tr>
            <td>Status</td>
            <td><input type="text" name="status"></td>
        </tr>
    </table>
    <input type="submit" name="register" value="Add">
</form>