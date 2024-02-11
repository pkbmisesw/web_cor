<?php
ini_set('display_errors', 0);
include "../config.php";
session_start();

$op = $_GET['op'];
if($op == "edit"){

        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $des = $_POST['des'];

        try {
            $sql = "UPDATE m_kategori SET 
            nama = :nama, 
            des = :des
			WHERE id = $id";

            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':nama', $nama);
            $stmt->bindParam(':des', $des);
            $stmt->execute();

        }
        catch(PDOException $e) {
            echo $e->getMessage();
        }

        if(!$stmt){
            echo "<script>alert('Gagal Data telah dirubah'); document.location.href=('../view/m_kategori/')</script>";
        }

        echo "<script>alert('Data telah dirubah'); document.location.href=('../view/m_kategori/')</script>";
}else if ($op == "hapus"){
        $id = $_GET['id'];

        $sql = "DELETE FROM m_kategori WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        if(!$stmt){
            echo "<script>alert('Gagal Menghapus'); document.location.href=('../view/m_kategori/')</script>";
        }

        echo "<script>alert('Berhasil Menghapus'); document.location.href=('../view/m_kategori/')</script>";
} else if ($op == "tambah"){
        $nama = $_POST['nama'];
        $des = $_POST['des'];

        try{
            $sql = "INSERT INTO m_kategori (nama, des) VALUES (:nama, :des)";
            $stmt = $conn->prepare($sql);

            $stmt->bindValue(":nama", $nama);
            $stmt->bindValue(":des", $des);

            $result = $stmt->execute();

            if(!$result){
                echo "<script>alert('Gagal Menambahkan Kategori'); document.location.href=('../view/m_kategori/')</script>";
            }

            echo "<script>alert('Berhasil Menambahkan Kategori'); document.location.href=('../view/m_kategori/')</script>";
        }catch(PDOException $e){
            echo $e->getMessage();
        }

        // echo "<script>document.location.href=('../view/m_user/')</script>";
}