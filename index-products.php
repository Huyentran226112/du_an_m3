<?php
$sql = "SELECT products.*,categories.name AS category_name FROM `products` 
JOIN categories ON products.category_id = categories.id";
$stmt = $conn->query($sql);
$stmt->setFetchMode(PDO::FETCH_ASSOC);//array 
$products = $stmt->fetchAll();
?>
<div class="container-fluid pt-5 pb-3">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">SẢN PHẨM NỔI BẬT </span></h2>
        <div class="row px-xl-5">
            <?php foreach( $products as $key => $row ): ?>
            <!-- bắt đầu lặp -->
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <div class="product-item bg-light mb-4">
                    <div class="product-img position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="admin<?php echo $row['image'];?>" alt="">
                        <div class="product-action">
                            <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-shopping-cart"></i></a>
                            <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-search"></i></a>
                        </div>
                    </div>
                    <div class="text-center py-4">
                        <a class="h6 text-decoration-none text-truncate" href=""><?php echo $row['name'];?></a>
                        <div class="d-flex align-items-center justify-content-center mt-2">
                            <h5><?php echo number_format($row['price']);?>VNĐ</h5>
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
            </div>
            <!-- kết thúc lặp -->
            <?php endforeach; ?>
        </div>
    </div>