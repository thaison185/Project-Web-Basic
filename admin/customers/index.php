<?php 
    session_start();
    require '../check-role.php';
    $_SESSION['cur']="Customers";
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" >
    <title>Q Coffee | Customers Control</title>
</head>
<body>
<?php 
        include '../sidebar.php';
        include '../header.php';
        require '../connect.php';
        $sql="select * from customers";
        $customers=$connect->query($sql);

?>  
<div class="app">
    <!-- Container Begin -->
    <div class="container">
    <div class="customers__menu">
        <div class="customers__search">
            <input type="text" class="customers__search" placeholder="Quick search by ID">
            <i class="fas fa-search customers__search-icon"></i>
        </div>
    </div>
    <div class="customers__product-table">
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
        <table class="customers__table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>DOB</th>
                    <th>Address</th>   
                    <th>Gender</th>   
                    <th>Avatar</th> 
                    <?php
                        if ($_SESSION['role']==1){
                    ?>  
                    <th>Actions</th> 
                    <?php } ?>  
                </tr>
            </thead>
            <tbody>
            <?php
                while($row = mysqli_fetch_array($customers)){
                        $id=$row['id'];
                        $username=$row['username'];
                        $name=$row['name'];
                        $email=$row['email'];
                        $phone=$row['phone'];
                        $DOB=$row['DOB'];
                        $address=$row['address'];
                        $gender=$row['gender']==0?"Male":"Female";
                        $avatar= $row['avatar'];        
            ?>
                <tr class="float-z">
                    <td><?php echo $id; ?></td>
                    <td><?php echo $username; ?></td>
                    <td><?php echo $name; ?></td>
                    <td><?php echo $email; ?></td>
                    <td><?php echo $phone; ?></td>
                    <td><?php echo $DOB; ?></td>
                    <td><?php echo $address; ?></td>
                    <td><?php echo $gender; ?></td>
                    <td><?php if ($avatar==''){echo 'No Avatar';}else{?> <img src="../../<?php echo $avatar; ?>" alt="Avatar" width="100px"><?php }?></td>
                    <?php
                        if ($_SESSION['role']==1){
                    ?>
                    <td class="actions">
                        <div><a href="./update.php?id=<?php echo $id; ?>">Update</a></div>
                        <script>
                            function Delete() {
                            window.location.href="./delete.php?id=<?php echo $id?>";
                            }
                            function confirmDelete() {
                                if (confirm("All orders made by this customer will be deleted too! Do you really want to delete this customer?") == true) {
                                    Delete();
                                }
                            }
                        </script>
                        <button class="confirm" onclick="confirmDelete()">Delete</button>
                    <?php } ?>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <!-- Container End -->
</div>
<?php include '../footer.php'; $connect->close()?>
</div>
</body>
</html>

