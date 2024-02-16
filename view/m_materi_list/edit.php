<?php
include '../../config.php';
include 'get.php';
error_reporting(0);

/* Halaman ini tidak dapat diakses jika belum ada yang login(masuk) */
if(isset($_SESSION['email'])== 0) {
    header('Location: index.php');
}

$master = "Materi List";
$dba = "materi_list";
$ket = "";
$ketnama = "Silahkan mengisi nama";

$data = getid($_GET['id']);

?>

<h1>Edit</h1>
<form action="../../controller/<?php echo $dba; ?>_controller.php?op=edit" method="post" enctype="multipart/form-data">
    <table>
        <input type="hidden" name="id" value='<?php echo $_GET["id"]; ?>' />
        <tr>
            <td>Materi</td>
            <td>
                <select name="id_materi">
                    <?php
                    $sql_kursus = $conn->prepare("SELECT * FROM m_materi ORDER BY id DESC");
                    $sql_kursus->execute();
                    while($data_kursus = $sql_kursus->fetch()){
                    ?>
                    <option value="<?php echo $data_kursus['id']; ?>" <?php echo ($data['id_kursus'] == $data_kursus['id']) ? 'selected' : ''; ?>><?php echo $data_kursus['nama'] ?></option>
                    <?php } ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>No Urut</td>
            <td><input type="text" name="no_urut" value='<?php echo $data["no_urut"]; ?>' /></td>
        </tr>
        <tr>
            <td>Nama</td>
            <td><input type="text" name="nama" value='<?php echo $data["nama"]; ?>' /></td>
        </tr>
        <tr>
            <td>Deskripsi</td>
            <td><input type="text" name="des" value="<?php echo $data["des"]; ?>" ></td>
        </tr>
        <tr>
            <td>URL</td>
            <td><input type="text" name="url" value="<?php echo $data["url"]; ?>" ></td>
        </tr>
        <tr>
            <td>Status</td>
            <td><input type="text" name="status" value="<?php echo $data["status"]; ?>" /></td>
        </tr>
        <tr>
            <td>
                <input type="submit" value="Edit" />
            </td>
        </tr>
    </table>
</form>