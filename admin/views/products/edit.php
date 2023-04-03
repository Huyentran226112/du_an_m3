<h3> Chỉnh sửa mặt hàng </h3>
<form action="index.php?controller=product&action=update&id=<?= $item['id'];?>" method="post" enctype ="multipart/form-data">
    TÊN HÀNG :<input type="text" class="form-control" name="name" value="<?= $item['name'];?>"required> <br>
    GIÁ BÁN: <input type="text" class="form-control" name="price" value="<?= $item['price'];?>"required> <br>
    SỐ LƯỢNG : <input type="text" class="form-control" name="quantity" value="<?= $item['quantity'];?>"required> <br>
    THỂ LOẠI: 
    <select name="category_id" class="form-control">
        <?php foreach( $categories as $category ): ?>
        <option value="<?php echo $category['id'];?>"><?php echo $category['name'];?></option>
        <?php endforeach; ?>
    </select> <br><br>
    ẢNH: <input type="file" class="form-control" name="image" value="<?= $item['image'];?>"required> <br>
    MÔ TẢ: <input type="text" class="form-control" name="description" value="<?= $item['description'];?>"required> <br>
    TRẠNG THÁI: <select id="select" name="status">
        <?php
                                if($item['status']==0){

                                ?>
        <option selected value="0">Tắt</option>
        <option value="1">Bật</option>
        <?php
                                }else{   
                                ?>
        <option value="0">Tắt</option>
        <option selected value="1">Bật</option>
        <?php
                                }
                                ?>
    </select><br>

    <input type="submit" class="btn btn-primary" value="SỬA">
    <a class="btn btn-primary" href="index.php"> Quay lại </a>


</form>