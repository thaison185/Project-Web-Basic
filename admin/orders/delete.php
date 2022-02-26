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
$id=$_GET['id'];
$sql="select status from orders where id=$id";
$res=$connect->query($sql)->fetch_array();
if(empty($res)){
    $_SESSION['error']="Order id=$id not exist!";
    header('location:index.php');
    exit;
}else{
    if($res['status']!='Rejected'){
        $_SESSION['error']="Can delete only Rejected orders!";
        header('location:index.php');
        exit;
    }
}
unset($_SESSION['error']);
if (!isset($result)) 
$result = new stdClass();
$sql="delete from order_details where order_id=$id";
if(!$connect->query($sql)){
    $result->status="error";
    $result->message=$connect->error;
    echo json_encode($result);
    exit;
}
$sql="delete from orders where id=$id";
if(!$connect->query($sql)){
    $result->status="error";
    $result->message=$connect->error;
    echo json_encode($result);
    exit;
}
$connect->close();
$result->status="success"; 
$result->message="Order #$id Deleted!";
echo json_encode($result);
// header('location:index.php');