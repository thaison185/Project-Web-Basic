<?php
session_start();
require '../check-role.php';
$_SESSION['cur'] = "Shipping Orders";
if (!isset($_GET['id'])) {
    $_SESSION['error'] = "No order selected!";
    header('location:index.php');
    exit;
}
require '../../connect.php';
$id = $_GET['id'];
$sql = "select * from orders where id=$id";
$res = $connect->query($sql)->fetch_array();
if (empty($res)) {
    $_SESSION['error'] = "Order id=$id not exist!";
    header('location:index.php');
    exit;
}
if($res['status']=="Rejected" || $res['status']=="Delivered"){
    $_SESSION['error'] = "Can't change status of Rejected and Delivered orders!";
    header('location:index.php');
    exit;
}
unset($_SESSION['error']);
if (!isset($result))
    $result = new stdClass();
if (isset($_GET['status'])) {
    $stat = $_GET['status'];
    $sql = "update orders
        set
        status='$stat'
        where id=$id";
    $res = $connect->query($sql);
    if ($connect->error == '') {
        $result->status = "success";
        $result->message = "Order #$id: Status has been changed to $stat!";
        echo json_encode($result);
    } else echo $connect->error;
    mysqli_close($connect);
} else {
    $result->status = "error";
    $result->message = "No status found!";
    echo json_encode($result);
    mysqli_close($connect);
    // header('location:index.php');
}
