<?php
session_start();
require '../check-role.php';
if ($_SESSION['role'] != 1) {
    header('location:index.php');
    exit;
}
$_SESSION['cur'] = "Products";
require_once '../../connect.php';
$sql = "select distinct(category) from items";
$res = $connect->query($sql);
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="icon" type="image/x-icon" href="../../data/img/favicon.png">
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
                        ?>
                    </div>
                    <form id="add-form" action="./handle-add.php" method="post" enctype="multipart/form-data">
                        <div>
                            <label for="name">Name: </label>
                            <input type="text" name="name" id="name" required>
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
                            <input type="radio" name="ice" value="0" checked>Disable
                            <input type="radio" name="ice" value="1">Enable
                        </div>
                        <div>
                            <label>Sugar: </label>
                            <input type="radio" name="sugar" value="0" checked>Disable
                            <input type="radio" name="sugar" value="1">Enable
                        </div>
                        <div>
                            <label>Category: </label>
                            <select name="category">
                                <?php while ($category = $res->fetch_array()['category']) { ?>
                                    <option value="<?php echo $category; ?>"><?php echo $category; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <button class="form-submit" type="submit">Insert</button>
                    </form>
                </div>
                <a href="<?php echo $_SERVER['HTTP_REFERER']; ?>" class="back"><i class="fas fa-chevron-left"></i> Back to Products</a>
            </div>
        </div>
        <!-- Container End -->
        <?php include '../footer.php'; ?>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#add-form").submit(function(e) {
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