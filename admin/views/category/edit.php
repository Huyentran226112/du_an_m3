<h3>Chỉnh sửa thể loại</h3>
<form action="index.php?controller=category&action=update&id=<?= $item['id'];?>" method="post">
    TÊN HÀNG :<input type="text" name="name" class="form-control" value="<?= $item['name'];?>"> <br>
    <input type="submit"class="btn btn-primary" value="SỬA">
    <a class="btn btn-primary" href="index.php?controller=category&action=index.php"> Quay lại </a>

</form>