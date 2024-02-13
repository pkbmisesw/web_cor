<?php
include '../../config.php';
include 'get.php';
error_reporting(0);


if (!isset($_SESSION['email'])) {
    header('Location: ../../login.php');
    exit;
}

$master = "Pages";
$dba = "pages";
$ket = "";
$ketnama = "Silahkan mengisi nama";

$pageId = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$pageData = getid($pageId);

if (!$pageData) {
    echo "Halaman tidak ditemukan!";
    exit;
}
?>

<h1>Edit Pages</h1>
<form action="../../controller/<?php echo $dba; ?>_controller.php?op=edit" enctype="multipart/form-data" method="post">
    <input type="hidden" name="id" value="<?php echo htmlspecialchars($pageData["id"]); ?>" />
    <table>
        <tr>
            <td>Urut</td>
            <td><input type="number" name="urut" value="<?php echo htmlspecialchars($pageData["urut"]); ?>" /></td>
        </tr>
        <tr>
            <td>Nama</td>
            <td><input type="text" name="nama" value="<?php echo htmlspecialchars($pageData["nama"]); ?>" /></td>
        </tr>
        <tr>
            <td>Gambar</td>
            <td><input type="file" name="gambar"></td>
        </tr>
        <tr>
            <td>Des</td>
            <td><input type="text" name="des" value="<?php echo htmlspecialchars($pageData["des"]); ?>" /></td>
        </tr>
        <tr>
            <td>View</td>
            <td><input type="text" name="view" value="<?php echo htmlspecialchars($pageData["view"]); ?>" /></td>
        </tr>
        <tr>
            <td>SEO</td>
            <td><input type="text" name="seo" value="<?php echo htmlspecialchars($pageData["seo"]); ?>" /></td>
        </tr>
        <tr>
            <td>Status</td>
            <td>
                <select name="status">
                    <option value="1" <?php echo $pageData["status"] == 1 ? 'selected' : ''; ?>>Ada Sub Halaman</option>
                    <option value="0" <?php echo $pageData["status"] == 0 ? 'selected' : ''; ?>>Aktif</option>
                    <option value="3" <?php echo $pageData["status"] == 3 ? 'selected' : ''; ?>>Custom Halaman</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>URL</td>
            <td><input type="text" name="url" value="<?php echo htmlspecialchars($pageData["url"]); ?>"
                    placeholder="pages?p=" /></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" value="Edit" /></td>
        </tr>
    </table>
</form>