<?php
ini_set('display_errors', 0);
include "../config.php";
session_start();

if (!isset($_SESSION['email'])) {
    header('Location: ../../index.php', true, 303);
    exit;
}

$op = $_GET['op'];
if($op == "edit"){

        $id = $_POST['id'];
        $title = $_POST['title'];
        $gambar = $_FILES['gambar'];
        $penulis = $_POST['penulis'];
        $tanggal = $_POST['tanggal'];
        $status = $_POST['status'];
        $no_urut = $_POST['no_urut'];

        try {

            $isUploading = !empty($gambar['name']);

            if($isUploading) {
                $sql = "UPDATE m_post SET 
                nama = :nama, 
                gambar = :gambar, 
                penulis = :penulis, 
                tgl = :tgl, 
                stat = :stat,
                no_urut = :no_urut 
                WHERE id = $id";

                $imageDir = "../images/";
                $imageFileType = strtolower(pathinfo($gambar['name'],PATHINFO_EXTENSION));
                $allowedFileType = array('jpg','JPG','jpeg','JPEG','PNG','png','xls', 'gif', 'doc', 'docx', 'xlsx', 'zip','pdf');

                if(!(in_array($imageFileType, $allowedFileType))){
                    echo "<script>alert('Hanya boleh mengupload file gambar dan pdf.'); document.location.href=('../view/m_post/')</script>";
                }else{
                    move_uploaded_file($gambar['tmp_name'], $imageDir.$gambar['name']);
                    $stmt = $conn->prepare($sql);
    
                    $stmt->bindValue(":nama", $title);
                    $stmt->bindValue(":gambar", $gambar['name']);
                    $stmt->bindValue(":penulis", $penulis);
                    $stmt->bindValue(":tgl", $tanggal);
                    $stmt->bindValue(":stat", $status);
                    $stmt->bindValue(":no_urut", $no_urut);
                    
                    $result = $stmt->execute();
                }

                if(!$result){
                    echo "<script>alert('Data Gagal dirubah'); document.location.href=('../view/m_post/')</script>";
                }

                echo "<script>alert('Data telah dirubah'); document.location.href=('../view/m_post/')</script>";
            }else{
                $sql = "UPDATE m_post SET 
                nama = :nama, 
                penulis = :penulis, 
                tgl = :tgl, 
                stat = :stat,
                no_urut = :no_urut 
                WHERE id = $id";

                $stmt = $conn->prepare($sql);

                $stmt->bindValue(":nama", $title);
                $stmt->bindValue(":penulis", $penulis);
                $stmt->bindValue(":tgl", $tanggal);
                $stmt->bindValue(":stat", $status);
                $stmt->bindValue(":no_urut", $no_urut);
                
                $result = $stmt->execute();

                if(!$result){
                    echo "<script>alert('Data Gagal dirubah'); document.location.href=('../view/m_post/')</script>";
                }

                echo "<script>alert('Data telah dirubah'); document.location.href=('../view/m_post/')</script>";
            }

        }
        catch(PDOException $e) {
            echo $e->getMessage();
        }
}else if ($op == "hapus"){
        $id = $_GET['id'];

        $sql = "DELETE FROM m_post WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        if(!$stmt){
            echo "<script>alert('Gagal Menghapus'); document.location.href=('../view/m_post/')</script>";
        }

        echo "<script>alert('Berhasil Menghapus'); document.location.href=('../view/m_post/')</script>";
} else if ($op == "tambah"){
        $title = $_POST['title'];
        $penulis = $_POST['penulis'];
        $tanggal = $_POST['tanggal'];
        $status = $_POST['status'];
        $no_urut = $_POST['no_urut'];

        try{
            $sql = "INSERT INTO m_post (nama, penulis, tgl, stat, no_urut) 
                    VALUES (:nama, :penulis, :tgl, :stat, :no_urut)";
            $stmt = $conn->prepare($sql);

            $stmt->bindValue(":nama", $title);
            $stmt->bindValue(":penulis", $penulis);
            $stmt->bindValue(":tgl", $tanggal);
            $stmt->bindValue(":stat", $status);
            $stmt->bindValue(":no_urut", $no_urut);
            
            $result = $stmt->execute();

            if(!$result){
                echo "<script>alert('Gagal Menambahkan'); document.location.href=('../view/m_post/')</script>";
            }

            echo "<script>alert('Berhasil Menambahkan'); document.location.href=('../view/m_post/')</script>";
        }catch(PDOException $e){
            echo $e->getMessage();
        }

        echo "<script>document.location.href=('../view/m_post/')</script>";
}