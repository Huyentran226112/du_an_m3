<?php
include_once 'models/Category.php';
class Indexcontrollers extends Controller{
    // goi toi trang danh sach 
    public function index(){
        //  goi toi model
        
        $this->view('index.php');
    }
}



