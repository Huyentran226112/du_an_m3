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
}
// Khoi tao doi tuong
// $user = new User();
// // Gọi phương thức save 5 lan và truyền vào mảng dữ liệu thông tin của 5 thành viên
// $data = [
//     'name' => 'huyen',
//     'address' => 'gio linh',
//     'start_date' => '21/12/2015',
//     'phone' => '0212165',
//     'address' => 'gio linh',
//     'email' => 'h@gmail.com',
//     'image' => 'kjhg',
// ];
// // $user->save($data);
// // - Gọi phương thức all và in ra kết quả
// echo '<pre>';
// print_r($user->all());
// echo '</pre>';
// // Gọi phương thức find và truyền vào id là 1 sau đó in ra kết quả
// echo '<pre>';
// print_r($user->find(2));
// echo '</pre>';
// // Gọi phương thức update và truyền vào id và mảng dữ liệu
// // $data = [
// //     'name' => 'Phong123',
// //     'age' => 256,
// //     'phone' => '0367717778',
// //     'address' => 'Quang tri',
// // ];
// $user->update(2,$data);
// // Gọi phương thức delete và truyền vào id
// $user->delete(1);
// // - Gọi phương thức all và in ra kết quả
// echo '<pre>';
// print_r($user->all());
// echo '</pre>';
