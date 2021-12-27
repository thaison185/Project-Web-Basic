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
    $username=addslashes($_POST['username']);
    $name=addslashes($_POST['name']);
    $email=addslashes($_POST['email']);
    $phone=addslashes($_POST['phone']);
    $DOB=addslashes($_POST['DOB']);
    $address=addslashes($_POST['address']);
    $gender=$_POST['gender'];

    require 'connect.php';
    $sql="update customers
    set
    username='$username',
    name='$name',
    email='$email',
    phone='$phone',
    DOB='$DOB',
    address='$address',
    gender='$gender'
    where id=$id";
    $res=$connect->query($sql);
    if($connect->error != '') {$_SESSION['error'] = $connect->error; mysqli_close($connect); header("location:customer-update.php?id=$id"); exit;}
    else {unset($_SESSION['error']);}
    
    if (isset($_FILES['photo'])){
        $photo=$_FILES['photo'];
        $folder="./assests/img/customers/";
        $arr=explode('.',$photo['name']);
        $extension=$arr[count($arr)-1];
        $file_name= time() . '.' . $extension;
        $image= $folder . $file_name;
        move_uploaded_file($photo['tmp_name'],'.'.$image);
        $sql="update customers
        set
        avatar='$image'
        where id=$id";
        $res=$connect->query($sql);
        if($connect->error != '') {$_SESSION['error'] = $connect->error;}
    }

    mysqli_close($connect);
    $_SESSION['success']="Customer #$id has been Updated!";
    header("location:customer-update.php?id=$id");