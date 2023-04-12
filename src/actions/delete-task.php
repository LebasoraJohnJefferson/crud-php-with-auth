<?php
    include '../config.php';
    $connections = db();
    $list_id = $_GET['list_id'];
    if(isset($list_id)){
        $delete_list = mysqli_query($connections,"DELETE FROM `to_do_list` WHERE 	list_id='$list_id'");
        echo header("location:../../pages/dashboard.php"); 
    }


?>