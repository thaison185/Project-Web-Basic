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
 <link rel="icon" type="image/x-icon" href="../../data/img/favicon.png">
    <title>Q Coffee | Customers Control</title>
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
        $sql="select count(*) as 'records' from customers where id like '%$search%'";
        $res=$connect->query($sql)->fetch_array()['records'];
        $step=10;
        if($res%$step==0){$max=intdiv($res,$step);} else{$max=intdiv($res,$step)+1;} if($max==0) $max=1;
    
        if(isset($_GET['page'])){ 
            $page=$_GET['page'];
            if($page>$max){$page=$max;}
        }else{$page=1;}
        $offset=$step*($page-1);
        $sql="select * from customers where id like '%$search%' order by id limit $step offset $offset";
        $customers=$connect->query($sql);

?>  
<div class="app">
    <!-- Container Begin -->
    <div class="container">
    <div class="customers__menu">
        <div class="customers__search">
            <input type="text" class="customers__search customers__search-input" id="search" placeholder="Quick search by ID">
            <div class="customers__search-icon"><i class="fas fa-search"></i></div>
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
                unset($_SESSION['error']);
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
            if(!empty($customers)){
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
                    <td><?php if ($avatar==''){echo 'No Avatar';}else{?> <img src="../../<?php echo $avatar; ?>" alt="Avatar" width="100px" height="100px"><?php }?></td>
                    <?php
                        if ($_SESSION['role']==1){
                    ?>
                    <td class="actions">
                        <div><a href="./update.php?id=<?php echo $id; ?>">Update</a></div>
                        <script>
                            function Delete(id) {
                            window.location.href="./delete.php?id="+id;
                            }
                            function confirmDelete(id) {
                                if (confirm("All orders made by this customer will be deleted too! Do you really want to delete this customer?") == true) {
                                    Delete(id);
                                }
                            }
                        </script>
                        <button class="confirm" onclick="confirmDelete(<?php echo $id?>)">Delete</button>
                    <?php } ?>
                    </td>
                </tr>
                <?php }} ?>
            </tbody>
        </table>
        <div class="paginate">
            <?php if($page>1){?><a href="./index.php?page=<?php echo $page-1;if($search!=""){echo "&search=$search";}?>" class="prev"><i class="fas fa-angle-double-left"></i></a><?php } ?>
            <div class="input">
                <input type="number" name="page" id="page" min="1" max="<?php echo $max; ?>" value=<?php echo $page?>>  
                <button id="go" onclick="paginate();">Go</button>
            </div>
            <?php if($page<$max){?><a href="./index.php?page=<?php echo $page+1;if($search!=""){echo "&search=$search";}?>" class="next"><i class="fas fa-angle-double-right"></i></a><?php } ?>
        </div>
    </div>
    <!-- Container End -->
</div>
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
            window.location.replace("./index.php?page="+numPage<?php if($search!=""){echo "+'&search=$search'";}?>);
        }
    }
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $(".customers__search-input").keyup(function (e) { 
                if(e.keyCode==13){
                    $(".customers__search-icon").click();
                }
            });

            $(".customers__search-icon").click(function (e) { 
                e.preventDefault();
                let searchVal=$(".customers__search-input").val();
                let numPage = $("#page").val();
                if(searchVal!="")
                location.replace("./index.php?page="+ numPage+"&search="+searchVal);
            });
    });
</script>
</body>
</html>

