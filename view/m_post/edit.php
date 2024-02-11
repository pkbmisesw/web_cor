<?php
include '../../config.php';
include 'components.php';
error_reporting(0);

/* Halaman ini tidak dapat diakses jika belum ada yang login(masuk) */
if (isset($_SESSION['email']) == 0) {
    header('Location: index.php');
}

$template = "pages";

$pageData = getUserById($_GET['id']);

?>

<h1>Edit Pages</h1>
<form action="../../controller/<?php echo $template; ?>_controller.php?op=edit" method="post">
    <table>
        <input type="hidden" name="id" value='<?php echo $_GET["id"]; ?>' />
        <tr>
            <td>Nama</td>
            <td><input type="text" name="nama" value='<?php echo $pageData["nama"]; ?>' /></td>
        </tr>
        <tr>
            <td>Description</td>
            <td><textarea name="des" id="" cols="30" rows="10" value='<?php echo $pageData["des"]; ?>'></textarea></td>
        </tr>
        <tr>
            <td>
                <input type="submit" value="Edit" />
            </td>
        </tr>
    </table>
</form>