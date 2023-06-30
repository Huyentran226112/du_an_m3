<?php
session_start();
include_once 'functions.php';
include_once 'conn.php';
// Kiểm tra tồn tại chỉ số action trong mảng $_REQUEST
if( isset( $_REQUEST['action'] ) ){
    $action = $_REQUEST['action'];
}else{
    $action = 'index';
}

$actions = [
    'login','register','postregister','postlogin'
];

if (!isset($_SESSION['user']) && !in_array($action,$actions)) {
    header('Location: index.php?controller=user&action=login');
    die();
}
?>
<?php if($action != 'login' && !in_array($action,$actions) ): ?>
<?php include_once 'layouts/header.php' ?>
<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <?php include_once 'layouts/sidebar.php' ?>
    </div>
    <div id="layoutSidenav_content">
        <main>
            <main>
                <div class="container-fluid px-4">
                    <?php include_once 'route.php'; ?>
                </div>
            </main>
        </main>
        <?php include_once 'layouts/footer.php' ?>
    </div>
</div>
<?php else: ?> 
    <?php include_once 'route.php'; ?>
<?php endif; ?>
