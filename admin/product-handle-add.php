<?php
    session_start();
    $name=addslashes($_POST['name']);
    $s_price=$_POST['s_price']==''?0:$_POST['s_price'];
    $m_price=$_POST['m_price']==''?0:$_POST['m_price'];
    $l_price=$_POST['l_price']==''?0:$_POST['l_price'];
    $description=addslashes($_POST['description']);
    $ice=$_POST['ice'];
    $sugar=$_POST['sugar'];

    $photo=$_FILES['photo'];
    $folder="./assests/img/items/";
    $arr=explode('.',$photo['name']);
    $extension=$arr[count($arr)-1];
    $file_name= time() . '.' . $extension;
    $image= $folder . $file_name;
    move_uploaded_file($photo['tmp_name'],'.'.$image);

    require 'connect.php';
    $sql="insert into items(name,image,s_price,m_price,l_price,description,ice,sugar)
    values ('$name','$image',$s_price,$m_price,$l_price,'$description','$ice','$sugar')";
    $res=$connect->query($sql);
    if($connect->error != '') {$_SESSION['error'] = $connect->error;}
    else {unset($_SESSION['error']);}
    mysqli_close($connect);
    header('location:product-insert.php');