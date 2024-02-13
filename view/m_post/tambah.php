<?php
include '../../config.php'; // panggil perintah koneksi database
error_reporting(0);

/* Halaman ini tidak dapat diakses jika belum ada yang login(masuk) */
if (isset($_SESSION['email']) == 0) {
    header('Location: index.php');
}

$template = "post";

?>

<!-- DAFTAR -->
<h2>Tambah Data</h2>

<form action="../../controller/<?php echo $template; ?>_controller.php?op=tambah" method="post">
    <table>
        <tr>
            <td>Title</td>
            <td><input type="text" name="title"></td>
        </tr>
        <tr>
            <td>Penulis</td>
            <td><input type="text" name="penulis"></td>
        </tr>
        <tr>
            <td>Tanggal</td>
            <td><input type="text" name="tanggal"></td>
        </tr>
        <tr>
            <td>Status</td>
            <td><input type="number" name="status">
            1. Aktif
            2. Slide
            3. Berita Utama
            4. Konten
            5. Utama
            6. Mitra
            7. Icon
            8. Web
            9. Gambar
        </td>
            
        </tr>
        
        <tr>
            <td>No. Urut</td>
            <td><input type="number" name="no_urut"></td>
        </tr>
        <tr>
            <td>
                <input type="submit" name="submit" value="Add">
            </td>
        </tr>
    </table>
</form>