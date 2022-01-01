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
    $id=$_GET['id'];
    require '../connect.php';
    $sql="select * from items where id=$id";
    $res=$connect->query($sql);
    if(!$res->num_rows>0){
        $_SESSION['error']="Can't find product which id=$id!";
        header('location:index.php');
        exit;
    }
    $item=$res->fetch_array();
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
    <link rel="stylesheet" href="../assets/css/products.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" >
    <title>Q Coffee | Products Control</title>
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
            <p class="insert__title">Product Information</p>
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
                <?php
                    if($_SESSION['role']==1){
                ?>
                <form action="./handle-update.php?id=<?php echo $id;?>" method="post" enctype="multipart/form-data">
                    <div>
                        <label for="name">Name: </label>
                        <input type="text" name="name"  id="name" value="<?php echo $item['name'] ?>">
                    </div>
                    <div>
                        <label>Image: </label>
                        <img src="../../<?php echo $item['image'];?>" alt="Image" width="200px">
                        <input type="file" name="photo" >
                    </div>
                    <div>
                        <label>Price: </label>
                        <br>
                        <label for="s">Size S: </label>
                        <input type="number" name="s_price" id="s" value="<?php echo $item['s_price'] ?>">
                        <label for="m">Size M: </label>
                        <input type="number" name="m_price" id="m" value="<?php echo $item['m_price'] ?>">
                        <label for="l">Size L: </label>
                        <input type="number" name="l_price" id="l" value="<?php echo $item['l_price'] ?>">
                    </div>
                    <div>
                        <label for="desc">Description: </label>
                         <textarea name="description" id="desc" cols="30" rows="10" value="<?php echo $item['description'] ?>"></textarea>
                    </div>
                    <div>
                        <label>Ice: </label>
                        <?php 
                            switch($item['ice']){
                                case 0:
                        ?>
                            <input type="radio" name="ice" value="0" checked>Disable
                            <input type="radio" name="ice" value="1">Enable
                    <?php 
                            break;
                                case 1:
                    ?>
                        <input type="radio" name="ice" value="0">Disable
                        <input type="radio" name="ice" value="1" checked>Enable
                    <?php break; } ?>
                    </div>
                    <div>
                        <label>Sugar: </label>
                        <?php 
                            switch($item['sugar']){
                                case 0:
                        ?>
                            <input type="radio" name="sugar" value="0" checked>Disable
                            <input type="radio" name="sugar" value="1">Enable
                    <?php 
                            break;
                                case 1:
                    ?>
                        <input type="radio" name="sugar" value="0">Disable
                        <input type="radio" name="sugar" value="1" checked>Enable
                    <?php break; } ?>
                    </div>
                    <button type="submit">Update</button>
                </form>
                <?php }
                    else{
                ?>
                 <div>
                 <form action="./handle-update.php?id=<?php echo $id;?>" method="post" enctype="multipart/form-data">
                        <label>Price: </label>
                        <br>
                        <label for="s">Size S: </label>
                        <input type="number" name="s_price" id="s" value="<?php echo $item['s_price'] ?>">
                        <label for="m">Size M: </label>
                        <input type="number" name="m_price" id="m" value="<?php echo $item['m_price'] ?>">
                        <label for="l">Size L: </label>
                        <input type="number" name="l_price" id="l" value="<?php echo $item['l_price'] ?>">
                    </div>
                    <button type="submit">Update</button>
                </form>
                <?php } ?>
            </div>
            <a href="./index.php" class="back"><i class="fas fa-chevron-left"></i>     Back to Products</a>
        </div>
    </div>
    <!-- Container End -->
    <?php include '../footer.php'; $connect->close()?>
</div>
</body>
</html>