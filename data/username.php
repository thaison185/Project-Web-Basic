<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        require '../connect.php';
        $sql= "select username from customers where id >5";
        $res=$connect->query($sql);
        foreach($res as $each){
            echo $each['username'].'<br>';
        }
    ?>
</body>
</html>