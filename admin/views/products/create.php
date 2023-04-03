<h3> Thêm mới mặt hàng </h3>
<form action="index.php?controller=product&action=store" method="post" enctype ="multipart/form-data">
    TÊN HÀNG :<input type="text"class="form-control" name="name"required> <br>
    GIÁ BÁN: <input type="text"class="form-control" name="price"required> <br>
    SỐ LƯỢNG : <input type="text"class="form-control" name="quantity"required> <br>
    <!-- <input type="text" class="form-control"name="category_id"> <br> -->
    THỂ LOẠI: 
    <select name="category_id" class="form-control">
    <option value="">--Vui lòng chọn--</option>
            <?php foreach( $categories as $category ): ?>
            <option value="<?php echo $category['id'];?>"><?php echo $category['name'];?></option>
            <?php endforeach; ?>
        </select> <br>
    ẢNH: <input type="file" class="form-control" name="image"required> <br>
    MÔ TẢ : <input type="text" class="form-control"name="description"required> <br>
    TRẠNG THÁI:  <select id="select" name="status">
                                <option value="1">Bật</option>
                                <option value="0">Tắt</option>
                            </select> <br>
    <input type="submit"class="btn btn-primary"  value="THÊM">
    <a class="btn btn-primary" href="index.php"> Quay lại </a>
</form>
