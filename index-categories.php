<?php
$sql = "SELECT * FROM `categories`";
$stmt = $conn->query($sql);
$stmt->setFetchMode(PDO::FETCH_ASSOC);//array 
$categories = $stmt->fetchAll();
?>
<div class="container-fluid pt-5">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">THỂ LOẠI </span></h2>
        <div class="row px-xl-5 pb-3">
        <?php foreach( $categories as $key => $row ):?>
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <a class="text-decoration-none" href="">
                    <div class="cat-item d-flex align-items-center mb-4">
                        <div class="overflow-hidden" style="width: 100px; height: 100px;">
                            <img class="img-fluid" src="publics/img/772741148_dong-ho-co-thuy-sy-phien-ban-gioi-han.jpg" alt="">
                        </div>
                        <div class="flex-fill pl-3">
                            <h6><?php echo $row['name'];?></h6>
                            <!-- <small class="text-body">100 Products</small> -->
                        </div>
                    </div>
                </a>
            </div>
            <?php endforeach; ?>
        </div>
    </div>