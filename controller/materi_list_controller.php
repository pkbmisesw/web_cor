<?php
ini_set('display_errors', 0);
include "../config.php";
session_start();

$op = $_GET['op'];
if($op == "edit"){

        $id = $_POST['id'];
        $id_materi = $_POST['id_materi'];
        $no_urut = $_POST['no_urut'];
        $nama = $_POST['nama'];
        $des = $_POST['des'];
        $status = $_POST['status'];
        $url = $_POST['url'];

        try {
            $sql = "UPDATE m_materi_list SET 
            id_materi = :id_materi, 
            no_urut = :no_urut, 
            nama = :nama, 
            des = :des,
            status = :status,
            url = :url
			WHERE id = $id";

            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':id_materi', $id_materi);
            $stmt->bindParam(':no_urut', $no_urut);
            $stmt->bindParam(':nama', $nama);
            $stmt->bindParam(':des', $des);
            $stmt->bindParam(':status', $status);
            $stmt->bindParam(':url', $url);
            $stmt->execute();

        }
        catch(PDOException $e) {
            echo $e->getMessage();
        }

        if(!$stmt){
            echo "<script>alert('Gagal Data telah dirubah'); document.location.href=('../view/m_materi_list/')</script>";
        }

        echo "<script>alert('Data telah dirubah'); document.location.href=('../view/m_materi_list/')</script>";
}else if ($op == "hapus"){
        $id = $_GET['id'];

        $sql = "DELETE FROM m_materi_list WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        if(!$stmt){
            echo "<script>alert('Gagal Menghapus'); document.location.href=('../view/m_materi_list/')</script>";
        }

        echo "<script>alert('Berhasil Menghapus'); document.location.href=('../view/m_materi_list/')</script>";
} else if ($op == "tambah"){
        $id_materi = $_POST['id_materi'];
        $no_urut = $_POST['no_urut'];
        $nama = $_POST['nama'];
        $des = $_POST['des'];
        $status = $_POST['status'];
        $url = $_POST['url'];

        try{
            $sql = "INSERT INTO m_materi_list (id_materi, no_urut, nama, des, status, url) VALUES (:id_materi, :no_urut, :nama, :des, :status, :url)";
            $stmt = $conn->prepare($sql);

            $stmt->bindParam(':id_materi', $id_materi);
            $stmt->bindParam(':no_urut', $no_urut);
            $stmt->bindParam(':nama', $nama);
            $stmt->bindParam(':des', $des);
            $stmt->bindParam(':status', $status);
            $stmt->bindParam(':url', $url);

            $result = $stmt->execute();

            if(!$result){
                echo "<script>alert('Gagal Menambahkan'); document.location.href=('../view/m_materi_list/')</script>";
            }

            echo "<script>alert('Berhasil Menambahkan'); document.location.href=('../view/m_materi_list/')</script>";
        }catch(PDOException $e){
            echo $e->getMessage();
        }

        // echo "<script>document.location.href=('../view/m_user/')</script>";
}