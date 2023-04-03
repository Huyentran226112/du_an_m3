<?php include_once 'db.php'; ?>
<?php include_once 'header.php'; ?>
<?php
$id = $_GET['id'];
$sql = "SELECT * FROM `products` WHERE id = $id";
// debug sql
// var_dump($sql);
$stmt = $conn->query($sql);
$stmt->setFetchMode(PDO::FETCH_ASSOC);//array 
$row = $stmt->fetch();
 // Lay ve du lieu duy nhat
    // echo '<pre>';
    // print_r($row);
    // die();
?>
    <!-- Shop Detail Start -->
    <div class="container-fluid pb-5">
        <div class="row px-xl-5">
            <div class="col-lg-5 mb-30">
                <div id="product-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner bg-light">

                        <div class="carousel-item active">
                            <img class="w-100 h-100" src="admin<?php echo $row['image'];?>" alt="Image">
                        </div>
                      
                    </div>
              
                </div>
            </div>

            <div class="col-lg-7 h-auto mb-30">
                <div class="h-100 bg-light p-30">
                    <h3><?php echo $row["name"]; ?></h3>
                    <div class="d-flex mb-3">
                        <div class="text-primary mr-2">
                            <small class="fas fa-star"></small>
                            <small class="fas fa-star"></small>
                            <small class="fas fa-star"></small>
                            <small class="fas fa-star-half-alt"></small>
                            <small class="far fa-star"></small>
                        </div>
                        <small class="pt-1">(99 Reviews)</small>
                    </div>
                    <h3 class="font-weight-semi-bold mb-4"><?php echo number_format($row['price']);?>VNĐ</h3>
                    <p class="mb-4">
                    <?php echo $row["description"]; ?>
                    </p>
                   
                    <div class="d-flex align-items-center mb-4 pt-2">
                        <div class="input-group quantity mr-3" style="width: 130px;">
                            <div class="input-group-btn">
                                <button class="btn btn-primary btn-minus">
                                    <i class="fa fa-minus"></i>
                                </button>
                            </div>
                            <input type="text" class="form-control bg-secondary border-0 text-center" value="1">
                            <div class="input-group-btn">
                                <button class="btn btn-primary btn-plus">
                                    <i class="fa fa-plus"></i>
                                </button>
                            </div>
                        </div>
                        <button class="btn btn-primary px-3"><i class="fa fa-shopping-cart mr-1"></i> Add To
                            Cart</button>
                    </div>
                    <div class="d-flex pt-2">
                        <strong class="text-dark mr-2">Share on:</strong>
                        <div class="d-inline-flex">
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-pinterest"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Shop Detail End -->

    <?php
    $category_id = $row['category_id'];
    $id = $row['id'];
    $sql = "SELECT * FROM `products` WHERE category_id = $category_id AND id != $id";
    // echo $sql;
    // die();
    $stmt = $conn->query($sql);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);//array 
    $products = $stmt->fetchAll();
    // echo "<pre>";
    // print_r($products);
    // die();
    ?>

    <!-- Products Start -->
    <div class="container-fluid py-5">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">BẠN CŨNG CÓ THỂ THÍCH </span></h2>
        <div class="row px-xl-5">
            <div class="col">
                <div class="owl-carousel related-carousel">
                <?php foreach( $products as $key => $product ): ?>  
                <!-- bat đầu lặp  -->
                    <div class="product-item bg-light">
                        <div class="product-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="admin<?php echo $product['image'];?>" alt="">
                            <div class="product-action">
                                <a class="btn btn-outline-dark btn-square" href="detail.php?id=<?php echo $row['id'];?>"><i class="fa fa-shopping-cart"></i></a>
                                <a class="btn btn-outline-dark btn-square" href="detail.php?id=<?php echo $row['id'];?>"><i class="fa fa-search"></i></a>
                            </div>
                        </div>
                        <div class="text-center py-4">
                            <a class="h6 text-decoration-none text-truncate" href=""><?php echo $product["name"]; ?></a>
                            <div class="d-flex align-items-center justify-content-center mt-2">
                                <h5><?php echo number_format($product['price']);?>VNĐ</h5>
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
                    <!-- kết thúc lặp  -->
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
    <!-- Products End -->


<?php include_once 'footer.php'; ?>