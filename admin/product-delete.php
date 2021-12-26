<?php
    session_start();
    $_SESSION['cur']="Products";
    if(!isset($_GET['id'])){
        $_SESSION['error']="No product selected!";
        header('location:products.php');
        exit;
    }
    unset($_SESSION['error']);
    $id=$_GET['id'];


    require 'connect.php';
    $sql="delete from items where id=$id";
    $res=$connect->query($sql);
    if($connect->error != '') {$_SESSION['error'] = $connect->error;}
    mysqli_close($connect);
    header("location:products.php");