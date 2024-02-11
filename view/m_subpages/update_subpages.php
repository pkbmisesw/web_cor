<?php
include '../../config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $des = $_POST['des'];

    $sql = "UPDATE m_subpages SET nama = ?, des = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $result = $stmt->execute([$nama, $des, $id]);

    if ($result) {
        echo "<script>alert('Data berhasil diperbarui.'); window.location.href='index.php';</script>";
    } else {
        echo "<script>alert('Gagal memperbarui data.'); window.location.href='edit.php?id=" . $id . "';</script>";
    }
} else {
    header('Location: index.php');
}
