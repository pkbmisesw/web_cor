<?php
ini_set('display_errors', 0);
include "../config.php";
session_start();

$op = $_GET['op'];
if($op == "edit"){

        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $level_id = $_POST['level_id'];
        $email = $_POST['email'];
        $status_aktif = $_POST['status_aktif'];
        $hp = $_POST['hp'];

        try {
            $sql = "UPDATE m_user SET 
            nama = :nama, 
            level_id = :level_id, 
            email = :email, 
            status_aktif = :status_aktif, 
            hp = :hp 
			WHERE id = $id";

            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':nama', $nama);
            $stmt->bindParam(':level_id', $level_id);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':status_aktif', $status_aktif);
            $stmt->bindParam(':hp', $hp);
            $stmt->execute();

        }
        catch(PDOException $e) {
            echo $e->getMessage();
        }

        if(!$stmt){
            echo "<script>alert('Gagal Data telah dirubah'); document.location.href=('../view/m_user/')</script>";
        }

        echo "<script>alert('Data telah dirubah'); document.location.href=('../view/m_user/')</script>";
}else if ($op == "hapus"){
        $id = $_GET['id'];

        $sql = "DELETE FROM m_user WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        if(!$stmt){
            echo "<script>alert('Gagal Menghapus'); document.location.href=('../view/m_user/')</script>";
        }

        echo "<script>alert('Berhasil Menghapus'); document.location.href=('../view/m_user/')</script>";
} else if ($op == "tambah"){
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $password = password_hash($password, PASSWORD_BCRYPT);
        try{
            $sql = "INSERT INTO m_user (nama, email, password) VALUES (:nama, :email, :password)";
            $stmt = $conn->prepare($sql);

            $stmt->bindValue(":nama", $nama);
            $stmt->bindValue(":email", $email);
            $stmt->bindValue(":password", $password);

            $result = $stmt->execute();

            if(!$result){
                echo "<script>alert('Gagal Menambahkan'); document.location.href=('../view/m_user/')</script>";
            }

            echo "<script>alert('Berhasil Menambahkan'); document.location.href=('../view/m_user/')</script>";
        }catch(PDOException $e){
            echo $e->getMessage();
        }

        echo "<script>document.location.href=('../view/m_user/')</script>";
}