<?php
    session_start();
    require 'check-role.php';
    if($_SESSION['role'] != 1) {
        header('location:products.php');
        exit;
    }
    $_SESSION['cur']="Products";
    if(!isset($_GET['id'])){
        $_SESSION['error']="No product selected!";
        header('location:products.php');
        exit;
    }
    unset($_SESSION['error']);
    $id=$_GET['id'];

    require 'connect.php';
    $sql= "select order_id from order_details where item_id=$id";
    $arr=$connect->query($sql);

    $sql="delete from order_details where item_id=$id";
    $res=$connect->query($sql);
    if($connect->error != '') {$_SESSION['error'] = $connect->error;  mysqli_close($connect);  header("location:products.php"); exit;}

    while ($each=$arr->fetch_array()){
        $arr_id=$each['order_id'];
        $sql="delete from orders where id=$arr_id";
        $res=$connect->query($sql);
        if($connect->error != '') {$_SESSION['error'] = $connect->error;  mysqli_close($connect); header("location:products.php"); exit;}
    }

    $sql="delete from items where id=$id";
    $res=$connect->query($sql);
    if($connect->error != '') {$_SESSION['error'] = $connect->error;}
    mysqli_close($connect);
    header("location:products.php");
?>

