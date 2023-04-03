<?php
class Controller{
    // goi view cho ung dung
    public function view($viewName,$data =[]){
        if(count($data)){
            extract($data);
        }
        
        include_once 'views/'.$viewName;
    }
    // chuyen huong 
    public function redirect($url){
        ?>
        <script>
            window.location.href = '<?= $url; ?>';
        </script>
        <?php
        // header("Location: $url");
        die();
    }
}