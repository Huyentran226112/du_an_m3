<?php 
include_once 'models/Model.php';
class Product extends Model{

    public function all(){
        // Viet cau sql
        $sql = "SELECT products.*,categories.name AS category_name FROM `products` 
        JOIN categories ON products.category_id = categories.id order by products.id desc";
        // $sql = "SELECT * FROM `products`";
        $stmt= $this->conn->query($sql);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);//array
        $items = $stmt->fetchAll();
        return $items;
    }
    public function find($id){
          //lay du lieu theo ID
          $sql = "SELECT * FROM `products` WHERE id = $id";
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
        $price = $data['price'];
        $quantity = $data['quantity'];
        $category_id = $data['category_id'];
        $image = $data['image'];
        $description = $data['description'];
        $status = $data['status'];
        $sql = "INSERT INTO `products` ( `name`, `price`, `quantity`, `category_id`, `image`, `description`, `status`) 
        VALUES ('$name', '$price', '$quantity', '$category_id','$image','$description','$status')";
        //Thuc hien truy van
        $this->conn->exec($sql);
    }
    public function update($id,$data){
        $name = $data['name'];
        $price = $data['price'];
        $quantity = $data['quantity'];
        $category_id = $data['category_id'];
        $image = $data['image'];
        $description = $data['description'];
        $status = $data['status'];
        $sql = "UPDATE `products` SET
        `name` = '$name',
        `price` = '$price',
         `quantity` = '$quantity',
         `category_id` = '$category_id',
         `image` = '$image',
         `description` = '$description',
         `status` = '$status'
          WHERE `products`.`id` = $id";
          // thuc hien truy van
          $this->conn->exec($sql);
    }
    public function delete($id){
        $sql = "DELETE FROM products WHERE id = $id";
        //Debug sql
        // var_dump($sql);
        //Thuc hien truy van
        $this->conn->exec($sql);
    }
}
// Khoi tao doi tuong
// $product = new Product();
// // Gọi phương thức save 5 lan và truyền vào mảng dữ liệu thông tin của 5 thành viên
// $data = [
//     'name' => 'huyen',
//     'price' => '1245',
//     'quantity' => '2',
//     'category_id' => '5',
//     'image' => 'hg',
//     'description' => 'dsgfggashg',
//     'status' => '1',
// ];
// // $user->save($data);
// // - Gọi phương thức all và in ra kết quả
// echo '<pre>';
// print_r($product->all());
// echo '</pre>';
// // Gọi phương thức find và truyền vào id là 1 sau đó in ra kết quả
// echo '<pre>';
// print_r($product->find(2));
// echo '</pre>';
// // Gọi phương thức update và truyền vào id và mảng dữ liệu
// // $data = [
// //     'name' => 'Phong123',
// //     'age' => 256,
// //     'phone' => '0367717778',
// //     'address' => 'Quang tri',
// // ];
// $product->update(2,$data);
// // Gọi phương thức delete và truyền vào id
// // $product->delete(1);
// // - Gọi phương thức all và in ra kết quả
// // echo '<pre>';
// // print_r($product->all());
// // echo '</pre>';


