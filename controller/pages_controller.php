<?php
ini_set('display_errors', 0);
include "../config.php";
session_start();

$op = $_GET['op'];

if($op == "edit"){
        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $gambar = $_FILES['gambar'];
        $des = $_POST['des'];
        $view = $_POST['view'];
        $seo = $_POST['seo'];
        $status = $_POST['status'];
        $url = $_POST['url'];

        try {
            $sql = "UPDATE m_pages SET 
            nama = :nama,
            des = :des,
            view = :view,
            seo = :seo,
            stat = :status,
            url = :url
			WHERE id = :id";

            if(!empty($gambar["name"])){
                $sql = "UPDATE m_pages SET 
                nama = :nama,
                gambar = :gambar,
                des = :des,
                view = :view,
                seo = :seo,
                stat = :status,
                url = :url
                WHERE id = :id";
            }

            $stmt = $conn->prepare($sql);

            if(!empty($gambar["name"])){
                $dir = "../web_assets/img/banner/";
                move_uploaded_file($gambar["tmp_name"], $dir.$gambar["name"]);
                $stmt->execute([":nama" => $nama, ":gambar" => "banner/".$gambar["name"], ":des" => $des, ":view" => $view, ":seo" => $seo, ":status" => $status, ":url" => $url, ":id" => $id]);
                if (!$stmt) {
                    echo "<script>alert('Data Gagal telah dirubah'); document.location.href=('../view/m_pages/')</script>";
                }

                echo "<script>alert('Data telah dirubah'); document.location.href=('../view/m_pages/')</script>";
            }

            $stmt->execute([":nama" => $nama, ":des" => $des, ":view" => $view, ":seo" => $seo, ":status" => $status, ":url" => $url, ":id" => $id]);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        if (!$stmt) {
            echo "<script>alert('Data Gagal telah dirubah'); document.location.href=('../view/m_pages/')</script>";
        }

        echo "<script>alert('Data telah dirubah'); document.location.href=('../view/m_pages/')</script>";
}else if ($op == "hapus"){
        $id = $_GET['id'];

        $sql = "DELETE FROM m_pages WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        if (!$stmt) {
            echo "<script>alert('Gagal Menghapus'); document.location.href=('../view/m_pages/')</script>";
        }

        echo "<script>alert('Berhasil Menghapus'); document.location.href=('../view/m_pages/')</script>";
} else if ($op == "tambah"){
        $nama = $_POST['nama'];
        $des = $_POST['des'];

        try {
            $sql = "INSERT INTO m_pages (nama, des ) VALUES (:nama, :des)";
            $stmt = $conn->prepare($sql);

            $stmt->bindValue(":nama", $nama);
            $stmt->bindValue(":des", $des);

            $result = $stmt->execute();

            if (!$result) {
                echo "<script>alert('Gagal Menambahkan'); document.location.href=('../view/m_pages/')</script>";
            }

            echo "<script>alert('Berhasil Menambahkan'); document.location.href=('../view/m_pages/')</script>";
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        echo "<script>document.location.href=('../view/m_pages/')</script>";
}
