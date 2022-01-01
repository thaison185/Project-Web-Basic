<?php 
    session_start();
    require '../check-role.php';
    $_SESSION['cur']="Dashboard"; 
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
        <link rel="stylesheet" href="../assets/css/dashboard.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" >
        <title>Q Coffee | Admin Interface</title>
    </head>
    <body>
        <?php 
           include '../sidebar.php';
            include '../header.php';
        ?>  
        <div class="app">
        <!-- Container Begin -->
        <div class="container">
            <div class="dashboard__head">
                <p>Welcome back, <?php echo($_SESSION['username']);?>!</p>
            </div>
            <div class="dashboard__items">
                <a href="../orders">
                    <div class="dashboard__part">
                        Shipping orders
                    </div>
                </a>
                <a href="../products">
                    <div class="dashboard__part">
                        Products
                    </div>
                </a>
                <a href="../customers">
                    <div class="dashboard__part">
                        Users
                    </div>
                </a>
                <?php if($_SESSION['role']==1){ ?>
                <a href="../staff">
                    <div class="dashboard__part">
                        Staff
                    </div>
                </a>
                <?php } ?>
            </div>
        </div>
        <!-- Container End -->
        <?php include '../footer.php'; ?>
        </div>
        
</body>
</html>