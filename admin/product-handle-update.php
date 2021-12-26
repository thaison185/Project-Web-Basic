<?php
    session_start();
    $_SESSION['cur']="Products";
    if(!isset($_GET['id'])){
        $_SESSION['error']="No product selected!";
        header('location:products.php');
        exit;
    }
    unset($_SESSION['error']);
    
    $id=$_GET['id'];
    $name=addslashes($_POST['name']);
    $s_price=$_POST['s_price']==''?0:$_POST['s_price'];
    $m_price=$_POST['m_price']==''?0:$_POST['m_price'];
    $l_price=$_POST['l_price']==''?0:$_POST['l_price'];
    $description=addslashes($_POST['description']);
    $ice=$_POST['ice'];
    $sugar=$_POST['sugar'];

    require 'connect.php';
    $sql="update items
    set
    name='$name',
    s_price=$s_price,
    m_price=$m_price,
    l_price=$l_price,
    description='$description',
    ice='$ice',
    sugar='$sugar'
    where id=$id";
    $res=$connect->query($sql);
    if($connect->error != '') {$_SESSION['error'] = $connect->error;}
    else {unset($_SESSION['error']);}
    
    if (isset($_FILES['photo'])){
        $photo=$_FILES['photo'];
        $folder="./assests/img/items/";
        $arr=explode('.',$photo['name']);
        $extension=$arr[count($arr)-1];
        $file_name= time() . '.' . $extension;
        $image= $folder . $file_name;
        move_uploaded_file($photo['tmp_name'],'.'.$image);
        $sql="update items
        set
        image=$image
        where id=$id";
        $res=$connect->query($sql);
        if($connect->error != '') {$_SESSION['error'] = $connect->error;}
    }
    mysqli_close($connect);
    header("location:product-update.php?id=$id");