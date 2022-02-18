<?php 
    session_start();
    require '../check-role.php';
    $_SESSION['cur']="Products";
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
    <link rel="icon" type="image/x-icon" href="../../data/img/favicon.png">
    <title>Q Coffee | Products Control</title>
</head>
<body>
<?php 
       include '../sidebar.php';
        include '../header.php';
        require '../../connect.php';
        if(!isset($_GET['search'])){
            $search="";
        }else{
            $search=$_GET['search'];
        }
        if(isset($_GET['category'])){$category=$_GET['category']; $sql="select count(*) as 'records' from items where category='$category' and id like '%$search%'";}else{$sql="select count(*) as 'records' from items where id like '%$search%'";}
        $res=$connect->query($sql)->fetch_array()['records'];
        $step=10;
        if($res%$step==0){$max=intdiv($res,$step);} else{$max=intdiv($res,$step)+1;} if($max==0) $max=1;
        if(isset($_GET['page'])){ 
            $page=$_GET['page'];
            if($page>$max){$page=$max;}
        }else{$page=1;}
        $offset=$step*($page-1);
         
        if(!isset($_GET['category'])){
            $sql="select * from items where id like '%$search%' limit $step offset $offset";
        }
        else{
            $sql="select * from items where category='$category' and id like '%$search%' limit $step offset $offset";
        }
        $items=$connect->query($sql);
?>  
<div class="app">
    <!-- Container Begin -->
    <div class="container">
    <div class="products__menu">
        <div class="products__search">
            <input type="text" class="products__search products__search-input" placeholder="Quick search by ID">
            <div class="products__search-icon"><i class="fas fa-search "></i></div>
        </div>
        <div class="products__right-side">
        <?php
                        if ($_SESSION['role']==1){
        ?>
            <a href="./add.php" class="products__add-product">
                <i class="fas fa-plus"></i>
                Add Product
            </a>
        <?php } ?>
            <div class="products__category">
                    <div class="products__category-clear">
                        <?php
                            if(!isset($_GET['category'])){
                                echo("Category");
                           }
                           else {echo($_GET['category']);}
                        ?>
                        <i class="fas fa-chevron-down orders__down-icon"></i>
                    </div>
                    <div class="products__category-menu">
                        <ul>
                            <?php if(isset($_GET['category'])){?>
                                <?php if($_GET['category']!="Coffee"){?><li><a href="./index.php?category=Coffee">Coffee</a></li><?php } ?>
                                <?php if($_GET['category']!="Tea"){?><li><a href="./index.php?category=Tea">Tea</a></li><?php } ?>
                                <?php if($_GET['category']!="Other Drink"){?><li><a href="./index.php?category=Other Drink">Other Drink</a></li><?php } ?>
                                <?php if($_GET['category']!="Food"){?><li><a href="./index.php?category=Food">Food</a></li><?php } ?>
                                <li><a href="./index.php">All Categories</a></li>
                            <?php } else {?>
                                <li><a href="./index.php?category=Coffee">Coffee</a></li>
                                <li><a href="./index.php?category=Tea">Tea</a></li>
                                <li><a href="./index.php?category=Other Drink">Other Drink</a></li>
                                <li><a href="./index.php?category=Food">Food</a></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
    </div>
    <div class="products__product-table">
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
        <table class="products__table">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Product ID</th>
                    <th>Name</th>
                    <th>Price S|M|L</th>
                    <th>Category</th>
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
                        $category=$row['category'];
                        $ice=$row['ice']==0?"disable":"enable";
                        $sugar=$row['ice']==0?"disable":"enable";
                        $option= "Ice: " .  $ice . " - Sugar: " . $sugar;        
                ?>
                <tr class="float-z">
                    <td><?php if ($image==''){echo 'No Image';} else{ ?><img src="../../<?php echo $image; ?>" alt="Product Image" width="100px" height="100px"><?php } ?></td>
                    <td><?php echo $id; ?></td>
                    <td><?php echo $name; ?></td>
                    <td><span>$ <?php echo $price; ?></span></td>
                    <td><?php echo $category; ?></td>
                    <td><?php echo $description; ?></td>
                    <td><?php echo $option; ?></td>
                    <td class="actions">
                        <div><a href="./update.php?id=<?php echo $id; ?>">Update</a></div>
                    <?php
                        if ($_SESSION['role']==1){
                    ?>
                        <script>
                            function Delete(id) {
                            window.location.href="./delete.php?id="+id;
                            }
                            function confirmDelete(id) {
                                if (confirm("All orders include this product will be deleted too, do you want to continue?") == true) {
                                    Delete(id);
                                }
                            }
                        </script>
                        <button class="confirm" data-id="<?php echo $id?>">Delete</button>
                    <?php } ?>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <div class="paginate">
            <?php if($page>1){?><a href="./index.php?page=<?php echo $page-1; if(isset($_GET['category'])){echo "&category=$category";}if($search!=""){echo "&search=$search";}?>" class="prev"><i class="fas fa-angle-double-left"></i></a><?php } ?>
            <div class="input">
                <input type="number" name="page" id="page" min="1" max="<?php echo $max; ?>" value=<?php echo $page?>>  
                <button id="go" onclick="paginate();">Go</button>
            </div>
            <?php if($page<$max){?><a href="./index.php?page=<?php echo $page+1; if(isset($_GET['category'])){echo "&category=$category";}if($search!=""){echo "&search=$search";}?>" class="next"><i class="fas fa-angle-double-right"></i></a><?php } ?>
        </div>
    </div>
    <!-- Container End -->
    <?php include '../footer.php'; $connect->close()?>
</div>
<script>
    let page=document.getElementById("page");
    page.addEventListener("keyup",function(e){
        if(e.keyCode=== 13){
            e.preventDefault();
            document.getElementById("go").click();
        }
    });
    function paginate(){
        let numPage=page.value;
        if(numPage><?php echo $max;?>){numPage=<?php echo $max;?>}
        if(numPage===""){numPage="1";}
        if(numPage!=<?php echo $page;?>){
            window.location.replace("./index.php?page="+numPage<?php if(isset($_GET['category'])){echo "+'&category=$category'";}if($search!=""){echo "+'&search=$search'";}?>);
        }
    }
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $(".products__search-input").keyup(function (e) { 
                if(e.keyCode==13){
                    $(".products__search-icon").click();
                }
            });

            $(".products__search-icon").click(function (e) { 
                e.preventDefault();
                let searchVal=$(".products__search-input").val();
                let numPage = $("#page").val();
                if(searchVal!="")
                location.replace("./index.php?page="+ numPage<?php if (isset($_GET['category'])) {echo "+'&category=$category'";}?>+"&search="+searchVal);
            });
        $(".confirm").click(function (e) { 
            let id=$(this).data('id'); 
            if (confirm("All orders include this product will be deleted too, do you want to continue?") == true) {
                $.ajax({
                        type: "GET",
                        url: "./delete.php",
                        data: {id},
                        // dataType: "dataType",
                        success: function (response) {
                            location.reload();
                        }
                    });
            }
        });
    });
</script>
</body>
</html>

