<?php
session_start();
require '../check-role.php';
if ($_SESSION['role'] != 1) {
    header('location:index.php');
    exit;
}
$_SESSION['cur'] = "Customers";
if (!isset($_GET['id'])) {
    $_SESSION['error'] = "No customer selected!";
    header('location:index.php');
    exit;
}
unset($_SESSION['error']);
$id = $_GET['id'];
require '../../connect.php';
$sql = "select * from customers where id=$id";
$res = $connect->query($sql);
if (!$res->num_rows > 0) {
    $_SESSION['error'] = "Can't find customer whom id=$id!";
    header('location:index.php');
    exit;
}
$customer = $res->fetch_array();
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
    <link rel="stylesheet" href="../assets/css/customers.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <link rel="icon" type="image/x-icon" href="../../data/img/favicon.png">
    <title>Q Coffee | Customers Control</title>
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
                <p class="insert__title">Customer Information</p>
                <div class="form">
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
                        }
                        ?>
                    </div>

                    <form id="update-form" action="./handle-update.php?id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
                        <div>
                            <label for="username">Username: </label>
                            <input type="text" name="username" id="username" value="<?php echo $customer['username'] ?>">
                        </div>
                        <div>
                            <label for="name">Name: </label>
                            <input type="text" name="name" id="name" value="<?php echo $customer['name'] ?>">
                        </div>
                        <div>
                            <label for="email">Email: </label>
                            <input type="text" name="email" id="email" value="<?php echo $customer['email'] ?>">
                        </div>
                        <div>
                            <label for="phone">Phone Number: </label>
                            <input type="text" name="phone" id="phone" value="<?php echo $customer['phone'] ?>">
                        </div>
                        <div>
                            <label for="DOB">DOB: </label>
                            <input type="text" name="DOB" id="DOB" value="<?php echo $customer['DOB'] ?>">
                        </div>
                        <div>
                            <label for="address">Address: </label>
                            <input type="text" name="address" id="address" value="<?php echo $customer['address'] ?>">
                        </div>
                        <div>
                            <label>Gender: </label>
                            <?php
                            switch ($customer['gender']) {
                                case 0:
                            ?>
                                    <input type="radio" name="gender" value="0" checked>Male
                                    <input type="radio" name="gender" value="1">Female
                                <?php
                                    break;
                                case 1:
                                ?>
                                    <input type="radio" name="gender" value="0">Male
                                    <input type="radio" name="gender" value="1" checked>Female
                            <?php break;
                            } ?>
                        </div>
                        <div>
                            <label>Avatar: </label>
                            <?php if ($customer['avatar'] == '') {
                                echo 'No Avatar';
                            } else { ?> <img src="../../<?php echo $customer['avatar']; ?>" alt="Avatar" width="200px"><?php } ?>
                            <input type="file" name="photo">
                        </div>
                        <button type="submit">Update</button>
                    </form>
                    <a href="<?php echo $_SERVER['HTTP_REFERER']; ?>" class="back"><i class="fas fa-chevron-left"></i> Back to Customers</a>
                </div>

                <!-- Container End -->
            </div>
        </div>
        <?php include '../footer.php';
        $connect->close() ?>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $("#update-form").submit(function(e) {
                    e.preventDefault();
                    let actURL = $(this).attr("action");
                    var formData = new FormData(this);
                    $.ajax({
                        type: "POST",
                        url: actURL,
                        data: formData,
                        // dataType: "dataType",
                        success: function(response) {
                            window.scrollTo({
                                top: 0,
                                behavior: 'smooth'
                            });
                            
                            var result = $.parseJSON(response);

                            toastr.options = {
                                "closeButton": true,
                                "progressBar": true,
                                "positionClass": "toast-bottom-right",
                            }
                            
                            if(result.status=="success"){
                                toastr.success(result.message, "Success!");
                            }else{
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
                        },
                        cache: false,
                        contentType: false,
                        processData: false
                    });
                });
            });
        </script>
</body>

</html>