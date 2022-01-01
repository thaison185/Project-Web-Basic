<?php
require "../../connect.php";
session_start();
require '../check-role.php';
if($_SESSION['role'] != 1) {
    header('location:index.php');
    exit;
}
if(!isset($_GET['id'])){
    session_start();
    $_SESSION['error']="No order selected!";
    header('location:index.php');
    exit;
}
unset($_SESSION['error']);
$id=$_GET['id'];
$sql="delete from order_details where order_id=$id";
if(!$connect->query($sql)){
    echo($connect->error);
    exit;
}
$sql="delete from orders where id=$id";
if(!$connect->query($sql)){
    echo($connect->error);
    exit;
}
$connect->close();
$_SESSION['success']="Order #$id Deleted!";
header('location:index.php');