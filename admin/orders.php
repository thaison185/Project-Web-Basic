<?php 
    session_start();
    $_SESSION['cur']="Shipping Orders";
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
        <div class="orders__menu">
            <div class="orders__search">
                <input type="text" class="orders__search" placeholder="Quick search by ID">
                <i class="fas fa-search orders__search-icon"></i>
            </div>
            <div class="orders__right-side">
                <div class="orders__status">
                    <a href="./orders.php" class="orders__status-clear">
                        <?php
                            if(!isset($_GET['status'])){
                                echo("Status");
                           }
                           else {echo($_GET['status']);}
                        ?>
                        <i class="fas fa-chevron-down orders__down-icon"></i>
                    </a>
                    <div class="orders__status-menu">
                        <ul>
                            <li><a href="./orders.php?status=Pending">Pending</a></li>
                            <li><a href="./orders.php?status=Accepted">Accepted</a></li>
                            <li><a href="./orders.php?status=Delivered">Delivered</a></li>
                            <li><a href="./orders.php?status=Rejected">Rejected</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div> 
        <div class="orders__order-table">
            <?php 
            if (isset($_SESSION['error'])){
                $err=$_SESSION['error'];
                echo "Error: $err";
            }
                if(!isset($_GET['status'])){
                    $sql="select orders.id,date,status,price, name
                    from orders join customers
                    on orders.customer_id=customers.id";
                }
                else{
                    $status=$_GET['status'];
                    $sql="select orders.id,date,status,price,name
                    from orders join customers
                    on orders.customer_id=customers.id
                    where status='$status'";                
                }
                require 'connect.php';
                $result = $connect->query($sql);
            ?>
             <table class="orders__table">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Customer</th>
                            <th>Total</th>
                            <th class="orders__more-btn">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            while($row = mysqli_fetch_array($result)){
                                $stat=$row['status'];
                                $id=$row['id'];
                        ?>
                        <tr class="float-z">
                            <td style="color: darkblue;"><?php echo($row['id']); ?></td>
                            <td><?php echo($row['date']); ?></td>
                            <td>
                                <div class="orders__table-status orders__status--<?php echo($row['status']); ?>">
                                    <i class="fas fa-circle"></i><?php echo($row['status']); ?>
                                </div>
                            </td>
                            <td><?php echo($row['name']); ?></td>
                            <td>
                                <span>$ <?php echo($row['price']); ?></span>
                            </td>
                            <td  class="orders__more-btn">
                                    <i class="fas fa-ellipsis-h"></i>
                                        <ul class="orders__table-sub-menu hidden">
                                            <li><a href="./order_details.php?id=<?php echo $id; ?>"><i class="fas fa-eye"></i></i> Order Details</a></li>
                                            <?php
                                            if ($row['status']!="Rejected"){
                                            ?>
                                            <li>
                                                <a href="<?php
                                                    switch ($row['status']){
                                                        case "Pending":
                                                            echo "./update-order.php?id='$id'&status=Accepted";
                                                            break;
                                                        case "Accepted":
                                                            echo "./update-order.php?id='$id'&status=Delivered";
                                                            break;
                                                        default:
                                                            echo '#';
                                                    }
                                                 ?>">
                                                <i class="fas fa-truck"></i>
                                                 <?php
                                                    switch ($row['status']){
                                                        case "Pending":
                                                            echo ' Accept Order';
                                                            break;
                                                        default:
                                                            echo 'Mark as Delivered'; 
                                                    }
                                                 ?>
                                                </a>
                                            </li>
                                            <li><a href="./update-order.php?id=<?php echo($id);?>&status=Rejected"><i class="fas fa-money-bill-wave-alt"></i> Reject Order</a></li>
                                            <?php } ?>
                                            <li><a href="./delete-order.php?id=<?php echo($id);?>"><i class="fas fa-trash-alt"></i> Remove Order</a></li>
                                     </ul>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
             </table>
             <?php 
                echo '<script type="text/javascript">
                let moreBtns=document.querySelectorAll("tbody .orders__more-btn");
                document.addEventListener(\'click\',function(e){
                    console.log(e.target)
                    for (let moreBtn of moreBtns){
                        let menu=moreBtn.querySelector(".orders__table-sub-menu");
                        let displayStyle = window.getComputedStyle(menu).getPropertyValue("display");
                        if (!moreBtn.contains(e.target)) {
                            if(displayStyle===\'block\') {
                                menu.classList.toggle("hidden");
                                moreBtn.parentElement.classList.toggle("float-z");
                            }
                        }
                        else{
                            menu.classList.toggle("hidden");
                            moreBtn.parentElement.classList.toggle("float-z");
                        }
                    }
                })
             </script>'; 
             ?>
        </div>

    </div>
    <!-- Container End -->
    <?php include './footer.php'; ?>
</div>
</body>
</html>