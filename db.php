<?php
    define('ROOT_URL','http://shop_dong_ho.test/');
    define('ROOT_DIR',dirname(__FILE__));
    $username   = 'root';
    $password   = '';   
    $database   = 'shop_dong_ho';
    try {
        $conn = new PDO('mysql:host=localhost;dbname='.$database, $username, $password);
    } catch (Exception $e) {
        // echo $e->getMessage();
        echo '<h1>Khong the ket noi CSDL</h1>';
    }