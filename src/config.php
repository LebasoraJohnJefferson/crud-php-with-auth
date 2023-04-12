<?php
    session_start();

    function db(){
        $host_name = "localhost";
        $username = "root";
        $password = "";
        $database_name = "to_do_list";
        $connections = mysqli_connect($host_name,$username,$password,$database_name);
        if ($connections->connect_error) {
            die('Connect Error (' . $connections->connect_errno . ') ' . $connections->connect_error);
        }else{
            return $connections;
        }
    }
?>