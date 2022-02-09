<?php 
    session_start();
    require '../check-role.php';
    if($_SESSION['role'] != 1) {
        header('location:../dashboard');
        exit;
    }
    $_SESSION['cur']="Staff";
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
    <link rel="stylesheet" href="../assets/css/staff.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" >
 <link rel="icon" type="image/x-icon" href="../../data/img/favicon.png">
    <title>Q Coffee | Staff Control</title>
</head>
<body>
<?php 
       include '../sidebar.php';
        include '../header.php';
        require '../../connect.php';
?>  
<div class="app">
    <!-- Container Begin -->
    <div class="container">
    <div class="insert">
            <p class="insert__title">Create New Staff Acount</p>
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

                <form id="myForm" action="./handle-add.php" method="post" enctype="multipart/form-data">
                    <div>
                        <label for="username">Username: </label>
                        <input type="text" name="username"  id="username">
                    </div>
                    <div>
                        <label for="name">Name: </label>
                        <input type="text" name="name"  id="name">
                    </div>
                    <div>
                        <label for="email">Email: </label>
                        <input type="text" name="email"  id="email">
                    </div>
                    <div>
                        <label for="password">Password: </label>
                        <input type="password" name="password"  id="password">
                    </div>
                    <div>
                        <label for="phone">Phone Number: </label>
                        <input type="text" name="phone"  id="phone">
                    </div>
                    <div>
                        <label>Gender: </label>
                            <input type="radio" name="gender" value="0" checked>Male
                            <input type="radio" name="gender" value="1">Female
                    </div>
                    <div>
                        <label>Role: </label>
                            <input type="radio" name="role" value="0" checked>Staff
                            <input type="radio" name="role" value="1" id="admin">Administrator
                    </div>
                    <div>
                        <label>Avatar: </label>
                        <input type="file" name="photo" >
                    </div>
                    <script>
                            function Submit() {
                                document.getElementById("myForm").submit();
                            }
                            
                            function checkSubmit() {     
                                if (document.getElementById("admin").checked == false){Submit();}
                                else{
                                    if (confirm("Do you really want to give this staff Administrator permission?") == true) {
                                        Submit();
                                    }
                                } 
                            }
                        </script>
                    <button onclick="checkSubmit()">Create Account</button>
                </form>
            <a href="<?php echo $_SERVER['HTTP_REFERER'];?>" class="back"><i class="fas fa-chevron-left"></i>     Back to Staff</a>
        </div>
   
    <!-- Container End -->
</div>
</div>
<?php include '../footer.php'; $connect->close()?>
</body>
</html>

