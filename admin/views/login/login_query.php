<?php
	session_start();
 
	require_once 'conn.php';
	// print_r($_REQUEST);
	// die();
		if($_POST['email'] != "" && $_POST['password'] != ""){
			$email = $_POST['email'];
			$password = md5($_POST['password']);
			$sql = "SELECT * FROM `users` WHERE `email`= '$email' AND `password`= '$password'";
			$stmt = $conn->query($sql);
			$stmt->setFetchMode(PDO::FETCH_OBJ);
			$row = $stmt->fetch();
			if(isset($row) && !empty($row)) {
				$_SESSION['user'] = $row;
				header('Location: http://localhost:3000/admin');
				// header("http://localhost:3000/admin");
			} else{
                // die();
				echo "
				<script>alert('Tài khoản hoặc mật khẩu không đúng ')</script>
				<script>window.location = 'index.php'</script>
				";
			}
		// }else{
		// 	echo "
		// 		<script>alert('Hãy nhập tài khoản hoặc mật khẩu')</script>
		// 		<script>window.location = 'index.php'</script>
		// 	";
		}
?>