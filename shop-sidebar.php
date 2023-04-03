
<?php
$sql = "SELECT * FROM `categories`";
$stmt = $conn->query($sql);
$stmt->setFetchMode(PDO::FETCH_ASSOC);//array 
$categories = $stmt->fetchAll();
?>
<div class="col-lg-3 col-md-4">
                <!-- Price Start -->
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">DANH MỤC SẢN PHẨM</span></h5>
                <div class="bg-light p-4 mb-30">
                    <form>
                    <?php foreach( $categories as $key => $category ): ?>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <label class="custom-control-label" for="price-all">
                                <a href="shop.php?category_id=<?php echo $category['id'];?>" >
                                    <?php echo $category['name'];?>
                                </a>
                            </label>
                        </div>
                        <?php endforeach; ?>
                    </form>
                </div>
                <!-- Price End -->
            </div>