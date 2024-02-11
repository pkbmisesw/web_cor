<?php
include '../../config.php'; // panggil perintah koneksi database
error_reporting(0);

session_start(); // Memulai sesi

/* Halaman ini tidak dapat diakses jika belum ada yang login(masuk) */
if (!isset($_SESSION['email'])) {
    header('Location: index.php');
    exit;
}

$template = "subpages";

// Fungsi untuk mengambil semua page dari database
function getAllPages($conn)
{
    $query = "SELECT id, nama FROM m_pages";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Mengambil data page untuk ditampilkan dalam dropdown
$pages = getAllPages($conn);
?>

<!-- Tambah Data Subpages -->
<h2>Tambah Data</h2>

<form action="../../controller/<?php echo $template; ?>_controller.php?op=tambah" method="post">
    <table>
        <tr>
            <td>Pages</td>
            <td> <select name="pages_id" id="page">
                    <?php foreach ($pages as $page) : ?>
                        <option value="<?= $page['id'] ?>"><?= htmlspecialchars($page['nama']) ?></option>
                    <?php endforeach; ?>
                </select>
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
                <input type="submit" name="submit" value="Add">
            </td>
        </tr>
    </table>
</form>