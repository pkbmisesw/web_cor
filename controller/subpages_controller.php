<?php
ini_set('display_errors', 1);
include "../config.php";
session_start();

if (!isset($_SESSION['email'])) {
    header('Location: ../../index.php', true, 303);
    exit;
}

$op = $_GET['op'];
if($op == "edit"){
            $id = $_POST['id'];
            $pages_id = $_POST['pages_id'];
            $nama = $_POST['nama'];
            $des = $_POST['des'];

            try {
                $sql = "UPDATE m_subpages SET pages_id = :pages_id, nama = :nama, des = :des WHERE id = :id";
                $stmt = $conn->prepare($sql);
                $stmt->execute([':pages_id' => $pages_id, ':nama' => $nama, ':des' => $des, ':id' => $id]);
            }catch(PDOException $e) {
                echo $e->getMessage();
            }

            if(!$stmt){
                echo "<script>alert('Gagal Data telah dirubah'); document.location.href=('../view/m_subpages/')</script>";
            }
    
            echo "<script>alert('Data telah dirubah'); document.location.href=('../view/m_subpages/')</script>";
}else if ($op == "hapus"){
            $id = $_GET['id'];
            $sql = "DELETE FROM m_subpages WHERE id = :id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            if(!$stmt){
                echo "<script>alert('Gagal Menghapus'); document.location.href=('../view/m_subpages/')</script>";
            }
    
            echo "<script>alert('Berhasil Menghapus'); document.location.href=('../view/m_subpages/')</script>";
} else if ($op == "tambah"){
            $nama = $_POST['nama'];
            $des = $_POST['des'];
            $pages_id = $_POST['pages_id'];

            $sql = "INSERT INTO m_subpages (nama, des, pages_id) VALUES (:nama, :des, :pages_id)";
            $stmt = $conn->prepare($sql);
            $stmt->execute([':nama' => $nama, ':des' => $des, ':pages_id' => $pages_id]);
      

    // Redirect on success
    header('Location: ../view/m_subpages/', true, 303);
    
}
