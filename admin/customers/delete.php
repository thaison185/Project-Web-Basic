<?php
    session_start();
    require '../check-role.php';
    if($_SESSION['role'] != 1) {
        header('location:index.php');
        exit;
    }
    $_SESSION['cur']="Customers";
    if(!isset($_GET['id'])){
        $_SESSION['error']="No customer selected!";
        header('location:index.php');
        exit;
    }
    $id=$_GET['id'];
    require '../../connect.php';
    $sql = "select * from customers where id=$id";
    $res = $connect->query($sql)->fetch_array();
    if (empty($res)) {
        $_SESSION['error'] = "Customer id=$id not exist!";
        header('location:index.php');
        exit;
    }

    unset($_SESSION['error']);
    $sql= "select id from orders where customer_id=$id";
    $arr=$connect->query($sql);

    $sql="delete from orders where customer_id=$id";
    $res=$connect->query($sql);
    if($connect->error != '') {$_SESSION['error'] = $connect->error;  mysqli_close($connect);  header("location:index.php"); exit;}

    while ($each=$arr->fetch_array()){
        $arr_id=$each['id'];
        $sql="delete from order_details where order_id=$arr_id";
        $res=$connect->query($sql);
        if($connect->error != '') {$_SESSION['error'] = $connect->error;  mysqli_close($connect); header("location:index.php"); exit;}
    }

    $res=$connect->query("select avatar from customers where id=$id");
    $old='../../'.$res->fetch_array()['avatar'];
        if (is_file($old)&&file_exists($old)){if(!unlink($old)){die("$old error");}}
        
    $sql="delete from customers where id=$id";
    $res=$connect->query($sql);
    if($connect->error != '') {$_SESSION['error'] = $connect->error;}
    mysqli_close($connect);
    $_SESSION['success']="Customer #$id has been Deleted!";
    header("location:index.php");
?>

