<?php
include '../../config.php';
error_reporting(0);

if (isset($_SESSION['email']) == 0) {
    header('Location: ../../index.php');
}

// Mengambil data pages
$sqlPages = "SELECT id, nama FROM m_pages";
$stmtPages = $conn->prepare($sqlPages);
$stmtPages->execute();
$pages = $stmtPages->fetchAll();

$id = isset($_GET['id']) ? $_GET['id'] : '';
$sqlSubpage = $conn->prepare("SELECT * FROM m_subpages WHERE id = ?");
$sqlSubpage->execute([$id]);
$subpage = $sqlSubpage->fetch();

if (!$subpage) {
    echo "<script>alert('Data tidak ditemukan.'); window.location.href='index.php';</script>";
}

$template = "subpages";
?>

<h2>Edit Subpage</h2>
<form action="../../controller/<?php echo $template; ?>_controller.php?op=edit" method="post">
    <input type="hidden" name="id" value="<?php echo $subpage['id']; ?>">
    <table>
        <tr>
            <td>Page</td>
            <td>
                <select name="pages_id">
                    <?php foreach ($pages as $page) : ?>
                    <option value="<?= htmlspecialchars($page['id']) ?>"
                        <?= $page['id'] == $subpage['pages_id'] ? 'selected' : '' ?>>
                        <?= htmlspecialchars($page['nama']) ?> - <?= htmlspecialchars($page['id']) ?> </option>
                    <?php endforeach; ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Nama</td>
            <td><input type="text" name="nama" value="<?php echo htmlspecialchars($subpage['nama']); ?>"></td>
        </tr>
        <tr>
            <td>Description</td>
            <td><textarea name="des"><?php echo htmlspecialchars($subpage['des']); ?></textarea></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" value="Update"></td>
        </tr>
    </table>
</form>