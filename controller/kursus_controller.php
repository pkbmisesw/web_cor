<?php
ini_set('display_errors', 0);
include "../config.php";
include "../view/m_kursus/get.php";
session_start();

$op = $_GET['op'];
if($op == "edit"){
        $id = $_POST['id'];
        $id_kat = $_POST['id_kat'];
        $nama = $_POST['nama'];
        $des = $_POST['des'];
        $harga = $_POST['harga'];
        $pic = $_FILES['pic'];
        $status = $_POST['status'];
        $durasi = $_POST['durasi'];
        $skill_level = $_POST['skill_level'];
        $sertifikat = $_POST['sertifikat'];

        try {
            $isUploading = !empty($pic['name']);

            if($isUploading) {
                $sql = "UPDATE m_kursus SET 
                id_kat = :id_kat,
                nama = :nama, 
                des = :des, 
                harga = :harga, 
                pic = :pic, 
                status = :status,
                durasi = :durasi,
                skill_level = :skill_level,
                sertifikat = :sertifikat
                WHERE id = $id";

                $baseDir = $_SERVER['DOCUMENT_ROOT'];
                $imageDir = $baseDir."/images/";
                $imageFileType = strtolower(pathinfo($pic['name'],PATHINFO_EXTENSION));
                $allowedFileType = array('jpg','JPG','jpeg','JPEG','PNG','png','xls', 'gif', 'doc', 'docx', 'xlsx', 'zip','pdf');
                $data = getid($id);

                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':id_kat', $id_kat);
                $stmt->bindParam(':nama', $nama);
                $stmt->bindParam(':des', $des);
                $stmt->bindParam(':harga', $harga);
                $stmt->bindParam(':pic', $pic["name"]);
                $stmt->bindParam(':status', $status);
                $stmt->bindParam(':durasi', $durasi);
                $stmt->bindParam(':skill_level', $skill_level);
                $stmt->bindParam(':sertifikat', $sertifikat);
                $stmt->execute();

                if(!(in_array($imageFileType, $allowedFileType))){
                    echo "<script>alert('Hanya boleh mengupload file pic dan pdf.'); document.location.href=('../view/m_kursus/')</script>";
                }
                unlink("../images/".$data['pic']);

                $result = move_uploaded_file($pic['tmp_name'], $imageDir.$pic['name']);
                if(!$result){
                    echo "<script>alert('Data Gagal dirubah'); document.location.href=('../view/m_kursus/')</script>";
                }

                echo "<script>alert('Data telah dirubah'); document.location.href=('../view/m_kursus/')</script>";
                return;
            }

            $sql = "UPDATE m_kursus SET 
                id_kat = :id_kat, 
                nama = :nama, 
                des = :des, 
                harga = :harga, 
                status = :status,
                durasi = :durasi,
                skill_level = :skill_level,
                sertifikat = :sertifikat
                WHERE id = $id";

            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':id_kat', $id_kat);
            $stmt->bindParam(':nama', $nama);
            $stmt->bindParam(':des', $des);
            $stmt->bindParam(':harga', $harga);
            $stmt->bindParam(':status', $status);
            $stmt->bindParam(':durasi', $durasi);
            $stmt->bindParam(':skill_level', $skill_level);
            $stmt->bindParam(':sertifikat', $sertifikat);
            $stmt->execute();

            if(!$stmt){
                echo "<script>alert('Data Gagal dirubah'); document.location.href=('../view/m_kursus/')</script>";
            }

            echo "<script>alert('Data telah dirubah'); document.location.href=('../view/m_kursus/')</script>";
        }
        catch(PDOException $e) {
            echo $e->getMessage();
        }

    }else if ($op == "hapus"){
        $id = $_GET['id'];

        $data = getid($id);
        unlink("../images/".$data['pic']);

        $sql = "DELETE FROM m_kursus WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        if(!$stmt){
            echo "<script>alert('Gagal Menghapus'); document.location.href=('../view/m_kursus/')</script>";
        }

        echo "<script>alert('Berhasil Menghapus'); document.location.href=('../view/m_kursus/')</script>";

    } else if ($op == "tambah"){
        $id_kat = $_POST['id_kat'];
        $nama = $_POST['nama'];
        $des = $_POST['des'];
        $harga = $_POST['harga'];
        $status = $_POST['status'];

        try{
            $sql = "INSERT INTO m_kursus (id_kat, nama, des, harga, status) VALUES (:id_kat, :nama, :des, :harga, :status)";
            $stmt = $conn->prepare($sql);

            $stmt->bindValue(":id_kat", $id_kat);
            $stmt->bindValue(":nama", $nama);
            $stmt->bindValue(":des", $des);
            $stmt->bindValue(":harga", $harga);
            $stmt->bindValue(":status", $status);

            $result = $stmt->execute();

            if(!$result){
                echo "<script>alert('Gagal Menambahkan Kursus'); document.location.href=('../view/m_kursus/')</script>";
            }

            echo "<script>alert('Berhasil Menambahkan Kursus'); document.location.href=('../view/m_kursus/')</script>";
        }catch(PDOException $e){
            echo $e->getMessage();
        }

       
        echo "<script>document.location.href=('../view/m_kursus/')</script>";
}

?>