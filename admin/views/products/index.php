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
<a class="btn btn-primary"   href="index.php?controller=product&action=create"> Thêm mới </a>  
<table border="1" class="table">
    <thead>
        <tr>
            <th>STT</th>
            <th>TÊN HÀNG</th>
            <th>GIÁ BÁN</th>
            <th>SỐ LƯỢNG</th>
            <th>THỂ LOẠI</th>
            <th>ẢNH</th>
            <th>TRẠNG THÁI</th>
            <th>CÔNG CỤ </th>
           
        </tr>
    </thead>
    <tbody>
   
            <?php 
                for($page_first_result; $page_first_result<= $page_last_result; $page_first_result++) {
                    //nếu thứ tự của số phân tử hiện thị nhỏ hơn số phân tử của database trả về thì hiển thị 
                    // nếu lớn hơn sẽ dừng vòng lặp 
                    if($page_first_result<$number_of_result){
                    
                    echo ' <tr>
                        <td>'.$items[$page_first_result]['id'].'</td>
                        <td>'.$items[$page_first_result]['name'].'</td>
                        <td>'.$items[$page_first_result]['price'].'</td>
                        <td>'.$items[$page_first_result]['quantity'].'</td>
                        <td>'.$items[$page_first_result]['category_name'].'</td>
                        <td><img src="http://localhost:3000/admin'. $items[$page_first_result]['image'].'" width="80"></td>
                        <td>'.$items[$page_first_result]['status']=0?'Tắt':'Bật'.'</td>
                        <td>
                        <a class="btn btn-warning"  href="index.php?controller=product&action=edit&id '.$items[$page_first_result]['id'].' "><i class="bi bi-pencil"></i></a> <br>
                        <a  class="btn btn-danger"onclick="return confirm(`Bạn có chắc chắn muốn xóa không?`)" href="index.php?controller=product&action=destroy&id='.$items[$page_first_result]['id'].'"><i class="bi bi-trash3"></i></a>
                    </td>
                        </tr> ';}
                    }
            // foreach( $items as $key => $row ):  
                    // echo '<pre>';
                    // print_r($row);
                    // die();
             ?>
                               
    </tbody>
</table>   
                   <?php
                    // chạy vòng lặp hiển thị phần trang 
                    for($page = 1; $page<= $number_of_page; $page++) {
                        echo '<a href = "  http://localhost:3000/admin/index.php?controller=product&action=index.php&page=' . $page . '">' . $page . ' </a>';
                    }
                    ?>
                    <script>
                      const queryString = window.location.search;
                        const urlParams = new URLSearchParams(queryString);
                        const add = urlParams.get('add')
                       
                        if(add=='successfully'){
                         alert('thêm thành công')
                        }else if(add=='failedd'){
                            alert('them that bai')
                        }
                    </script>  
                    



