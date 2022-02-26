<?php
session_start();
require '../check-role.php';
$_SESSION['cur'] = "Shipping Orders";
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
    <link rel="stylesheet" href="../assets/css/orders.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <link rel="icon" type="image/x-icon" href="../../data/img/favicon.png">
    <title>Q Coffee | Orders Control</title>
</head>

<body>
    <?php
    include '../sidebar.php';
    include '../header.php';
    ?>
    <div class="app">
        <!-- Container Begin -->
        <div class="container">
            <div class="orders__menu">
                <div class="orders__search">
                    <input type="text" class="orders__search orders__search-input" placeholder="Quick search by ID">
                    <div class="orders__search-icon"><i class="fas fa-search"></i></div>
                </div>
                <div class="orders__right-side">
                    <div class="orders__status">
                        <div class="orders__status-clear">
                            <?php
                            if (!isset($_GET['status'])) {
                                echo ("Status");
                            } else {
                                echo ($_GET['status']);
                            }
                            ?>
                            <i class="fas fa-chevron-down orders__down-icon"></i>
                        </div>
                        <div class="orders__status-menu">
                            <ul>
                                <?php if (isset($_GET['status'])) { ?>
                                    <?php if ($_GET['status'] != "Pending") { ?><li><a href="./index.php?status=Pending">Pending</a></li><?php } ?>
                                    <?php if ($_GET['status'] != "Accepted") { ?><li><a href="./index.php?status=Accepted">Accepted</a></li><?php } ?>
                                    <?php if ($_GET['status'] != "Delivered") { ?><li><a href="./index.php?status=Delivered">Delivered</a></li><?php } ?>
                                    <?php if ($_GET['status'] != "Rejected") { ?><li><a href="./index.php?status=Rejected">Rejected</a></li><?php } ?>
                                    <li><a href="./index.php">All Status</a></li>
                                <?php } else { ?>
                                    <li><a href="./index.php?status=Pending">Pending</a></li>
                                    <li><a href="./index.php?status=Accepted">Accepted</a></li>
                                    <li><a href="./index.php?status=Delivered">Delivered</a></li>
                                    <li><a href="./index.php?status=Rejected">Rejected</a></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="orders__order-table">
                <div class="err">
                    <?php
                    if (isset($_SESSION['success'])) {
                        $success = $_SESSION['success'];
                    ?>
                        <p style="color:#4BB543!important;"><?php echo "Success: $success"; ?></p>
                    <?php
                        unset($_SESSION['success']);
                    }
                    if (isset($_SESSION['error'])) {
                        $err = $_SESSION['error'];
                        echo "Error: $err";
                        unset($_SESSION['error']);
                    }
                    require '../../connect.php';
                    if(!isset($_GET['search'])){
                        $search="";
                    }else{
                        $search=$_GET['search'];
                    }
                    if (isset($_GET['status'])) {
                        $status = $_GET['status'];
                        $sql = "select count(*) as 'records' from orders where status='$status' and id like '%$search%'";
                    } else {
                        $sql = "select count(*) as 'records' from orders where id like '%$search%'";
                    }
                    $res = $connect->query($sql)->fetch_array()['records'];
                    $step = 10;
                    if ($res % $step == 0) {
                        $max = intdiv($res, $step);
                    } else {
                        $max = intdiv($res, $step) + 1;
                    }
                    if($max==0) $max=1;
                    if (isset($_GET['page'])) {
                        $page = $_GET['page'];
                        if ($page > $max) {
                            $page = $max;
                        }
                    } else {
                        $page = 1;
                    }
                    $offset = $step * ($page - 1);


                    if (!isset($_GET['status'])) {
                        $sql = "select orders.id,date,status,price, name
                        from orders join customers
                        on orders.customer_id=customers.id
                        where orders.id like '%$search%'
                        order by orders.id desc limit $step offset $offset";
                    } else {
                        $status = $_GET['status'];
                        $sql = "select orders.id,date,status,price,name
                        from orders join customers
                        on orders.customer_id=customers.id
                        where status='$status' and orders.id like '%$search%'
                        order by orders.id desc limit $step offset $offset";
                    }
                    $result = $connect->query($sql);
                    ?>
                </div>
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
                        if(!empty($result)){
                        while ($row = mysqli_fetch_array($result)) {
                            $stat = $row['status'];
                            $id = $row['id'];
                        ?>
                            <tr class="float-z">
                                <td style="color: darkblue;"><?php echo ($row['id']); ?></td>
                                <td><?php echo ($row['date']); ?></td>
                                <td>
                                    <div class="orders__table-status orders__status--<?php echo ($row['status']); ?>">
                                        <i class="fas fa-circle"></i><?php echo ($row['status']); ?>
                                    </div>
                                </td>
                                <td><?php echo ($row['name']); ?></td>
                                <td>
                                    <span>$ <?php echo ($row['price']); ?></span>
                                </td>
                                <td class="orders__more-btn">
                                    <i class="fas fa-ellipsis-h"></i>
                                    <ul class="orders__table-sub-menu hidden">
                                        <li><a href="./details.php?id=<?php echo $id; ?>"><i class="fas fa-eye"></i></i> Order Details</a></li>
                                        <?php
                                        if ($row['status'] != "Rejected" && $row['status'] != "Delivered") {
                                        ?>
                                            <li>
                                                <button class="status-update" data-status="<?php
                                                                                            switch ($row['status']) {
                                                                                                case "Pending":
                                                                                                    echo "Accepted";
                                                                                                    break;
                                                                                                case "Accepted":
                                                                                                    echo "Delivered";
                                                                                                    break;
                                                                                            }
                                                                                            ?>" data-id="<?php echo $row['id']; ?>">
                                                    <i class="fas fa-truck"></i>
                                                    <?php
                                                    switch ($row['status']) {
                                                        case "Pending":
                                                            echo ' Accept Order';
                                                            break;
                                                        default:
                                                            echo 'Mark as Delivered';
                                                    }
                                                    ?>
                                                </button>
                                            </li>
                                            <li><button class="status-update" data-id="<?php echo ($id); ?>" data-status="Rejected"><i class="fas fa-money-bill-wave-alt"></i> Reject Order</button></li>
                                        <?php }
                                        if ($_SESSION['role'] == 1 && $row['status']=='Rejected') {
                                        ?>
                                            <button class="confirm" data-id="<?php echo $id; ?>"><i class="fas fa-trash-alt"></i> Remove Order</button>
                                        <?php } ?>
                                    </ul>
                                </td>
                            </tr>
                        <?php }} ?>
                    </tbody>
                </table>
                <?php
                echo '<script type="text/javascript">
                let moreBtns=document.querySelectorAll("tbody .orders__more-btn");
                document.addEventListener(\'click\',function(e){
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
            <div class="paginate">
                <?php if ($page > 1) { ?><a href="./index.php?page=<?php echo $page - 1;
                                                                    if (isset($_GET['status'])) {
                                                                        echo "&status=$status";
                                                                    }if($search!=""){echo "&search=$search";} ?>" class="prev"><i class="fas fa-angle-double-left"></i></a><?php } ?>
                <div class="input">
                    <input type="number" name="page" id="page" min="1" max="<?php echo $max; ?>" value=<?php echo $page ?>>
                    <button id="go" onclick="paginate();">Go</button>
                </div>
                <?php if ($page < $max) { ?><a href="./index.php?page=<?php echo $page + 1;
                                                                        if (isset($_GET['status'])) {
                                                                            echo "&status=$status";
                                                                        }if($search!=""){echo "&search=$search";} ?>" class="next"><i class="fas fa-angle-double-right"></i></a><?php } ?>
            </div>
        </div>
        <!-- Container End -->
        <?php include '../footer.php';
        $connect->close() ?>
    </div>
    <script>
        let page = document.getElementById("page");
        page.addEventListener("keyup", function(e) {
            if (e.keyCode === 13) {
                e.preventDefault();
                document.getElementById("go").click();
            }
        });

        function paginate() {
            let numPage = page.value;
            if (numPage > <?php echo $max; ?>) {
                numPage = <?php echo $max; ?>
            }
            if (numPage === "") {
                numPage = "1";
            }
            if (numPage != <?php echo $page; ?>) {
                window.location.replace("./index.php?page=" + numPage<?php if (isset($_GET['status'])) {echo "+'&status=$status'";} if($search!=""){echo "+'&search=$search'";}?>);
            }
        }
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            toastr.options = {
                "closeButton": true,
                "progressBar": true,
                "positionClass": "toast-bottom-right",
            };


            $(".orders__search-input").keyup(function (e) { 
                if(e.keyCode==13){
                    $(".orders__search-icon").click();
                }
            });

            $(".orders__search-icon").click(function (e) { 
                e.preventDefault();
                let searchVal=$(".orders__search-input").val();
                let numPage = $("#page").val();
                if(searchVal!="")
                location.replace("./index.php?page="+ numPage<?php if (isset($_GET['status'])) {echo "+'&status=$status'";}?>+"&search="+searchVal);
            });


            $(".status-update").click(function(e) {
                let id = $(this).data('id');
                let status = $(this).data('status');
                $.ajax({
                    type: "GET",
                    url: "./update.php",
                    data: {
                        id,
                        status
                    },
                    // dataType: "dataType",
                    success: function(response) {
                        var result = $.parseJSON(response);

                        if (result.status == "success") {
                            toastr.success(result.message, "Success!");
                        } else {
                            toastr.error(result.message, "Something Wrong!");
                        }

                        $(".toast-title").css({
                            "font-size": "1.6rem",
                            "line-height": "1.8rem"
                        });

                        $(".toast-message").css({
                            "font-size": "1.4rem",
                            "line-height": "1.6rem"
                        });

                        setTimeout(function() {
                            location.reload(true);
                        }, 2000);
                    }
                });
            });

            $(".confirm").click(function(e) {
                let id = $(this).data('id');
                if (confirm("Do you really want to delete this order?") == true) {
                    $.ajax({
                        type: "GET",
                        url: "./delete.php",
                        data: {
                            id
                        },
                        // dataType: "dataType",
                        success: function(response) {
                            location.reload();
                        }
                    });
                }
            });
        });
    </script>
</body>

</html>