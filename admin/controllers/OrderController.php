<?php
include_once 'models/Order.php';
class OrderController extends Controller{
    // goi toi trang danh sach 
    public function index(){
        //  goi toi model
        $objOrder = new Order();
        // model thao tac voi CSDL tra ve controller 
        $items = $objOrder->all();
        // var_dump($items);
        // die();
        // truyen du lieu xuong view
        $params = [
            'items' => $items
        ];
        $this->view('orders/index.php',$params);
    }
    // goi toi trang them moi 
    public function create(){
    //   goi view ma ko truyen bien 
     $this->view('orders/create.php');
    }
    // xu li them moi
    public function store(){
        // echo '<pre>';
        // print_r($_REQUEST);
        // die();
        // lay du lieu tu $_REQUEST gan vao mang data 
        $data = [
            'order_date' => $_REQUEST['order_date'],
            'total' => $_REQUEST['total'],
            'cutstomer_name' => $_REQUEST['cutstomer_name'],
            'cutstomer_phone' => $_REQUEST['cutstomer_phone'],
            'cutstomer_address' => $_REQUEST['cutstomer_address'],
        ];
        // goi model 
        $objOrder = new Order();
        $objOrder->save($data);
        // chuyen huowng ve trang danh sach
        $this->redirect("index.php?controller=order&action=index.php");
    }

    // Gọi tới trang chỉnh sửa
    public function edit(){
        $id = $_REQUEST['id'];
        // Gọi model
        $objOrder = new Order();
        $item = $objOrder->find($id);
        // truyen xuong view
        include_once 'views/orders/edit.php';
    }

    // Xử lý chỉnh sửa
    public function update(){
        // echo '<pre>';
        // print_r($_REQUEST);
        // die();

        $id = $_REQUEST['id'];
        // Lấy dữ liệu từ _REQUEST gán vào mảng data
        $data = [
            'order_date' => $_REQUEST['order_date'],
            'total' => $_REQUEST['total'],
            'cutstomer_name' => $_REQUEST['cutstomer_name'],
            'cutstomer_phone' => $_REQUEST['cutstomer_phone'],
            'cutstomer_address' => $_REQUEST['cutstomer_address'],
        ];
        // Gọi model
        $objOrder= new Order();
        $objOrder->update($id,$data);

        // Chuyển hướng về trang danh sách
        $this->redirect("index.php?controller=order&action=index");
    }

    public function destroy(){
        $id = $_REQUEST['id'];
        // Gọi model
        $objOrder = new Order();
        $objOrder->delete($id);

        // Chuyển hướng về trang danh sách
        $this->redirect('index.php?controller=order&action=index');
    }
}