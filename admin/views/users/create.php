<h3>Thêm người dùng </h3>
<form action="index.php?controller=user&action=store" method="post" enctype ="multipart/form-data" >
HỌ VÀ TÊN :<input type="text" class="form-control" name="name"required> <br>
ĐỊA CHỈ: <input type="text" class="form-control" name="address"required> <br>
NGÀY LÀM VIỆC  : <input type="date" class="form-control" name="start_date"required> <br>
ĐIỆN THOẠI : <input type="text" class="form-control" name="phone"required> <br>
EMAIL: <input type="text" class="form-control" name="email"required> <br>
MẬT KHẨU: <input type="text" class="form-control" name="password"required> <br>
<!-- ẢNH: <input type="file" class="form-control" name="image"><br> -->
    <input type="submit"class="btn btn-primary"  value="THÊM">
    <a class="btn btn-primary" href="index.php?controller=order&action=index.php"> Quay lại </a>

</form>