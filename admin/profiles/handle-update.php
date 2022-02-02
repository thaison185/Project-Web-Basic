<?php
    session_start();
    require '../check-role.php';
    if(!isset($_GET['target'])){
        $_SESSION['error']="No action found!";
        header('location:index.php');
        exit;
    }
    unset($_SESSION['error']);
    $id=$_SESSION['id'];
    $target=$_GET['target'];
    require '../../connect.php';
    switch($_GET['target']){
        case "informations":
            $username=addslashes($_POST['username']);
            $name=addslashes($_POST['name']);
            $phone=addslashes($_POST['phone']);
            $gender=$_POST['gender'];
        
            $sql="update staff
            set
            username='$username',
            name='$name',
            phone='$phone',
            gender='$gender'
            where id=$id";
            $res=$connect->query($sql);
            if($connect->error != '') {$_SESSION['error'] = $connect->error; mysqli_close($connect); header("location:update.php?id=$id"); exit;}
            else {unset($_SESSION['error']);}
            break;
        case "avatar":
            if ($_FILES['photo']['error'] != UPLOAD_ERR_NO_FILE){
                $res=$connect->query("select avatar from staff where id=$id");
                $old='../../'.$res->fetch_array()['avatar'];
                if (is_file($old)&&file_exists($old)){if(!unlink($old)){die("$old error");}}
                $photo=$_FILES['photo'];
                $folder="./data/img/staff/$id/";
                if(!file_exists($folder)){mkdir("../data/img/staff/$id/", 0777);}
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
            break;
        case "password":
            $current=$_POST['current'];
            $new=$_POST['new'];
            $confirm=$_POST['confirm'];

            $sql="select hashed_password from staff where id=$id";
            $hash=$connect->query($sql)->fetch_array()['hashed_password'];
            if(password_verify($current,$hash)){
                if($new===$confirm){
                    $password=password_hash($new,PASSWORD_DEFAULT);
                    $sql="update staff
                    set
                    hashed_password=$password
                    where id=$id
                    ";
                    $res=$connect->query($sql);
                    if($connect->error != '') {$_SESSION['error'] = $connect->error;}       
                    else {unset($_SESSION['error']);}

                }
                else {$_SESSION['error']="Confirm pass is different from new pass";}
            }
            else{
                $_SESSION['error']="Current pass wrong!";
            }
            break;
        default:
            $_SESSION['error']="Target is unavailable!";
    }

    mysqli_close($connect);
    $_SESSION['success']="Customer #$id has been Updated!";
    header("location:update.php?target=$target");