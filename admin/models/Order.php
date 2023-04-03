<?php 
include_once 'models/Model.php';
class Order extends Model{

    public function all(){
        // Viet cau sql
        $sql = "SELECT * FROM `orders`";
        $stmt= $this->conn->query($sql);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);//array
        $items = $stmt->fetchAll();
        return $items;
    }
    public function find($id){
          //lay du lieu theo ID
          $sql = "SELECT * FROM `orders` WHERE id = $id";
          //Debug sql
          // var_dump($sql);
          $stmt = $this->conn->query($sql);
          $stmt->setFetchMode(PDO::FETCH_ASSOC);//array
          //Lấy về dữ liệu duy nhat
          $row = $stmt->fetch();
          return $row;
    }
    public function save($data){
        $order_date = $data['order_date'];
        $total = $data['total'];
        $cutstomer_name = $data['cutstomer_name'];
        $cutstomer_phone = $data['cutstomer_phone'];
        $cutstomer_address= $data['cutstomer_address'];
        $sql = "INSERT INTO `orders` ( `order_date`, `total`, `cutstomer_name`, `cutstomer_phone`, `cutstomer_address`
        ) VALUES ('$order_date', '$total', '$cutstomer_name', '$cutstomer_phone','$cutstomer_address')";
        //Thuc hien truy van
        // echo ($sql);
        // die();

        $this->conn->exec($sql);
    }
    public function update($id,$data){
        $order_date = $data['order_date'];
        $total = $data['total'];
        $cutstomer_name = $data['cutstomer_name'];
        $cutstomer_phone = $data['cutstomer_phone'];
        $cutstomer_address= $data['cutstomer_address'];
        $sql = "UPDATE `orders` SET
        `order_date` = '$order_date',
        `total` = '$total',
         `cutstomer_name` = '$cutstomer_name',
         `cutstomer_phone` = '$cutstomer_phone',
         `cutstomer_address` = '$cutstomer_address'
          WHERE `orders`.`id` = $id";
          // thuc hien truy van
          $this->conn->exec($sql);
    }
    public function delete($id){
        $sql = "DELETE FROM orders WHERE id = $id";
        //Debug sql
        // var_dump($sql);
        //Thuc hien truy van
        $this->conn->exec($sql);
    }
}