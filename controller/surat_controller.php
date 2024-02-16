<?php
ini_set('display_errors', 0);
include "../config.php";
include "../view/m_surat/get.php";
session_start();

$op = $_GET['op'];
if($op == "edit"){
        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $tgl = $_POST['tgl'];
        $gambar = $_FILES['gambar'];
        $status = $_POST['status'];

        try {
            $isUploading = !empty($gambar['name']);

            $sql = "UPDATE m_surat SET 
                nama = :nama, 
                tgl = :tgl,
                stat = :stat
                WHERE id = $id";

            if($isUploading) {
                $sql = "UPDATE m_surat SET 
                nama = :nama, 
                tgl = :tgl, 
                url = :url, 
                stat = :stat
                WHERE id = $id";

                $baseDir = $_SERVER['DOCUMENT_ROOT'];
                $imageDir = $baseDir."/images/";
                $imageFileType = strtolower(pathinfo($gambar['name'],PATHINFO_EXTENSION));
                $allowedFileType = array('jpg','JPG','jpeg','JPEG','PNG','png','xls', 'gif', 'doc', 'docx', 'xlsx', 'zip','pdf');
                $data = getid($id);

                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':nama', $nama);
                $stmt->bindParam(':tgl', $tgl);
                $stmt->bindParam(':url', $gambar["name"]);
                $stmt->bindParam(':stat', $status);
                $stmt->execute();

                if(!(in_array($imageFileType, $allowedFileType))){
                    echo "<script>alert('Hanya boleh mengupload file gambar dan pdf.'); document.location.href=('../view/m_surat/')</script>";
                }
                unlink("../images/".$data['url']);

                $result = move_uploaded_file($gambar['tmp_name'], $imageDir.$gambar['name']);
                if(!$result){
                    echo "<script>alert('Data Gagal dirubah'); document.location.href=('../view/m_surat/')</script>";
                }

                echo "<script>alert('Data telah dirubah'); document.location.href=('../view/m_surat/')</script>";
                return;
            }

            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':nama', $nama);
            $stmt->bindParam(':tgl', $tgl);
            $stmt->bindParam(':stat', $status);
            $stmt->execute();

            if(!$stmt){
                echo "<script>alert('Data Gagal dirubah'); document.location.href=('../view/m_surat/')</script>";
            }

            echo "<script>alert('Data telah dirubah'); document.location.href=('../view/m_surat/')</script>";
        }
        catch(PDOException $e) {
            echo $e->getMessage();
        }

    }else if ($op == "hapus"){
        $id = $_GET['id'];

        $data = getid($id);
        unlink("../images/".$data['url']);

        $sql = "DELETE FROM m_surat WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        if(!$stmt){
            echo "<script>alert('Gagal Menghapus'); document.location.href=('../view/m_surat/')</script>";
        }

        echo "<script>alert('Berhasil Menghapus'); document.location.href=('../view/m_surat/')</script>";

    } else if ($op == "tambah"){
        $nama = $_POST['nama'];
        $tgl = $_POST['tgl'];
        $status = $_POST['status'];

        try{
            $sql = "INSERT INTO m_surat (nama, tgl, stat) VALUES (:nama, :tgl, :status)";
            $stmt = $conn->prepare($sql);

            $stmt->bindValue(":nama", $nama);
            $stmt->bindValue(":tgl", $tgl);
            $stmt->bindValue(":status", $status);

            $result = $stmt->execute();

            if(!$result){
                echo "<script>alert('Gagal Menambahkan'); document.location.href=('../view/m_surat/')</script>";
            }

            echo "<script>alert('Berhasil Menambahkan'); document.location.href=('../view/m_surat/')</script>";
        }catch(PDOException $e){
            echo $e->getMessage();
        }

       
        echo "<script>document.location.href=('../view/m_surat/')</script>";
}

?>