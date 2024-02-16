<?php
ini_set('display_errors', 0);
include "../config.php";
session_start();

$op = $_GET['op'];
if($op == "edit"){

        $id = $_POST['id'];
        $id_kursus = $_POST['id_kursus'];
        $no_urut = $_POST['no_urut'];
        $nama = $_POST['nama'];
        $des = $_POST['des'];
        $status = $_POST['status'];

        try {
            $sql = "UPDATE m_materi SET 
            id_kursus = :id_kursus, 
            no_urut = :no_urut, 
            nama = :nama, 
            des = :des,
            status = :status
			WHERE id = $id";

            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':id_kursus', $id_kursus);
            $stmt->bindParam(':no_urut', $no_urut);
            $stmt->bindParam(':nama', $nama);
            $stmt->bindParam(':des', $des);
            $stmt->bindParam(':status', $status);
            $stmt->execute();

        }
        catch(PDOException $e) {
            echo $e->getMessage();
        }

        if(!$stmt){
            echo "<script>alert('Gagal Data telah dirubah'); document.location.href=('../view/m_materi/')</script>";
        }

        echo "<script>alert('Data telah dirubah'); document.location.href=('../view/m_materi/')</script>";
}else if ($op == "hapus"){
        $id = $_GET['id'];

        $sql = "DELETE FROM m_materi WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        if(!$stmt){
            echo "<script>alert('Gagal Menghapus'); document.location.href=('../view/m_materi/')</script>";
        }

        echo "<script>alert('Berhasil Menghapus'); document.location.href=('../view/m_materi/')</script>";
} else if ($op == "tambah"){
        $id_kursus = $_POST['id_kursus'];
        $no_urut = $_POST['no_urut'];
        $nama = $_POST['nama'];
        $des = $_POST['des'];
        $status = $_POST['status'];

        try{
            $sql = "INSERT INTO m_materi (id_kursus, no_urut, nama, des, status) VALUES (:id_kursus, :no_urut, :nama, :des, :status)";
            $stmt = $conn->prepare($sql);

            $stmt->bindValue(":id_kursus", $id_kursus);
            $stmt->bindValue(":no_urut", $no_urut);
            $stmt->bindValue(":nama", $nama);
            $stmt->bindValue(":des", $des);
            $stmt->bindValue(":status", $status);

            $result = $stmt->execute();

            if(!$result){
                echo "<script>alert('Gagal Menambahkan'); document.location.href=('../view/m_materi/')</script>";
            }

            echo "<script>alert('Berhasil Menambahkan'); document.location.href=('../view/m_materi/')</script>";
        }catch(PDOException $e){
            echo $e->getMessage();
        }

        // echo "<script>document.location.href=('../view/m_user/')</script>";
}