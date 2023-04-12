<?php
    include '../config.php';
    $connections = db();

    if(isset($_POST['register-btn'])){
        $username = strtolower($_POST['username']);            
        $password = $_POST['password'];            
        $full_name = $_POST['full_name'];
        if(trim($full_name) !='' && trim($password) !='' && trim($full_name) !=''){
            $username_exist = mysqli_query($connections,"SELECT * from users WhERE username='$username'");
            if(!mysqli_num_rows($username_exist)){
                mysqli_query(
                    $connections,
                    "INSERT INTO users (user_id,username,password,full_name)values('','$username','$password','$full_name')"
                );
                $_SESSION['msg'] = 'Successfully Registered';

            }else{
                $_SESSION['msg']= 'Username Already Exist';
            }
        }else{
            $_SESSION['msg']= 'Invalid Inputs';
        }   
        echo header("location:../../index.php");      
    }
?>