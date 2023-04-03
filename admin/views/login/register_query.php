
<?php
	session_start();
	require_once 'conn.php';
//     echo "<pre>";
//  print_r($_REQUEST);
//  die();
	if(ISSET($_REQUEST)){
		if($_POST['name'] != "" && $_POST['address'] != ""  && $_POST['start_date'] != "" && $_POST['phone'] != ""
		&& $_POST['email'] != ""  && $_POST['password'] != ""  ){
			try{
				$name = $_POST['name'];
				$address = $_POST['address'];
				$start_date = $_POST['start_date'];
				$phone = $_POST['phone'];
				$email = $_POST['email'];
				$password = md5($_POST['password']);
				// $image = "";
				// if (isset($_FILES['image']) && !$_FILES['image']['error'])
				// {
				// 	move_uploaded_file($_FILES['image']['tmp_name'], 'public/uploads/'.$_FILES['image']['name']);
				// 	$image = 'http://localhost/shop_dong_ho_2/admin/public/uploads/
				// 	'.$_FILES['image']['name'];
				// }
				// $data["image"] = $image;
				// $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$sql = "INSERT INTO `users`(`name`,`address`,`start_date`,`phone`,`email`,`password`) 
                 VALUES ('$name', '$address', '$start_date','$phone','$email','$password')";
				$conn->exec($sql);
			}catch(PDOException $e){
				echo $e->getMessage();
			}
			$_SESSION['message']=array("text"=>"User successfully created.","alert"=>"info");
			$conn = null;
			header('location:index.php');
		}else{
			echo "
				<script>alert('Please fill up the required field!')</script>
				<script>window.location = 'register.php'</script>
			";
		}
	}
?>