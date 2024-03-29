<?php
session_start();
require '../check-role.php';
if ($_SESSION['role'] != 1) {
    header('location:index.php');
    exit;
}
$_SESSION['cur'] = "Products";
if (!isset($_GET['id'])) {
    $_SESSION['error'] = "No product selected!";
    header('location:index.php');
    exit;
}
$id = $_GET['id'];
require '../../connect.php';
$sql = "select * from items where id=$id";
$res = $connect->query($sql)->fetch_array();
if (empty($res)) {
    $_SESSION['error'] = "Product id=$id not exist!";
    header('location:index.php');
    exit;
}
unset($_SESSION['error']);

$sql = "select order_id from order_details where item_id=$id";
$arr = $connect->query($sql);

$sql = "delete from order_details where item_id=$id";
$res = $connect->query($sql);
if ($connect->error != '') {
    $_SESSION['error'] = $connect->error;
    mysqli_close($connect);
    header("location:index.php");
    exit;
}

while ($each = $arr->fetch_array()) {
    $arr_id = $each['order_id'];
    $sql = "delete from orders where id=$arr_id";
    $res = $connect->query($sql);
    if ($connect->error != '') {
        $_SESSION['error'] = $connect->error;
        mysqli_close($connect);
        header("location:index.php");
        exit;
    }
}
$res = $connect->query("select image from items where id=$id");
$old = '../../' . $res->fetch_array()['image'];
if (is_file($old) && file_exists($old)) {
    if (!unlink($old)) {
        die("$old error");
    }
}
$sql = "delete from items where id=$id";
$res = $connect->query($sql);
if ($connect->error != '') {
    $_SESSION['error'] = $connect->error;
}
mysqli_close($connect);
$_SESSION['success'] = "Product #$id has been Deleted!";
header("location:index.php");
