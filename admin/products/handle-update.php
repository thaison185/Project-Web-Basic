<?php
    session_start();
    require '../check-role.php';
    $_SESSION['cur']="Products";
    if(!isset($_GET['id'])){
        $_SESSION['error']="No product selected!";
        header('location:index.php');
        exit;
    }
    unset($_SESSION['error']);

    if (!isset($result)) 
    $result = new stdClass();

if($_SESSION['role']==1){
    $id=$_GET['id'];
    $name=addslashes($_POST['name']);
    $s_price=$_POST['s_price']==''?0:$_POST['s_price'];
    $m_price=$_POST['m_price']==''?0:$_POST['m_price'];
    $l_price=$_POST['l_price']==''?0:$_POST['l_price'];
    $description=addslashes($_POST['description']);
    $ice=$_POST['ice'];
    $sugar=$_POST['sugar'];
    $category=$_POST['category'];
    require '../../connect.php';
    $sql="update items
    set
    name='$name',
    s_price=$s_price,
    m_price=$m_price,
    l_price=$l_price,
    description='$description',
    ice='$ice',
    sugar='$sugar',
    category='$category'
    where id=$id";
    $res=$connect->query($sql);
     if($connect->error != '') {$_SESSION['error'] = $connect->error;  $result->status="error"; $result->message=$connect->error;echo json_encode($result); mysqli_close($connect);  exit;}
    else {unset($_SESSION['error']);}
    
    if ($_FILES['photo']['error'] != UPLOAD_ERR_NO_FILE){
        $res=$connect->query("select image from items where id=$id");
        $old='../../'.$res->fetch_array()['image'];
        if (is_file($old)&&file_exists($old)){if(!unlink($old)){die("$old error");}}
        $photo=$_FILES['photo'];
        $folder="./data/img/items/";
        $arr=explode('.',$photo['name']);
        $extension=$arr[count($arr)-1];
        $file_name= time() . '.' . $extension;
        $image= $folder . $file_name;
        move_uploaded_file($photo['tmp_name'],'../../'.$image);
        $sql="update items
        set
        image='$image'
        where id=$id";
        $res=$connect->query($sql);
        if($connect->error != '') {$_SESSION['error'] = $connect->error;  $result->status="error"; $result->message=$connect->error;echo json_encode($result); mysqli_close($connect);  exit;}
    }
}
else{
    $s_price=$_POST['s_price']==''?0:$_POST['s_price'];
    $m_price=$_POST['m_price']==''?0:$_POST['m_price'];
    $l_price=$_POST['l_price']==''?0:$_POST['l_price'];

    require '../../connect.php';
    $sql="update items
    set
    s_price=$s_price,
    m_price=$m_price,
    l_price=$l_price,
    where id=$id";
    $res=$connect->query($sql);
    if($connect->error != '') {$_SESSION['error'] = $connect->error;  $result->status="error"; $result->message=$connect->error;echo json_encode($result); mysqli_close($connect);  exit;}
    else {unset($_SESSION['error']);}
}
    $_SESSION['success']="Product #$id has been Updated!";
    $result->status="success"; 
    $result->message="Product #$id has been Updated!";
    echo json_encode($result);
    mysqli_close($connect);
    // header("location:update.php?id=$id");