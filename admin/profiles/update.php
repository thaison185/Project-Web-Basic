<?php 
    session_start();
    require '../check-role.php';
    $_SESSION['cur']="Profiles";
    if(!isset($_GET['target'])){
        $_SESSION['error']="No target found!";
        header('location:index.php');
        exit;
    }
    unset($_SESSION['error']);
    $id=$_SESSION['id'];
    $target=$_GET['target'];
    require '../../connect.php';
    $sql="select * from staff where id=$id";
    $res=$connect->query($sql);
    $profiles=$res->fetch_array();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="../assets/css/base.css">
    <link rel="stylesheet" href="../assets/css/main.css">
    <link rel="stylesheet" href="../assets/css/profiles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" >
    <title>Q Coffee | Personal Profiles</title>
</head>
<body>
<?php 
        include '../sidebar.php';
        include '../header.php';
?>  
<div class="app">
    <!-- Container Begin -->
    <div class="container">
    <div class="insert">
            <p class="insert__title">Change <?php echo $target;?></p>
            <div class="form">
                <div class="err">
                    <?php 
                    if (isset($_SESSION['success'])){
                        $success=$_SESSION['success'];
                    ?>
                    <p style="color:#4BB543!important;"><?php echo "Success: $success"; ?></p>
                    <?php
                        unset($_SESSION['success']);
                    }
                    if (isset($_SESSION['error'])){
                        $err=$_SESSION['error'];
                        echo "Error: $err";
                    }
                     ?>
                </div>

                <form action="./handle-update.php?target=<?php echo $target;?>" method="post" enctype="multipart/form-data" <?php if($target=="password"){ ?>onsubmit="return checkPassword();" <?php } ?>>
                    <?php 
                        switch ($target){
                            case "informations":
                    ?>
                    <div>
                        <label for="username">Username: </label>
                        <input type="text" name="username"  id="username" value="<?php echo $profiles['username'] ?>">
                    </div>
                    <div>
                        <label for="name">Name: </label>
                        <input type="text" name="name"  id="name" value="<?php echo $profiles['name'] ?>">
                    </div>
                    <div>
                        <label for="phone">Phone Number: </label>
                        <input type="text" name="phone"  id="phone" value="<?php echo $profiles['phone'] ?>">
                    </div>
                    <div>
                        <label>Gender: </label>
                        <?php 
                            switch($profiles['gender']){
                                case 0:
                        ?>
                            <input type="radio" name="gender" value="0" checked>Male
                            <input type="radio" name="gender" value="1">Female
                    <?php 
                            break;
                                case 1:
                    ?>
                        <input type="radio" name="gender" value="0">Male
                        <input type="radio" name="gender" value="1" checked>Female
                    <?php break; } ?>
                    </div>
                    <?php break;
                    case "avatar":
                    ?>
                    <div>
                        <label>Avatar: </label>
                        <?php if ($profiles['avatar']==''){echo 'No Avatar';}else{?> <img src="../../<?php echo $profiles['avatar']; ?>" alt="Avatar" width="200px"><?php }?>
                        <input type="file" name="photo" >
                    </div>
                    <?php break;
                    case "password" :
                    ?>
                        <div>
                            <label for="current">Current Password: </label>
                            <input type="password" name="current"  id="current" required>
                        </div>
                        <div>
                            <label for="new">New Password: </label>
                            <input type="password" name="new"  id="new" required>
                        </div>
                        <div>
                            <label for="confirm">Confirm New Password: </label>
                            <input type="password" name="confirm"  id="confirm" required>
                        </div>
                    <?php break;
                    default:
                        $_SESSION['error']="Target unavailable!";
                        header('location:index.php');
                        exit;
                    }
                    ?>
                    <button type="submit">Update</button>
                </form>
            <a href="./index.php" class="back"><i class="fas fa-chevron-left"></i>     Back to Profiles</a>
        </div>
   
    <!-- Container End -->
</div>
</div>
<?php include '../footer.php'; $connect->close()?>
</body>
<script>
    function checkPassword(){
        let newPass=document.getElementById("new").value;
        let confirmPass=document.getElementById("confirm").value;
        if (newPass===confirmPass){
            return true;
        }
        else{
            alert("Your confirm is different from the new password!");
            return false;
        }
    }
</script>
</html>

