<?php 

session_start();
unset($_SESSION['id']);
// die($_SESSION['id'] );

header('location:../frontend/index.php');