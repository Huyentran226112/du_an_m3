<h3>Chỉnh sửa người dùng </h3>
<form action="index.php?controller=user&action=update&id=<?= $item['id'];?>" method="post"  enctype ="multipart/form-data">
     HỌ VÀ TÊN:<input type="text" class="form-control" name="name" value="<?= $item['name'];?>"required> <br>
    ĐỊA CHỈ: <input type="text"  class="form-control" name="address" value="<?= $item['address'];?>"required> <br>
   NGÀY LÀM VIỆC : <input type="date" class="form-control" name="start_date" value="<?= $item['start_date'];?>"required> <br>
    SỐ ĐIỆN THOẠI: <input type="text" class="form-control" name="phone" value="<?= $item['phone'];?>"required> <br>
    EMAIL: <input type="text" name="email" class="form-control" value="<?= $item['email'];?>"required> <br>
    MẬT KHẨU : <input type="text" class="form-control" name="password" value="<?= $item['password'];?>"required> <br>
    <!-- ẢNH: <input type="file"  class="form-control" name="image" value="<= $item['image'];?>"> <br> -->
    <input type="submit"class="btn btn-primary"  value="SỬA">
    <a class="btn btn-primary" href="index.php?controller=order&action=index.php"> Quay lại </a>
</form>