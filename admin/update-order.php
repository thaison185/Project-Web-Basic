<?php 
    session_start();
    require 'check-role.php';
    $_SESSION['cur']="Shipping Orders";
    if(!isset($_GET['id'])){
        session_start();
        $_SESSION['error']="No order selected!";
        header('location:orders.php');
        exit;
    }
    unset($_SESSION['error']);
    $id=$_GET['id'];
    require 'connect.php';
    if(isset($_GET['status'])){
        $stat=$_GET['status'];
        $sql="update orders
        set
        status='$stat'
        where id=$id";
        $res=$connect->query($sql);
        mysqli_close($connect);
        header('location:orders.php');
    }
    else{
        mysqli_close($connect);
        header('location:orders.php');
    } 
 ?>
