<?php
    include '../config.php';
    $connections = db();
    $list_id = $_SESSION['list_id'];
    if(isset($_SESSION['token_id'])){
        $user_id = $_SESSION['token_id'];
    }else{
        echo header("location:../../pages/dashboard.php"); 
    }
   
    if(isset($_POST['edit-task'])){
        $list_name = $_POST['list_name'];
        if(trim($list_name) !=''){
         mysqli_query(
              $connections,
            "UPDATE `to_do_list` SET `user_id`='$user_id',`list_name`='$list_name' WHERE `list_id`='$list_id'"
            );
    }
    unset($_SESSION['list_id']);

    }
    echo header("location:../../pages/dashboard.php"); 

?>