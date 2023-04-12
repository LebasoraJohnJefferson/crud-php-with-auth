<?php
    include '../config.php';
    $connections = db();
    if(isset($_POST['login-btn'])){
        $username = strtolower($_POST['username']);            
        $password = $_POST['password'];            
        if(trim($username) !='' && trim($password) !='' ){
            $username_exist = mysqli_query($connections,"SELECT * from users WhERE username='$username' AND password='$password'");
            if(mysqli_num_rows($username_exist)){
                $row = mysqli_fetch_assoc($username_exist);
                $_SESSION['token_id']= $row['user_id'];
                echo header("location:../../pages/dashboard.php"); 
            }else{
                $_SESSION['msg']= 'User Does`nt Exist';
                echo header("location:../../index.php"); 
            }
        }else{
            $_SESSION['msg']= 'Invalid Inputs';
            echo header("location:../../index.php"); 
        }   
    }
?>