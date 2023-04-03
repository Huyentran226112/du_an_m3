<?php
include_once 'models/Category.php';
class CategoryController extends Controller{
    // goi toi trang danh sach 
    public function index(){
        //  goi toi model
        $objCategory= new Category();
        // model thao tac voi CSDL tra ve controller 
        $items = $objCategory->all();
        // var_dump($items);
        // die();
        // truyen du lieu xuong view
        $params = [
            'items' => $items
        ];
        $this->view('category/index.php',$params);
    }
    // goi toi trang them moi 
    public function create(){
        // echo __METHOD__;

        $this->view('category/create.php');
    }
    // xu li them moi
    public function store(){
        // echo '<pre>';
        // print_r($_REQUEST);
        // die();
        // lay du lieu tu $_REQUEST gan vao mang data 
        $data = [
            'name' => $_REQUEST['name'],
        ];
        // goi model 
        $objCategory = new Category();
        $objCategory->save($data);
        // chuyen huowng ve trang danh sach
        $this->redirect("index.php?controller=category&action=index.php");
    }

    // Gọi tới trang chỉnh sửa
    public function edit(){
        $id = $_REQUEST['id'];
        // Gọi model
        $objCategory = new Category();
        $item = $objCategory->find($id);
        // truyen xuong view
        include_once 'views/category/edit.php';
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
        ];
        // Gọi model
        $objCategory = new Category();
        $objCategory->update($id,$data);

        // Chuyển hướng về trang danh sách
        $this->redirect("index.php?controller=category&action=index.php");
    }

    public function destroy(){
        $id = $_REQUEST['id'];
        // Gọi model
        $objCategory = new Category();
        $objCategory->delete($id);

        // Chuyển hướng về trang danh sách
        $this->redirect("index.php?controller=category&action=index.php");
    }
}