<?php
    $email = addslashes($_POST['email']);
    $password = $_POST['password'];
    require 'connect.php';

    $valid = "select * from staff 
    where email='$email'";
    $result =$connect->query($valid);
    if($result->num_rows==1){
        $cre=mysqli_fetch_array($result);
        $hashed = $cre['hashedpwd'];
        if(password_verify($password,$hashed)){
            session_start();
            $_SESSION['id']= $cre['id'];
            $_SESSION['user_name'] = $cre['user_name'];
            $_SESSION['role']= $cre['role'];
            $_SESSION['avatar'] = $cre['avatar'];
            $_SESSION['email'] = $cre['email'];
            header('location:dashboard.php');
            exit;
        }
    } 

header('location:login.php');