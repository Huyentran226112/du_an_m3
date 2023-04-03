<?php
include_once 'models/User.php';
class UserController extends Controller{
    // goi toi trang danh sach 
    public function index(){
        //  goi toi model
        $objuser = new User();
        // model thao tac voi CSDL tra ve controller 
        $items = $objuser->all();
        // var_dump($items);
        // die();
        // truyen du lieu xuong view
        $params = [
            'items' => $items
        ];
        $this->view('users/index.php',$params);
    }
    // goi toi trang them moi 
    public function create(){
    //   goi view ma ko truyen bien 
     $this->view('users/create.php');
    }
    // xu li them moi
    public function store(){
        // echo '<pre>';
        // print_r($_REQUEST);
        // die();
        // lay du lieu tu $_REQUEST gan vao mang data 
        $data = [
            'name' => $_REQUEST['name'],
            'address' => $_REQUEST['address'],
            'start_date' => $_REQUEST['start_date'],
            'phone' => $_REQUEST['phone'],
            'email' => $_REQUEST['email'],
            'password' => $_REQUEST['password'],
        ];
          // nếu người dùng uploat file và file ko bị lỗi
          $image = "";
          if (isset($_FILES['image']) && !$_FILES['image']['error'])
          {
              move_uploaded_file($_FILES['image']['tmp_name'], 'public/uploads/'.$_FILES['image']['name']);
              $image = '/public/uploads/'.$_FILES['image']['name'];
          }
          $data["image"] = $image;
        
        // goi model 
        $objuser = new User();
        $objuser->save($data);
        // chuyen huowng ve trang danh sach
        $this->redirect("index.php?controller=order&action=index.php");
    }

    // Gọi tới trang chỉnh sửa
    public function edit(){
        $id = $_REQUEST['id'];
        // Gọi model
        $objuser = new User();
        $item = $objuser->find($id);
        // truyen xuong view
        include_once 'views/users/edit.php';
    }

    // Xử lý chỉnh sửa
    public function update(){
        // echo '<pre>';
        // print_r($_REQUEST);
        // die();

        $id = $_REQUEST['id'];
        // Lấy dữ liệu từ _REQUEST gán vào mảng data
        $data = [
            'name' => $_REQUEST['name'],
            'address' => $_REQUEST['address'],
            'start_date'=> $_REQUEST['start_date'],
            'phone' => $_REQUEST['phone'],
            'email' => $_REQUEST['email'],
            'password' => $_REQUEST['password'],
        ];
        // nếu người dùng uploat file và file ko bị lỗi
        $image = "";
        if (isset($_FILES['image']) && !$_FILES['image']['error'])
        {
            move_uploaded_file($_FILES['image']['tmp_name'], 'public/uploads/'.$_FILES['image']['name']);
            $image = '/public/uploads/'.$_FILES['image']['name'];
        }
        $data["image"] = $image;

        // Gọi model
        $objuser = new User();
        $objuser->update($id,$data);

        // Chuyển hướng về trang danh sách
        $this->redirect("index.php?controller=user&action=index");
    }
    public function destroy(){
        $id = $_REQUEST['id'];
        // Gọi model
        $objuser = new User();
        $objuser->delete($id);

        // Chuyển hướng về trang danh sách
        $this->redirect('index.php?controller=user&action=index');
    }
}