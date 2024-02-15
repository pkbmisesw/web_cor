<?php
include '../../config.php';
include 'get.php';
error_reporting(0);

/* Halaman ini tidak dapat diakses jika belum ada yang login(masuk) */
if(isset($_SESSION['email'])== 0) {
    header('Location: index.php');
}

$master = "Kursus";
$dba = "kursus";
$ket = "";
$ketnama = "Silahkan mengisi nama";

$data = getid($_GET['id']);

?>

<h1>Edit</h1>
<form action="../../controller/<?php echo $dba; ?>_controller.php?op=edit" method="post" enctype="multipart/form-data">
    <table>
        <input type="hidden" name="id" value='<?php echo $_GET["id"]; ?>' />
        <tr>
            <td>Kategori</td>
            <td>
                <select name="id_kat">
                    <?php
                    $sql_kategori = $conn->prepare("SELECT * FROM m_kategori ORDER BY id DESC");
                    $sql_kategori->execute();
                    while($data_kategori = $sql_kategori->fetch()){
                    ?>
                    <option value="<?php echo $data_kategori['id']; ?>" <?php echo ($data['id_kat'] == $data_kategori['id']) ? 'selected' : ''; ?>><?php echo $data_kategori['nama'] ?></option>
                    <?php } ?>
                </select>
            </td>
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
            <td>Harga</td>
            <td><input type="text" name="harga" value="<?php echo $data["harga"]; ?>" ></td>
        </tr>
        <tr>
            <td>Pic</td>
            <td><input type="file" name="pic" id="pic" /></td>
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