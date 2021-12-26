<?php 
    session_start();
    $_SESSION['cur']="Products";
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
    <link rel="stylesheet" href="./assets/css/products.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" >
    <title>Q Coffee | Products Control</title>
</head>
<body>
<?php 
        include './sidebar.php';
        include './header.php';
        require './connect.php';
?>
<div class="app">
    <!-- Container Begin -->
    <div class="container">
        <div class="insert">
            <p class="insert__title">Product Information</p>
            <div class="form">
                <div class="err">
                    <?php 
                        if (isset($_SESSION['error'])){
                             $err=$_SESSION['error'];
                             echo "Error: $err";
                         }
                     ?>
                </div>
                <form action="./product-handle-add.php" method="post" enctype="multipart/form-data">
                    <div>
                        <label for="name">Name: </label>
                        <input type="text" name="name"  id="name" required>
                    </div>
                    <div>
                        <label>Image: </label>
                        <input type="file" name="photo" required>
                    </div>
                    <div>
                        <label>Price: </label>
                        <br>
                        <label for="s">Size S: </label>
                        <input type="number" name="s_price" id="s">
                        <label for="m">Size M: </label>
                        <input type="number" name="m_price" id="m">
                        <label for="l">Size L: </label>
                        <input type="number" name="l_price" id="l">
                    </div>
                    <div>
                        <label for="desc">Description: </label>
                         <textarea name="description" id="desc" cols="30" rows="10"></textarea>
                    </div>
                    <div>
                        <label>Ice: </label>
                        <input type="radio" name="ice" value="0">Disable
                        <input type="radio" name="ice" value="1">Enable
                    </div>
                    <div>
                        <label>Sugar: </label>
                        <input type="radio" name="sugar" value="0">Disable
                        <input type="radio" name="sugar" value="1">Enable
                    </div>
                    <button type="submit">Insert</button>
                </form>
            </div>
        </div>
    </div>
    <!-- Container End -->
    <?php include './footer.php'; ?>
</div>
</body>
</html>