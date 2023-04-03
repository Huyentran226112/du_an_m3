<?php
	$db_username = 'root';
	$db_password = '';
	$conn = new PDO( 'mysql:host=localhost;dbname=shop_dong_ho', $db_username, $db_password );
	if(!$conn){
		die("Fatal Error: Connection Failed!");
	}
?>