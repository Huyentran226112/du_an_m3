<?php 
include_once 'models/Model.php';
class Category extends Model{

    public function all(){
        // Viet cau sql
      
        $sql = "SELECT * FROM `categories`";
        $stmt= $this->conn->query($sql);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);//array
        $items = $stmt->fetchAll();
        return $items;
        // var_dump($items);
        // die();
    }
    public function find($id){
          //lay du lieu theo ID
          $sql = "SELECT * FROM `categories` WHERE id = $id";
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
        $sql = "INSERT INTO `categories` ( `name`) VALUES ('$name')";
        //Thuc hien truy van
        $this->conn->exec($sql);
    }
    public function update($id,$data){
        $name = $data['name'];
        $sql = "UPDATE `categories` SET
        `name` = '$name'
          WHERE `categories`.`id` = $id";
          // thuc hien truy van
         
          $this->conn->exec($sql);
    }
    public function delete($id){
       try{
            $sql = "DELETE FROM categories WHERE id = $id";
            $this->conn->exec($sql);
        }
        catch(Exception $e){
            echo 'lỗi truy cập';
            die();
        }
    }
}
