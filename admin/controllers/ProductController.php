<?php
include_once 'models/Product.php';
include_once 'models/Category.php';

class ProductController extends Controller{
    // goi toi trang danh sach 
    public function index(){
        //  goi toi model
        $objProduct = new Product();
        // model thao tac voi CSDL tra ve controller 
        $items = $objProduct->all();
        // var_dump($items);
        // die();
        // truyen du lieu xuong view
        $params = [
            'items' => $items
        ];
        $this->view('products/index.php',$params);
    }
    // goi toi trang them moi 
    public function create(){
        //   goi view ma ko truyen bien 
        $objCategory= new Category();
        // model thao tac voi CSDL tra ve controller 
        $categories = $objCategory->all();
        $params = [
            'categories' => $categories
        ];
        $this->view('products/create.php',$params);
        }
    // xu li them moi
    public function store(){
        // echo '<pre>';
        // print_r($_REQUEST);
        // die();
        // lay du lieu tu $_REQUEST gan vao mang data 
        $data = [
            'name' => $_REQUEST['name'],
            'price' => $_REQUEST['price'],
            'quantity' => $_REQUEST['quantity'],
            'category_id' => $_REQUEST['category_id'],
            'description' => $_REQUEST['description'],
            'status' => $_REQUEST['status'],
        ];
        $image = "";
        if (isset($_FILES['image']) && !$_FILES['image']['error'])
        {
            move_uploaded_file($_FILES['image']['tmp_name'], 'public/uploads/'.$_FILES['image']['name']);
            $image = '/public/uploads/'.$_FILES['image']['name'];
        }
        $data["image"] = $image;

        // goi model 
        $objProduct = new Product();
        $objProduct->save($data);
        // header('Location: http://localhost:3000/admin/index.php?controller=product&action=index.php?add=successfunly');
      
        // chuyen huowng ve trang danh sach
        $this->redirect("index.php?controller=product&action=index&add=successfully");

    }

    // Gọi tới trang chỉnh sửa
    public function edit(){
        $id = $_REQUEST['id'];
        // Gọi model
        $objProduct = new Product();
        $item = $objProduct->find($id);

        $objCategory= new Category();
        $categories = $objCategory->all();
        // truyen xuong view
        $params = [
            'categories' => $categories,
            'item' => $item,
            'id' => $id
        ];
        
        $this->view('products/edit.php',$params);
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
            'price' => $_REQUEST['price'],
            'quantity' => $_REQUEST['quantity'],
            'category_id' => $_REQUEST['category_id'],
            'description' => $_REQUEST['description'],
            'status' => $_REQUEST['status'],
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
        $objProduct = new Product();
        $objProduct->update($id,$data);

        // Chuyển hướng về trang danh sách
        $this->redirect("index.php?controller=product&action=index");
    }

    public function destroy(){
        $id = $_REQUEST['id'];
        // Gọi model
        $objProduct = new Product();
        $objProduct->delete($id);

        // Chuyển hướng về trang danh sách
        $this->redirect('index.php?controller=product&action=index');
    }
}