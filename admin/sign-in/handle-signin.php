<?php
session_start();
    $email = addslashes($_POST['email']);
    $password = $_POST['password'];
    require '../../connect.php';

    $valid = "select * from staff 
    where email='$email'";
    $result =$connect->query($valid);
    if($result->num_rows==1){
        $cre=mysqli_fetch_array($result);
        $hashed = $cre['hashed_password'];
        if(password_verify($password,$hashed)){
            $_SESSION['id']= $cre['id'];
            $_SESSION['username'] = $cre['username'];
            $_SESSION['role']= $cre['role'];
            $_SESSION['avatar'] = $cre['avatar'];
            $_SESSION['email'] = $cre['email'];
            unset($_SESSION['error']);
            header('location:../dashboard');
            exit;
        }
    } 
$_SESSION['error']="Invalid email or password!";
header('location:index.php');