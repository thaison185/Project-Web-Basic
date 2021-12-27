<?php
    session_start();
    require 'check-role.php';
    if($_SESSION['role'] != 1) {
        header('location:customers.php');
        exit;
    }
    $_SESSION['cur']="Customers";
    if(!isset($_GET['id'])){
        $_SESSION['error']="No customer selected!";
        header('location:customers.php');
        exit;
    }
    unset($_SESSION['error']);
    $id=$_GET['id'];

    require 'connect.php';
    $sql= "select id from orders where customer_id=$id";
    $arr=$connect->query($sql);

    $sql="delete from orders where customer_id=$id";
    $res=$connect->query($sql);
    if($connect->error != '') {$_SESSION['error'] = $connect->error;  mysqli_close($connect);  header("location:customers.php"); exit;}

    while ($each=$arr->fetch_array()){
        $arr_id=$each['id'];
        $sql="delete from order_details where order_id=$arr_id";
        $res=$connect->query($sql);
        if($connect->error != '') {$_SESSION['error'] = $connect->error;  mysqli_close($connect); header("location:customers.php"); exit;}
    }

    $sql="delete from customers where id=$id";
    $res=$connect->query($sql);
    if($connect->error != '') {$_SESSION['error'] = $connect->error;}
    mysqli_close($connect);
    header("location:customers.php");
?>

