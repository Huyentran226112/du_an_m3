<h3>Chỉnh sửa đơn hàng</h3>
<form action="index.php?controller=order&action=update&id=<?= $item['id'];?>" method="post">
NGÀY ĐẶT HÀNG :<input type="date"class="form-control" name="order_date" value="<?= $item['order_date'];?>" required> <br>
TỔNG TIỀN: <input type="text"class="form-control" name="total" value="<?= $item['total'];?>"> <br>
TÊN KHÁCH HÀNG : <input type="text" class="form-control"name="cutstomer_name" value="<?= $item['cutstomer_name'];?>"required> <br>
SỐ ĐIỆN THOẠI : <input type="text"class="form-control" name="cutstomer_phone" value="<?= $item['cutstomer_phone'];?>"required> <br>
ĐỊA CHỈ: <input type="text"class="form-control" name="cutstomer_address" value="<?= $item['cutstomer_address'];?>"required> <br>
    <input type="submit"class="btn btn-primary" value="SỬA">
    <a class="btn btn-primary" href="index.php?controller=order&action=index.php"> Quay lại </a>
</form>
