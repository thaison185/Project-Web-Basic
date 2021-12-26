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
        $sql="select * from items";
        $items=$connect->query($sql);
?>  
<div class="app">
    <!-- Container Begin -->
    <div class="container">
    <div class="products__menu">
        <div class="products__search">
            <input type="text" class="products__search" placeholder="Quick search by ID">
            <i class="fas fa-search products__search-icon"></i>
        </div>
        <div class="products__right-side">
            <a href="./product-insert.php" class="products__add-product">
                <i class="fas fa-plus"></i>
                Add Product
            </a>
        </div>
    </div>
    <div class="products__product-table">
        <?php 
            if (isset($_SESSION['error'])){
                $err=$_SESSION['error'];
                echo "Error: $err";
            }
        ?>
        <table class="products__table">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Product ID</th>
                    <th>Name</th>
                    <th>Price S|M|L</th>
                    <th>Description</th>
                    <th>Options</th>
                    <th>Action</th>   
                </tr>
            </thead>
            <tbody>
                <?php
                    while($row = mysqli_fetch_array($items)){
                        $id=$row['id'];
                        $name=$row['name'];
                        $image=$row['image'];
                        $price=$row['s_price'] . ' | ' . $row['m_price'] . ' | ' . $row['l_price'];
                        $description=$row['description'];
                        $ice=$row['ice']==0?"disable":"enable";
                        $sugar=$row['ice']==0?"disable":"enable";
                        $option= "Ice: " .  $ice . " - Sugar: " . $sugar;        
                ?>
                <tr class="float-z">
                    <td><img src=".<?php echo $image; ?>" alt="Product Image" width="100px"></td>
                    <td><?php echo $id; ?></td>
                    <td><?php echo $name; ?></td>
                    <td><span>$ <?php echo $price; ?></span></td>
                    <td><?php echo $description; ?></td>
                    <td><?php echo $option; ?></td>
                    <td class="actions">
                        <div><a href="./product-update.php?id=<?php echo $id; ?>">Update</a></div>
                        <div><a href="./product-delete.php?id=<?php echo $id; ?>">Delete</a></div>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <!-- Container End -->
    <?php include './footer.php'; ?>
</div>
</body>
</html>
