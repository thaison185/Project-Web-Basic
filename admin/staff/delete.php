<?php
    session_start();
    require '../check-role.php';
    if($_SESSION['role'] != 1) {
        header('location:../dashboard');
        exit;
    }
    $_SESSION['cur']="Staff";
    if(!isset($_GET['id'])){
        $_SESSION['error']="No staff selected!";
        header('location:index.php');
        exit;
    }
    $id=$_GET['id'];
    require '../../connect.php';
    $sql = "select * from staff where id=$id";
    $res = $connect->query($sql)->fetch_array();
    if (empty($res)) {
        $_SESSION['error'] = "Staff id=$id not exist!";
        header('location:index.php');
        exit;
    }
    unset($_SESSION['error']);
    $sql="select * from staff where id=$id";
    $res=$connect->query($sql);
    if(!$res->num_rows>0){
        $_SESSION['error']="Can't find staff whom id=$id!";
        header('location:index.php');
        exit;
    }
    $staff=$res->fetch_array();
    if($staff['role']==1){
        $_SESSION['error']="Can't Delete Administrator!";
        $connect->close();
        header('location:index.php');
        exit;
    }

    $res=$connect->query("select avatar from staff where id=$id");
    $old='../../'.$res->fetch_array()['avatar'];
    if (is_file($old)&&file_exists($old)){if(!unlink($old)){die("$old error");}}

    $sql="delete from staff where id=$id";
    $res=$connect->query($sql);
    if($connect->error != '') {$_SESSION['error'] = $connect->error;}
    mysqli_close($connect);
    $_SESSION['success']="Staff #$id has been Deleted!";
    header("location:index.php");
?>

