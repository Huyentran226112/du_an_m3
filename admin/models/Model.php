<?php 
class Model{
    protected $conn;
    public function __construct(){
        $username   = 'root';
        $password   = '';
        $database   = 'shop_dong_ho';
        try {
            $this->conn = new PDO('mysql:host=localhost;dbname='.$database, $username, $password);
        } catch (Exception $e) {
            // echo $e->getMessage();
            echo '<h1>Khong the ket noi CSDL</h1>';
        }
    }
}