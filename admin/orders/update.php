<?php 
    session_start();
    require '../check-role.php';
    $_SESSION['cur']="Shipping Orders";
    if(!isset($_GET['id'])){
        $_SESSION['error']="No order selected!";
        header('location:index.php');
        exit;
    }
    unset($_SESSION['error']);
    $id=$_GET['id'];
    require '../../connect.php';
    if (!isset($result)) 
    $result = new stdClass();
    if(isset($_GET['status'])){
        $stat=$_GET['status'];
        $sql="update orders
        set
        status='$stat'
        where id=$id";
        $res=$connect->query($sql);
        if($connect->error==''){
        $result->status="success"; $result->message="Order #$id: Status has been changed to $stat!";echo json_encode($result);}
        else echo $connect->error;
        mysqli_close($connect);
    }
    else{
        $result->status="error"; $result->message="No status found!";echo json_encode($result);
        mysqli_close($connect);
        // header('location:index.php');
    } 
 ?>
