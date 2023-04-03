<?php
if(isset($_GET['add'])){
    $add = $_GET['add'];
   
}
if (!isset ($_GET['page']) ) {
    
    $page = 1;
    
} else {
    
    $page = $_GET['page'];
    // echo'<pre>';
    // print_r($page);
    // die();
 
}
$results_per_page = 5;

$page_first_result = ($page-1) * $results_per_page;
$page_last_result = $page_first_result + 4;

$number_of_result = count($items);

$number_of_page = ceil ($number_of_result / $results_per_page);

?>
<div class="container-fluid px-4"><br>
<a class="btn btn-primary"   href="index.php?controller=order&action=create"> Thêm mới </a>  
<table border="1" class="table">
    <thead>
        <tr>
            <th>MÃ ĐƠN HÀNG</th>
            <th>NGÀY ĐẶT HÀNG </th>
            <th>TỔNG TIỀN </th>
            <th>TÊN KHÁCH HÀNG </th>
            <th>SỐ ĐIỆN THOẠI  </th>
            <th>ĐỊA CHỈ </th>
            <th>CÔNG CỤ </th>
           
        </tr>
    </thead>
    <tbody>
    </td>
    <?php 
                for($page_first_result; $page_first_result<= $page_last_result; $page_first_result++) {
                    //nếu thứ tự của số phân tử hiện thị nhỏ hơn số phân tử của database trả về thì hiển thị 
                    // nếu lớn hơn sẽ dừng vòng lặp 
                    if($page_first_result<$number_of_result){
                    
                    echo ' <tr>
                        <td>'.$items[$page_first_result]['id'].'</td>
                        <td>'.$items[$page_first_result]['order_date'].'</td>
                        <td>'.$items[$page_first_result]['total'].'</td>
                        <td>'.$items[$page_first_result]['cutstomer_name'].'</td>
                        <td>'.$items[$page_first_result]['cutstomer_phone'].'</td>
                        <td>'.$items[$page_first_result]['cutstomer_address'].'</td>
                        <td>
                        <a class="btn btn-warning"  href="index.php?controller=order&action=edit&id '.$items[$page_first_result]['id'].' "><i class="bi bi-pencil"></i></a> <br>
                        <a  class="btn btn-danger"onclick="return confirm(`Bạn có chắc chắn muốn xóa không?`)" href="index.php?controller=order&action=destroy&id='.$items[$page_first_result]['id'].'"><i class="bi bi-trash3"></i></a>
                    </td>
                        </tr> ';}
                    }
             ?>
    </tbody>
</table>
<?php
                    // chạy vòng lặp hiển thị phần trang 
                    for($page = 1; $page<= $number_of_page; $page++) {
                        echo '<a href = "  http://localhost:3000/admin/index.php?controller=order&action=index.php&page=' . $page . '">' . $page . ' </a>';
                    }
      
                    ?>