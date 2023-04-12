<?php
    include '../config.php';
    unset($_SESSION['token_id']);
    $_SESSION['msg']= 'Successfully Log Out!';
    echo header("location:../../"); 
?>