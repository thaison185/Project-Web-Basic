<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/base.css">
    <link rel="stylesheet" href="../assets/css/login.css">
    <link rel="icon" type="image/x-icon" href="../../data/img/favicon.png">
    <title>Q's Coffee | Staff Signing In</title>
</head>
<body>
    <?php if(isset($_SESSION['role'])){ 
            header('location:../dashboard');
            exit;
    }
    ?>
    <div class="container">
        <div class="form-area">
            <div class="form-area__title">
                Q's Coffee - Staff Only
            </div>
            <div class="form-area__warn">
                This page is the Staff only page. If you are not a staff of our company, please go back to <a href="../../index.php">page for customers</a> 
            </div>
            <div class="form-area__login-form">
                <p>Welcome back! Please sign in to your account.</p>
                <div class="err">
                    <?php
                 if (isset($_SESSION['error'])){
                    $err=$_SESSION['error'];
                    echo "Error: $err";
                    unset($_SESSION['error']);
                 }
                    ?>
                </div>
                <form action="./handle-signin.php" method="post">
                    <label >
                        Email
                        <br>
                        <input type="email" name="email" required>
                        <!-- assmin@qcoffee.com:BigBossofQCoffee! -->
                    </label>
                    <label >
                        Password
                        <br>
                        <input type="password" name="password" required>
                    </label>
                    <button type="submit">Sign in</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
