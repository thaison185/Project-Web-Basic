<?php 
    session_start();
    require '../check-role.php';
    $_SESSION['cur']="Profiles";
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
        require '../../connect.php';
        $id=$_SESSION['id'];
        $sql="select * from staff where id=$id";
        $profile=$connect->query($sql)->fetch_array();
?>  
<div class="app">
    <!-- Container Begin -->
    <div class="container">
        <div class="profiles">
            <p class="profiles__main-title">Your Profiles</p>
            <div class="profiles__avatar">
                <div class="profiles__title">
                    <p>Your Avatar</p>
                    <a href="./update.php?target=avatar">Edit</a>
                </div>
                <div class="profiles__content">
                    <?php if ($profile['avatar']==''){echo 'No Avatar';}else{?> <img src="../../<?php echo $profile['avatar']; ?>" alt="Avatar" width="200px" style="border-radius: 50%;"><?php }?>
                </div>
            </div>
            <div class="profiles__infos">
                <div class="profiles__title">
                    <p>Your Main Informations</p>
                    <a href="./update.php?target=informations">Edit</a>
                </div>
                <div class="profiles__content">
                    <p class="profiles__info-details">Username: <?php echo $profile['username']; ?></p>
                    <p class="profiles__info-details">Name: <?php echo $profile['name']; ?></p>
                    <p class="profiles__info-details">Email: <?php echo $profile['email']; ?></p>
                    <p class="profiles__info-details">Phone: <?php echo $profile['phone']; ?></p>
                    <p class="profiles__info-details">Gender: <?php echo $profile['gender']==0?"Male":"Female"; ?></p>
                </div>
            </div>
            <div class="profiles__password">
                <div class="profiles__title">
                    <a href="./update.php?target=password">Change Password</a>
                </div>
            </div>
        </div>
    <!-- Container End -->
    </div>
<?php include '../footer.php'; $connect->close()?>
</div>
</body>
</html>

