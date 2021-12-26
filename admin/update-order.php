<?php 
    session_start();
    $_SESSION['cur']="Shipping Orders";

    $id=$_GET['id'];
    require 'connect.php';
    if(isset($_GET['status'])){
        $stat=$_GET['status'];
        $sql="update orders
        set
        status='$stat'
        where id=$id";
        $res=$connect->query($sql);
        mysqli_close($connect);
        header('location:orders.php');
    }
    else{
        $sql="select orders.*,order_detail.";
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="./assets/css/base.css">
    <link rel="stylesheet" href="./assets/css/main.css">
    <link rel="stylesheet" href="./assets/css/orders.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" >
    <title>Q Coffee | Orders Control</title>
</head>
<body>
<?php 
        include './sidebar.php';
        include './header.php';
?>  
<div class="app">
    <!-- Container Begin -->
    <div class="container">
        <div class="error">
            <?php 
                if(isset($_SESSION['error'])){
                    echo $_SESSION['error'];
                }
            ?>
        </div>
        <form action="./handle-update-order.php" method="post">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <label for=""></label>
        </form>
    </div>
    <!-- Container End -->
    <?php include './footer.php'; ?>
</div>
</body>
</html>
<?php } ?>
