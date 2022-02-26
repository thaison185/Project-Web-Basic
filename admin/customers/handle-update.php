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
    $username=addslashes($_POST['username']);
    $name=addslashes($_POST['name']);
    $email=addslashes($_POST['email']);
    $phone=addslashes($_POST['phone']);
    $DOB=addslashes($_POST['DOB']);
    $address=addslashes($_POST['address']);
    $gender=$_POST['gender'];

    if (!isset($result)) 
    $result = new stdClass();

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
    if($connect->error != '') {$_SESSION['error'] = $connect->error;  $result->status="error"; $result->message=$connect->error;echo json_encode($result); mysqli_close($connect);  exit;}
    else {unset($_SESSION['error']);}
    
    if ($_FILES['photo']['error'] != UPLOAD_ERR_NO_FILE){
        $res=$connect->query("select avatar from customers where id=$id");
        $old='../../'.$res->fetch_array()['avatar'];
        if (is_file($old)&&file_exists($old)){if(!unlink($old)){die("$old error");}}
        $photo=$_FILES['photo'];
        $folder="./data/img/customers/";
        $arr=explode('.',$photo['name']);
        $extension=$arr[count($arr)-1];
        $file_name= time() . '.' . $extension;
        $image= $folder . $file_name;
        move_uploaded_file($photo['tmp_name'],'../../'.$image);
        $sql="update customers
        set
        avatar='$image'
        where id=$id";
        $res=$connect->query($sql);
        if($connect->error != '') {$_SESSION['error'] = $connect->error; $result->status="error"; $result->message=$connect->error;echo json_encode($result);mysqli_close($connect); exit;}
    }

    mysqli_close($connect);
    $result->status="success"; 
    $result->message="Customer #$id has been Updated!";
    echo json_encode($result);
    // header("location:update.php?id=$id");