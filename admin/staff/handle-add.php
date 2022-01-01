<?php
    session_start();
    require '../check-role.php';
    if($_SESSION['role'] != 1) {
        header('location:../dashboard');
        exit;
    }
    $_SESSION['cur']="Staff";
    
    $username=addslashes($_POST['username']);
    $name=addslashes($_POST['name']);
    $email=addslashes($_POST['email']);
    $phone=addslashes($_POST['phone']);
    $gender=$_POST['gender'];
    $role=$_POST['role'];
    $password=password_hash($_POST['password'],PASSWORD_DEFAULT);
    
    require '../../connect.php';

    $sql="insert into staff(username,name,email,hashed_password,phone,gender,role) values('$username','$name','$email','$password','$phone','$gender','$role')";
    $res=$connect->query($sql);
    if($connect->error != '') {$_SESSION['error'] = $connect->error; mysqli_close($connect); header("location:staff-add.php"); exit;}
    else {unset($_SESSION['error']);}
    
    $sql="select id from staff where email='$email'";
    $res=$connect->query($sql);
    $id=$res->fetch_array()[0];
    if ($_FILES['photo']['error'] != UPLOAD_ERR_NO_FILE){
        $photo=$_FILES['photo'];
        $folder="./data/img/staff/$id/";
        mkdir("../../data/img/staff/$id/", 0777);
        $arr=explode('.',$photo['name']);
        $extension=$arr[count($arr)-1];
        $file_name= time() . '.' . $extension;
        $image= $folder . $file_name;
        move_uploaded_file($photo['tmp_name'],'../../'.$image);
        $sql="update staff
        set
        avatar='$image'
        where id=$id";
        $res=$connect->query($sql);
        if($connect->error != '') {$_SESSION['error'] = $connect->error;}
    }

    mysqli_close($connect);
    $_SESSION['success']="Staff has been Added!";
    header("location:index.php");