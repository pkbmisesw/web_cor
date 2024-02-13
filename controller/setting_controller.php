<?php

include "../config.php";
session_start();

if (!isset($_SESSION['email'])) {
    header('Location: ../../index.php', true, 303);
    exit;
}

$op = $_GET['op'];
if($op == "edit") {
    $id = $_POST['id'];
    $gambar = $_FILES['gambar'];
    $nama = $_POST['nama'];
    $des = $_POST['des'];
    $alamat = $_POST['alamat'];
    $run_text = $_POST['run_text'];
    $wa = $_POST['wa'];
    $kata_wa = $_POST['kata_wa'];
    $seo = $_POST['seo'];
    $email = $_POST['email'];
    $yt = $_POST['yt'];

    try {

        $isUploading = !empty($gambar['name']);

        if ($isUploading) {
            $sql = "UPDATE setting SET 
                logo = :gambar, 
                nama = :nama, 
                des = :des, 
                alamat = :alamat, 
                run_text = :run_text, 
                wa = :wa, 
                kata_wa = :kata_wa, 
                seo = :seo,
                email = :email,
                yt = :yt 
                WHERE id = 1";

            $imageDir = "../images/";
            $imageFileType = strtolower(pathinfo($gambar['name'], PATHINFO_EXTENSION));
            $allowedFileType = array('jpg', 'JPG', 'jpeg', 'JPEG', 'PNG', 'png', 'xls', 'gif', 'doc', 'docx', 'xlsx', 'zip', 'pdf');

            if (!(in_array($imageFileType, $allowedFileType))) {
                echo "<script>alert('Hanya boleh mengupload file gambar dan pdf.'); document.location.href=('../view/m_post/')</script>";
            } else {
                move_uploaded_file($gambar['tmp_name'], $imageDir . $gambar['name']);
                $stmt = $conn->prepare($sql);

                $stmt->bindValue(":gambar", $gambar['name']);
                $stmt->bindValue(":nama", $nama);
                $stmt->bindValue(":des", $des);
                $stmt->bindValue(":alamat", $alamat);
                $stmt->bindValue(":run_text", $run_text);
                $stmt->bindValue(":wa", $wa);
                $stmt->bindValue(":kata_wa", $kata_wa);
                $stmt->bindValue(":seo", $seo);
                $stmt->bindValue(":email", $email);
                $stmt->bindValue(":yt", $yt);

                $result = $stmt->execute();
            }

            if (!$result) {
                echo "<script>alert('Data Gagal dirubah'); document.location.href=('../view/setting/')</script>";
            }

            echo "<script>alert('Data telah dirubah'); document.location.href=('../view/setting/')</script>";
        } else {
            $sql = "UPDATE setting SET 
                nama = :nama, 
                des = :des, 
                alamat = :alamat, 
                run_text = :run_text, 
                wa = :wa, 
                kata_wa = :kata_wa, 
                seo = :seo,
                email = :email,
                yt = :yt 
                WHERE id = 1";

            $stmt = $conn->prepare($sql);

            $stmt->bindValue(":nama", $nama);
            $stmt->bindValue(":des", $des);
            $stmt->bindValue(":alamat", $alamat);
            $stmt->bindValue(":run_text", $run_text);
            $stmt->bindValue(":wa", $wa);
            $stmt->bindValue(":kata_wa", $kata_wa);
            $stmt->bindValue(":seo", $seo);
            $stmt->bindValue(":email", $email);
            $stmt->bindValue(":yt", $yt);
            $result = $stmt->execute();

            if (!$result) {
                echo "<script>alert('Data Gagal dirubah'); document.location.href=('../view/setting/')</script>";
            }

            echo "<script>alert('Data telah dirubah'); document.location.href=('../view/setting/')</script>";
        }

    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}