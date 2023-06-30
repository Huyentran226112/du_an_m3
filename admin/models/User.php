<?php
include_once 'models/Model.php';
class User extends Model {
    public function all(){
        // Viet cau sql
        $sql = "SELECT * FROM `users`";
        $stmt= $this->conn->query($sql);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);//array
        $items = $stmt->fetchAll();
        return $items;
    }
    public function find($id){
          //lay du lieu theo ID
          $sql = "SELECT * FROM `users` WHERE id = $id";
          //Debug sql
          // var_dump($sql);
          $stmt = $this->conn->query($sql);
          $stmt->setFetchMode(PDO::FETCH_ASSOC);//array
          //Lấy về dữ liệu duy nhat
          $row = $stmt->fetch();
          return $row;
    }
    public function save($data){
        $name = $data['name'];
        $address = $data['address'];
        $start_date= $data['start_date'];
        $phone = $data['phone'];
        $email = $data['email'];
        $password = md5($data['password']);
        $image = $data['image'];
        $sql = "INSERT INTO `users` 
        ( `name`, `address`,`start_date`,`phone`, `email`,`password`,`image`)
        VALUES('$name', '$address', '$start_date', '$phone','$email','$password','$image')";
        //Thuc hien truy van
        // echo ($sql);
        // die();
        $this->conn->exec($sql);
    }
    public function update($id,$data){
        $name = $data['name'];
        $address = $data['address'];
        $start_date = $data['start_date'];
        $phone = $data['phone'];
        $email = $data['email'];
        $password = $data['password'];
        $image = $data['image'];
        $sql = "UPDATE `users` SET
        `name` = '$name',
        `address` = '$address',
        `start_date` = '$start_date',
         `phone` = '$phone',
         `email` = '$email',
         `password` = '$password',
         `image` = '$image'
          WHERE `users`.`id` = $id";
          // thuc hien truy van
          $this->conn->exec($sql);
    }
    public function delete($id){
        $sql = "DELETE FROM users WHERE id = $id";
        //Debug sql
        // var_dump($sql);
        //Thuc hien truy van
        $this->conn->exec($sql);
    }
    public function login($email,$password){
        $sql = "SELECT * FROM `users` WHERE `email`= '$email' AND `password`= '$password'";
        $stmt = $this->conn->query($sql);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $row = $stmt->fetch();
        return $row;
    }
    public function register($email,$password,$phone,$start_date,$address,$name){
        $sql = "INSERT INTO `users`(`name`,`address`,`start_date`,`phone`,`email`,`password`) 
        VALUES ('$name', '$address', '$start_date','$phone','$email','$password')";
        $stmt = $this->conn->query($sql);
        $row = $stmt->fetch();
        return $row;
    }
}