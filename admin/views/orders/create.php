<h3>Thêm đơn hàng</h3>
<form action="index.php?controller=order&action=store" method="post">
NGÀY ĐẶT HÀNG:<input type="date" class="form-control"name="order_date"  required> <br>
TỔNG TIỀN : <input type="text"class="form-control" name="total" required> <br>
TÊN KHÁCH HÀNG : <input type="text"class="form-control" name="cutstomer_name" required> <br>
SỐ ĐIỆN THOẠI : <input type="text"class="form-control" name="cutstomer_phone" required> <br>
ĐỊA CHỈ: <input type="text"class="form-control" name="cutstomer_address" required> <br>
    <input type="submit" class="btn btn-primary" value="THÊM">
    <a class="btn btn-primary" href="index.php?controller=order&action=index.php"> Quay lại </a>
</form>
