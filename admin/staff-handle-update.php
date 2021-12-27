<?php
    session_start();
    require 'check-role.php';
    if($_SESSION['role'] != 1) {
        header('location:dashboard.php');
        exit;
    }
    $_SESSION['cur']="Staff";
    if(!isset($_GET['id'])){
        $_SESSION['error']="No staff selected!";
        header('location:staff.php');
        exit;
    }
    unset($_SESSION['error']);
    $id=$_GET['id'];
    $username=addslashes($_POST['username']);
    $name=addslashes($_POST['name']);
    $email=addslashes($_POST['email']);
    $phone=addslashes($_POST['phone']);
    $gender=$_POST['gender'];
    $role=$_POST['role'];
    require 'connect.php';
    $sql="select * from staff where id=$id";
    $res=$connect->query($sql);
    if(!$res->num_rows>0){
        $_SESSION['error']="Can't find staff whom id=$id!";
        header('location:staff.php');
        exit;
    }
    $staff=$res->fetch_array();
    if($staff['role']==1){
        $_SESSION['error']="Can't modify Administrator!";
        $connect->close();
        header('location:staff.php');
        exit;
    }

    $sql="update staff
    set
    username='$username',
    name='$name',
    email='$email',
    phone='$phone',
    gender='$gender',
    role='$role'
    where id=$id";
    $res=$connect->query($sql);
    if($connect->error != '') {$_SESSION['error'] = $connect->error; mysqli_close($connect); header("location:staff-update.php?id=$id"); exit;}
    else {unset($_SESSION['error']);}
    
    if (isset($_FILES['photo'])){
        $photo=$_FILES['photo'];
        $folder="./data/$id/";
        if(!file_exists($folder)){mkdir("./data/$id/", 0777);}
        $arr=explode('.',$photo['name']);
        $extension=$arr[count($arr)-1];
        $file_name= time() . '.' . $extension;
        $image= $folder . $file_name;
        move_uploaded_file($photo['tmp_name'],$image);
        $sql="update staff
        set
        avatar='$image'
        where id=$id";
        $res=$connect->query($sql);
        if($connect->error != '') {$_SESSION['error'] = $connect->error;}
    }

    mysqli_close($connect);
    $_SESSION['success']="Staff #$id has been Updated!";
    header("location:staff-update.php?id=$id");