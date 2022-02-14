<?php
    session_start();
    require '../check-role.php';
    if($_SESSION['role'] != 1) {
        header('location:index.php');
        exit;
    }
    if (!isset($result)) 
    $result = new stdClass();
    
    $name=addslashes($_POST['name']);
    $s_price=$_POST['s_price']==''?0:$_POST['s_price'];
    $m_price=$_POST['m_price']==''?0:$_POST['m_price'];
    $l_price=$_POST['l_price']==''?0:$_POST['l_price'];
    $description=addslashes($_POST['description']);
    $ice=$_POST['ice'];
    $sugar=$_POST['sugar'];
    $category=$_POST['category'];

    $photo=$_FILES['photo'];
    $folder="./data/img/items/";
    $arr=explode('.',$photo['name']);
    $extension=$arr[count($arr)-1];
    $file_name= time() . '.' . $extension;
    $image= $folder . $file_name;
    move_uploaded_file($photo['tmp_name'],'../../'.$image);

    require '../../connect.php';
    $sql="insert into items(name,image,s_price,m_price,l_price,description,ice,sugar,category)
    values ('$name','$image',$s_price,$m_price,$l_price,'$description','$ice','$sugar','$category')";
    $res=$connect->query($sql);
    if($connect->error != '') {$_SESSION['error'] = $connect->error; $result->status="error"; $result->message=$connect->error;echo json_encode($result);mysqli_close($connect); exit;}
    else {unset($_SESSION['error']);}
    mysqli_close($connect);
    $_SESSION['success']="Product has been Added!";
    $result->status="success"; 
    $result->message="Product has been Added!";
    echo json_encode($result);
    // header('location:add.php');