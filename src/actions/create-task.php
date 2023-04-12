<?php
    include '../config.php';
    $connections = db();
    if(isset($_SESSION['token_id'])){
        $user_id = $_SESSION['token_id'];
    }else{
        echo header("location:../../pages/dashboard.php"); 
    }
   
    if(isset($_POST['add-task'])){
        $list_name = $_POST['list_name'];
        if(trim($list_name) !=''){
         mysqli_query(
              $connections,
            "INSERT INTO to_do_list (list_id,user_id,list_name)values('','$user_id','$list_name')"
            );
    }
    echo header("location:../../pages/dashboard.php"); 
}


?>