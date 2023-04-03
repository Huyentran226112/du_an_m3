<?php  
// Kiểm tra tồn tại chỉ số action trong mảng $_REQUEST
if( isset( $_REQUEST['controller'] ) ){
    $controller = $_REQUEST['controller'];
}else{
    $controller = 'product';
}
if( isset( $_REQUEST['action'] ) ){
    $action = $_REQUEST['action'];
}else{
    $action = 'index';
}
include_once 'controllers/Controller.php';
// Quyết định gọi controller nào dựa vào biến controller
switch ($controller) {
    case 'product':
        include_once 'controllers/ProductController.php';
        $objController = new ProductController();
        break;
    case 'user':
        include_once 'controllers/UserController.php';
        $objController = new UserController();
        break;
    case 'category':
        include_once 'controllers/CategoryController.php';
        $objController = new CategoryController();
        break;
    case 'order':
        include_once 'controllers/OrderController.php';
        $objController = new OrderController();
        break;
        case 'index':
            include_once 'controllers/Indexcontrollers.php';
            $objController = new Indexcontrollers();
            break;
    default:
        # code...
        break;
}
// var_dump($controller);
// var_dump($action);

// Quyết định gọi action nào dựa vào biến action
switch ($action) {
    // Hiển thị trang danh sách
    case 'index':
        $objController->index();
        break;
    // Hiển thị form thêm mới
    case 'create':
        $objController->create();
        break;
    // Xử lý thêm mới
    case 'store':
        $objController->store();
        break;
    // Hiển thị form chỉnh sửa
    case 'edit':
        $objController->edit();
        break;
    // Xử lý chỉnh sửa
    case 'update':
        $objController->update();
        break;
    // Hiển thị trang xóa
    case 'edit':
        $objController->edit();
        break;
     // Xử lý xóa
    case 'destroy':
        $objController->destroy();
        break;
    default:
        $objController->index();
        break;
}