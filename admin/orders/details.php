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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="icon" type="image/x-icon" href="../../data/img/favicon.png">
    <title>Q Coffee | Orders Control</title>
</head>

<body>
    <?php
    if (!isset($_GET['id'])) {
        $_SESSION['error'] = "No order selected!";
        header('location:index.php');
        exit;
    }
    unset($_SESSION['error']);
    include '../sidebar.php';
    include '../header.php';
    require '../../connect.php';
    $id = $_GET['id'];
    $sql = "select order_details.*, items.image,items.name 
        from order_details join items on items.id= order_details.item_id
        where order_id=$id";
    $items = $connect->query($sql);
    ?>
    <div class="app">
        <!-- Container Begin -->
        <div class="container">
            <div class="orders__details">
                <div class="details">
                    <a href="<?php echo $_SERVER['HTTP_REFERER']; ?>" class="back"><i class="fas fa-chevron-left"></i> Back to Orders</a>
                    <h1>Details of Order #<?php echo $id; ?></h1>
                    <?php
                    $sql = "select orders.*,customers.name,customers.address, customers.phone 
                from orders join customers on orders.customer_id= customers.id
                where orders.id=$id";
                    $res = $connect->query($sql);
                    $details = mysqli_fetch_array($res);
                    ?>
                    <p class="p__details">Customer: <?php echo $details['name']; ?></p>
                    <p class="p__details">Phone number: <?php echo $details['phone']; ?></p>
                    <p class="p__details">Address: <?php echo $details['address']; ?></p>
                    <p class="p__details">Created at: <?php echo $details['date']; ?></p>
                    <p class="p__details">Description: <br><?php echo nl2br($details['description']); ?></p>
                    <div class="p__details">Status:
                        <div class="p-status orders__status--<?php echo ($details['status']); ?>"><?php echo $details['status']; ?></div>
                        <?php
                        if ($details['status'] != "Rejected" && $details['status'] != "Delivered") {
                        ?>
                            <button class="details-status-update" data-status="<?php
                                switch ($details['status']) {
                                    case "Pending":
                                        echo "Accepted";
                                        break;
                                    case "Accepted":
                                        echo "Delivered";
                                        break;
                                }
                                ?>" data-id="<?php echo $details['id']; ?>">
                                <i class="fas fa-truck"></i>
                                <?php
                                switch ($details['status']) {
                                    case "Pending":
                                        echo ' Accept Order';
                                        break;
                                    default:
                                        echo 'Mark as Delivered';
                                }
                                ?>
                            </button>
                            <button class="details-status-update" data-id="<?php echo ($id); ?>" data-status="Rejected"><i class="fas fa-money-bill-wave-alt"></i> Reject Order</button></li>
                        <?php } ?>
                    </div>
                    <p class="p__price">Total price: $ <?php echo  $details['price']; ?></p>
                </div>
            </div>
            <div class="orders__order-table">
                <table class="orders__table">
                    <thead>
                        <tr>
                            <th>Item</th>
                            <th>Name</th>
                            <th>Options</th>
                            <th>Size</th>
                            <th>Quantity</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_array($items)) {
                            $img = $row['image'];
                            $name = $row['name'];
                            $option = $row['options'];
                            $size = $row['size'];
                            $quantity = $row['quantity'];
                            $total = $row['price'];
                        ?>
                            <tr>
                                <td><img src="../../<?php echo $img; ?>" alt="Item Image" width="100px" height="100px"></td>
                                <td><?php echo $name; ?></td>
                                <td><?php echo $option; ?></td>
                                <td><?php echo $size; ?></td>
                                <td><?php echo $quantity; ?></td>
                                <td>$ <?php echo $total; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Container End -->
        <?php include '../footer.php'; ?>
    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "positionClass": "toast-bottom-right",
        };

        $(".details-status-update").click(function(e) {
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
    });
</script>

</html>