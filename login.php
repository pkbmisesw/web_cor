<?php
error_reporting(0);
include 'config.php';

if (isset($_SESSION['email'])) {
	header('Location: view/admin/index.php');
	exit;
}

if (isset($_POST['login'])) {
	$email    = $_POST['email'];
	$password = $_POST['password'];

	try {
		$sql = "SELECT * FROM m_user WHERE email = :email AND status_aktif = 1 AND level_id >= 1";
		$stmt = $conn->prepare($sql);
		$stmt->bindParam(':email', $email);
		$stmt->execute();

		$row = $stmt->fetch();
		if ($row && password_verify($password, $row['password'])) {
			$_SESSION['email'] = $email;
			$_SESSION['nama'] = $row['nama'];
			$_SESSION['password'] = $row['password'];
			$_SESSION['user_id'] = $row['id'];
			$_SESSION['level_id'] = $row['level_id'];
			header("Location: view/admin/index.php");
			exit;
		} else {
			echo "<div class='notif'>Email or password is incorrect!</div>";
		}
	} catch (PDOException $e) {
		echo $e->getMessage();
	}
}
?>

<!-- FORM LOGIN -->
<h2>Silahkan Login</h2>

<form action="" method="post">
    <table>
        <tr>
            <td>email</td>
            <td><input type="text" name="email"></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type="password" name="password"></td>
        </tr>
        <tr>
            <td>
                <input type="submit" name="login" value="Login">
            </td>
        </tr>
    </table>
</form>
<a href="daftar.php"><button>Register</button></a>