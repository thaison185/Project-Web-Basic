<?php 

session_start();
session_destroy();
// die($_SESSION['id'] );

header('location:../frontend/index.php');