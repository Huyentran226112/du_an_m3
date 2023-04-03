<?php include_once 'db.php'; ?>
<?php include_once 'header.php'; ?>

<?php
$sql = "SELECT products.*,categories.name AS category_name FROM `products` 
JOIN categories ON products.category_id = categories.id 
WHERE products.status = 1";

if( isset( $_GET["s"] )){
    $s = $_GET["s"];
    $s = trim($s); 
    $sql .= " AND products.name LIKE '%$s%'";
}

if( isset( $_GET["category_id"]) ){
    $category_id = $_GET["category_id"];
    $category_id = trim($category_id);
    $sql .= " AND products.category_id = $category_id";
}
// var_dump( $sql);
// die();


$stmt = $conn->query($sql);
$stmt->setFetchMode(PDO::FETCH_ASSOC);//array 
$products = $stmt->fetchAll();
// echo '<pre>';
// print_r($products);
// die();
//paginator

if (!isset ($_GET['page']) ) {
    
    $page = 1;
    
} else {
    
    $page = $_GET['page'];
    // echo'<pre>';
    // print_r($page);
    // die();
 
}
$results_per_page = 4;

$page_first_result = ($page-1) * $results_per_page;
$page_last_result = $page_first_result + 3;

$number_of_result = count($products);

$number_of_page = ceil ($number_of_result / $results_per_page);

?>
<!-- Breadcrumb Start -->
<div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="#">Home</a>
                    <a class="breadcrumb-item text-dark" href="#">Shop</a>
                    <span class="breadcrumb-item active">Shop List</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Shop Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <!-- Shop Sidebar Start -->
            <?php include_once 'shop-sidebar.php'; ?>
            <!-- Shop Sidebar End -->


            <!-- Shop Product Start -->
            <div class="col-lg-9 col-md-8">
                <div class="row pb-3">
                    <div class="col-12 pb-1">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <div>
                                <button class="btn btn-sm btn-light"><i class="fa fa-th-large"></i></button>
                                <button class="btn btn-sm btn-light ml-2"><i class="fa fa-bars"></i></button>
                            </div>
                            <div class="ml-2">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">Sorting</button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#">Latest</a>
                                        <a class="dropdown-item" href="#">Popularity</a>
                                        <a class="dropdown-item" href="#">Best Rating</a>
                                    </div>
                                </div>
                                <div class="btn-group ml-2">
                                    <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">Showing</button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#">10</a>
                                        <a class="dropdown-item" href="#">20</a>
                                        <a class="dropdown-item" href="#">30</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    //start for
                    for($page_first_result; $page_first_result<= $page_last_result; $page_first_result++) {
                        //nếu thứ tự của số phân tử hiện thị nhỏ hơn số phân tử của database trả về thì hiển thị 
                        // nếu lớn hơn sẽ dừng vòng lặp 
                        if($page_first_result<$number_of_result){
                    echo '
                  
                   <div class="col-lg-4 col-md-6 col-sm-6 pb-1">
                        <div class="product-item bg-light mb-4">
                            <div class="product-img position-relative overflow-hidden">
                                <img class="img-fluid w-100" src="admin'.$products[$page_first_result]['image'].'">
                                <div class="product-action">
                                    <a class="btn btn-outline-dark btn-square" href="detail.php?id='.$products[$page_first_result]['id'].'">
                                    <i class="fa fa-shopping-cart"></i></a>
                                    <a class="btn btn-outline-dark btn-square" href="detail.php?id='.$products[$page_first_result]['id'].'">
                                    <i class="fa fa-search"></i></a>
                                </div>
                            </div>
                            <div class="text-center py-4">
                                <a class="h6 text-decoration-none text-truncate" 
                                href="<?= ROOT_URL ?>detail.php?id='.$products[$page_first_result]['id'].'"
                                >
                                '.$products[$page_first_result]['name'].'
                                </a>
                                <div class="d-flex align-items-center justify-content-center mt-2">
                                    <h5><?php echo number_format('.$products[$page_first_result]['price'].'VNĐ</h5>
                                </div>
                                <div class="d-flex align-items-center justify-content-center mb-1">
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small>(99)</small>
                                </div>
                            </div>
                        </div>
                    </div> ';
                    //endfor
                        }
                        }
                        ?>
                   
                    
                    
                </div>
            </div>
            <div class="col-12">
                        <nav>
                        
                            <ul class="pagination justify-content-center">
                                <?php
                            echo '<li class="page-item"><a class="page-link" href="#">Previous</a></li>';
                            
                                for($page = 1; $page<= $number_of_page; $page++) {
                                    echo '
                                    <li class="page-item "> 
                                    <a class="page-link" 
                                    href = " http://localhost:3000/shop.php?page='
                                    . $page . '" >' . $page . ' </a></li>';
                                }
                                echo '<li class="page-item"><a class="page-link" href="#">Next</a></li>';
                                
                                ?> 
                            </ul>
                        </nav>
                    </div>
            <!-- Shop Product End -->
        </div>
    </div>
    <!-- Shop End -->
<?php include_once 'footer.php'; ?>

   
                    