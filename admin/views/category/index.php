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
<a class="btn btn-primary"   href="index.php?controller=category&action=create"> Thêm mới </a>  
<table border="1" class="table">
    <thead>
        <tr>
            <th>STT</th>
            <th>TÊN HÀNG</th>
            <th>CÔNG CỤ</th>
        </tr>
    </thead>
    <tbody>
    </td>
    <?php foreach( $items as $key => $row ): 
            // echo '<pre>';
            // print_r($row);
            // die();
            ?>
            <tr>
                <td> <?php echo ++$key;?>  </td>
                <td><?php echo $row['name'];?></td>
                </td>
                <td>
                    <a class="btn btn-warning" href="index.php?controller=category&action=edit&id=<?= $row['id'] ;?>"><i class="bi bi-pencil"></i></a> </a>
                    <a class="btn btn-danger"onclick="return confirm('Bạn có chắc chắn muốn xóa không?')" href="index.php?controller=category&action=destroy&id=<?= $row['id'] ;?>"><i class="bi bi-trash3"></i></a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
