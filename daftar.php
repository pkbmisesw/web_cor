<?php 
include 'config.php'; // panggil perintah koneksi database
error_reporting(0); 

if(!isset($_SESSION['username'] )== 0) { // cek session apakah kosong(belum login) maka alihkan ke index.php
    header('Location: index.php');
}

if(isset($_POST['register'])) { // mengecek apakah form variabelnya ada isinya
	$nama = $_POST['nama']; // isi varibel dengan mengambil data username pada form
    $username = $_POST['username']; // isi varibel dengan mengambil data username pada form
    $password = $_POST['password']; // isi variabel dengan mengambil data password pada form

    try {
        $sql = "INSERT INTO pengguna (nama, username, password) VALUES (:nama, :username, :password)";
        $stmt = $conn->prepare($sql);
        
        //Bind our variables.
		$stmt->bindValue(':nama', $nama);
        $stmt->bindValue(':username', $username);
        $stmt->bindValue(':password', $password);
    
        //Execute the statement and insert the new account.
        $result = $stmt->execute();
        
        //If the signup process is successful.
        if($result){
            //What you do here is up to you!
            echo 'Thank you for registering with our website.';
        }
    }
    catch(PDOException $e) {
        echo $e->getMessage();
    }
}

?>

<!-- DAFTAR -->
<h2>Silahkan Daftar</h2>

<form action="" method="post">
    <table>
		<tr>
            <td>Nama</td>
            <td><input type="text" name="nama"></td>
        </tr>
        <tr>
            <td>Username</td>
            <td><input type="text" name="username"></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type="password" name="password"></td>
        </tr>
        <tr>
            <td>
                <input type="submit" name="register" value="Register">
            </td>
        </tr>
    </table>
</form>
<a href="index.php"><button>Login</button></a>